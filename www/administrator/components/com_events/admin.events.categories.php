<?php
// $Id: admin.events.categories.php,v 1.6 2005/11/30 10:39:10 g_edwards Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

// dmcd May 20/04 Note that the following is a modified version of the MOS core
// category admin code.  It will need to be kept up to date with the MOS core
// changes (obviously).  We add here a color property for the category which is
// maintained in a separate db table called '#__events_categories' with the cat_id
// field as well as a 'color' field.

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class categories_html {
	/**
	* Writes a list of the categories for a section
	* @param array An array of category objects
	* @param string The name of the category section
	*/
	function show( &$rows, $section, $section_name, $myid, $pageNav ) {
?>
<form action="index2.php" method="POST" name="adminForm">
<table cellpadding="4" cellspacing="0" border="0" width="100%">
	<tr>

      <td width="100%"><span class="sectionname">
	  <img src="../components/com_events/images/logo.gif" border=0 align="middle">
	  <!--
	  <?php echo $section_name;?>
	  -->
	  Categories</span></td>
		<td nowrap>Display #</td>
		<td> <?php echo $pageNav->writeLimitBox(); ?> </td>
	</tr>
</table>

<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
	<tr>
		<th width="20">#</th>
		<th width="20">
			<input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count( $rows );?>);" />
		</th>
		<th class="title">Category Name</th>
		<th width="15%"># of&nbsp;Records</th>
		<th width="15%"># Checked&nbsp;Out</th>
		<th width="10%">Published</th>
		<th width="10%">Checked Out</th>
		<th width="10%">Access</th>
		<th colspan="2">Reorder</th>
	</tr>
<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];
			$img = $row->published ? 'tick.png' : 'publish_x.png';
			$task = $row->published ? 'unpublish' : 'publish';
?>
	<tr class="<?php echo "row$k"; ?>">
		<td width="20" align="right"><?php echo $i+$pageNav->limitstart+1;?></td>
		<td width="20" bgcolor=<?php echo $row->color;?>>
<?php		if ($row->checked_out && $row->checked_out != $myid) { ?>
						&nbsp;
<?php		} else { ?>
			<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->id; ?>" onClick="isChecked(this.checked);" />
<?php		} ?>
		</td>
		<td width="35%">
			<a href="#edit" onClick="return listItemTask('cb<?php echo $i;?>','edit')">
				<?php echo "$row->name ($row->title)"; ?>
			</a>
		</td>
		<td width="15%" align="center"><?php echo $row->num; ?></td>
		<td width="15%" align="center"><?php echo $row->num_checked_out; ?></td>
		<td width="10%" align="center"><a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')"><img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></a></td>
		<td width="15%" align="center"><?php echo $row->editor; ?>&nbsp;</td>
		<td width="10%" align="center"><?php echo $row->groupname;?></td>
		<td>
<?php		if ($i > 0 || ($i+$pageNav->limitstart > 0)) { ?>
			<a href="#reorder" onClick="return listItemTask('cb<?php echo $i;?>','orderup')">
				<img src="images/uparrow.png" width="12" height="12" border="0" alt="Move Up">
			</a>
<?php		} else { ?>
			&nbsp;
<?php		} ?>
		</td>
		<td>
<?php		if ($i < $n-1 || $i+$pageNav->limitstart < $pageNav->total-1) { ?>
			<a href="#reorder" onClick="return listItemTask('cb<?php echo $i;?>','orderdown')">
				<img src="images/downarrow.png" width="12" height="12" border="0" alt="Move Down">
			</a>
<?php		} else { ?>
			&nbsp;
<?php		} ?>
		</td>
<?php		$k = 1 - $k; ?>
	</tr>
<?php	} // for loop ?>

    <tr>
		<th align="center" colspan="11"> <?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
		<td align="center" colspan="11"> <?php echo $pageNav->writePagesCounter(); ?></td>
    </tr>
</table>

<input type="hidden" name="option" value="com_events" />
<input type="hidden" name="section" value="<?php echo $section;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="chosen" value="" />
<input type="hidden" name="act" value="categories" />
<input type="hidden" name="boxchecked" value="0" />
</form>
<?php
	}
	/**
	* Writes the edit form for new and existing categories
	*
	* A new record is defined when <var>$row</var> is passed witht the <var>id</var>
	* property set to 0.  Note that the <var>section</var> property <b>must</b> be defined
	* even for a new record.
	* @param mosCategory The category object
	* @param string The html for the image list select list
	* @param string The html for the image position select list
	* @param string The html for the ordering list
	* @param string The html for the groups select list
	*/
	function edit( &$row, $imagelist, $iposlist, $orderlist, $glist, $color='' ) {
		global $mosConfig_live_site, $mosConfig_editor;
		if ($row->image == "") {
			$row->image = 'blank.png';
		}
		mosMakeHtmlSafe( $row, ENT_QUOTES, 'description' );
?>
	<script language="Javascript" src="../components/com_events/js/colorpicker.js"></script>
	<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton, section) {
		if (document.adminForm.name.value == ""){
			alert("Category must have a name");
		} else {
			<?php getEditorContents( 'editor1', 'description' ) ; ?>
			submitform(pressbutton);
		}
	}
	</script>

	<form action="index2.php" method="post" name="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%">
	<tr>
		<td class="sectionname"><?php echo $row->id ? 'Edit' : 'Add';?> Category <?php echo $row->name; ?></td>
	</tr>
	</table>
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform">
    	<tr>
          <td width="120" align="left">
            <?php echo _CAL_LANG_EVENT_COLOR;?>:
          </td>
          <td>
            <table width="50%" id="pick1064797275" align="left" bgcolor="<?php echo $row->color;?>" style="border:solid 1px #a0a0a0">
              <tr>
                <td >
                	<!-- flooble.com Color Picker start -->
	          		<input id="pick1064797275field" size="8" class="inputbox"
		  			onChange="cp.relateColor(this.value);" title="onclick" name="color" value="<?php echo $row->color;?>">
				</td>
				<td>
		  			<a href="javascript:void(0)" onclick="cp.pickColor();"
		  			style="border: 1px solid #000000; font-family:Verdana; font-weight: bold; font-size:10px; background:#eeeeee;color:black;
		  			text-decoration: none;">Color Picker</a>
		  			<script language="javascript">
					var cp = new ColorPicker( 'cp', 'pick1064797275', '<?php echo $row->color;?>' );
		  			</script>
	        		<!-- flooble Color Picker end -->
        		</td>
         	  </tr>
    		</table>
          </td>
        </tr>
	<tr>
		<td>Category Title:</td>
		<td colspan="2">
			<input class="inputbox" type="text" name="title" value="<?php echo $row->title; ?>" size="50" maxlength="50" title="A short name to appear in menus" />
		</td>
	</tr>
	<tr>
		<td>Category Name:</td>
		<td colspan="2">
			<input class="inputbox" type="text" name="name" value="<?php echo $row->name; ?>" size="50" maxlength="255" title="A long name to be displayed in headings" />
		</td>
	</tr>
	<tr>
		<td>Image:</td>
		<td>
			<?php echo $imagelist; ?>
		</td>
		<td rowspan="4" width="50%">
			<script language="javascript" type="text/javascript">
				if (document.forms[0].image.options.value!=''){
				  jsimg='../images/stories/' + getSelectedValue( 'adminForm', 'image' );
				} else {
				  jsimg='../images/M_images/blank.png';
				}
				document.write('<img src=' + jsimg + ' name="imagelib" width="80" height="80" border="2" alt="Preview" />');
			</script>
	  </td>
	</tr>
	<tr>
		<td>Image Position:</td>
		<td>
			<?php echo $iposlist; ?>
		</td>
	</tr>
	<tr>
		<td>Ordering:</td>
		<td>
			<?php echo $orderlist; ?>
		</td>
	</tr>
	<tr>
		<td>Access Level:</td>
		<td>
			<?php echo $glist; ?>
		</td>
	</tr>
	<tr>
		<td valign="top">Description:</td>
		<td colspan="2">
			<?php
			// parameters : areaname, content, hidden field, width, height, rows, cols
			editorArea( 'editor1',  $row->description , 'description', '500', '200', '50', '5' ) ; ?>
		</td>
	</tr>
	<input type="hidden" name="option" value="com_events" />
	<input type="hidden" name="act" value="categories" />
	<input type="hidden" name="section" value="<?php echo $row->section; ?>" />
	<input type="hidden" name="oldtitle" value="<?php echo $row->title ; ?>" />
	<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
	<input type="hidden" name="task" value="" />

	</table>
	</form>
<?php }

}

// extend the 'categories_html' class here, redefining the 'edit' function to
// add in a colorpicker for the category

// get parameters from the URL or submitted form
$section = 'com_events';
$cid = mosGetParam( $_REQUEST, 'cid', array(0) );
if (!is_array( $cid )) {
	$cid = array(0);
}

switch ($task) {
	case "new":
		editCategory( 0, $section );
		break;

	case "edit":
		editCategory( intval( $cid[0] ) );
		break;

	case "save":
		saveCategory();
		break;

	case "remove":
		removeCategories( $section, $cid );
		break;

	case "publish":
		publishCategories( $section, $id, $cid, 1 );
		break;

	case "unpublish":
		publishCategories( $section, $id, $cid, 0 );
		break;

	case "cancel":
		cancelCategory();
		break;

	case "orderup":
		orderCategory( $cid[0], -1 );
		break;

	case "orderdown":
		orderCategory( $cid[0], 1 );
		break;

	default:
		showCategories( $section );
		break;
}

/**
* Compiles a list of categories for a section
* @param string The name of the category section
* @param string The name of the current user
*/
function showCategories( $section ) {
	global $database, $my, $mainframe;

	$limit = $mainframe->getUserStateFromRequest( "viewlistlimit", 'limit', 10 );
	$limitstart = $mainframe->getUserStateFromRequest( "view{$section}limitstart", 'limitstart', 0 );

	$section_name = '';
	if (intval( $section ) > 0) {
		$table = 'content';

		$database->setQuery( "SELECT name FROM #__sections WHERE id='$section'" );
		$section_name = $database->loadResult();
		echo $database->getErrorMsg();
		$section_name .= ' Section';
	} else if (strpos( $section, 'com_' ) === 0) {
		$table = substr( $section, 4 );

		$database->setQuery( "SELECT name FROM #__components WHERE link='option=$section'" );
		$section_name = $database->loadResult();
		echo $database->getErrorMsg();
	} else {
		$table = $section;
	}

	// get the total number of records
	$database->setQuery( "SELECT count(*) FROM #__categories WHERE section='$section'" );
	$total = $database->loadResult();
	echo $database->getErrorMsg();

	require_once( "includes/pageNavigation.php" );
	$pageNav = new mosPageNav( $total, $limitstart, $limit );

	// dmcd may 22/04  added #__events_categories table to fetch category color property
	$database->setQuery( "SELECT  c.*, g.name AS groupname, u.name AS editor, cc.color AS color, "
	. "COUNT(DISTINCT s2.checked_out) AS num_checked_out, COUNT(DISTINCT s1.id) AS num"
	. "\nFROM #__categories AS c"
	. "\nLEFT JOIN #__users AS u ON u.id = c.checked_out"
	. "\nLEFT JOIN #__groups AS g ON g.id = c.access"
	. "\nLEFT JOIN #__$table AS s1 ON s1.catid = c.id"
	. "\nLEFT JOIN #__$table AS s2 ON s2.catid = c.id AND s2.checked_out > 0"
	. "\nLEFT JOIN #__${table}_categories AS cc ON cc.id = c.id"
	. "\nWHERE section='$section'"
	. "\nGROUP BY c.id"
	. "\nORDER BY c.ordering, c.name"
	. "\nLIMIT $pageNav->limitstart,$pageNav->limit"
	);

	$rows = $database->loadObjectList();
	if ($database->getErrorNum()) {
		echo $database->stderr();
		return false;
	}

	categories_html::show( $rows, $section, $section_name, $my->id, $pageNav );
}

/**
* Compiles information to add or edit a category
* @param string The name of the category section
* @param integer The unique id of the category to edit (0 if new)
* @param string The name of the current user
*/
function editCategory( $uid=0, $section='' ) {
	global $database, $my;
	global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_editor;

	$row = new mosCategory( $database );
	// load the row from the db table
	$row->load( $uid );

	// fail if checked out not by 'me'
	if ($row->checked_out && $row->checked_out <> $my->id) {
		mosRedirect( "index2.php?option=com_events&act=categories",
		"The category $row->title is currently being edited by another administrator" );
	}
	
	if ($uid) {
		// existing record
		$row->checkout( $my->id );
		// dmcd May 23/04 get the color as well
                $database->setQuery("SELECT color FROM #__events_categories WHERE id='$uid'" );
		$row->color = $database->loadResult();
		if(is_null($row->color)) $row->color='';
	} else {
		// new record
		$row->section = $section;
		$row->color = '';
	}

	// make order list
	$order = array();
	$database->setQuery( "SELECT COUNT(*) FROM #__categories WHERE section='$row->section'" );
	$max = intval( $database->loadResult() ) + 1;

	for ($i=1; $i < $max; $i++) {
		$order[] = mosHTML::makeOption( $i );
	}

	$ipos[] = mosHTML::makeOption( 'left' );
	$ipos[] = mosHTML::makeOption( 'right' );

	$iposlist = mosHTML::selectList( $ipos, 'image_position', 'class="inputbox" size="1"',
	'value', 'text', $row->image_position ? $row->image_position : 'left' );

	$imgFiles = mosReadDirectory( "$mosConfig_absolute_path/images/stories" );
	$images = array( mosHTML::makeOption( '', 'Select Image') );
	foreach ($imgFiles as $file) {
		if (eregi( "bmp|gif|jpg|png", $file )) {
			$images[] = mosHTML::makeOption( $file );
		}
	}

	$imagelist = mosHTML::selectList( $images, 'image', "class=\"inputbox\" size=\"1\""
	. " onchange=\"javascript:if (document.forms[0].image.options[selectedIndex].value!='') {document.imagelib.src='../images/stories/' + document.forms[0].image.options[selectedIndex].value} else {document.imagelib.src='../images/M_images/blank.png'}\"",
	'value', 'text', $row->image );

	$orderlist = mosHTML::selectList( $order, 'ordering', 'class="inputbox" size="1"',
	'value', 'text', $row->ordering );

	// get list of groups
	$database->setQuery( "SELECT id AS value, name AS text FROM #__groups ORDER BY id" );
	$groups = $database->loadObjectList();

	$glist = mosHTML::selectList( $groups, 'access', 'class="inputbox" size="1"',
	'value', 'text', intval( $row->access ) );

	categories_html::edit( $row, $imagelist, $iposlist, $orderlist, $glist, $section );
}

/**
* Saves the catefory after an edit form submit
* @param string The name of the category section
*/
function saveCategory() {
	global $database;

	$row = new mosCategory( $database );
	if (!$row->bind( $_POST )) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	$row->checkin();
	$row->updateOrder( "section='$row->section'" );

	// dmcd May 22/04  update events_categories table with color

	$color = trim(mosGetParam( $_POST, 'color', ''));
	if(substr($color,0,1) != '#') $color = '#' . $color;

	if(!preg_match("/^#[0-9a-f]+$/i", $color)) $color= '';
	$database->setQuery( "REPLACE #__events_categories SET id='$row->id', color='$color'" );
	$database->query();

	if ($oldtitle = mosGetParam( $_POST, 'oldtitle', null )) {
		if ($oldtitle != $row->title) {
			$database->setQuery( "UPDATE #__menu SET name='$row->title' WHERE name='$oldtitle' AND type='content_category'" );
			$database->query();
		}
	}

	// Update Section Count
	if ($row->section != "com_weblinks") {
		$database->setQuery( "UPDATE #__sections SET count=count+1"
			. "\nWHERE id = '$row->section'"
		);
	}

	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	mosRedirect( "index2.php?option=com_events&act=categories" );
}
/**
* Deletes one or more categories from the categories table
* @param string The name of the category section
* @param array An array of unique category id numbers
*/
function removeCategories( $section, $cid ) {
	global $database;

	if (count( $cid ) < 1) {
		echo "<script> alert('Select a category to delete'); window.history.go(-1);</script>\n";
		exit;
	}

	$cids = implode( ',', $cid );

	//Get Section ID prior to removing Category, in order to update counts
	$database->setQuery( "SELECT section FROM #__categories WHERE id IN ($cids)" );
	$secid = $database->loadResult();

	if (intval( $section ) > 0) {
		$table = 'content';
	} else if (strpos( $section, 'com_' ) === 0) {
		$table = substr( $section, 4 );
	} else {
		$table = $section;
	}

	$database->setQuery( "SELECT c.id, c.name,COUNT(s.catid) AS numcat"
	. "\nFROM #__categories AS c"
	. "\nLEFT JOIN #__$table AS s ON s.catid=c.id"
	. "\nWHERE c.id IN ($cids)"
	. "\nGROUP BY c.id"
	);

	if (!($rows = $database->loadObjectList())) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
	}

	$err = array();
	$cid = array();
	foreach ($rows as $row) {
		if ($row->numcat == 0) {
			$cid[] = $row->id;
		} else {
			$err[] = $row->name;
		}
	}

	if (count( $cid )) {
		$cids = implode( ',', $cid );
		$database->setQuery( "DELETE FROM #__categories WHERE id IN ($cids)" );
		if (!$database->query()) {
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	}

	if (count( $err )) {
		$cids = implode( "\', \'", $err );
		mosRedirect( "index2.php?option=com_events&act=categories"
			. "&mosmsg=Category(s): $cids cannot be removed as they contain records"
		);
	}

	mosRedirect( "index2.php?option=com_events&act=categories" );
}

/**
* Publishes or Unpublishes one or more categories
* @param string The name of the category section
* @param integer A unique category id (passed from an edit form)
* @param array An array of unique category id numbers
* @param integer 0 if unpublishing, 1 if publishing
* @param string The name of the current user
*/
function publishCategories( $section, $categoryid=null, $cid=null, $publish=1 ) {
	global $database, $my;

	if (!is_array( $cid )) {
		$cid = array();
	}
	if ($categoryid) {
		$cid[] = $categoryid;
	}

	if (count( $cid ) < 1) {
		$action = $publish ? 'publish' : 'unpublish';
		echo "<script> alert('Select a category to $action'); window.history.go(-1);</script>\n";
		exit;
	}

	$cids = implode( ',', $cid );

	$database->setQuery( "UPDATE #__categories SET published='$publish'"
	. "\nWHERE id IN ($cids) AND (checked_out=0 OR (checked_out='$my->id'))"
	);
	if (!$database->query()) {
		echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}

	if (count( $cid ) == 1) {
		$row = new mosCategory( $database );
		$row->checkin( $cid[0] );
	}

	mosRedirect( "index2.php?option=com_events&act=categories" );
}

/**
* Cancels an edit operation
* @param string The name of the category section
* @param integer A unique category id
*/
function cancelCategory() {
	global $database;

	$row = new mosCategory( $database );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( "index2.php?option=com_events&act=categories" );
}

/**
* Moves the order of a record
* @param integer The increment to reorder by
*/
function orderCategory( $uid, $inc ) {
	global $database;

	$row = new mosCategory( $database );
	$row->load( $uid );
	$row->move( $inc, "section='$row->section'" );
	mosRedirect( "index2.php?option=com_events&act=categories" );
}
?>
