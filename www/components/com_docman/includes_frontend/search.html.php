<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: search.html.php,v 1.14 2005/04/18 17:04:56 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_SEARCH')) {
    return;
} else {
    define('_DOCMAN_HTML_SEARCH', 1);
} 

class HTML_DMSearch 
{
    function searchForm(&$lists, $search_phrase)
    {
        global $_DOCMAN;
        
        $action = _taskLink('search_result');

        ob_start();
        ?>
		<form action="<?php echo $action;?>" method="post" name="adminForm" id="dm_frmsearch" class="dm_form">
		<fieldset class="input">
			<p>
				<label for="catid"><?php echo _DML_SELECCAT;?></label><br />
				<?php echo $lists['catid'] ;?>
			</p>
			<p>
				<label for="search_phrase"><?php echo _PROMPT_KEYWORD;?></label><br />
				<input type="text" class="inputbox" id="search_phrase" name="search_phrase"  value="<?php echo $search_phrase ?>" />
			</p>
			<p>
				<label for="search_mode"><?php echo _DML_SEARCH_MODE;?></label><br />
				<?php echo $lists['invert_search'] . _DML_NOT ;?><?php echo '&nbsp;' . $lists['search_mode']?>
			</p>
			<p>
				<label for="ordering"><?php echo _CMN_ORDERING;?></label><br />
				<?php echo $lists['ordering'] ;?><?php echo "&nbsp;" . _DML_SEARCH_REVRS . ":" . $lists['reverse_order'] ;?>
			</p>
			<p>
				<label for="search_where"><?php echo _DML_SEARCH_WHERE;?></label><br />
				<?php echo $lists['search_where'] ;?>
			</p>
		</fieldset>
		<fieldset class="dm_button">
			<p>
				<input type="submit" class="dm_button" value="<?php echo _DML_SEARCH;?>" />
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
