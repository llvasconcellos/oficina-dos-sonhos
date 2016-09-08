<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: upload.transfer.html.php,v 1.13 2005/04/14 16:22:38 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_METHOD_TRANSFER_HTML')) {
    return;
} else {
    define('_DOCMAN_METHOD_TRANSFER_HTML', 1);
} 

class HTML_DMUploadMethod 
{
    function transferFileForm($lists)
    {
        ob_start();
        ?>
    	<form action="<?php echo $lists['action'] ; ?>" method="post" id="dm_frmupload" class="dm_form">
		<fieldset class="input">
			<p><label for="url"><?php echo _DML_REMOTEURL ?></label><br />
	   		<input name="url" type="text" id="url" value="<?php echo $lists['url'];?>" />
			<?php echo mosToolTip(_DML_REMOTEURLTT . '</span>' ,_DML_TOOLTIP . '<br />' . _DML_REMOTEURL . ':');?></p>
			<p><label for="localfile"><?php echo _DML_LOCALNAME ;?></label><br />
	   		<input name="localfile" type="text" id="url" value="<?php echo $lists['localfile'];?>">
			<?php echo mosToolTip(_DML_LOCALNAMETT . '</span>',_DML_TOOLTIP . '<br />' . _DML_LOCALNAME . ':');?></p>
		</fieldset>
	   	<fieldset class="dm_button">
			<input name="submit" id="dm_btn_back"   class="dm_button" value="<?php echo _DML_BACK;?>" onclick="window.history.back()" type="button" >
			<input name="submit" id="dm_btn_submit" class="dm_button" value="<?php echo _DML_TRANSFER;?>" type="submit" />
        </fieldset>
        <input type="hidden" name="method" value="transfer" />
        </form>
    	<?php
		$html = ob_get_contents();
        ob_end_clean();

        return $html;
    } 
} 
?>