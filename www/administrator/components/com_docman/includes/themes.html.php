<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: themes.html.php,v 1.12 2005/04/10 22:59:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_THEMES')) {
    return;
} else {
    define('_DOCMAN_HTML_THEMES', 1);
} 

class HTML_DMThemes {
    function showThemes(&$rows, &$pageNav)
    {
        global $my, $mosConfig_live_site;
        if (isset($row->authorUrl) && $row->authorUrl != '') {
            $row->authorUrl = str_replace('http://', '', $row->authorUrl);
        } 

        ?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="templates">
			Installed Themes
			</th>
		</tr>
		</table>
		<table class="adminlist">
		<tr>
			<th align="left" width="5">#</th>
			<th align="left" width="5">&nbsp;</th>
			<th width="25%" class="title">
			Name
			</th>
			<th width="10%">
			Published
			</th>	
			<th width="20%" align="left">
			Author
			</th>
			<th width="5%" align="center">
			Version
			</th>
			<th width="10%" align="center">
			Date
			</th>
			<th width="20%" align="left">
			Author URL
			</th>
		</tr>
		<?php
        $k = 0;
        for ($i = 0, $n = count($rows); $i < $n; $i++) {
            $row = &$rows[$i];

            ?>
			<tr class="<?php echo 'row' . $k;
            ?>">
				<td>
				<?php echo $pageNav->rowNumber($i);
            ?>
				</td>
				<td>
				<?php
            if ($row->checked_out && $row->checked_out != $my->id) {

                ?>
					&nbsp;
					<?php
            } else {

                ?>
					<input type="radio" id="cb<?php echo $i;
                ?>" name="cid[]" value="<?php echo $row->mosname;
                ?>" onClick="isChecked(this.checked);" />
					<?php
            } 

            ?>
				</td>
				<td>
				<a href="#edit" onclick="return listItemTask('cb<?php echo $i;
            ?>','edit')">
				<?php echo $row->name;
            ?>
				</a>
				</td>
				<td align="center">
				<?php
            if ($row->published == 1) {

                ?>
				<img src="images/tick.png" alt="Published">
					<?php
            } else {

                ?>
					&nbsp;
					<?php
            } 

            ?>
					</td>
				<td>
				<?php echo $row->authorEmail ? '<a href="mailto:' . $row->authorEmail . '">' . $row->author . '</a>' : $row->author;
            ?>
				</td>
				<td align="center">
				<?php echo $row->version;
            ?>
				</td>
				<td align="center">
				<?php echo $row->creationdate;
            ?>
				</td>
				<td>
				<a href="<?php echo substr($row->authorUrl, 0, 7) == 'http://' ? $row->authorUrl : 'http://' . $row->authorUrl;
            ?>" target="_blank">
				<?php echo $row->authorUrl;
            ?>
				</a>
				</td>
			</tr>
			<?php
        } 

        ?>
		</table>
		<?php echo $pageNav->getListFooter();
        ?>
		<input type="hidden" name="option" value="com_docman" />
		<input type="hidden" name="section" value="themes" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		</form>
		<?php
        require_once ("../components/com_docman/footer.php");
    } 

    function editTheme(&$row, &$lists, &$params)
    {
        global $mosConfig_live_site;

        ?>
		<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
		<script language="Javascript" src="<?php echo $mosConfig_live_site;
        ?>/includes/js/overlib_mini.js"></script>
		
		<style>
			.title { background-color: #EEE; font-weight:  bold; border-bottom: 1px solid #BBB; }
			.adminform { margin: 5px; }
		</style>
		
		<table class="adminheading">
		<tr>
			<th class="mambots">
			Edit Theme -> <?php echo $row->name;
        ?>
			</th>
		</tr>
		</table>
	
		<form action="index2.php" method="post" name="adminForm">
		<table cellspacing="0" cellpadding="0" width="100%">
		<tr valign="top">
			<td width="60%" valign="top">
				<table class="adminform">
				<tr>
					<th colspan="2">
					Theme Details
					</th>
				<tr>
				<tr>
					<td width="100" align="left">
					Name:
					</td>
					<td>
					<input class="text_area" type="text" name="name" size="35" value="<?php echo $row->name;
        ?>" />
					</td>
				</tr>
				<tr>
					<td valign="top">
					Published:
					</td>
					<td>
					<?php echo $lists['published'];
        ?>
					</td>
				</tr>
				<tr>
					<td valign="top">
					Description:
					</td>
					<td>
					<?php echo $row->description;
        ?>
					</td>
				</tr>
				</table>
			</td>
			<td width="40%">
				<table class="adminform" >
				<tr>
					<th colspan="2">
					Parameters
					</th>
				<tr>
				<tr>
					<td>
					<?php echo $params->render();
        ?>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
	
		<input type="hidden" name="option" value="com_docman" />
		<input type="hidden" name="section" value="themes" />
		<input type="hidden" name="id" value="<?php echo $row->mosname;
        ?>" />
		<input type="hidden" name="task" value="" />
		</form>
		<?php
    } 

    function showInstallForm($title, $p_startdir = "", $backLink = "")
    {

        ?>
		<script language="javascript" type="text/javascript">
			function submitbutton3(pressbutton) {
				var form = document.adminForm_dir;

				// do field validation
				if (form.userfile.value == ""){
					alert( "Please select a directory" );
				} else {
					form.submit();
				}
			}
		</script>
		<form enctype="multipart/form-data" action="index2.php" method="post" name="filename">
		<input type="hidden" name="task" value="uploadfile" />
		<input type="hidden" name="option" value="com_docman">
		<input type="hidden" name="section" value="themes">
		<table class="adminheading">
	  	<tr>
	    	<th><?php echo $title;
        ?></th>
	    	<td align="right" nowrap="true"><?php echo $backLink;
        ?></td>
	  	</tr>
		</table>
		<table class="adminform">
	  	<tr>
	    	<th>Upload Package File</th>
	  	</tr>
	  	<tr>
	    	<td align="Left">Package File:&nbsp;<input class="text_area" name="userfile" type="file" />&nbsp;<input class="button" type="submit" value="Upload File &amp; Install" /></td>
	  	</tr>
		</table>
		</form>
		<br />

		<form enctype="multipart/form-data" action="index2.php" method="post" name="adminForm_dir">
		<input type="hidden" name="task" value="installfromdir" />
		<input type="hidden" name="option" value="com_docman">
		<input type="hidden" name="section" value="themes">
		<table class="adminform">
	  	<tr>
	    	<th>Install from directory</th>
	  	</tr>
	  	<tr>
	    	<td align="Left">
				Install directory:&nbsp;
				<input type="text" name="userfile" class="text_area" size="50" value="<?php echo $p_startdir;
        ?>"/>&nbsp;
				<input type="button" class="button" value="Install" onclick="submitbutton3()" />
			</td>
	  	</tr>
		</table>
		</form>
		<?php
        require_once("../components/com_docman/footer.php");
    } 

    function showInstallMessage($message, $title, $url)
    {
        global $PHP_SELF;

        ?>
		<table class="adminheading">
		<tr>
			<th class="install">
				<?php echo $title;
        ?>
			</th>
		</tr>
		</table>
		<table class="adminform">
		<tr>
			<td align="Left">
				<strong><?php echo $message;
        ?></strong>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				[&nbsp;<a href="<?php echo $url;
        ?>" style="font-size: 16px; font-weight: bold">Continue ...</a>&nbsp;]
			</td>
		</tr>
		</table>
		<?php
        require_once("../components/com_docman/footer.php");
    } 

    function themeInstalled()
    {

        ?>
		<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminform">
			<tr>
				<td><?php echo _DML_THEME_INSTALLED;
        ?></td>
			</tr>
			<tr>
				<td><a href='index2.php?option=com_docman&task=config'><?php echo _DML_ADJUST_CONFIG;
        ?></a></td>
			</tr>
		</table>
		<?php
        include "../components/com_docman/footer.php";
    } 

    function editCSSSource($theme, &$content)
    {
        global $mosConfig_absolute_path, $_DOCMAN;

        ?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th class="templates">
			Theme Stylesheet Editor
			</th>
		</tr>
		</table>

		<table class="adminform">
		<tr>
			<th colspan="4">
			Path: <?php $_DOCMAN->getPath('themes', $theme)?>/css/theme.css
			<?php
        $css_path = $file = $_DOCMAN->getPath('themes', $theme) . "/css/theme.css";
        echo is_writable($css_path) ? '<b><font color="green">
			 - Writeable</font></b>' : '<b><font color="red"> - Unwriteable</font></b>';

        ?>
			</th>
		</tr>
		<tr>
			<td>
			<textarea cols="110" rows="25" name="filecontent" class="inputbox">
			<?php echo $content;
        ?>
			</textarea>
			</td>
		</tr>
		</table>
		<input type="hidden" name="theme" value="<?php echo $theme;
        ?>" />
		<input type="hidden" name="option" value="com_docman" />
		<input type="hidden" name="section" value="themes" />
		<input type="hidden" name="task" value="" />
		</form>
		<?php
    } 
} 

?>
