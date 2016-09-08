<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: download.html.php,v 1.12 2005/05/19 01:44:42 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_DOWNLOAD')) {
    return;
} else {
    define('_DOCMAN_HTML_DOWNLOAD', 1);
} 

class HTML_DMDownload 
{
    function licenseDocumentForm(&$links, &$paths, &$data)
    { 
        $action = _taskLink('license_result', $_REQUEST[ 'gid' ] , array('bid' => $data->id));
        
        ob_start();
        ?>
		<form action="<?php echo $action;?>" method="POST" enctype="multipart/form-data">
			<input type="radio" name="agree" value="0" checked /><?php echo _DML_DONT_AGREE;?>
			<input type="radio" name="agree" value="1" /><?php echo _DML_AGREE;?>
			<input name="submit" value="<?php echo _DML_PROCEED;?>" type="submit" />
		</form>
		
		<?php
		
		$html = ob_get_contents();
        ob_end_clean();

        return $html;
    } 
} 

?>