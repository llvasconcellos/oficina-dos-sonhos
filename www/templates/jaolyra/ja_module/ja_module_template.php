<?php
class ja_modules_html {
  
  /*********
   *Use template for module. Template will contain these replace holder:
   *##TITLE##
   *##ID##
   *##ITEMID##   
   *##CLASSSUFFIX##   
   *##CONTENT##   
   ********/
  function mosLoadModules( $position='left', $template="" ) {
  	global $mosConfig_gzip, $mosConfig_absolute_path, $database, $my, $Itemid, $mosConfig_caching;
  
  	$tp = intval( mosGetParam( $_GET, 'tp', 0 ) );
  	if ($tp) {
  		echo '<div style="height:50px;background-color:#eee;margin:2px;padding:10px;border:1px solid #f00;color:#700;">';
  		echo $position;
  		echo '</div>';
  		return;
  	}
  	$cache =& mosCache::getCache( 'com_content' );
  
  	require_once( $mosConfig_absolute_path . '/includes/frontend.html.php' );
  
  	$allModules =& initModules();
  	if (isset( $GLOBALS['_MOS_MODULES'][$position] )) {
  		$modules = $GLOBALS['_MOS_MODULES'][$position];
  	} else {
  		$modules = array();
  	}
  
 
  	$count = 1;
  	foreach ($modules as $module) {
  		$params = new mosParameters( $module->params );

  		if ((substr("$module->module",0,4))=='mod_') {
  		// normal modules
  			if ($params->get('cache') == 1 && $mosConfig_caching == 1) {
  			echo "Get from cache";
  			// module caching
  				$cache->call('ja_modules_html::module2', $module, $params, $Itemid, $count, $template, $my->gid  );
  			} else {
  				ja_modules_html::module2( $module, $params, $Itemid, $count, $template );
  			}
  		} else {
  		// custom or new modules
  			if ($params->get('cache') == 1 && $mosConfig_caching == 1) {
  			echo "Get from cache";
  			// module caching
  				$cache->call('ja_modules_html::module', $module, $params, $Itemid, $template, 0, $my->gid );
  			} else {
  				ja_modules_html::module( $module, $params, $Itemid, $template );
  			}
  		}

  		$count++;
  	}

  }
	/*
	* Output Handling for Custom modules
	*/
	function module( &$module, &$params, $Itemid, $template='' ) {
		global $_MAMBOTS;
		
		// custom module params
		$moduleclass_sfx 	= $params->get( 'moduleclass_sfx' );
		$rssurl 			= $params->get( 'rssurl' );
		$firebots 			= $params->get( 'firebots', 0 );

		if ( $rssurl ) {
			// feed output
			ja_modules_html::modoutput_feed( $module, $params, $moduleclass_sfx );
		}

		if ($module->content != '' && $firebots) {
		// mambot handling for custom modules
			// load content bots
			$_MAMBOTS->loadBotGroup( 'content' );
			
			$row		= $module;
			$row->text 	= $module->content;
			
			$results	= $_MAMBOTS->trigger( 'onPrepareContent', array( &$row, &$params, 0 ), true );
			
			$module->content = $row->text;
		}
		
		//Use external template
    ja_modules_html::modoutput_template( $module, $params, $Itemid, $moduleclass_sfx, 1, $template );

	}

	/**
	* Output Handling for 3PD modules
	* @param object
	* @param object
	* @param int The menu item ID
	* @param int -1=show without wrapper and title, -2=xhtml style
	*/
	function module2( &$module, &$params, $Itemid, $count=0, $template='' ) {
		global $mosConfig_lang, $mosConfig_absolute_path;

		$moduleclass_sfx = $params->get( 'moduleclass_sfx' );

		// check for custom language file
		$path = $mosConfig_absolute_path . '/modules/' . $module->module . $mosConfig_lang .'.php';
		if (file_exists( $path )) {
			include( $path );
		} else {
			$path = $mosConfig_absolute_path .'/modules/'. $module->module .'.eng.php';
			if (file_exists( $path )) {
				include( $path );
			}
		}

		$number = '';
		if ($count > 0) {
			$number = '<span>' . $count . '</span> ';
		}

	  //Use external template
    ja_modules_html::modoutput_template( $module, $params, $Itemid, $moduleclass_sfx, 0, $template );
	}

	// feed output
	function modoutput_feed( &$module, &$params, $moduleclass_sfx ) {
		global $mosConfig_absolute_path, $mosConfig_cachepath;

		// check if cache directory is writeable
		$cacheDir 		= $mosConfig_cachepath .'/';	
		if ( !is_writable( $cacheDir ) ) {	
			$module->content = 'Cache Directory Unwriteable';
			return;
		}
		
		$rssurl 			= $params->get( 'rssurl' );
		$rssitems 			= $params->get( 'rssitems', 5 );
		$rssdesc 			= $params->get( 'rssdesc', 1 );
		$rssimage 			= $params->get( 'rssimage', 1 );
		$rssitemdesc		= $params->get( 'rssitemdesc', 1 );
		$words 				= $params->def( 'word_count', 0 );
		$rsstitle			= $params->get( 'rsstitle', 1 );
		$rsscache			= $params->get( 'rsscache', 3600 );

		$contentBuffer	= '';
		
		$LitePath 		= $mosConfig_absolute_path .'/includes/Cache/Lite.php';
		require_once( $mosConfig_absolute_path .'/includes/domit/xml_domit_rss.php' );
		
		$rssDoc = new xml_domit_rss_document();
		$rssDoc->setRSSTimeout(2);
		$rssDoc->useCacheLite(true, $LitePath, $cacheDir, $rsscache);
		$success = $rssDoc->loadRSS( $rssurl );

		if ( $success )	{		
			$content_buffer = '';
			$totalChannels 	= $rssDoc->getChannelCount();
	
			for ( $i = 0; $i < $totalChannels; $i++ ) {
				$currChannel =& $rssDoc->getChannel($i);
				$elements 	= $currChannel->getElementList();
				$iUrl		= 0;
				foreach ( $elements as $element ) {
					//image handling
					if ( $element == 'image' ) {
						$image =& $currChannel->getElement( DOMIT_RSS_ELEMENT_IMAGE );
						$iUrl	= $image->getUrl();
						$iTitle	= $image->getTitle();
					}
				}
	
				// feed title
				$content_buffer = '<table cellpadding="0" cellspacing="0" class="moduletable'.$moduleclass_sfx.'">' . "\n";
							
				if ( $currChannel->getTitle() && $rsstitle ) {
					$feed_title 	= $currChannel->getTitle();
					$feed_title 	= mosCommonHTML::newsfeedEncoding( $rssDoc, $feed_title );

					$content_buffer .= "<tr>\n";
					$content_buffer .= "	<td>\n";
					$content_buffer .= "		<strong>\n";
					$content_buffer .= "		<a href=\"" . ampReplace( $currChannel->getLink() )  . "\" target=\"_blank\">\n";
					$content_buffer .= $feed_title . "</a>\n";
					$content_buffer .= "		</strong>\n";
					$content_buffer .= "	</td>\n";
					$content_buffer .= "</tr>\n";
	
				}
	
				// feed description
				if ( $rssdesc ) {
					$feed_descrip 	= $currChannel->getDescription();
					$feed_descrip 	= mosCommonHTML::newsfeedEncoding( $rssDoc, $feed_descrip );
					
					$content_buffer .= "<tr>\n";
					$content_buffer .= "	<td>\n";
					$content_buffer .= $feed_descrip;
					$content_buffer .= "	</td>\n";
					$content_buffer .= "</tr>\n";
				}
	
				// feed image
				if ( $rssimage && $iUrl ) {
					$content_buffer .= "<tr>\n";
					$content_buffer .= "	<td align=\"center\">\n";
					$content_buffer .= "		<image src=\"" . $iUrl . "\" alt=\"" . @$iTitle . "\"/>\n";
					$content_buffer .= "	</td>\n";
					$content_buffer .= "</tr>\n";
				}
	
				$actualItems 	= $currChannel->getItemCount();
				$setItems 		= $rssitems;
	
				if ($setItems > $actualItems) {
					$totalItems = $actualItems;
				} else {
					$totalItems = $setItems;
				}
	
	
				$content_buffer .= "<tr>\n";
				$content_buffer .= "	<td>\n";
				$content_buffer .= "		<ul class=\"newsfeed" . $moduleclass_sfx . "\">\n";
	
						for ($j = 0; $j < $totalItems; $j++) {
							$currItem =& $currChannel->getItem($j);
							// item title
							
							$item_title = $currItem->getTitle();
							$item_title = mosCommonHTML::newsfeedEncoding( $rssDoc, $item_title );
	
							// START fix for RSS enclosure tag url not showing
							$content_buffer .= "<li class=\"newsfeed" . $moduleclass_sfx . "\">\n";
							$content_buffer .= "	<strong>\n";
							if ($currItem->getLink()) {
								$content_buffer .= "        <a href=\"" . ampReplace( $currItem->getLink() ) . "\" target=\"_blank\">\n";
								$content_buffer .= "      " . $item_title . "</a>\n";
							} else if ($currItem->getEnclosure()) {
								$enclosure = $currItem->getEnclosure();
								$eUrl	= $enclosure->getUrl();
								$content_buffer .= "        <a href=\"" . ampReplace( $eUrl ) . "\" target=\"_blank\">\n";
								$content_buffer .= "      " . $item_title . "</a>\n";
							}  else if (($currItem->getEnclosure()) && ($currItem->getLink())) {
								$enclosure = $currItem->getEnclosure();
								$eUrl	= $enclosure->getUrl();
								$content_buffer .= "        <a href=\"" . ampReplace( $currItem->getLink() ) . "\" target=\"_blank\">\n";
								$content_buffer .= "      " . $item_title . "</a><br/>\n";
								$content_buffer .= "        <a href=\"" . ampReplace( $eUrl ) . "\" target=\"_blank\"><u>Download</u></a>\n";
							}
							$content_buffer .= "	</strong>\n";
							// END fix for RSS enclosure tag url not showing
							
								// item description
								if ( $rssitemdesc ) {
									// item description
									$text = $currItem->getDescription();
									$text = mosCommonHTML::newsfeedEncoding( $rssDoc, $text );

									// word limit check
									if ( $words ) {
										$texts = explode( ' ', $text );
										$count = count( $texts );
										if ( $count > $words ) {
											$text = '';
											for( $i=0; $i < $words; $i++ ) {
												$text .= ' '. $texts[$i];
											}
											$text .= '...';
										}
									}
	
									$content_buffer .= "     <div>\n";
									$content_buffer .= "        " . $text;
									$content_buffer .= "		</div>\n";
	
								}
							$content_buffer .= "</li>\n";
						}
				$content_buffer .= "    </ul>\n";
				$content_buffer .= "	</td>\n";
				$content_buffer .= "</tr>\n";
				$content_buffer .= "</table>\n";
			}
			$module->content = $content_buffer;
		}
	}


	function modoutput_template( $module, $params, $Itemid, $moduleclass_sfx, $type=0, $template ) {
		global $mosConfig_live_site, $mosConfig_sitename, $mosConfig_lang, $mosConfig_absolute_path;
		global $mainframe, $database, $my;

//Replace Title ##TITLE##
    $search = "##TITLE##";
    $value = htmlspecialchars( $module->title );
    $html_output = $template;
    $html_output = str_replace ($search, $value, $html_output);
//Replace Title ##ID##
    $search = "##ID##";
    $value = $module->id;
    $html_output = str_replace ($search, $value, $html_output);
//Replace Title ##ITEMID##
    $search = "##ITEMID##";
    $value = $Itemid;
    $html_output = str_replace ($search, $value, $html_output);
//Replace Title ##CLASSSUFFIX##
    $search = "##CLASSSUFFIX##";
    $value = $moduleclass_sfx;
    $html_output = str_replace ($search, $value, $html_output);
//Content ##CONTENT##
    $search = "##CONTENT##";
    $pos = strpos ( $html_output, $search);
    if (!$pos) {
      echo $html_output;
      return;
    }
    
    echo substr($html_output, 0, $pos);		
		if ( $type ) {
			ja_modules_html::CustomContent( $module, $params);
		} else {
			include( $mosConfig_absolute_path . '/modules/' . $module->module . '.php' );
			
			if (isset( $content)) {
				echo $content;
			}
		}
    echo substr($html_output, $pos + strlen($search));		
		
	}
  	
	function CustomContent( &$module, $params) {
		global $_MAMBOTS;
		
		$firebots 			= $params->get( 'firebots', 0 );
		
		if ( $firebots ) {
			$row		= $module;
			$row->text	= $module->content;		
		
			$results = $_MAMBOTS->trigger( 'onBeforeDisplayContent', array( &$row, &$params, 0 ) );
			echo trim( implode( "\n", $results ) );
			
			$module->content = $row->text;
		}
		
		// output custom module contents
		echo $module->content;
		
		if ( $firebots ) {
			$results = $_MAMBOTS->trigger( 'onAfterDisplayContent', array( &$row, &$params, 0 ) );
			echo trim( implode( "\n", $results ) );
			
			$module->content = $row->text;
		}
	}
}
?>
