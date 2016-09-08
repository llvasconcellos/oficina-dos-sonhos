<?php

    /*********************************************\
    **   Xe-GalleryV1 PRO
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );



class HTML_xegallerypro {



  function showPictures( $option, &$rows, &$clist, &$slist, &$search, &$pageNav ) {
global $database;
    ?>

    <form action="index2.php" method="post" name="adminForm">

    <table cellpadding="4" cellspacing="0" border="0" width="100%">

    <tr>

      <td width="100%" class="sectionname">

       Gallery Photos

      </td>

      <td nowrap="nowrap">Display #<br>
        <?php echo $pageNav->writeLimitBox(); ?>

      </td>

      <td>Search:<br>
<input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />

      </td>

      <td width="center">
Sort By:<br/>
        <?php echo $clist;?>
      </td>
       <td width="center">
Sort By Type:<br/>
       <?php echo $slist;?>

      </td>

    </tr>

    </table>



    <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">

      <tr>

        <th width="20">

          <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />

        </th>

        <th class="title" width="25%">Title</th>

        <th width="25%" align="left">Category</th>

        <th width="10%" align="left"></th>

        <th width="5%">Published</th>
        <th width="5%"></th>

        <th width="10%">Author</th>
        <th width="5%">Type</th>

        <th width="15%">Date</th>

      </tr>

      <?php

        $k = 0;

      for ($i=0, $n=count( $rows ); $i < $n; $i++) {

        $row = &$rows[$i];

        	$taska = $row->approved ? 'rejectpic' : 'approvepic';
			$imga = $row->approved ? 'tick.png' : 'publish_x.png';
			$task = $row->published ? 'unpublish' : 'publish';
			$img = $row->published ? 'tick.png' : 'publish_x.png';
        
      $database->setQuery("select id from #__users where username='$row->owner'");
      $userid = $database->loadResult();
        
        ?>

      <tr class="<?php echo "row$k"; ?>">

        <td>

          <input type="checkbox" id="cb<?php echo $i;?>" name="id[]" value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);" />

        </td>

        <td>

          <a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')">

            <?php echo $row->imgtitle; ?>

          </a>

        </td>

        <td><?php echo ShowCategoryPath($row->catid); ?></td>

        <td></td>

        <?php

        echo "<td align='center'>";
?>
        <a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')"><img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></a>
<?php
        echo "</td>";

        ?>
        
<td align='center'>



        </td>


        <td width="10%" align="center">
        <a href='../index.php?option=com_comprofiler&task=userProfile&user=<?php echo $userid;?>' target="_blank"><?php echo $row->owner; ?></a></td>
        <td width="5%" align="center">
        <?php if ($row->useruploaded ) {?>
        <img src="../includes/js/ThemeOffice/users.png" alt="User Uploaded" title="User Uploaded">
        <?php }
        else {
        ?>
        <img src="../includes/js/ThemeOffice/credits.png" alt="Admin Uploaded" title="Admin Uploaded">
        <?php }
        ?>
        
        </td>

        <td width="10%" align="center"><?php echo strftime("%c",$row->imgdate); ?></td>

        <?php $k = 1 - $k;

        echo "</tr>";

       } ?>

      <tr>

        <th align="center" colspan="9">

          <?php echo $pageNav->writePagesLinks(); ?></th>

      </tr>

      <tr>

        <td align="center" colspan="9">

          <?php echo $pageNav->writePagesCounter(); ?></td>

      </tr>

    </table>

    <input type="hidden" name="option" value="<?php echo $option;?>" />

    <input type="hidden" name="task" value="" />

    <input type="hidden" name="boxchecked" value="0" />

    </form>


<?php

  }



function editPicture( $option, &$row, &$clist, &$imagelist, &$thumblist, $ag_pathimages, $ag_paththumbs ) {
global $my;
?>

    <script language="javascript" type="text/javascript">

    function submitbutton(pressbutton) {

      var form = document.adminForm;

      if (pressbutton == 'cancel') {

        submitform( pressbutton );

        return;

      }



      // do field validation

      if (form.imgtitle.value == ""){

        alert( "Picture must have a title" );

      } else if (form.catid.value == "0"){

        alert( "You must select a category." );

      } else if (form.imgfilename.value == ""){

        alert( "You must have a picture filename." );

      } else if (form.imgthumbname.value == ""){

        alert( "You must have a thumbnail filename." );

      } else {

        submitform( pressbutton );

      }

    }

    </script>

    <table cellpadding="4" cellspacing="0" border="0" width="100%">

    <tr>



    </tr>

  </table>

    <table cellpadding="4" cellspacing="1" border="0" width="100%" class="adminform">

    <form action="index2.php" method="post" name="adminForm" id="adminForm">



      <tr>

        <td width="20%" align="right">Photo Title:</td>

        <td width="80%">

          <input class="inputbox" type="text" name="imgtitle" size="50" maxlength="100" value="<?php echo htmlspecialchars( $row->imgtitle, ENT_QUOTES );?>" />

        </td>

      </tr>



      <tr>

        <td valign="top" align="right">Photo Category:</td>

        <td>

          <?php echo $clist; ?>

        </td>

      </tr>



      <tr>

        <td valign="top" align="right">Photo Description:</td>

        <td>

          <textarea class="inputbox" cols="50" rows="5" name="imgtext" style="width:500px" width="500"><?php echo htmlspecialchars( $row->imgtext, ENT_QUOTES );?></textarea>

        </td>

      </tr>



      <tr>

        <td valign="top" align="right">Photo Bigsize:</td>

        <td>

          <?php echo $imagelist; ?>

        </td>

      </tr>



      <tr>

        <td valign="top" align="right">Thumbnail:</td>

        <td>

          <?php echo $thumblist; ?>

        </td>

      </tr>



    </table>



    <input type="hidden" name="id" value="<?php echo $row->id; ?>" />

    <input type="hidden" name="option" value="<?php echo $option;?>" />

    <input type="hidden" name="task" value="" />
    <input type="hidden" name="owner" value="<?php if ($row->owner) {echo $row->owner;} else {echo $my->username;} ?>" />
    <input type="hidden" name="approved" value="<?php if ($row->approved == "") {echo "1";} else {echo $row->approved;} ?>" />

    </form>

    <p>

    <table cellpadding="4" cellspacing="1" border="0" width="400" class="sectionname" align="left">

      <tr>

        <td valign="top" align="center">

        <b>Picture Preview:</b><br />

        <script language="javascript" type="text/javascript">

          if (document.forms[0].imgfilename.options.value!=''){

            jsimg='<?php echo "..$ag_pathimages/"; ?>' + getSelectedValue( 'adminForm', 'imgfilename' );

          } else {

            jsimg='../images/M_images/blank.png';

          }

          document.write('<img src=' + jsimg + ' name="imagelib2" width="240" height="180" border="2" alt="Picture Preview" /><br />');

          document.write('<object classid="cclsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ID="test" width="240" height="180" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">');
          document.write('<param name="movie" value='+ jsimg +' />');
		  document.write ('<embed src='+ jsimg +' quality=high pluginspage=http://www.macromedia.com/go/getflashplayer type=application/x-shockwave-flash width=240 height=180></embed></object>');

          </script>

        </td>

        <td valign="top" align="center">

        <b>Thumbnail Preview:</b><br />

        <script language="javascript" type="text/javascript">

          if (document.forms[0].imgthumbname.options.value!=''){

            jsimg='<?php echo "..$ag_paththumbs/"; ?>' + getSelectedValue( 'adminForm', 'imgthumbname' );

          } else {

            jsimg='../images/M_images/blank.png';

          }

          document.write('<img src=' + jsimg + ' name="imagelib" width="120" height="90" border="2" alt="Thumbnail Preview" /><br />');

          document.write('<object classid="cclsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ID="test" width="120" height="90" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0">');
          document.write('<param name="movie" value='+ jsimg +' />');
		  document.write ('<embed src='+ jsimg +' quality=high pluginspage=http://www.macromedia.com/go/getflashplayer type=application/x-shockwave-flash width=120 height=90></embed></object>');

          </script>

        <br/><br/><br/><br/><br/><br/></td>

      </tr>

    </table>




<?php

  }



function showComments( $option, &$rows, &$search, &$pageNav ) {

    ?>

    <form action="index2.php" method="post" name="adminForm">

    <table cellpadding="4" cellspacing="0" border="0" width="100%">

    <tr>

      <td width="100%" class="sectionname">

      

      </td>

      <td nowrap="nowrap">Display #</td>

      <td>

        <?php echo $pageNav->writeLimitBox(); ?>

      </td>

      <td>Search:</td>

      <td>

        <input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />

      </td>

    </tr>

    </table>

    <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">

      <tr>

        <th width="20">

          <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />

        </th>

        <th class="title" width="25%">Author</th>

        <th width="25%" align="left">Text</th>

        <th width="10%" align="left">IP</th>

        <th width="10%">Published</th>

        <th width="15%">Picture</th>

        <th width="15%">Date</th>

      </tr>

      <?php

        $k = 0;

      for ($i=0, $n=count( $rows ); $i < $n; $i++) {

        $row = &$rows[$i];

        ?>

      <tr class="<?php echo "row$k"; ?>">

        <td>

          <input type="checkbox" id="cb<?php echo $i;?>" name="id[]" value="<?php echo $row->cmtid; ?>" onclick="isChecked(this.checked);" />

        </td>

        <td>

          <!--<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','edit')">-->
<a href="../index.php?option=com_comprofiler&task=showprofile&user=<?php echo $row->owner; ?>" target="_blank"><?php echo $row->cmtname; ?>
</a></td>
       

        <td><?php echo $row->cmttext; ?></td>

        <td><?php echo $row->cmtip; ?></td>

        <?php

        echo "<td align='center'>";

        if ($row->published == "1") {
        	echo "<img src='images/tick.png'>";
        } else {
        	echo "<img src='images/publish_x.png'>";
        }

        echo "</td>";

        ?>

        <td width="10%" align="center"><?php echo $row->cmtpic; ?></td>

        <td width="10%" align="center"><?php echo strftime("%c",$row->cmtdate); ?></td>

        <?php $k = 1 - $k;

        echo "</tr>";

       } ?>

      <tr>

        <th align="center" colspan="7">

          <?php echo $pageNav->writePagesLinks(); ?></th>

      </tr>

      <tr>

        <td align="center" colspan="7">

          <?php echo $pageNav->writePagesCounter(); ?></td>

      </tr>

    </table>

    <input type="hidden" name="option" value="<?php echo $option;?>" />

    <input type="hidden" name="task" value="comments" />

    <input type="hidden" name="boxchecked" value="0" />

    </form>


<?php

  }

/************** Hack ******************/  


##############################################################
######
######   Categories
######
##############################################################

         function showCatgs( &$rows, $search, $pageNav, $option) {
                  ?>
  <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
        <script language="Javascript" src="../includes/js/overlib_mini.js"></script>
        <form action="index2.php" method="post" name="adminForm">
        <table cellpadding="4" cellspacing="0" border="0" width="100%">
        <tr>
                <td width="100%" class="sectionname">Gallery Categorys</td>
                <td nowrap>Display #</td>
                <td>
                        <?php echo $pageNav->writeLimitBox(); ?>
                </td>
                <td>Search:</td>
                <td>
                        <input type="text" name="search" value="<?php echo $search;?>" class="inputbox" onChange="document.adminForm.submit();" />
                </td>
        </tr>
<tr>
                <td width="100%">
        </td>
        </tr>
        </table>

        <table width="100%" border="0" cellpadding="4" cellspacing="0"  class="adminlist">
                <tr>
                        <th width="20">
                                <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
                        </th>
                        <th width="100%" class="title">Category</th>
                        <th nowrap></th>
                        <th nowrap>Published</th>
                        <th nowrap>Access</th>
<th colspan="2" nowrap="nowrap"><div align="center">Reorder</div></th>
                </tr>
                <?php
                $k = 0;
                $i = 0;
                for ($i=0, $n=count( $rows ); $i < $n; $i++) {
                        $row = &$rows[$i];
                        
                        ?>
                        <tr class="row<?php echo $k; ?>">
                                <td width="20"><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->cid; ?>" onClick="isChecked(this.checked);"></td>
                                <td width="100%" >
                                <a href="#edit" onclick="return listItemTask('cb<?php echo $i; ?>','editcatg')"><?php echo $row->name; ?></a></td>
                <td  align="center" nowrap><?php echo ShowCategoryPath($row->parent); ?></td>
              <?php
                        $task = $row->published ? 'unpublishcatg' : 'publishcatg';
                        $img = $row->published ? 'tick.png' : 'publish_x.png';
?>
                        <td width="10%" align="center" nowrap><a href="javascript: void(0);" onClick="return listItemTask('cb<?php echo $i;?>','<?php echo $task;?>')"><img src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></a></td>

                        <td width="10%" align="center" nowrap><?php echo $row->groupname;?></td>
                        
      <td>
        <?php		if ($i > 0 || ($i+$pageNav->limitstart > 0)) { ?>
        <div align="center"><a href="#reorder" onclick="return listItemTask('cb<?php echo $i;?>','orderupcatg')">
          <img src="images/uparrow.png" width="12" height="12" border="0" alt="Move Up">
          </a>
          <?php		} else { echo "&nbsp;"; } ?>
        </div></td>
      <td>
        <?php		if ($i < $n-1 || $i+$pageNav->limitstart < $pageNav->total-1) { ?>
        <div align="center"><a href="#reorder" onclick="return listItemTask('cb<?php echo $i;?>','orderdowncatg')">
          <img src="images/downarrow.png" width="12" height="12" border="0" alt="Move Down">
          </a>
          <?php		} else { echo "&nbsp;"; } ?>
        </div></td>
                                <?php
                                        $k = 1 - $k;

                        }?>
                </tr>
                <tr>
                        <th align="center" colspan="7">
                                <?php echo $pageNav->writePagesLinks(); ?></th>
                </tr>
                <tr>
                        <td align="center" colspan="7">
                                <?php echo $pageNav->writePagesCounter(); ?></td>
                </tr>
          </table>
                        <input type="hidden" name="option" value="<?php echo $option; ?>">
                        <input type="hidden" name="task" value="showcatg">
                        <input type="hidden" name="boxchecked" value="0">
        </form>
<?php
}

function editCatg( &$row, &$publist, $option , $glist , $Lists,$orderlist ) {
 global $mainframe;


 mosMakeHtmlSafe( $row, ENT_QUOTES, 'description' );
?>

                <script language="javascript" type="text/javascript">
                function submitbutton(pressbutton) {
                        var form = document.adminForm;
                        if (pressbutton == 'cancelcatg') {
                                submitform( pressbutton );
                                return;
                        }

                        // do field validation
                        try {
                        document.adminForm.onsubmit();
                        }
                        catch(e){}
                        if (form.name.value == ""){
                                alert( "Category must have a title" );
                        } else {
                                <?php getEditorContents( 'editor1', 'description' ) ; ?>
                                submitform( pressbutton );
                        }
                }
                </script>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
    <tr>
      <td width="100%"><span class="sectionname"><?php echo $row->cid ? 'Edit' : 'Add';?> Category</span></td>
    </tr>
</table>
<form action="index2.php" method="POST" name="adminForm">


                <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform">
                        <tr class="row0">
                                <td width="200">Title:</td>
                                <td><input class="inputbox" type="text" name="name" size="25" value="<?php echo $row->name; ?>"></td>
                        </tr>

<!---                         <tr class="row1">
                          <td valign="top" >Parent Category </td>
                          <td nowrap ><?php echo $Lists["catgs"]; ?></td>
                  </tr> --->
                           <tr class="row0">
                                <td valign="top">Content:</td>
                                <td>
                                        <?php
                                        // parameters : areaname, content, hidden field, width, height, rows, cols
                                        editorArea( 'editor1', str_replace('&','&amp;',$row->description) , 'description', '500', '200', '70', '10' ) ; ?>
                                </td>
                        </tr>
                                  <tr class="row1">
                          <td valign="top" >Access</td>
                          <td nowrap ><?php echo $glist?></td>
<!---                         </tr>
                           <tr class="row0">
                          <td valign="top" >Ordering</td>
                          <td nowrap ><?php echo $orderlist?></td>
                        </tr> --->

                </table>
  </div>

                        <input type="hidden" name="cid" value="<?php echo $row->cid; ?>">
                        <input type="hidden" name="task" value="">
                        <input type="hidden" name="option" value="<?php echo $option; ?>">
</form>

                <?php }



/************** /Hack ******************/  
  
  


}

?>