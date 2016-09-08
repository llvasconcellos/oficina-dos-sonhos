<?php
//zOOm Media Gallery//
/** 
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: February, 2005                                                |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: admin.php                                                 |
| Version: 2.5.2                                                      |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$action = mosGetParam($_REQUEST,'action');
if (isset($action)){
    $zoom->optimizeTables();
    mosRedirect("index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin", _ZOOM_OPTIMIZE_SUCCESS);
}
?>
<table width="90%" "border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">    
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                  <td align="left" valign="middle"><strong><?php echo ($zoom->_isAdmin) ? _ZOOM_ADMIN_TITLE : _ZOOM_USER_TITLE; ?></strong></td>
                  <td align="right">ver <?php echo $zoom->_CONFIG['version'];?></td>
                </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td background="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/zoom_logo_faded.gif" style="background-repeat:no-repeat; background-position:top right;">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
              <?php if($zoom->_isAdmin || ($zoom->privileges->hasPrivilege('priv_creategal') | $zoom->privileges->hasPrivilege('priv_editgal') | $zoom->privileges->hasPrivilege('priv_delgal'))){ ?>
              <tr>
                <td width="60"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=catsmgr";?>" onmouseover="return overlib('<?php  echo _ZOOM_CATSMGR;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/catsmgr.png" border="0" onmouseover="MM_swapImage('catsmgr','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/catsmgr_f2.png',1);" onmouseout="MM_swapImgRestore();" name="catsmgr"></a></td>
                <td valign="center" align="left">&raquo;&nbsp;<?php echo _ZOOM_CATSMGR_DESCR;?><br />
                </td>
              </tr>
              <?php } ?>
              <?php if($zoom->_isAdmin || ($zoom->privileges->hasPrivilege('priv_upload') | $zoom->privileges->hasPrivilege('priv_editmedium') | $zoom->privileges->hasPrivilege('priv_delmedium'))){ ?>
              <tr>
                <td width="60"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=mediamgr";?>" onmouseover="return overlib('<?php  echo _ZOOM_MEDIAMGR;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/mediamgr.png" border="0" onmouseover="MM_swapImage('mediamgr','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/mediamgr_f2.png',1);" onmouseout="MM_swapImgRestore();" name="mediamgr"></a></td>
                <td valign="center" align="left">&raquo;&nbsp;<?php echo _ZOOM_MEDIAMGR_DESCR;?><br />
                </td>
              </tr>
              <?php } ?>
              <tr>
                <td width="60"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=zoomthumb";?>" onmouseover="return overlib('<?php echo 'Zoom Thumb coder';?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/zoomthumb.png" border="0" onmouseover="MM_swapImage('zoomthumb','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/zoomthumb_f2.png',1);" onmouseout="MM_swapImgRestore();" name="zoomthumb"></a></td>
                <td valign="center" align="left">&raquo; <?php echo 'Compute your Zoom Thumb codes easily';?><br />
                </td>
              </tr>
              <?php if($zoom->_isAdmin){ ?>
              <tr>
                <td width="60"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=settings";?>" onmouseover="return overlib('<?php echo _ZOOM_SETTINGS;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/settings.png" border="0" onmouseover="MM_swapImage('settings','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/settings_f2.png',1);" onmouseout="MM_swapImgRestore();" name="settings"></a></td>
                <td valign="center" align="left">&raquo;&nbsp;<?php echo _ZOOM_SETTINGS_DESCR;?><br />
                </td>
              </tr>
              <tr>
                <td width="60"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=admin&action=optimize";?>" onmouseover="return overlib('<?php  echo _ZOOM_OPTIMIZE;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/tables.png" border="0" onmouseover="MM_swapImage('tables','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/tables_f2.png',1);" onmouseout="MM_swapImgRestore();" name="tables"></a></td>
                <td valign="center" align="left">&raquo;&nbsp;<?php echo _ZOOM_OPTIMIZE_DESCR;?>
                </td>
              </tr>
              <tr>
                <td width="60"><a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=update";?>" onmouseover="return overlib('<?php echo _ZOOM_UPDATE;?>');" onmouseout="return nd();"><img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/update.png" border="0" onmouseover="MM_swapImage('update','','<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/admin/update_f2.png',1);" onmouseout="MM_swapImgRestore();" name="update"></a></td>
                <td valign="center" align="left">&raquo;&nbsp;<?php echo _ZOOM_UPDATE_DESCR;?>
                </td>
              </tr>
              <?php } ?>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr>
                <?php
                if (!$zoom->_isBackend){
                ?>
                <td align="left">
                  <a href="<?php echo "index.php?option=com_zoom&Itemid=".$Itemid;?>">
                  <img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/home.gif" alt="<?php echo _ZOOM_BACKTOGALLERY;?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_BACKTOGALLERY;?>
                  </a>
                </td>
                <?php
                }
                ?>
                <td align="right">
                  <a href="<?php echo "index".$backend.".php?option=com_zoom&Itemid=".$Itemid."&page=credits";?>">
                  <img src="<?php echo $mosConfig_live_site;?>/components/com_zoom/www/images/credits.gif" alt="<?php echo _ZOOM_CREDITS;?>" border="0">&nbsp;&nbsp;<?php echo _ZOOM_CREDITS;?>
                  </a>
                </td>
              </tr>
            </table>
            </td>
        </tr>
        </table>
    </td>
  </tr>
</table>