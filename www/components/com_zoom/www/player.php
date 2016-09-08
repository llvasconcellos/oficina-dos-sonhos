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
| Filename: player.php                                                |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// Load MOS configuration file...
include('../../../configuration.php');
echo("<?xml version=\"1.0\"?>\n");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>zoomfactory.org - Home</title>
</head>
<body bgcolor="#FFFFFF">
<object type="application/x-shockwave-flash" data="<?php echo $mosConfig_live_site; ?>/components/com_zoom/www/zoomplayer.swf" width="280" height="280" wmode="transparent">
    <param name="movie" value="<?php echo $mosConfig_live_site; ?>/components/com_zoom/www/zoomplayer.swf" />
    <param name="wmode" value="transparent" />
</object>
</body>
</html>