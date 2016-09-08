<?php
// $Id: admin.events.html.php,v 1.40 2005/12/05 11:10:56 g_edwards Exp $
//Events//
/**
* Content code
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Eric Lamette, Dave McDonnell
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
**/

// ensure this file is being included by a parent file
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

class HTML_events {
	/**
	* Writes a list of the events items
	* @param array An array of events objects
	*/
	function showEvents( $rows, $clist, $search, $pageNav, $option ) {
		global $my;

?>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script language="Javascript" src="../includes/js/overlib_mini.js"></script>
<form action="index2.php" method="post" name="adminForm">
  <table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%"><img src="../components/<?php echo $option;?>/images/logo.gif" border=0><br><br></td>
      <td nowrap>Display #</td>
      <td> <?php echo $pageNav->writeLimitBox(); ?> </td>
      <td>Search:</td>
      <td><input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" /></td>
      <td width="right"> <?php echo $clist;?> </td>
    </tr>
  </table>
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
    <tr>
      <th width="20" nowrap="nowrap"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
      <th class="title" width="30%" nowrap="nowrap">Title</th>
      <th width="10%" align="left" nowrap="nowrap">Category</th>
      <th width="10%" align="left" nowrap="nowrap">Repeat type</th>
      <th width="10" nowrap="nowrap">Published</th>
      <th width="20%" nowrap="nowrap">Timesheet</th>
      <th width="10%" nowrap="nowrap">Checked Out</th>
      <th width="10%" nowrap="nowrap">Access</th>
    </tr>
<?php
$k = 0;
for ($i=0, $n=count( $rows ); $i < $n; $i++) {
$row = &$rows[$i];



?>
    <tr class="<?php echo "row$k"; ?>">

      <td width="20" bgcolor=<?php echo $row->color_bar;?>>
        <?php		if ($row->checked_out && $row->checked_out != $my->id) { ?>
        &nbsp;
        <?php		} else { ?>
        <input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);" />
        <?php		} ?>
      </td>

      <td width="30%"> <a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')"><?php echo $row->title; ?></a></td>

      <td width="10%"><?php echo $row->category; ?></td>

      <td width="10%">
      <?php
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
                echo _CAL_LANG_ALLDAYS;
            }
        ?>
      </td>

      <td width="10%" align="center">
<?php
			$now = date( "Y-m-d h:i:s" );
			if ($now <= $row->publish_up && $row->state == "1") {
				$img = 'publish_y.png';
			} else if (($now <= $row->publish_down || $row->publish_down == "0000-00-00 00:00:00") && $row->state == "1") {
				$img = 'publish_g.png';
			} else if ($now > $row->publish_down && $row->state == "1") {
				$img = 'publish_r.png';
			} elseif ($row->state == "0") {
				$img = "publish_x.png";
			}

			$times = '';
			if (isset($row->publish_up)) {
				if ($row->publish_up == '0000-00-00 00:00:00') {
					$times .= "<tr><td>"._CAL_LANG_FROM." : Always</td></tr>";
				} else {
					$times .= "<tr><td>"._CAL_LANG_FROM." : $row->publish_up</td></tr>";
				}
			}
			if (isset($row->publish_down)) {
				if ($row->publish_down == '0000-00-00 00:00:00') {
					$times .= "<tr><td>"._CAL_LANG_TO." : Never</td></tr>";
				} else {
				$times .= "<tr><td>"._CAL_LANG_TO." : $row->publish_down</td></tr>";
				}
			}

			if ($times) {
                        ?>
	                <a href="javascript: void(0);" onMouseOver="return overlib('<table border=0 width=100% height=100%><?php echo $times; ?></table>', CAPTION, 'Publish Information', BELOW, RIGHT);" onMouseOut="return nd();" onclick="return listItemTask('cb<?php echo $i;?>','<?php echo $row->state ? "unpublish" : "publish";?>')"><img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></a>
	                <?php
			}
	                ?>
	  </td>
      <td width="20%"><?php echo "<table width=\"100%\" style='border: 1px solid black;'>$times</table>"; ?></td>
      <?php
      if ($row->checked_out) { ?>
      <td width="10%" align="center"><?php echo $row->editor; ?></td>
      <?php		} else { ?>
      <td width="10%" align="center">&nbsp;</td>
      <?php		} ?>

      <td width="10%" align="center"><?php echo $row->groupname;?></td>
    </tr>
<?php
   $k = 1 - $k;

   }
?>
    <tr>
      <th align="center" colspan="9"> <?php echo $pageNav->writePagesLinks(); ?></th>
    </tr>
    <tr>
      <td align="center" colspan="9"> <?php echo $pageNav->writePagesCounter(); ?></td>
    </tr>
  </table>
  <input type="hidden" name="option" value="<?php echo $option;?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
</form>
<br />
<table cellspacing="0" cellpadding="4" border="0" align="center">
  <tr align="center">
    <td> <img src="images/publish_y.png" width="12" height="12" border=0 alt="Pending" />
    </td>
    <td> Published, but is <u>Coming</u> |</td>
    <td> <img src="images/publish_g.png" width="12" height="12" border=0 alt="Visible" />
    </td>
    <td> Published and is <u>Current</u> |</td>
    <td> <img src="images/publish_r.png" width="12" height="12" border=0 alt="Finished" />
    </td>
    <td> Published, but has <u>Finished</u> |</td>
    <td> <img src="images/publish_x.png" width="12" height="12" border=0 alt="Finished" />
    </td>
    <td> Not Published </td>
  </tr>
  <tr>
	<td colspan="8" align="center">Click on icon to toggle state.</td>
  </tr>
</table>
<?php

	}



	/**
	* Writes the edit form for new and existing events item
	*
	* A new record is defined when <var>$row</var> is passed witht the <var>id</var>
	* property set to 0.
	* @param mosEvents The category object
	* @param string The html for the groups select list
	*/
	function editEvents( $row, $start_publish, $stop_publish, $start_time, $end_time, $section, $glist,
	        $folderlist, $images, $ilist, $i2list, $poslist,
		$myid, $creator, $modifier, $option, $mode, $catColors ) {

		$return2cat = intval( mosGetParam( $_POST, 'catid', 0 ) );

	list($start_hrs, $start_mins) = explode(":",$start_time);
	list($end_hrs, $end_mins) = explode(":",$end_time);
   if(defined("_CAL_USE_STD_TIME") && _CAL_USE_STD_TIME == "YES") {
	$start_pm=false; $end_pm=false;
	$start_hrs = intval($start_hrs);
	if($start_hrs >= 12) $start_pm=true;
	if($start_hrs > 12) $start_hrs -= 12;
	else if($start_hrs == 0) $start_hrs = 12;

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
<link rel="stylesheet" type="text/css" media="all" href="../includes/js/calendar/calendar-mos.css" title="green" />
<!-- import the calendar script -->
<script type="text/javascript" src="../includes/js/calendar/calendar.js"></script>
<!-- import the language module -->
<script type="text/javascript" src="../includes/js/calendar/lang/calendar-en.js"></script>
<!--<script language="javascript" src="js/dhtml.js"></script>//-->
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<script language="Javascript" src="../includes/js/overlib_mini.js"></script>
<script language="Javascript" src="../components/com_events/js/colorpicker.js"></script>
<script language="javascript" type="text/javascript">
var folderimages = new Array;
<?php	$i = 0;
foreach ($images as $k=>$items) {
	foreach ($items as $v) {
		echo "\n	folderimages[".$i++."] = new Array( '$k','$v->value','$v->text' );";
	}
}
?>

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

</script>
<script language="javascript" type="text/javascript">
	function introTocontent(){
		document.adminForm.introtext.value = document.adminForm.content.value;
	}

	function submitbutton(pressbutton) {
		checkDisable();
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}
		// assemble the images back into one field
		var temp = new Array;
		for (var i=0, n=form.imagelist.options.length; i < n; i++) {
			temp[i] = form.imagelist.options[i].value;
		}
		form.images.value = temp.join( '\n' );

		// Note that this php function below is not really doing anything in most of the editor scripts.
		// The actual editor contents is passed back into the textarea when the form is about to be submitted
		// by chaining into the form's onsubmit() event function.  The problem here is that we don't actually
		// call the form's submit event until we are done with our checks below.  What we need to do here is
		// call the form's onsubmit() function first to let the editor copy the contents into the textarea
		document.adminForm.onsubmit();
                <?php getEditorContents( 'editor1', 'content' ) ; ?>
		// Call this function to provide content for introtext attribute (needed for preview)		
		document.adminForm.introtext.value = document.adminForm.content.value;
		// do field validation
		var sw = checkSelectedWeeks();
		var sd = checkSelectedDays();
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
			submitform(pressbutton);
		}
	}
	
	function setgood(){
		var form = document.adminForm;
	        form.goodexit.value=1;
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
		else time = time.replace(/^0+(\d{4})/,"$1");
		time = time.replace(/\s+$/,"");
	    	//time = time.replace(/([^1,2]\d{2})\d+/,"$1");
		//time = time.replace(/((1|2)\d{3})\d+/,"$1");
		num = time.replace(/^(\d+).*/, "$1");
		
		if(num*1 <= 2359){
			// pad the entered numer with zeros on the right to make it 4 digits
			if(no_hours){
				num = num.replace(/^(\d)$/,"0" + "$1");
				num = '00' + num + '00';
				num = num.replace(/^(\d{4}).*$/,"$1");
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
		var form = document.adminForm;
		if (form.publish_down.value < form.publish_up.value) {
			 form.publish_down.value = form.publish_up.value;
		}
		// dmcd aug 20/04 disabled to allow overnite events
		//if (form._publish_down_hour.value < form._publish_up_hour.value) {
		//	 var temphour= '';
		//	 var nb1=0;
		//	 nb1 = eval(form._publish_up_hour.value);
		//	 temphour = nb1 + 1;
		//	 form._publish_down_hour.value = eval(temphour);
		//}
		checkDisable();
	}

	function checkRepeatValues(){
		var form = document.adminForm;	
		var eventid = eval(<?php echo $row->id; ?>);
	        var recurtval = eval(<?php echo $row->reccurtype; ?>);
		var recurwval = "<?php echo $row->reccurweeks; ?>";
		//if (eventid > 0){
		         var f = form.reccurtype;
		         if (recurtval >= 0){			
	                        f[recurtval].checked = true;
	                 }
	    //    }
	        
	        if((recurtval == 1) || (recurtval == 2)){		 
		         var g = document.adminForm;		
	                 if (recurwval == "pair"){
		                 g.cb_wn6.checked = true;        
	                 }
	                 if (recurwval == "impair"){
		                 g.cb_wn7.checked = true;        
	                 }	                 	                 
	        }
	} 
	function checkSelectedWeeks(){		
	        var form = document.adminForm;
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
		var form = document.adminForm;
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
	function checkDisable(){
		var form = document.adminForm;		
		// Check repeat Disable repeat option		
		if (form.publish_down.value == form.publish_up.value) {					 
			 var f = form.reccurtype;
	                 for (i=1; i < f.length; i++) {		                 
		                 f[i].disabled = true;
	                 }
	                 form.reccurtype[0].checked=true;
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
	                 var f = document.adminForm;
	                 for (i=0; i < 7; i++) {
		                 cb = eval( 'f.cb_wd' + i );
		                 cb.disabled = false;
	                 }	                		        	                
		} else {
		         var f = document.adminForm;
	                 for (i=0; i < 7; i++) {
		                 cb = eval( 'f.cb_wd' + i );
		                 cb.disabled = true;
	                 }	               
		}
		// By Week : Disable Weeks select
		if((form.reccurtype[1].checked==true) || (form.reccurtype[2].checked==true)){		 
		         var g = document.adminForm;
	                 for (i=1; i < 8; i++) {
		                 cb = eval( 'g.cb_wn' + i );
		                 cb.disabled = false;	                        
	                         if((i<6) && (cb.checked==true)) {
	                                  g.cb_wn6.checked = false;
	                                  g.cb_wn7.checked = false;		 		                   
		                 }  	                        
	                 }	                		
	        } else {
	                 var g = document.adminForm;	               
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
	}
</script>

<table cellpadding="4" cellspacing="0" border="0" width="100%">
 <tr>
    <td class="sectionname" ><?php echo $row->id ? 'Edit' : 'Add';?> Event</td>
  </tr>
</table>
<table cellspacing="0" cellpadding="4" border="0" width="100%">
  <tr>
    <td width="" class="tabpadding">&nbsp;</td>
    <td id="tab1" class="offtab" onclick="dhtml.cycleTab(this.id)">Events</td>
    <td id="tab2" class="offtab" onclick="dhtml.cycleTab(this.id)">Images</td>
    <td id="tab3" class="offtab" onclick="dhtml.cycleTab(this.id)">Publishing</td>
    <td id="tab4" class="offtab" onclick="dhtml.cycleTab(this.id)">Help</td>

    <td width="90%" class="tabpadding">&nbsp;</td>
  </tr>
</table>
<form action="index2.php" method="POST" name="adminForm"  onsubmit="javascript:setgood();">
  <input type="hidden" name="images" value="" />
  <div id="page1" class="pagetext">
    <table cellpadding="5" cellspacing="0" border="0" width="100%" class="adminform">
      <tr>
        <td width="10%" align="left"><?php echo _CAL_LANG_EVENT_TITLE; ?>:</td>
        <td width="60%"> <input class="inputbox" type="text" name="title" size="50" maxlength="100" value="<?php echo $row->title; ?>" />
        </td>
        <td width="30%" rowspan="5" align="middle" valign="top">
	  <table cellpadding="3" cellspacing="0" border="0" width="180" class="adminform">
            <tr>
              <th class="info" colspan="2">Item Status</th>
            </tr>
            <tr>
              <td width="34%"><strong><?php echo _E_STATE; ?></strong></td>
              <td width="50%"><?php echo $row->state > 0 ? 'Published' : ($row->state < 0 ? 'Archived' : 'Draft Unpublished');?></td>
            </tr>
            <tr>
              <td><strong><?php echo _E_HITS; ?></strong></td>
              <td><?php echo $row->hits;?></td>
            </tr>
            <tr>
              <th class="info" colspan="2">Item Info</th>
            </tr>
            <tr>
              <td><strong><?php echo _E_CREATED; ?></strong></td>
              <td> <?php echo $row->created ? "$row->created</td></tr><tr><td><strong>"._CAL_LANG_BY."</strong></td><td>$creator" : _CAL_LANG_EVENT_NEWEVENT;?></td>
            </tr>
            <tr>
              <td><strong><?php echo _E_LAST_MOD; ?></strong></td>
              <td><?php echo $row->modified ? "$row->modified</td></tr><tr><td><strong>"._CAL_LANG_BY."</strong></td><td>$modifier" : _CAL_LANG_EVENT_NOTMODIFIED;?></td>
            </tr>
            <tr>
              <th class="info" colspan="2">Extra Infos</th>
            </tr>
            <tr>
              <td><strong><?php echo _CAL_LANG_EVENT_ADRESSE; ?></strong></td>
              <td> <?php echo $row->adresse_info ? "$row->adresse_info</td></tr>" : "No adresse info";?></td>
            </tr>
            <tr>
              <td><strong><?php echo _CAL_LANG_EVENT_CONTACT; ?></strong></td>
              <td> <?php echo $row->contact_info ? "$row->contact_info</td></tr>" : "No contact info";?></td>
            </tr>
            <tr>
              <td><strong><?php echo _CAL_LANG_EVENT_EXTRA; ?></strong></td>
              <td> <?php echo $row->extra_info ? "$row->extra_info</td></tr>" : "No extra info";?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td valign="top" align="left"><?php echo _CAL_LANG_EVENT_CATEGORY; ?>:</td>
        <td><?php mosEventsHTML::buildCategorySelect($row->catid, 'onChange="if(catColors[this.value])catColor=catColors[this.value]; else catColor=\'\';document.adminForm.useCatColor.onclick();"');?></td>
      </tr>
      <tr>
        <td valign="top" align="left"><?php echo _CAL_LANG_EVENT_ACTIVITY; ?>:<br />
          (required) </td>
        <td onMouseOut="introTocontent()">
            <?php 
                // parameters : areaname, content, hidden field, width, height, rows, cols 
                editorArea( 'editor1',  $row->content , 'content', 500, 250, '70', '10' ) ; 
            ?>
         </td>
      <tr>
         <td width="10%" align="left"><?php echo _CAL_LANG_EVENT_ADRESSE; ?>:</td>
        <td width="60%"> <input class="inputbox" type="text" name="adresse_info" size="50" maxlength="120" value="<?php echo $row->adresse_info; ?>" />
        </td>
       </tr>
      <tr>
       <td width="10%" align="left"><?php echo _CAL_LANG_EVENT_CONTACT; ?>:</td>
        <td width="60%"> <input class="inputbox" type="text" name="contact_info" size="50" maxlength="120" value="<?php echo $row->contact_info; ?>" />
        </td>
      </tr>
      <tr>
       <td width="10%" align="left"><?php echo _CAL_LANG_EVENT_EXTRA; ?>:</td>
        <td width="60%"><input class="inputbox" type="text" name="extra_info" size="50" maxlength="240" value="<?php echo $row->extra_info; ?>" />
        </td>
      </tr>
    </table>
  </div>
  <div id="page2" class="pagetext">
     <table cellpadding="5" cellspacing="0" border="0" width="100%" class="adminform">
	<tr>
		<td colspan="6">Sub-folder :: <?php echo $folderlist;?></td>
	</tr>
      <tr>
        <td> Gallery Images <br /> <?php echo $ilist;?> <br /> <input class="button" type="button" value="Insert &gt;" onClick="addSelectedToList('adminForm','imagefiles','imagelist')" />
        </td>
        <td> Content Images: <br /> <?php echo $i2list;?> <br /> <input class="button" type="button" value="up" onClick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,-1)" />
          <input class="button" type="button" value="down" onClick="moveInList('adminForm','imagelist',adminForm.imagelist.selectedIndex,+1)" />
          <input class="button" type="button" value="remove" onClick="delSelectedFromList('adminForm','imagelist')" />
        </td>
        <td> Edit the image selected:
          <table>
            <tr>
              <td align="right">Source</td>
              <td> <input type="text" name= "_source" value="" /> </td>
            </tr>
            <tr>
              <td align="right">Align</td>
              <td> <?php echo $poslist; ?> </td>
            </tr>
            <tr>
              <td align="right">Alt Text</td>
              <td> <input type="text" name="_alt" value="" /> </td>
            </tr>
            <tr>
              <td align="right">Border</td>
              <td> <input type="text" name="_border" value="" size="3" maxlength="1" />
              </td>
            </tr>
            <tr>
              <td align="right"></td>
              <td> <input class="button" type="button" value="Apply" onClick="applyImageProps()" />
              </td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td> <img name="view_imagefiles" src="../images/M_images/blank.png" width="100">
        </td>
        <td> <img name="view_imagelist" src="../images/M_images/blank.png" width="100">
        </td>
      </tr>
    </table>
  </div>
  <div id="page3" class="pagetext">
    <table cellpadding="5" cellspacing="0" border="0" width="100%" class="adminform">
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
		  <a id="colorPickButton" name ="colorPickButton" href="javascript:void(0)"  onclick="if(!document.adminForm.useCatColor.checked) {cp.pickColor();}"
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
				<input type=checkbox id='useCatColor' name='useCatColor' value='1' <?php if ((_CAL_CONF_DEFCOLOR == "category" && $mode == 'new') || $row->useCatColor) echo "checked"; ?> onclick="myPickField=document.adminForm.color_bar;  myColorPickButton=document.getElementById? document.getElementById('colorPickButton'): colorPickButton;if(this.checked){if(!oldChecked) oldColor=myPickField.value;myPickField.value=catColor;myPickField.onfocus=blurme;cp.relateColor(catColor);myColorPickButton.style.color='gray';myPickField.style.color='gray';}else{myPickField.onfocus=null;myPickField.value=oldColor;myPickField.style.color='black';cp.relateColor(oldColor);myColorPickButton.style.color='black';}oldChecked=this.checked;" />
					<?php echo _CAL_LANG_EVENT_CATCOLOR;?>
            </td></tr></table>
          </td>
        </tr>
      <tr>
        <td valign="top" width='100' align="left"><b><?php echo _CAL_LANG_EVENT_STATE; ?></b></td>
        <td><?php echo $row->state > 0 ? 'Published' : ($row->state < 0 ? 'Archived' : 'Draft Unpublished');?> </td>
      </tr>
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
		<td align="left" valign="middle">
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
		<td align="left" valign="middle">
		  <input id="end_pm0" name="end_pm" type="radio"  value="0" onClick="checkDisable();" <?php if(!$end_pm) echo "checked"; ?> /><span style="vertical-align:25%;">AM</span>
		 <input id="end_pm1" name="end_pm" type="radio"  value="1" onClick="checkDisable();" <?php if($end_pm) echo "checked"; ?> /><span style="vertical-align:25%;">PM</span>
		</td>
		<?php } ?>
    	      </tr>
    	    </table>
          </td>
        </tr>

 <!-- REPEAT -->    
	<tr>  
    	  <td><b><?php echo _CAL_LANG_EVENT_REPEATTYPE; ?></b></td>
  	  <td colspan="2"></td>
  	</tr>  
  	<tr onMouseOver="checkDisable();"> 
  	 <td></td>
    	  <td>    	             
	    <table width="100%" border="0" cellspacing="2">
              <tr>
                <td width="60"><u><?php echo _CAL_LANG_REP_DAY;?></u></td>
                <td colspan="2" bgcolor="#FFCCCC">
                  <font color="#000000"> 
                    <input id="reccurtype" name="reccurtype" type="radio"  value="0" onClick="checkDisable();"/>
                    <?php echo _CAL_LANG_ALLDAYS; ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td width="60" rowspan="3"><u><?php echo _CAL_LANG_REP_WEEK;?></u></td>
                <td width="100" bgcolor="#FFCC99">
                  <font color="#000000"> 
                    <input id="reccurtype" name="reccurtype" type="radio" value="1" onClick="checkDisable();"/>
                    1 * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_WEEK; ?>
                  </font>
                </td>
                <td bgcolor="#FFCC99">
                  <font color="#000000"> 
                  <?php 
                    $arguments = "disabled='disabled' onClick=\"checkDisable();\""; 
                    mosEventsHTML::buildReccurDaySelect($row->reccurday_week,'reccurday_week',$arguments);
                  ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td bgcolor="#FFCC99"> 
                  <font color="#000000"> 
                    <input id="reccurtype" name="reccurtype" type="radio" value="2" onClick="checkDisable();"/>
                    n * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_WEEK; ?>
                  </font>
                </td>
                <td bgcolor="#FFCC99">
                  <font color="#000000"> 
                  <?php          
                    mosEventsHTML::buildWeekDaysCheck($row->reccurweekdays, 'disabled=true'); 
                  ?>     
                  </font>
                </td>
              </tr>  
              <tr>        
                <td width="100" align="right" valign="top" bgcolor="#FFCC99">   
                  <font color="#000000"><i><?php echo _CAL_LANG_EVENT_WEEKOPT;?></i></font></td>               
                  <td bgcolor="#FFCC99">                  
                  <font color="#000000">    
                  <?php
                    $arguments = "disabled=\"true\" onClick=\"checkDisable();\"";
                    mosEventsHTML::buildWeeksCheck($row->reccurweeks, $arguments);                
                  ?>    
                  <input id="cb_wn6" name="reccurweeks[]" type="radio" value="pair" onClick="checkDisable();" disabled="disabled"/>
                  <?php echo _CAL_LANG_REP_WEEKPAIR; ?><br />
                  <input id="cb_wn7" name="reccurweeks[]" type="radio" value="impair" onClick="checkDisable();" disabled="disabled"/>
                  <?php echo _CAL_LANG_REP_WEEKIMPAIR; ?>
                  </font>                   
                </td>
              </tr>
              <tr> 
                <td width="60" rowspan="2"><u><?php echo _CAL_LANG_REP_MONTH;?></u></td>
                <td width="100" bgcolor="#99CC66">
                  <font color="#000000"> 
                  <input id="reccurtype" name="reccurtype" type="radio" value="3" onClick="checkDisable();"/>
                  1 * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_MONTH; ?></font></td>
                <td bgcolor="#99CC66">
                  <font color="#000000"> 
                  <?php 
                    $arguments = "disabled='disabled' onClick=\"checkDisable();\"";
                    mosEventsHTML::buildReccurDaySelect($row->reccurday_month,'reccurday_month',$arguments);
                  ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td colspan="2" bgcolor="#99CC66">
                  <font color="#000000"> 
                  <input id="reccurtype" name="reccurtype" type="radio"  value="4" onClick="checkDisable();"/>
                  <?php echo _CAL_LANG_EACH." "._CAL_LANG_ENDMONTH; ?>
                  </font>
                </td>
              </tr>
              <tr> 
                <td width="60" rowspan="2"><u><?php echo _CAL_LANG_REP_YEAR;?></u></td>
                <td width="100" bgcolor="#FFCCCC">
                  <font color="#000000"> 
                  <input id="reccurtype" name="reccurtype" type="radio" value="5" onClick="checkDisable();"/>  
                  1 * <?php echo _CAL_LANG_EVENT_PER." "._CAL_LANG_REP_YEAR; ?>
                  </font>
                </td>
                <td bgcolor="#FFCCCC">
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

      <tr>
        <td width="100" align="left"><b><?php echo _CAL_LANG_EVENT_ACCESSLEVEL; ?></b></td>
        <td> <?php echo $glist; ?> </td>
      </tr>
    </table>
  </div>

     
        <!-- HELP TAB -->
      <div id="page4" class="pagetext">                   
      <table align="left" width="100%" cellpadding="0" cellspacing="5" border="0" class="ev_tabcontent">              	    	
    	<tr>
          <td width="100%" colspan="2" height="2">&nbsp;</td>
        </tr>    	    	
	  <?php echo _CAL_LANG_EVENT_FORM_HELP_ADMIN; ?>
      </table>   
      </div>             
      <!-- // END HELP TAB -->
  <input type="hidden" name="option" value="<?php echo $option;?>" />
  <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
  <input type="hidden" name="sid" value="<?php echo $row->sid; ?>" />
  <input type="hidden" name="return2cat" value="<?php echo $return2cat; ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="introtext" />
  <input type="hidden" name="goodexit" value="0" />
 </form>

<script language="javascript" type="text/javascript">
         checkRepeatValues();  
		 checkPublish();
		 document.adminForm.catid.onchange();
</script>   
<script language="javascript" type="text/javascript">
		dhtml.cycleTab('tab1');
</script>
<br />
<br />
<?php

   }

   function showConfig($option,
                       $conf_adminmail,
                       $conf_starday,
                       $conf_adminlevel, 
                       $conf_mailview, 
                       $conf_byview, 
                       $conf_hitsview, 
                       $conf_repeatview, 
                       $conf_dateformat, 
                       $conf_navbarcolor,
                       $conf_startview, 
                       $conf_style,
                       $conf_defColor,

// dmcd May 10/04  added new config parameters for the events cal and latest mods

		       $conf_modCalDispLastMonth,
		       $conf_modCalDispLastMonthDays,
		       $conf_modCalDispNextMonth,
		       $conf_modCalDispNextMonthDays,
		       $conf_modLatestMaxEvents,
		       $conf_modLatestMode,
		       $conf_modLatestDays,
		       $conf_modLatestNoRepeat,
		       $conf_modLatestDispLinks,
		       $conf_modLatestDispYear,
		       $conf_modLatestCustFmtStr,
		       $conf_modLatestDisDateStyle,
		       $conf_modLatestDisTitleStyle,
		       $conf_calSimpleEventForm,
		       $conf_calForceCatColorEventForm,
		       $conf_calEventListRowsPpg,
			   $conf_calUseStdTime,
			   
			   $conf_frontendPublish 
		       ) {

     ?>

<!--<script language="Javascript" src="js/dhtml.js"></script>  //-->
   
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="90%">
  <tr>
    <td height=100>
      <p align="left"><img src="../components/<?php echo $option;?>/images/logo.gif" border=0></p>
    </td>
    <td align="center" valign="bottom">
      <font size=6><b>Events Config</b></font>
    </td>
  </tr>
</table>
<br>

<!-- TAB -->
<table cellspacing="0" cellpadding="4" border="0" width="100%">
  <tr>
    <td width="" class="tabpadding">&nbsp;</td>
    <td id="tab1" class="offtab" onClick="dhtml.cycleTab(this.id)">Config</td>
    <td id="tab2" class="offtab" onClick="dhtml.cycleTab(this.id)">Style</td>
    <td id="tab3" class="offtab" onClick="dhtml.cycleTab(this.id)">About</td>          
   
    <td width="90%" class="tabpadding">&nbsp;</td>
  </tr>
</table>                          
<!-- // TAB -->

<form action="index2.php" method="POST" name="adminForm">
    <?php
        // Include default config javascript
        defaultConfig();
    ?>
  <input type="hidden" name="task" value="saveconfig">
  <input type="hidden" name="option" value="<?php echo $option;?>" />

  <div id="page1" class="pagetext">
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
    <tr><td colspan=2 class="sectionname" style="height:25pt;vertical-align:center;font-size:12pt;font-weight:bold">Events Component Parameters
        </td>
    </tr>
      <tr>
        <td width="265">Admin Mail</td>
        <td>
          <input type="text" name="conf_adminmail" size="30" maxlength="50" value="<?php echo $conf_adminmail;?>">
        </td>
      </tr>
      <tr>
        <td width="265">Admin Level (who is allowed to post events)</td>
        <td>
            <?php
  	        $level[] = mosHTML::makeOption( '0', 'All registered users' );
  		$level[] = mosHTML::makeOption( '1', 'Only special rights and admins' );
		$level[] = mosHTML::makeOption( '2', 'All (anonymous) - not recommended' );
  		$tosend = mosHTML::selectList( $level, 'conf_adminlevel', '', 'value', 'text', $conf_adminlevel );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Publish from Frontend ?<br/>Allow publishers, managers and admin users to publish content from frontend</td>
        <td>
            <?php
  		$fepublish[] = mosHTML::makeOption( 'YES', 'YES' );
  		$fepublish[] = mosHTML::makeOption( 'NO', 'NO' );
  		$tosend = mosHTML::selectList( $fepublish, 'conf_frontendPublish', '', 'value', 'text', $conf_frontendPublish );
		echo $tosend;
	    ?>
        </td>
      </tr>      
      <tr>
        <td width="265">First day</td>
        <td>
            <?php
  		$first[] = mosHTML::makeOption( '0', 'Sunday first' );
  		$first[] = mosHTML::makeOption( '1', 'Monday first' );
  		$tosend = mosHTML::selectList( $first, 'conf_starday', '', 'value', 'text', $conf_starday );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">View mail ?</td>
        <td>
            <?php
  		$viewm[] = mosHTML::makeOption( 'YES', 'YES' );
  		$viewm[] = mosHTML::makeOption( 'NO', 'NO' );
  		$tosend = mosHTML::selectList( $viewm, 'conf_mailview', '', 'value', 'text', $conf_mailview );
		echo $tosend;
	    ?>
        </td>
      </tr>      
      <tr>
        <td width="265">View "By" ?</td>
        <td>
            <?php
  		$viewb[] = mosHTML::makeOption( 'YES', 'YES' );
  		$viewb[] = mosHTML::makeOption( 'NO', 'NO' );
  		$tosend = mosHTML::selectList( $viewb, 'conf_byview', '', 'value', 'text', $conf_byview );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">View "Hits" ?</td>
        <td>
            <?php
  		$viewh[] = mosHTML::makeOption( 'YES', 'YES' );
  		$viewh[] = mosHTML::makeOption( 'NO', 'NO' );
  		$tosend = mosHTML::selectList( $viewh, 'conf_hitsview', '', 'value', 'text', $conf_hitsview );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">View Repeat and time ?</td>
        <td>
            <?php
  		$viewr[] = mosHTML::makeOption( 'YES', 'YES' );
  		$viewr[] = mosHTML::makeOption( 'NO', 'NO' );
  		$tosend = mosHTML::selectList( $viewr, 'conf_repeatview', '', 'value', 'text', $conf_repeatview );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Date Format ?</td>
        <td>
            <?php
  		$datef[] = mosHTML::makeOption( '0', 'French-English' );
  		$datef[] = mosHTML::makeOption( '1', 'US' );
                $datef[] = mosHTML::makeOption( '2', 'Deutsch' );
  		$tosend = mosHTML::selectList( $datef, 'conf_dateformat', '', 'value', 'text', $conf_dateformat );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Use 12hr time Format ?</td>
        <td>
            <?php
  		$stdTime[] = mosHTML::makeOption( 'YES', 'YES' );
  		$stdTime[] = mosHTML::makeOption( 'NO', 'NO' );
  		$tosend = mosHTML::selectList( $stdTime, 'conf_calUseStdTime', '', 'value', 'text', $conf_calUseStdTime );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Navigation Bar Color ?</td>
        <td>
            <?php
  		$navcol[] = mosHTML::makeOption( 'green', 'Green' );
  		$navcol[] = mosHTML::makeOption( 'orange', 'Orange' );
  		$navcol[] = mosHTML::makeOption( 'blue', 'Blue' );
  		$tosend = mosHTML::selectList( $navcol, 'conf_navbarcolor', '', 'value', 'text', $conf_navbarcolor );
		echo $tosend;
	    ?>
        </td>
      </tr>
       <tr>
        <td width="265">Start Page ?</td>
        <td>
            <?php
  		$startpg[] = mosHTML::makeOption( 'view_day', 'Day' );
  		$startpg[] = mosHTML::makeOption( 'view_week', 'Week' );
  		$startpg[] = mosHTML::makeOption( 'view_month', 'Month (Calendar)' );
  		$startpg[] = mosHTML::makeOption( 'view_year', 'Year' );
  		$startpg[] = mosHTML::makeOption( 'view_last', 'Month (List)' );
		$startpg[] = mosHTML::makeOption( 'view_cat', 'Categories' );
		$startpg[] = mosHTML::makeOption( 'view_search', 'Search' );
  		$tosend = mosHTML::selectList( $startpg, 'conf_startview', '', 'value', 'text', $conf_startview );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">No. of Events to List per page for week, month, or year views: </td>
        <td>
            <input type=text size=3 name="conf_calEventListRowsPpg" value="<?php echo $conf_calEventListRowsPpg; ?>" />
        </td>
      </tr>
      <tr>
        <td width="265">Use Simple (IE. No Repeat types) Event entry Form for user front end ?</td>
        <td>
            <?php
  		$formOpt[] = mosHTML::makeOption( 'NO', 'NO' );
  		$formOpt[] = mosHTML::makeOption( 'YES', 'YES' );
  		$tosend = mosHTML::selectList( $formOpt, 'conf_calSimpleEventForm', '', 'value', 'text', $conf_calSimpleEventForm );
		echo $tosend;
	    ?>
        </td>
      </tr>

       <tr>
        <td width="265">Default Event Color ?</td>
        <td>
            <?php
  		$defColor[] = mosHTML::makeOption( 'random', 'Random' );
  		$defColor[] = mosHTML::makeOption( 'none', 'None' );
  		$defColor[] = mosHTML::makeOption( 'category', 'Category' );
  		$tosend = mosHTML::selectList( $defColor, 'conf_defColor', '', 'value', 'text', $conf_defColor );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Hide Event Color Selection in Event Form, and force Event Color to Category Color<br/>(front end only, back end event entry unaffected)</td>
        <td>
            <?php
  		$colCatOpt[] = mosHTML::makeOption( 'NO', 'NO' );
  		$colCatOpt[] = mosHTML::makeOption( 'YES', 'YES' );
  		$tosend = mosHTML::selectList( $colCatOpt, 'conf_calForceCatColorEventForm', '', 'value', 'text', $conf_calForceCatColorEventForm );
		echo $tosend;
	    ?>
        </td>
      </tr>

      <tr><td colspan=2><hr size="2" /></td></tr>
	  <tr><td colspan=2 class="sectionname" style="height:25pt;vertical-align:center;font-size:12pt;font-weight:bold">Events Calendar Module Parameters&nbsp;&nbsp;&nbsp;&nbsp;
	  <a href="#calendar" onClick="javascript:window.open('components/com_events/mod_events_calendar_help.html', 'EventsCalendarModHelp', 'width=500,height=700,scrollbars');" >
          <img style="border-width:0" src="components/com_events/images/help_ques_inact.gif" onMouseOver='this.src="components/com_events/images/help_ques.gif"'
	   onMouseOut='this.src="components/com_events/images/help_ques_inact.gif"' style="vertical-align:bottom" /></td></tr>
          <a name="calendar">
      <tr>
        <td width="265">Display Last Month ?</td>
        <td>
            <?php
  		$dispLmnth[] = mosHTML::makeOption( 'NO', 'NO' );
  		$dispLmnth[] = mosHTML::makeOption( 'YES_stop', 'YES - with stop day' );
  		$dispLmnth[] = mosHTML::makeOption( 'YES_stop_events', 'YES - if has events AND with stop day' );
  		$dispLmnth[] = mosHTML::makeOption( 'ALWAYS', 'ALWAYS' );
  		$dispLmnth[] = mosHTML::makeOption( 'ALWAYS_events', 'ALWAYS - if has events' );
  		$tosend = mosHTML::selectList( $dispLmnth, 'conf_modCalDispLastMonth', '', 'value', 'text', $conf_modCalDispLastMonth );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Day in Current Month to Stop displaying Last Month ?</td>
        <td>
            <input type=text size=2 name="conf_modCalDispLastMonthDays" value="<?php echo $conf_modCalDispLastMonthDays; ?>" />
        </td>
      </tr>
      <tr>
        <td width="265">Display Next Month ?</td>
        <td>
            <?php
  		$dispNmnth[] = mosHTML::makeOption( 'NO', 'NO' );
  		$dispNmnth[] = mosHTML::makeOption( 'YES_stop', 'YES - with start day' );
  		$dispNmnth[] = mosHTML::makeOption( 'YES_stop_events', 'YES - if has events AND with start day' );
  		$dispNmnth[] = mosHTML::makeOption( 'ALWAYS', 'ALWAYS' );
  		$dispNmnth[] = mosHTML::makeOption( 'ALWAYS_events', 'ALWAYS - if has events' );
  		$tosend = mosHTML::selectList( $dispNmnth, 'conf_modCalDispNextMonth', '', 'value', 'text', $conf_modCalDispNextMonth );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Days left in Current Month to Start displaying Next Month ?</td>
        <td>
            <input type=text size=2 name="conf_modCalDispNextMonthDays" value="<?php echo $conf_modCalDispNextMonthDays; ?>" />
        </td>
      </tr>

      <tr><td colspan=2><hr size="2" /></td></tr>
	  <tr><td colspan=2 class="sectionname" style="height:25pt;vertical-align:center;font-size:12pt;font-weight:bold">Latest Events Module Parameters&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="#latest" onClick="javascript:window.open('components/com_events/mod_events_latest_help.html', 'LatestEventsModHelp', 'width=500,height=700,scrollbars');" >
          <img style="border-width:0" src="components/com_events/images/help_ques_inact.gif" onMouseOver='this.src="components/com_events/images/help_ques.gif"'
	   onMouseOut='this.src="components/com_events/images/help_ques_inact.gif"' style="vertical-align:bottom" /></td></tr>
          <a name="latest">
       <tr>
        <td width="265">Maximum Events to Display ?</td>
        <td>
            <?php echo mosHTML::integerSelectList( 1, 10, 1, "conf_modLatestMaxEvents", '', "$conf_modLatestMaxEvents"); ?>
		</td>
      </tr>
      <tr>
        <td width="265">Display Mode ?</td>
        <td>
            <?php echo mosHTML::integerSelectList( 0, 4, 1, "conf_modLatestMode", '', "$conf_modLatestMode"); ?>
		</td>
      </tr>
      <tr>
        <td width="265">Day range relative to Current Day to display Events (modes 1 or 3 only) ?</td>
        <td>
            <input type=text size=2 name="conf_modLatestDays" value="<?php echo $conf_modLatestDays; ?>" />
        </td>
      </tr>
      <tr>
        <td width="265">Only Display a Repeating Event Once ?</td>
        <td>
            <?php
  		$dispLinks[] = mosHTML::makeOption( 'NO', 'NO' );
  		$dispLinks[] = mosHTML::makeOption( 'YES', 'YES' );
 		$tosend = mosHTML::selectList( $dispLinks, 'conf_modLatestNoRepeat', '', 'value', 'text', $conf_modLatestNoRepeat );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Display Events As Links ?</td>
        <td>
            <?php
	        $dispLinks = array();
  		$dispLinks[] = mosHTML::makeOption( 'NO', 'NO' );
  		$dispLinks[] = mosHTML::makeOption( 'YES', 'YES' );
 		$tosend = mosHTML::selectList( $dispLinks, 'conf_modLatestDispLinks', '', 'value', 'text', $conf_modLatestDispLinks );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Display the Year in the Event's Date (default format only) ?</td>
        <td>
            <?php
  		$dispYear[] = mosHTML::makeOption( 'NO', 'NO' );
  		$dispYear[] = mosHTML::makeOption( 'YES', 'YES' );
 		$tosend = mosHTML::selectList( $dispYear, 'conf_modLatestDispYear', '', 'value', 'text', $conf_modLatestDispYear );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Disable default CSS Date Field Style ?</td>
        <td>
            <?php
  		$disDateStyle[] = mosHTML::makeOption( 'NO', 'NO' );
  		$disDateStyle[] = mosHTML::makeOption( 'YES', 'YES' );
 		$tosend = mosHTML::selectList( $disDateStyle, 'conf_modLatestDisDateStyle', '', 'value', 'text', $conf_modLatestDisDateStyle );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Disable default CSS Title Field Style ?</td>
        <td>
            <?php
  		$disTitleStyle[] = mosHTML::makeOption( 'NO', 'NO' );
  		$disTitleStyle[] = mosHTML::makeOption( 'YES', 'YES' );
 		$tosend = mosHTML::selectList( $disTitleStyle, 'conf_modLatestDisTitleStyle', '', 'value', 'text', $conf_modLatestDisTitleStyle );
		echo $tosend;
	    ?>
        </td>
      </tr>
      <tr>
        <td width="265">Custom Format String: </td>
        <td>
            <input type=text size=40 name="conf_modLatestCustFmtStr" value="<?php echo stripslashes(htmlspecialchars($conf_modLatestCustFmtStr, ENT_QUOTES)); ?>" />
        </td>
      </tr>

    </table>
  </div>

  <div id="page2" class="pagetext">
    <br>
    <table align="left" width="100%" cellpadding="0" cellspacing="5" border="0" class="tabcontent">
      <tr>
        <td align="center" valign="middle">         
          <textarea rows="25" cols="100%" name="conf_style"><?php echo $conf_style;?></textarea>
          <input class="inputbox" type="button" name="default_config" size="20" value="Default Config" onClick="defaultConfig()"/>
        </td>
      </tr>
    </table>
  </div>

  <div id="page3" class="pagetext">
    <br>
    <table align="left" width="100%" cellpadding="0" cellspacing="5" border="0" class="tabcontent">
      <tr>
        <td align="center" valign="middle">
        <img src="../components/<?php echo $option;?>/images/logo.gif" border=0><br><br>
          <p align="center">
            <font color="#999999">This component is released under the GNU/GPL License
            </font>
					<br>	
					Contributors:
					Sven-Erik Andersen, Sasho Dimitrov, Eva Estevez, Luis Guerra, Dainius Jarutis, Ivo Larys, Mat Leinmueller, Arthur van der Molen, Thomas Nilsson, sakara, Markku Suominen, Martin Welen, David A. Quirantes García, Pedro López Peñalosa, Geraint Edwards and many others.
					 	         
          <p align="center" class="small">
            <a href="http://events.mamboforge.net/" target="_blank" style=" font-size: xx-small;">Events v1.3</a> <font color="#999999" size=1>Copyright &copy; 2003-2005 by Eric Lamette, Dave McDonell, Geraint Edwards</font>
          </p>
        </td>
      </tr>
    </table>
  </div>

</form>
<script language="javascript" type="text/javascript">dhtml.cycleTab('tab1');</script>
<br>    
<?php
    }
}
?>
