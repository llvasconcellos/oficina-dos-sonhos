<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: upload.html.php,v 1.19 2005/04/15 13:56:15 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_UPLOAD')) {
    return;
} else {
    define('_DOCMAN_HTML_UPLOAD', 1);
} 

class HTML_DMUpload 
{
    function uploadMethodsForm($lists)
    { 
        ob_start();
        ?>
	   <form action="<?php echo $lists['action'];?>" method="post" id="dm_frmupload" class="dm_form">
       <fieldset class="input">
       		<p><label for="method"><?php echo _DML_UPLOADMETHOD;?></label><br />
			<?php echo $lists['methods'];?></p> 
       </fieldset>
       <fieldset class="dm_button">
        	<p><input name="submit" class="dm_button" value="<?php echo _DML_NEXT;?>" type="submit" /></p>
       </fieldset>
    	</form>
		<?php
 		$html = ob_get_contents();
        ob_end_clean();

        return $html;
    }
    
    function updateDocumentForm($list, $links, $paths, $data)
    {
    	$action = _taskLink('doc_update_process', $data->id);
		
		ob_start();
        ?>
       <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data" id="dm_frmupdate" class="dm_form" >
       <fieldset class="input">
       		<p>
       			<label for="upload"><?php echo _DML_SELECTFILE;?></label><br />
	   			<input id="upload" name="upload" type="file" />
	   		</p>
       </fieldset>
	   <fieldset class="dm_button">
	   		<p>
	   			<input name="submit" class="dm_button" value="<?php echo _DML_UPLOAD ?>" type="submit" />
	   		</p>
	   </fieldset>
 	   </form>
        <?php	
 		$html = ob_get_contents();
        ob_end_clean();

        return $html;
    }  
}
?>
