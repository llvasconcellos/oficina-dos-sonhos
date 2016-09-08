<?php
// $Id: events.html.php,v 1.38 2005/11/30 10:39:10 g_edwards Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/
// Thanks to Andrew Eddie for his help

// ################################################################
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// ################################################################
require_once( $GLOBALS['mosConfig_absolute_path'] . '/includes/HTML_toolbar.php' );

// option masks
define( "MASK_BACKTOLIST", 0x0001 );
define( "MASK_READON",     0x0002 );
define( "MASK_POPUP",      0x0004 );
define( "MASK_HIDEPDF",    0x0008 );
define( "MASK_HIDEPRINT",  0x0010 );
define( "MASK_HIDEEMAIL",  0x0020 );
define( "MASK_IMAGES",     0x0040 );
define( "MASK_VOTES",      0x0080 );
define( "MASK_VOTEFORM",   0x0100 );

define( "MASK_HIDEAUTHOR",     0x0200 );
define( "MASK_HIDECREATEDATE", 0x0400 );
define( "MASK_HIDEMODIFYDATE", 0x0800 );

define( "MASK_LINK_TITLES", 0x1000 );

// mos_content.mask masks
define( 'MASK_HIDE_TITLE', 0x0001 );
define( 'MASK_HIDE_INTRO', 0x0002 );

Class HTML_events {
 
  function viewEventRow ($id,$title,$task,$year,$month,$day,$contactlink, $option, $Itemid) {
    ?>
    <?php $eventlink=sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;agid=".$id."&amp;year=".$year."&amp;month=".$month."&amp;day=".$day."&amp;Itemid=".$Itemid);?>
     <li class="ev_td_li"><b><a class="ev_link_row" href="<?php echo $eventlink; ?>"><?php echo $title;?></a></b><!--&nbsp;<?php echo _CAL_LANG_BY;?>&nbsp;<i><?php echo $contactlink;?></i>--></li>
    <?php     
  }

  function viewEventCatRow ($catid,$catname,$task,$year,$month,$day,$option,$Itemid) {
    ?>
    <?php $eventlink=sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;catid=".$catid."&amp;year=".$year."&amp;month=".$month."&amp;day=".$day."&amp;Itemid=".$Itemid);?>
     <a class="ev_link_cat" href="<?php echo $eventlink; ?>"><?php echo $catname;?></a>
    <?php     
  }
  
  function viewEventRowAdmin ($row,$task,$year,$month,$day,$deletelink,$modifylink,$contactlink, $option, $Itemid, $state) {
    ?>
    <?php $eventlink=sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;agid=".$row->id."&amp;year=".$year."&amp;month=".$month."&amp;day=".$day."&amp;Itemid=".$Itemid);?>
    <li class="ev_td_li"><b><a class="<?php echo $state?'ev_link_row':'ev_link_unpublished';?>" href="<?php echo sefRelToAbs($eventlink); ?>"><?php echo $row->title.($state?"":"(** Unpublished **)");?></a></b>&nbsp;<?php echo _CAL_LANG_BY;?>&nbsp;<i><?php echo $contactlink;?></i>&nbsp;&nbsp;<?php echo $deletelink;?>&nbsp;&nbsp;<?php echo $modifylink;?> </li>
    <?php     
  }
  
  function viewEventDetail ($row, $contactlink, $mask=0, $params, $page=0) {
    global $option,$Itemid,$cur_template;
	global $mosConfig_live_site,$agid,$year,$month,$day,$hide_js, $my, $is_event_editor;
    global $_MAMBOTS;
	// Mat Oct 5/04 show details only if called from a selected event to avoid probs with navbar
	if (isset($row)) {
		
    // process the new bots
    $row->text = $row->content;
    $_MAMBOTS->loadBotGroup( 'content' );
    $row->content = $row->text ;
    $results = $_MAMBOTS->trigger( 'onPrepareContent', array( &$row, &$params, $page ), true );		
    
    ?>    
    <!-- <div name="events">  --> 
    <table class="contentpaneopen" border="0">
      <tr>
        <td class="contentheading"><?php echo $row->title;?></td>
        <td class="buttonheading" align="right">
        <?php 
		// dmcd Aug 6/04  allow editor/owner to modify the event from here by providing an 'edit' icon?
		if($is_event_editor && $row->created_by == $my->id && !($mask&MASK_POPUP)) { ?>
		<a href="<?php echo sefRelToAbs("index.php?option=com_events&amp;task=modify&amp;agid=".$row->id."&amp;Itemid=".$Itemid); ?>" title="<?php echo _E_EDIT;?>">
      <img src="<?php echo $mosConfig_live_site;?>/images/M_images/edit.png" align="middle" name="image" border=0 alt="<?php echo _E_EDIT;?>" />
      </a>
        </td><td class="buttonheading" align="right">
	<?php } ?>
        <?php if (!($mask&MASK_HIDEPRINT) && !$hide_js && !($mask&MASK_POPUP)) { ?>   
        <a href="javascript:void window.open('<?php echo $mosConfig_live_site; ?>/index2.php?option=com_events&amp;task=view_detail&amp;agid=<?php echo $agid;?>&amp;year=<?php echo $year;?>&amp;month=<?php echo $month;?>&amp;day=<?php echo $day;?>&amp;Itemid=<?php echo $Itemid;?>&amp;pop=1', 'win2', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=600,height=400,directories=no,location=no');" title="<?php echo _CMN_PRINT;?>"><img
        src="<?php echo $mosConfig_live_site;?>/images/M_images/printButton.png"  align="middle"  name="image" border="0" alt="<?php echo _CMN_PRINT;?>" /></a>            
        </td><td class="buttonheading" align="right">
        <?php	}
	elseif (!($mask&MASK_HIDEPRINT) && !$hide_js) { ?>
        <a href="#" onclick="javascript:window.print(); return false" title="<?php echo _CMN_PRINT;?>"><img
        src="<?php echo $mosConfig_live_site;?>/images/M_images/printButton.png"  align="middle"  name="image" border="0" alt="<?php echo _CMN_PRINT;?>" /></a>
       <?php } ?>
	    </td>
      </tr>
      <tr>
        <td align="left" valign="top" colspan="4">
		<table width="100%" border="0"><tr>
        <?php if (_CAL_CONF_REPEATVIEW == "YES"){ ?>
        <td style="font-size:0.8em;width:50%;">
        <?php 
		if ($row->start_date == $row->stop_date)
			echo $row->start_date .",&nbsp;".$row->start_time."&nbsp;-&nbsp;".$row->stop_time."<br/>";
		else
			echo _CAL_LANG_FROM."&nbsp;".$row->start_date."&nbsp;-&nbsp;".$row->start_time."<br />".
			_CAL_LANG_TO."&nbsp;".$row->stop_date."&nbsp;-&nbsp;".$row->stop_time."<br/>";
		
            if ($row->reccurtype > 0) {                
        	switch ($row->reccurtype) {
        		  case "1": $reccur = _CAL_LANG_REP_WEEK;break;        		  
        		  case "2": $reccur = _CAL_LANG_REP_WEEK;break;
        	          case "3": $reccur = _CAL_LANG_REP_MONTH;break;
        	          case "4": $reccur = _CAL_LANG_REP_MONTH;break;
        	          case "5": $reccur = _CAL_LANG_REP_YEAR;break;        	          
        	}
        	if ($row->reccurday >= 0) {
        	    $dayname = mosEventsHTML::getLongDayName($row->reccurday);         
        	    if ($row->reccurtype == 1) {        	    
        	        echo $dayname."&nbsp;"._CAL_LANG_EACHOF."&nbsp;".$reccur; 
        	    } elseif (($row->reccurtype == 1) || ($row->reccurtype == 2)) {
        		$pairorimpair = $row->reccurweeks == "pair" ? _CAL_LANG_REP_WEEKPAIR : ($row->reccurweeks == "impair" ? _CAL_LANG_REP_WEEKIMPAIR : _CAL_LANG_REP_WEEK);
        	        echo _CAL_LANG_EACH."&nbsp;".$dayname."&nbsp;".$pairorimpair."";
        	    } else {
                        echo _CAL_LANG_EACH."&nbsp;".$reccur;
                    }
        	} else {
                    echo _CAL_LANG_EACH."&nbsp;".$reccur;
                }           
            } else {
                if($row->start_date != $row->stop_date) echo _CAL_LANG_ALLDAYS;
            }
        ?>
        </td>
        <?php } ?>
            <td style="font-size:0.8em;width:25%;">
	    <?php if (_CAL_CONF_BYVIEW == "YES"){ ?>
            <?php echo _CAL_LANG_BY;?>&nbsp;<?php echo $contactlink;?>
            <?php } ?>
	    </td>
            <td style="font-size:0.8em;width:25%;">
            <?php if (_CAL_CONF_HITSVIEW == "YES"){ ?>
            <?php echo _CAL_LANG_EVENT_HITS;?> : <?php echo $row->hits;?>
            <?php } ?>
	    </td>
	 </tr></table>
        </td>        
      </tr>
      <tr align="left" valign="top">
        <td colspan="4"><?php echo $row->content;?></td>
      </tr>
      <tr>
        <td align="left" valign="top" colspan="4">
         <br />
         <font size="1">
         <b><?php echo _CAL_LANG_EVENT_ADRESSE;?>: </b><?php echo $row->adresse_info;?><br />
         <b><?php echo _CAL_LANG_EVENT_CONTACT;?>: </b><?php echo $row->contact_info;?>
         </font>
       </td>
       </tr><tr>
       <td align="left" valign="top" colspan="4"><?php echo $row->extra_info;?></td>
      </tr>
    </table>		
  <!--  </div>  -->
    <?php
      $results = $_MAMBOTS->trigger( 'onAfterDisplayContent', array( &$row, &$params, $page ) );
      echo trim( implode( "\n", $results ) );
          
    } else { ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="contentheading"  align="left" valign="top"><?php echo _CAL_LANG_REP_NOEVENTSELECTED;?></td>
	  </tr>
	</table>
	<?php } 
	if(!($mask & MASK_BACKTOLIST)) { ?>
    <p align="center"><a href="javascript:window.history.go(-1);"><?php echo _CAL_LANG_BACK;?></a></p>
    <?php } else { ?>
    <p align="center"><a href="javascript:self.close();"><?php echo _CAL_LANG_CLOSE;?></a></p>
    <?php }
  }
  
  function viewNavTableText ($prev_offset,$page_bar,$next_offset,$max_offset, $option, $task, $Itemid) {    
    ?>
    <table cellpadding="2" cellspacing="0" border="0" width="100%">
      <tr class="nav_bar_cell">
        <td align="center" class="heading" width="100%">
          <?php $eventlinkstart=sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;offset=1"."&amp;Itemid=".$Itemid);?>
	  <a href="<?php echo $eventlinkstart;?>" title="first list"><b><<</b></a>
          <?php $eventlinkprevoffset=sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;offset=".$prev_offset."&amp;Itemid=".$Itemid);?>
          <a href="<?php echo $eventlinkprevoffset;?>" title="previous list"><b><</b></a>
	  <?php echo $page_bar;?>
          <?php $eventlinknextoffset=sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;offset=".$next_offset."&amp;Itemid=".$Itemid);?>
     	  <a href="<?php echo $eventlinknextoffset;?>" title="next list"><b>></b></a>
          <?php $eventlinkmaxoffset=sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;offset=".$max_offset."&amp;Itemid=".$Itemid);?>
          <a href="<?php echo $eventlinkmaxoffset;?>" title="final list"><b>>></b></a>		
        </td>
      </tr>
    </table>
    <p align="center"><a href="javascript:window.history.go(-1);"><?php echo _CAL_LANG_BACK;?></a></p>
    <?php
  }
  
  function viewNavCatText ($catid, $option, $task, $Itemid) {    
    ?>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td align="center" width="100%">
	 <form action="index.php" method="post" style="font-size:1;">
            <input type="hidden" name="option" value="<?php echo $option;?>" />
            <input type="hidden" name="task" value="<?php echo $task;?>" /> 
            <input type="hidden" name="offset" value="1" />          
           <?php                  
            /*Categories Select*/
                 mosEventsHTML::buildCategorySelect($catid, 'onchange="submit(this.form)" style="font-size:10px;"');             
	   ?>          
            <input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />  
          </form>
	</td>
      </tr>
    </table>
    <?php
  }
  
  function viewFormEvent( $row, $start_publish, $stop_publish, $start_time, $end_time, $lists, $Itemid, $option, $task, $mode, $catColors, $agid) {
   global $cur_template;   

	list($start_hrs, $start_mins) = explode(":",$start_time);
	list($end_hrs, $end_mins) = explode(":",$end_time);
   if(defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") { 
	$start_pm=false; $end_pm=false;
	$start_hrs = intval($start_hrs);
	if($start_hrs >= 12) $start_pm=true;
	if($start_hrs > 12) $start_hrs -= 12;
	else if($start_hrs == 0) $start_hrs = 12;
	if(strlen($start_mins) == 1) $start_mins = '0'.$start_mins;
	$start_time = $start_hrs .":". $start_mins;
	
	$end_hrs = intval($end_hrs);
	if($end_hrs >= 12) $end_pm=true;
	if($end_hrs > 12) $end_hrs -= 12;
	else if($end_hrs == 0) $end_hrs = 12;
   }	 
   if(strlen($start_mins) == 1) $start_mins = '0'.$start_mins;
   if(strlen($start_hrs) == 1) $start_hrs = '0'.$start_hrs;
   $start_time = $start_hrs .":". $start_mins;
   if(strlen($end_mins) == 1) $end_mins = '0'.$end_mins;
   if(strlen($end_hrs) == 1) $end_hrs = '0'.$end_hrs;
   $end_time = $end_hrs .":". $end_mins;
    ?>    
    <link href="components/com_events/events_css.css" rel="stylesheet" type="text/css" />
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td align="center" width="100%">    
    
    
    <script type="text/javascript" src="includes/js/mambojavascript.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="includes/js/calendar/calendar-mos.css" title="green" />
    <!-- import the calendar script -->
    <script type="text/javascript" src="includes/js/calendar/calendar.js"></script>
    <!-- import the language module -->
    <script type="text/javascript" src="includes/js/calendar/lang/calendar-en.js"></script>
    <script language="Javascript" src="includes/js/overlib_mini.js"></script>
    <script language="Javascript" src="components/com_events/js/colorpicker.js"></script>
       <!--
    <script language="Javascript" src="includes/js/dhtml.js"></script>   
       -->     
    <script language="javascript" type="text/javascript">   
	onunload = WarnUser;
	var oldColor = "<?php echo $row->color_bar; ?>";
	var catColors = new Object();
	var oldChecked = <?php if(_CAL_CONF_DEFCOLOR == "category" && $mode == 'new') echo "true"; else echo "false"; ?>;
	<?php	$i = 0;
	foreach ($catColors as $id=>$color) {
		echo "\n	catColors['$id'] = '$color->color';";
	}

	// dmcd - nov 6/04, there will be no category associated with a new event which will cause an error
	// below unless we detect an invalid catid for the new event $row
        echo "\nvar catColor='";
	if($row->catid == null) echo "';\n";
	else echo $catColors[$row->catid]->color."';\n";
	?>
 	function submitbutton(pressbutton) {		
		var form = document.ev_adminForm;
		document.adminForm = form;
		if (pressbutton == 'cancel') {			
			submitform( pressbutton );
			return;
		}
                
                // Note that this php function below is not really doing anything in most of the editor scripts.
		// The actual editor contents is passed back into the textarea when the form is about to be submitted
		// by chaining into the form's onsubmit() event function.  The problem here is that we don't actually
		// call the form's submit event until we are done with our checks below.  What we need to do here is
		// call the form's onsubmit() function first to let the editor copy the contents into the textarea
		document.ev_adminForm.onsubmit();
                <?php getEditorContents( 'editor1', 'content' ) ; ?>
		// do field validation
		checkDisable();
		var sw = 1;
		var sd = 1;
		<?php if(!defined("_CAL_SIMPLE_EVENT_FORM") || _CAL_SIMPLE_EVENT_FORM == "NO"){ ?>
		sd = checkSelectedDays();
		sw = checkSelectedWeeks();
		<?php } ?>
		form.goodexit.value=1;			
		if (form.title.value == "") {
			alert ( "<?php echo _E_WARNTITLE; ?>" );
		//} else if (form.content.value == "") {
		//	alert ( "<?php echo _CAL_LANG_WARNACTIVITY; ?>" );
		} else if (form.catid.value == "0"){
			alert( "<?php echo _E_WARNCAT; ?>" );				
		} else if (sw == "0"){
			alert( "<?php echo _CAL_LANG_E_WARNWEEKS; ?>" );	   			
		} else if (sd == "0"){
			alert( "<?php echo _CAL_LANG_E_WARNDAYS; ?>" );   			
		} else {
                                       
			//alert('about to submit the form');
			document.ev_adminForm.submit();
		}
	}
	function introTocontent(){
 		//var form = document.ev_adminForm;
 		//form.introtext.value = form.content.value; 		
 	}
	function setgood(){
		var form = document.ev_adminForm;
	        form.goodexit.value=1;
	}
	
	function WarnUser(){
		if (document.ev_adminForm.goodexit.value==0) {
			alert('<?php echo _E_WARNUSER;?>');
			window.location="<?php echo sefRelToAbs("index.php?option=com_events&task=".$task."&agid=".$agid."&Itemid=".$Itemid); ?>"
		}
	}

	//dmcd function below is an ovveride of a celndar support function in mamboscript.js
	// This function gets called when an end-user clicks on some date
	function selected(cal, date) {
		cal.sel.value = date; // just update the value of the input field
		checkPublish();
	}

    	function checkTime(myField){
		// chop leading zeros or non numeric chars from left
		// capture 4 numbers at most, 2 for hours, 2 for mins, truncate the rest
		// look for /(a,am,p,pm)/i	for std time spec in remaining string from above
		// rewrite the value of the field based on either 24hr or 12hr time formats according
		// to the events config.
		// if an illegal time format is entered, restore field value to original value before bad edit
		
		if(myField.name.search(/start/i) != -1){
			name = "Start";
			chkBoxGroup = document.ev_adminForm.start_pm;
		}
		else{
			name = "End";
			chkBoxGroup = document.ev_adminForm.end_pm;
		}
			    	
		pmUsed=false;
		amUsed=false;
		no_hours=false;
		
		var time = myField.value;
		// if value begins with an optional leading 0 followed by a delimiter, assume only minutes being specified
		if(time.search(/^\s*0?[\.\-\+:]/) != -1) no_hours=true;
		time = time.replace(/[-\.,_=\+:;]/g, "");
		time = time.replace(/^\s+/,"");
		if(time.search(/^\d+/) != -1){
		if(time.search(/^0+\D*$/) != -1) time = '0';
		// leading zeros may indicate 24 hr format
		// escape the { }  to support patTemplates!
		else time = time.replace(/^0+(\d\{4\})/,"$1");
		time = time.replace(/\s+$/,"");
	    	//time = time.replace(/([^1,2]\d{2})\d+/,"$1");
		//time = time.replace(/((1|2)\d{3})\d+/,"$1");
		num = time.replace(/^(\d+).*/, "$1");
		
		if(num*1 <= 2359){
			// pad the entered numer with zeros on the right to make it 4 digits
			if(no_hours){
				num = num.replace(/^(\d)$/,"0" + "$1");
				num = '00' + num + '00';
		        // escape the { }  to support patTemplates!
				num = num.replace("/^(\d\{4\}).*$/","$1");
			}
			num = num.replace(/^(\d)$/,"$1" + "00");
			num = num.replace(/^((1|2)\d)$/,"$1" + "00");
			num = num.replace(/^(\d\d)$/,"$1" + "0");

			if (document.all) mins = num.slice(-2);
			else mins = num.substr(-2);
			//alert('mins are: '+ mins);
			if(mins*1 < 60){
				num *= 1;
			
				// need to determine here if am/pm being used
				if(time.search(/(a|p)m?$/i) != -1){
					// using std time for entry
					// if pm, don't allow number to exceed 1200
					if(time.search(/p(m)?$/i) != -1){
						pmUsed=true;
						if(num < 1200) num += 1200;
					} else {
						amUsed=true;
						if(num >= 1200 && num < 1300) num -= 1200;
					}
				}
				if(num < 60) hrs = '0';
				else {
					num = num + '';
					hrs = num.substr(0,num.length - mins.length);
				}
				//alert('hrs are: '+ hrs);

				// now put the time back into the correct format for the input control depending upon the mode
				<?php if(defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") { ?>
					// std time, convert to am/pm format, update the am/pm radio checkboxes as well
					// if am/pm was specified in the field
					if(hrs*1 > 12){
						hrs = hrs*1 -12 + '';
						if(pmUsed){
							//adjust radio checkboxes
							chkBoxGroup[0].checked = false;
							chkBoxGroup[1].checked = true;
						}
					}
					if(amUsed){
						chkBoxGroup[0].checked = true;
						chkBoxGroup[1].checked = false;
					}
					if(hrs*1 == 0) hrs = 12;
					time = hrs + ':' + mins;
				<?php }
				else { ?>
					// 24hr military time format, add a leading 0 onto nums < 1000
					if(hrs.length == 1) hrs = '0' + hrs;
					time = hrs + ':' + mins;
				<?php } ?>
				
				// sucessful field edit.  update the old field value with the new one
				myField.oldValue = myField.value;
				myField.value = time;
				return true;
			}
		}
		}
		// bad input format, alert user, reset field value
		if(myField.name.search(/start/i) != -1) name = "Start";
		else name = "End";
		alert('Bad ' + name + ' Time format: ' + myField.value + '\nValid format is hh:mm {am|pm} (12 or 24hr format).  Please try again.');
		if(myField.oldValue) myField.value = myField.oldValue;
		else myField.value = '';
		window.globalObj = myField;
		var t = setTimeout('window.globalObj.focus();',100);
		return true;
		}
	
	function checkPublish(){
		var form = document.ev_adminForm;				
		if (form.publish_down.value < form.publish_up.value) {
			form.publish_down.value = form.publish_up.value;
		}
		// jul 8th/04  dmcd allow end time < start time for overniter's
		// we'll need to re-interpret the end day for this special case
		//if (form.hours_end.value < form.hours_start.value) {
		//	var temphour= '';
		//        var nb1=0;		        	 	        	 
                //        nb1 = eval(form.hours_start.value);                                 
                //        temphour = nb1 + 1;
		//	form.hours_end.value = eval(temphour);
		//}
		checkDisable();		
	}	
	function checkRepeatValues(){
	      <?php if(!defined("_CAL_SIMPLE_EVENT_FORM") || _CAL_SIMPLE_EVENT_FORM == "NO"){ ?>
		var form = document.ev_adminForm;	
		var eventid = eval(<?php echo $row->id; ?>);
	        var recurtval = eval(<?php echo $row->reccurtype; ?>);
		var recurwval = "<?php echo $row->reccurweeks; ?>";
		// dmcd commented out eventid qual below since default repeat type should be every day
                //if (eventid > 0){		         	
		         var f = form.reccurtype;
		         if (recurtval >= 0){			
	                        f[recurtval].checked = true;
	                 }
	        //}
	        
	        if((recurtval == 1) || (recurtval == 2)){		 
		         var g = document.ev_adminForm;		
	                 if (recurwval == "pair"){
		                 g.cb_wn6.checked = true;        
	                 }
	                 if (recurwval == "impair"){
		                 g.cb_wn7.checked = true;        
	                 }	                 	                 
	        }
	<?php } ?>
	} 
	function checkSelectedWeeks(){		
	        var form = document.ev_adminForm;
	        if((form.reccurtype[1].checked==true) || (form.reccurtype[2].checked==true)){		 
		         var check = 0;		         
	                 for (i=1; i < 8; i++) {
		                 cb = eval( 'form.cb_wn' + i );		                 	                        
	                         if(cb.checked==true) {
	                                 check++;		 		                   
		                 }  	                        
	                 }	                 
	                 return check;	                		
	        }	        
	}
	function checkSelectedDays(){
		var form = document.ev_adminForm;
		if(form.reccurtype[5].checked==true){		
		         var f = form.reccurday_year;
		         var check = 0;
	                 for (i=0; i < f.length; i++) {		                 
		                 if(f[i].checked==true) {
	                                 check++;		 		                   
		                 }	                 
	                 }	                				                 
	                 return check;	 
		}		
	        if(form.reccurtype[3].checked==true){		
		         var f = form.reccurday_month;
		         var check = 0;
	                 for (i=0; i < f.length; i++) {		                 
		                 if(f[i].checked==true) {
	                                 check++;		 		                   
		                 }	                 
	                 }	                				                 
	                 return check;	 
		}
		if(form.reccurtype[1].checked==true){		
			 var f = form.reccurday_week;
	                 var check = 0;
	                 for (i=0; i < f.length; i++) {		                 
		                 if(f[i].checked==true) {
	                                 check++;		 		                   
		                 }		                 
	                 }	                 
	                 return check;	 	                			
		}		
	        if(form.reccurtype[2].checked==true){					                
	                 var check = 0;
	                 for (i=0; i < 7; i++) {
		                 cb = eval( 'form.cb_wd' + i );
		                 if(cb.checked==true) {
	                                 check++;		 		                   
		                 }
	                 }
	                 return check;	 	                		        	                
		}
	}        	
	function checkDisable(control){
		<?php if(!defined("_CAL_SIMPLE_EVENT_FORM") || _CAL_SIMPLE_EVENT_FORM == "NO"){ ?>
		var form = document.ev_adminForm;		
		// Check repeat Disable repeat option		
		if (form.publish_down.value == form.publish_up.value) {					 
			 var f = form.reccurtype;
	                 for (i=1; i < f.length; i++) {		                 
		        // dmcd May 7/04 commented out this disable.  It confuses people
			f[i].disabled = false;
	                 }
	                 //form.reccurtype[0].checked=true;
		} else {
		         var f = form.reccurtype;
	                 for (i=0; i < f.length; i++) {		                 
		                 f[i].disabled = false;
	                 }
		}
		// By Week : Check reccurday 
		if(form.reccurtype[1].checked==true){		
			 var f = form.reccurday_week;
	                 for (i=0; i < f.length; i++) {		                 
		                 f[i].disabled = false;		                 
	                 }	                			
		} else {
		         var f = form.reccurday_week;
	                 for (i=0; i < f.length; i++) {		                 
		                 f[i].disabled = true;
	                 }	                 
		}
		// By Week : Check weekdays
		if(form.reccurtype[2].checked==true){				
	                 var f = document.ev_adminForm;
	                 for (i=0; i < 7; i++) {
		                 cb = eval( 'f.cb_wd' + i );
		                 cb.disabled = false;
	                 }	                		        	                
		} else {
		         var f = document.ev_adminForm;
	                 for (i=0; i < 7; i++) {
		                 cb = eval( 'f.cb_wd' + i );
		                 cb.disabled = true;
	                 }	               
		}
		// By Week : Disable Weeks select
		if((form.reccurtype[1].checked==true) || (form.reccurtype[2].checked==true)){		 
		         var g = document.ev_adminForm;
	                 for (i=1; i < 8; i++) {
		                 cb = eval( 'g.cb_wn' + i );
		                 cb.disabled = false;	                        
		                 }  	                        
			 if(control && (control.id == "cb_wn6" || control.id == "cb_wn7")) {
			      // dmcd oct 4/04  uncheck all of the month weeks
			    for (i=1; i < 6; i++) {
		                 cb = eval( 'g.cb_wn' + i );
		                 cb.checked = false;	                        
		                 }  	                        
                         } else if (control && control.id.search(/^cb_wn[0-9]+$/i) != -1 && control.checked) {
	                        // dmcd oct 4/04  uncheck the even/odd week radio boxes
                                g.cb_wn6.checked = false;
	                        g.cb_wn7.checked = false;		 		                   
			 }
	        } else {
	                 var g = document.ev_adminForm;	               
	                 for (i=1; i < 8; i++) {
		                 cb = eval( 'g.cb_wn' + i );
		                 cb.disabled = true;
	                 }
	        }
	        // By Month : Check reccurday 
		if(form.reccurtype[3].checked==true){		
		         var f = form.reccurday_month;
	                 for (i=0; i < f.length; i++) {		                 
		                 f[i].disabled = false;		                 
	                 }	                			
		} else {
		         var f = form.reccurday_month;
	                 for (i=0; i < f.length; i++) {		                 
		                 f[i].disabled = true;
	                 }	                 
		}
		// By Year : Check reccurday 
		if(form.reccurtype[5].checked==true){		
		         var f = form.reccurday_year;
	                 for (i=0; i < f.length; i++) {		                 
		                 f[i].disabled = false;		                 
	                 }	                			
		} else {
		         var f = form.reccurday_year;
	                 for (i=0; i < f.length; i++) {		                 
		                 f[i].disabled = true;
	                 }	                 
		}
	<?php } ?>
	}	
	
    </SCRIPT>     
   
    <form action="index.php" method="POST" name="ev_adminForm" onsubmit="javascript:setgood();">
    <?php if(defined("_CAL_FORCE_CAT_COLOR_EVENT_FORM") && _CAL_FORCE_CAT_COLOR_EVENT_FORM == "YES"){ ?>
    <input type="hidden" id="pick1064797275field" name="color_bar" value="" />
    <?php } ?>
    <?php if(defined("_CAL_SIMPLE_EVENT_FORM") && _CAL_SIMPLE_EVENT_FORM == "YES"){ ?>   
    <input type="hidden"  name="reccurtype" value="0" />
    <?php } ?>
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
	  <td><span class="contentheading"><?php echo _CAL_LANG_CAL_TITLE." :: ";?>
      	    <?php echo $row->id ? _CAL_LANG_MODIFY_TITLE : _CAL_LANG_ADD_TITLE;?></span></td>
	  <td width="10%">
            <?php
		mosToolBar::startTable();
		mosToolBar::save();
		mosToolBar::spacer(25);
		mosToolBar::cancel();
		mosToolBar::endtable();
            ?>
	  </td>
	</tr>
      </table>
      <br />
      <!-- TAB -->
      <table cellspacing="0" cellpadding="4" border="0" width="100%">
        <tr>
          <td width="" class="tabpadding">&nbsp;</td>
          <td id="ev_tab1" class="offtab" onClick="dhtml.cycleTab(this.id)">Content</td>
          <td id="ev_tab2" class="offtab" onClick="dhtml.cycleTab(this.id)" nowrap="nowrap"><?php echo _CAL_LANG_PUB_INFO; ?></td>
          <td id="ev_tab3" class="offtab" onClick="dhtml.cycleTab(this.id)" nowrap="nowrap"><?php echo _CAL_LANG_HELP; ?></td>
          <td width="90%" class="tabpadding">&nbsp;</td>
       </tr>
      </table>                          
      <!-- // TAB -->

      <!--  CONTENT TAB -->
      <div id="ev_page1" class="pagetext">                                  
      <table align="left" width="100%" cellpadding="0" cellspacing="5" border="0" class="tabcontent">
        <tr>
          <td width="100%" colspan="2" height="2">&nbsp;</td>
        </tr>
        <tr>
          <td width="120">
            <b><?php echo _CAL_LANG_EVENT_TITLE;?></b>
          </td>
          <td>
            <input type="text" name="title" size="40" maxlength="80" class="inputbox" value="<?php echo $row->title;?>" />
          </td>
        </tr>
        <tr>
      	  <td valign="top" align="left"><b><?php echo _CAL_LANG_EVENT_CATEGORY; ?></b></td>
        <td><?php if(defined("_CAL_FORCE_CAT_COLOR_EVENT_FORM") && _CAL_FORCE_CAT_COLOR_EVENT_FORM == "YES")
	      mosEventsHTML::buildCategorySelect($row->catid, 'onchange="if(catColors[this.value])catColor=catColors[this.value]; else catColor=\'\';document.ev_adminForm.color_bar.value=catColor;"');
	    else
	      mosEventsHTML::buildCategorySelect($row->catid, 'onchange="if(catColors[this.value])catColor=catColors[this.value]; else catColor=\'\';document.ev_adminForm.useCatColor.onclick();"');
	    ?>
	    </td>
          </td>
    	</tr>       
        <tr>
          <td width="120">
            <b><?php echo _CAL_LANG_EVENT_ACTIVITY;?></b>
          </td>
          <td> <!-- onmouseover="introTocontent();"> -->
            <?php 
                // parameters : areaname, content, hidden field, width, height, rows, cols 
                editorArea( 'editor1',  $row->content , 'content', '400', '200', '45', '10' ) ; 
            ?>
            <br /><br />
          </td>
        </tr>
        <tr>
          <td width="120">&nbsp;</td>
          <td>
            <?php echo _CAL_LANG_EVENT_URLMAIL_INFO;?>
          </td>
        </tr>
        <tr>
          <td width="120">
            <b><?php echo _CAL_LANG_EVENT_ADRESSE;?></b>
          </td>
          <td>
            <input type="text" name="adresse_info" size="50" maxlength="120" class="inputbox" value="<?php echo $row->adresse_info;?>" />
          </td>
        </tr>
        <tr>
          <td width="120">
            <b><?php echo _CAL_LANG_EVENT_CONTACT;?></b>
          </td>  
          <td>
            <input type="text" name="contact_info" size="50" maxlength="120" class="inputbox" value="<?php echo $row->contact_info;?>" />
          </td>
        </tr>
        <tr>
          <td width="120">
            <b><?php echo _CAL_LANG_EVENT_EXTRA;?></b>
          </td>  
          <td>
            <input type="text" name="extra_info" size="50" maxlength="240" class="inputbox" value="<?php echo $row->extra_info;?>" />
          </td>
        </tr>
        <!--
        <tr>
          <td align="left"><b><?php echo _CAL_LANG_EVENT_AUTHOR_ALIAS; ?></b></td>
          <td>
            <input type="text" name="created_by_alias" size="50" maxlength="100" value="<?php echo $row->created_by_alias;?>" class="inputbox" />
          </td>
        </tr>
        -->
      </table>
      </div>
      <!-- // CONTENT TAB -->

      <!-- PUB INFOS TAB -->
      <div id="ev_page2" class="pagetext">             
      <table align="left" width="100%" cellpadding="0" cellspacing="5" border="0" class="tabcontent">              	    	
    	<tr>
          <td width="100%" colspan="2" height="2">&nbsp;</td>
        </tr>
    	
    	<?php if ($row->id) { ?>
	<tr>
          <td width="120" align="left">
                 <b><?php echo _E_PUBLISHING;?></b>
          </td>
          <td><?php echo $lists['state'];?></td>
	</tr>
        <?php } else { ?>
	<input type="hidden" name="state" value="<?php echo $row->state;?>" />
        <?php } ?>
    	
    	<?php if(!defined("_CAL_FORCE_CAT_COLOR_EVENT_FORM") || _CAL_FORCE_CAT_COLOR_EVENT_FORM == "NO"){ ?>
    	<tr>        
          <td width='100' align="left"><b><?php echo _CAL_LANG_EVENT_COLOR;?></b></td>
          <td>                        
            <table id="pick1064797275" align="left" bgcolor="<?php echo ($row->useCatColor) ? ($row->catid > 0) ? $catColors[$row->catid]->color : '' : $row->color_bar; ?>" style="border:solid 1px black">
              <tr>                                                                                 
                <td width="80">
                <!-- flooble.com Color Picker start -->
	          <input type="text" id="pick1064797275field" name="color_bar" size="8" class="inputbox" value="<?php echo ($row->useCatColor) ? ($row->catid > 0) ? $catColors[$row->catid]->color : '' : $row->color_bar; ?>" <?php if (_CAL_CONF_DEFCOLOR == "category" && $mode == 'new') echo 'onfocus="this.blur();" style="color:gray;"'; ?>
		  		onchange="cp.relateColor(this.value);" title="onclick" />
				</td>
				<td  nowrap>
		  <a id="colorPickButton" name ="colorPickButton" href="javascript:void(0)"  onclick="if(!document.ev_adminForm.useCatColor.checked) {cp.pickColor();}"
		  style="border: 1px solid #000000; font-family:Verdana; font-weight: bold; font-size:10px; background:#eeeeee;color:<?php if ((_CAL_CONF_DEFCOLOR == "category" && $mode == 'new') || $row->useCatColor) echo 'gray'; else echo 'black'; ?>;
		  text-decoration: none;">Color Picker</a>
		  <script language="javascript">
			var cp = new ColorPicker( 'cp', 'pick1064797275', '<?php echo $row->color_bar;?>' );
			function blurme(){
				this.blur();
			}
		  </script>
	        <!-- flooble Color Picker end -->              
                </td>
              </tr>
            </table>            
			<table><tr><td>
				<input type='checkbox' id='useCatColor' name='useCatColor' value='1' <?php if ((_CAL_CONF_DEFCOLOR == "category" && $mode == 'new') || $row->useCatColor) echo "checked"; ?> onclick="myPickField=document.ev_adminForm.color_bar;  myColorPickButton=document.getElementById? document.getElementById('colorPickButton'): colorPickButton;if(this.checked){if(!oldChecked) oldColor=myPickField.value;myPickField.value=catColor;myPickField.onfocus=blurme;cp.relateColor(catColor);myColorPickButton.style.color='gray';myPickField.style.color='gray';}else{myPickField.onfocus=null;myPickField.value=oldColor;myPickField.style.color='black';cp.relateColor(oldColor);myColorPickButton.style.color='black';}oldChecked=this.checked;" />
					<?php echo _CAL_LANG_EVENT_CATCOLOR;?>
            </td></tr>
	    </table>
          </td>
        </tr>    	    	
    	<?php } ?>
	
    	<tr>
          <td align="left"><b><?php echo _CAL_LANG_EVENT_STARTDATE; ?></b></td>
          <td>
            <table width="100%">
              <tr>
                <td width="40%">
                  <input class="inputbox" type="text" name="publish_up" id="publish_up" size="12" maxlength="10" value="<?php echo $start_publish;?>" onchange="checkPublish();" />
                  <input type="reset" class="button" value="..." onclick="return showCalendar('publish_up', 'y-mm-dd');" />
                </td>
                <td width="20%" align="right" nowrap>
                  <b><?php echo _CAL_LANG_EVENT_STARTTIME;?></b>&nbsp;
                </td>
                <td>
              <?php
               // dmcd aug/4/04  changing this so user can enter time in one field including am/pm
	       // attr if they desire, or military time.  New config constant to specify military
	       // or std time display format.  If std, 2 radio boxes for am or pm are displayed.
	       // js form validator function 'CheckTime()' will be used.
               /*Hours Select*/
    	       ?>    
                  <input class="inputbox" type="text" name="start_time" id="start_time" size="8" maxlength="8" value="<?php echo $start_time;?>" onchange="checkTime(this);checkPublish();" />
	       
    	        </td>
		<?php if(defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") { ?>
		<td width = 30% align="left" valign="middle">
		  <input id="start_pm0" name="start_pm" type="radio"  value="0" onClick="checkDisable();" <?php if(!$start_pm) echo "checked"; ?> /><span style="vertical-align:25%;">AM</span>		   
		 <input id="start_pm1" name="start_pm" type="radio"  value="1" onClick="checkDisable();" <?php if($start_pm) echo "checked"; ?> /><span style="vertical-align:25%;">PM</span>
		</td>
		<?php } ?>
		
    	      </tr>
    	    </table>	    
          </td>
        </tr>
    	<tr>
          <td align="left"><b><?php echo _CAL_LANG_EVENT_ENDDATE; ?></b></td>
          <td>
            <table width="100%">
              <tr>
                <td width="40%">
                  <input class="inputbox" type="text" name="publish_down" id="publish_down" size="12" maxlength="10" value="<?php echo $stop_publish;?>" onchange="checkPublish();" />
                  <input type="reset" class="button" value="..." onclick="return showCalendar('publish_down', 'y-mm-dd');" />
                </td>
                <td width="20%" align="right" nowrap>
                  <b><?php echo _CAL_LANG_EVENT_ENDTIME;?></b>&nbsp;
    	        </td>
		<td align="left">
		   <input class="inputbox" type="text" name="end_time" id="end_time" size="8" maxlength="8" value="<?php echo $end_time;?>" onchange="checkTime(this);checkPublish();" />
    	        </td>
		<?php if(defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") { ?>
		<td width=30% align="left" valign="middle">
		  <input id="end_pm0" name="end_pm" type="radio"  value="0" onClick="checkDisable();" <?php if(!$end_pm) echo "checked"; ?> /><span style="vertical-align:25%;">AM</span>		   
		 <input id="end_pm1" name="end_pm" type="radio"  value="1" onClick="checkDisable();" <?php if($end_pm) echo "checked"; ?> /><span style="vertical-align:25%;">PM</span>
		</td>
		<?php } ?>
    	      </tr>
    	    </table>
          </td>
        </tr>     
        
        <!-- REPEAT -->    
	<?php if(!defined("_CAL_SIMPLE_EVENT_FORM") || _CAL_SIMPLE_EVENT_FORM == "NO"){ ?>
	<tr>  
    	  <td align="left" valign="top"><b><?php echo _CAL_LANG_EVENT_REPEATTYPE; ?></b></td>
  	  <td colspan="2"></td>
  	</tr>  
  	<tr onMouseOver="checkDisable();"> 
    	  <td colspan="2" align="left" valign="top">    	             
	    <table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60" align="left" valign="top"><u><?php echo _CAL_LANG_REP_DAY;?></u></td>
                <td colspan="2" align="left" valign="top" class="frm_td_bydays">
                  <font color="#000000"> 
                    <input id="reccurtype0" name="reccurtype" type="radio"  value="0" onClick="checkDisable();" />
                    <?php echo _CAL_LANG_ALLDAYS; ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td width="60" rowspan="3" align="left" valign="top"><u><?php echo _CAL_LANG_REP_WEEK;?></u></td>
                <td width="100" align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"> 
                    <input id="reccurtype1" name="reccurtype" type="radio" value="1" onClick="checkDisable();" />
                    1 * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_WEEK; ?>
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"> 
                  <?php 
                    $arguments = "disabled='disabled' onClick=\"checkDisable();\""; 
                    mosEventsHTML::buildReccurDaySelect($row->reccurday,'reccurday_week',$arguments);
                  ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td align="left" valign="top" class="frm_td_byweeks"> 
                  <font color="#000000"> 
                    <input id="reccurtype2" name="reccurtype" type="radio" value="2" onClick="checkDisable();" />
                    n * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_WEEK; ?>
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byweeks">
                  <font color="#000000"> 
                  <?php          
                    mosEventsHTML::buildWeekDaysCheck($row->reccurweekdays, 'disabled=true'); 
                  ?>     
                  </font>
                </td>
              </tr>  
              <tr>        
                <td width="100" valign="top" class="frm_td_byweeks">   
                  <font color="#000000"><i><?php echo _CAL_LANG_EVENT_WEEKOPT;?></i></font>
                </td>               
                <td align="left" valign="top" class="frm_td_byweeks">                  
                  <font color="#000000">    
                  <?php
                    $arguments = "disabled=\"true\" onClick=\"checkDisable(this);\"";
                    mosEventsHTML::buildWeeksCheck($row->reccurweeks, $arguments);                
                  ?>    
                  <input id="cb_wn6" name="reccurweeks[]" type="radio" value="pair" onClick="checkDisable(this);" disabled="disabled" />
                  <?php echo _CAL_LANG_REP_WEEKPAIR; ?><br />
                  <input id="cb_wn7" name="reccurweeks[]" type="radio" value="impair" onClick="checkDisable(this);" disabled="disabled" />
                  <?php echo _CAL_LANG_REP_WEEKIMPAIR; ?>
                  </font>                   
                </td>
              </tr>
              <tr> 
                <td width="60" rowspan="2" align="left" valign="top"><u><?php echo _CAL_LANG_REP_MONTH;?></u></td>
                <td width="100" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000"> 
                  <input id="reccurtype3" name="reccurtype" type="radio" value="3" onClick="checkDisable();" />
                  1 * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_MONTH; ?></font></td>
                <td align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000"> 
                  <?php 
                    $arguments = "disabled='disabled' onClick=\"checkDisable();\"";
                    mosEventsHTML::buildReccurDaySelect($row->reccurday_month,'reccurday_month',$arguments);
                  ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td colspan="2" align="left" valign="top" class="frm_td_bymonth">
                  <font color="#000000"> 
                  <input id="reccurtype4" name="reccurtype" type="radio"  value="4" onClick="checkDisable();" />
                  <?php echo _CAL_LANG_EACH." "._CAL_LANG_ENDMONTH; ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td width="60" rowspan="2" align="left" valign="top"><u><?php echo _CAL_LANG_REP_YEAR;?></u></td>
                <td width="100" align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000"> 
                  <input id="reccurtype5" name="reccurtype" type="radio" value="5" onClick="checkDisable();" />  
                  1 * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_YEAR; ?>
                  </font>
                </td>
                <td align="left" valign="top" class="frm_td_byyear">
                  <font color="#000000"> 
                  <?php 
                    $arguments = "disabled='disabled' onClick=\"checkDisable();\"";
                    mosEventsHTML::buildReccurDaySelect($row->reccurday_year,'reccurday_year',$arguments);
                  ?>
                  </font>
                </td>
              </tr>            
            </table>
          </td>
        </tr>
        <!-- END REPEAT -->  
      <?php } ?>
      </table>   
      </div>
      <!-- // PUB INFOS TAB -->
      
      <!-- HELP TAB -->
      <div id="ev_page3" class="pagetext">                   
      <table align="left" width="100%" cellpadding="0" cellspacing="5" border="0" class="tabcontent">              	    	
    	<tr>
          <td width="100%" colspan="2" height="2">&nbsp;</td>
        </tr>    	    	
		<?php echo _CAL_LANG_EVENT_FORM_HELP; ?>
      </table>   
      </div>       
      <!-- // END HELP TAB -->
      <!--   
      <table width="100%" cellpadding="0" cellspacing="5" border="0">
        <tr>
          <td width="100%" colspan="2">
          --> 
            <input type="hidden" name="created_by_alias" value="<?php echo $row->created_by_alias;?>" />
        
            <input type="hidden" name="option" value="<?php echo $option;?>" />              
            <input type="hidden" name="goodexit" value="0" />
            <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />              
            <input type="hidden" name="introtext" value="" />           
            <?php
              if ($task=="modify"){
            ?>
            <input type="hidden" name="task" value="modify" />        
            <input type="hidden" name="mode" value="write" />
            <input type="hidden" name="id" value="<?php echo $row->id;?>" />
            <?php
              } else if ($task=="add"){
            ?>
            <input type="hidden" name="task" value="add" />    
            <input type="hidden" name="mode" value="write" />
            <?php
              } else {
            ?>
            <input type="hidden" name="task" value="" /> 
            <?php
              } 
            ?>
            <p>&nbsp;</p>
      </form>
      <script language="javascript" type="text/javascript">
         checkRepeatValues();  
		 checkPublish();
		 document.ev_adminForm.catid.onchange();
      </script>     
      <script language="javascript" type="text/javascript">dhtml.cycleTab('ev_tab1');</script>

        </td>
      </tr>
    </table> 
      <?php          
  }
 
 /**
 ***************************
 *     << < --NAV BAR-- > >>
 ***************************
 * prev2 prev1 next1 next2
 *  <<     <     >     >>
 */
  function viewNavTableBar( $today_date, $this_date, $dates, $alts, $option, $task, $Itemid ) {
    
    $gg = '<img src="components/'.$option.'/images/gg_'._CAL_CONF_NAVBARCOLOR.'.gif" border="0" alt="'.$alts['prev2'].'" />';   
    $g = '<img src="components/'.$option.'/images/g_'._CAL_CONF_NAVBARCOLOR.'.gif" border="0" alt="'.$alts['prev1'].'" />';
    $d = '<img src="components/'.$option.'/images/d_'._CAL_CONF_NAVBARCOLOR.'.gif" border="0" alt="'.$alts['next1'].'" />';
    $dd = '<img src="components/'.$option.'/images/dd_'._CAL_CONF_NAVBARCOLOR.'.gif" border="0" alt="'.$alts['next2'].'" />';
 
    $prev2 = '<a href="'.sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;".$dates['prev2']->toDateURL()."&amp;Itemid=".$Itemid).'">'.$gg.'</a>'."\n";
    $prev1 = '<a href="'.sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;".$dates['prev1']->toDateURL()."&amp;Itemid=".$Itemid).'">'.$g.'</a>'."\n";
    $next1 = '<a href="'.sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;".$dates['next1']->toDateURL()."&amp;Itemid=".$Itemid).'">'.$d.'</a>'."\n";
    $next2 = '<a href="'.sefRelToAbs("index.php?option=".$option."&amp;task=".$task."&amp;".$dates['next2']->toDateURL()."&amp;Itemid=".$Itemid).'">'.$dd.'</a>'."\n";
    
    $today_link = '<a class="nav_bar_link" href="'.sefRelToAbs("index.php?option=".$option."&amp;task=view_day&amp;".$today_date->toDateURL()."&amp;Itemid=".$Itemid).'">'._CAL_LANG_VIEWTODAY.'</a>'."\n";
    //$current_month_link = '<a class="nav_bar_link" href="index.php?option='.$option.'&task=view_month&'.$this_date->toDateURL().'&Itemid='.$Itemid.'">'._CAL_LANG_VIEWBYMONTH.'</a>'."\n";
    //$current_week_link = '<a class="nav_bar_link" href="index.php?option='.$option.'&task=view_week&'.$this_date->toDateURL().'&Itemid='.$Itemid.'">'._CAL_LANG_VIEWBYWEEK.'</a>'."\n";
    //$archive_link = '<a class="nav_bar_link" href="index.php?option='.$option.'&task=view_year&year='.$this_date->getYear(1).'&Itemid='.$Itemid.'">'._CAL_LANG_ARCHIVE.'&nbsp;'.$this_date->getYear(1).'</a>'."\n";
    //$categories_link = '<a class="nav_bar_link" href="index.php?option='.$option.'&task=view_cat&'.$this_date->toDateURL().'&Itemid='.$Itemid.'">'._CAL_LANG_VIEWBYCAT.'</a>'."\n";
    $lastmonth_link = '<a class="nav_bar_link" href="'.sefRelToAbs("index.php?option=".$option."&amp;task=view_last&amp;".$today_date->toDateURL()."&amp;Itemid=".$Itemid).'">'._CAL_LANG_VIEWTOCOME.'</a>'."\n";
    ?>
    <div style="width:100%">
    <table bgcolor="" width="300" border="0" align="center" >
      <tr align="center" valign="top">
        <td height="1" width="100" align="right" valign="top">
          <?php echo $today_link;?>
        </td>    
        <td height="1" align="center" valign="bottom">
          <form name="ViewSelect" action="index.php" method="post">
            <input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
            <input type="hidden" name="option" value="<?php echo $option;?>" />
            <input type="hidden" name="year" value="<?php echo $this_date->getYear(1);?>" />
            <input type="hidden" name="month" value="<?php echo $this_date->getMonth(1);?>" />
            <input type="hidden" name="day" value="<?php echo $this_date->getDay(1);?>" />
            <?php
              mosEventsHTML::buildViewSelect($task, 'onchange="submit(this.form)" style="font-size:10px;"');
            ?>            
          </form>         
        </td>
        <td height="1" width="100" align="left" valign="top">
          <?php echo $lastmonth_link;?>
        </td>        
      </tr>
   </table>           
   </div>
    <table bgcolor="" width="300" border="0" align="center">
      <tr valign="top">
        <td width="10" align="center" valign="top">
          <?php echo $prev2;?>
        </td>
        <td width="10" align="center" valign="top">
          <?php echo $prev1;?>
        </td>
        <td align="center" valign="top">
          <form name="BarNav" action="index.php" method="post" style="font-size:1;">
            <input type="hidden" name="option" value="<?php echo $option;?>" />
            <input type="hidden" name="task" value="<?php echo $task;?>" />
           <?php
            /*Day Select*/
                mosEventsHTML::buildDaySelect($this_date->getYear(1),$this_date->getMonth(1),$this_date->getDay(1), 'onchange="submit(this.form)" style="font-size:10px;"');
            /*Month Select*/
                mosEventsHTML::buildMonthSelect($this_date->getMonth(1), 'onchange="submit(this.form)" style="font-size:10px;"');
            /*Year Select*/
                mosEventsHTML::buildYearSelect($this_date->getYear(1), 'onchange="submit(this.form)" style="font-size:10px;"');
	  ?>
            <input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />
          </form>
        </td>
        <td width="10" align="center" valign="top">
          <?php echo $next1;?>
        </td>
        <td width="10" align="center" valign="top">
          <?php echo $next2;?>
        </td>
      </tr>
    </table>
    <br />
    <?php
  }     
  
  function viewNavAdminPanel($year,$month,$day,$option,$Itemid) {
    global $is_event_editor, $my;      
    ?>
    <table width="100%" border="0" align="center">
      <tr>
        <td align="left" class="nav_bar_cell">
           <?php   	
   	    if ($is_event_editor) {
   	        ?>
            <?php $eventlinkadd=sefRelToAbs("index.php?option=".$option."&amp;task=add"."&amp;year=".$year."&amp;month=".$month."&amp;day=".$day."&amp;Itemid=".$Itemid);?>
            <a href="<?php echo $eventlinkadd; ?>"><b><?php echo _CAL_LANG_ADDEVENT;?></b></a><br />
			<?php if (( strtolower($my->usertype) != '')) {
			?>
            <?php $eventmylinks=sefRelToAbs("index.php?option=".$option."&amp;task=admin"."&amp;year=".$year."&amp;month=".$month."&amp;day=".$day."&amp;Itemid=".$Itemid);?>
            <a href="<?php echo $eventmylinks; ?>"><b><?php echo _CAL_LANG_MYEVENTS;?></b></a>
			<?php } ?>			
   	   <?php
   	    }
   	  ?>
        </td>
      </tr>
    </table>
    <?php    
  } 
  
  function viewCopyright (){
    ?>	 
    <p align="center">
    <a href="http://forge.joomla.org/sf/sfmain/do/viewProject/projects.jevents" target="_blank" style=" font-size: xx-small;">Events v1.3</a> <font color="#999999" size="1">Copyright &copy; 2003-2006</font>
    </p> 
    <?php
  }
  
  function viewSearchForm ($keyword, $option, $task, $Itemid) {    
    ?>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td align="center" width="100%">
	 <form action="index.php" method="post" style="font-size:1;">
            <input type="hidden" name="option" value="<?php echo $option;?>" />
            <input type="hidden" name="task" value="search" />                  
            <input type="hidden" name="Itemid" value="<?php echo $Itemid;?>" />  
            <input type="text" name="keyword" size="20" maxlength="50" class="inputbox" value="<?php echo $keyword;?>" />       
            <br />
            <input class="button" type="submit" name="push" value="<?php echo _SEARCH_TITLE; ?>" />  	     
          </form>
	</td>
      </tr>
    </table>
    <?php
  }
}// end class
?>
