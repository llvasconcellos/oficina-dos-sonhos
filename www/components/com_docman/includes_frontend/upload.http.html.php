<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: upload.http.html.php,v 1.9 2005/04/14 16:22:38 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_METHOD_HTTP_HTML')) {
    return;
} else {
    define('_DOCMAN_METHOD_HTTP_HTML', 1);
} 

class HTML_DMUploadMethod 
{
    function uploadFileForm($lists)
    {
        ob_start();
        ?>
		<form action="<?php echo $lists['action'] ;?>" method="post" enctype="multipart/form-data" id="dm_frmupload" class="dm_form">
		<fieldset class="input">
       		<p><label for="upload"><?php echo _DML_SELECTFILE;?></label><br />
	   		<input id="upload" name="upload" type="file" name="file" /></p>
       	</fieldset>
	   	<fieldset class="dm_button">
	   		<input name="submit" id="dm_btn_back"   class="dm_button" value="<?php echo _DML_BACK;?>" onclick="window.history.back()" type="button" >
	   		<input name="submit" id="dm_btn_submit" class="dm_button" value="<?php echo _DML_UPLOAD ?>" type="submit" />
	   	</fieldset>
	   	<input type="hidden" name="method" value="http" />
		</form>
		<?php
		$html = ob_get_contents();
        ob_end_clean();

        return $html;
    } 
} 

?>
