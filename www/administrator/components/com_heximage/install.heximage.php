<?
/**
* HeXimage - A Mambo/Joomla! photogallery Component
* @version 2.1.2
* @package HeXimage
* @copyright (C) 2006 by A.J.W.P. Ruitenberg
* @license Released under the terms of the GNU General Public License
**/

function com_install() {
global $database, $mosConfig_absolute_path, $REMOTE_ADDR, $HTTP_REFERER, $HTTP_USER_AGENT, $mosConfig_live_site, $mosConfig_mailfrom;

$web_A = $mosConfig_live_site.'/index.php?option=com_heximage';
$link_A = $HTTP_REFERER;
$browser_A = $HTTP_USER_AGENT;
$ip_A = $REMOTE_ADDR;
$mail = "info@hexa-design.com";
$mail_A = $mosConfig_mailfrom;
$the_date = date("d-m-Y G:i:s");
mail("$mail","HeXimage installation report"," $web_A | The IP was $ip_A at $the_date | $link_A | $browser_A","From:$mail_A\r\n");
  # Show installation result to user
  ?>
  <center>
  <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td><img src="components/com_heximage/images/logo.gif"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <strong>HeXimage - A Mambo/Joomla! photo gallery Component</strong><br/>
        <font class="small">&copy; Copyright 2006 by A.J.W.P. Ruitenberg<br/>
        Released under the terms and conditions of the <a href="index2.php?option=com_admisc&task=license">GNU General Public License</a>.</font><br/>
      </td>
    </tr>
    <tr>
      <td background="E0E0E0" style="border:1px solid #999;" colspan="2">
        <code>Installation Process:<br />
        <?php
          # Set up new icons for admin menu
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/config.png' WHERE admin_menu_link='option=com_HeXimage&task=config'");
          $iconresult[0] = $database->query();
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/edit.png' WHERE admin_menu_link='option=com_HeXimage&task=album'");
          $iconresult[1] = $database->query();
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/media.png' WHERE admin_menu_link='option=com_HeXimage&task=upload_thumb'");
          $iconresult[2] = $database->query();
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/media.png' WHERE admin_menu_link='option=com_HeXimage&task=mass_upload'");		  
          $iconresult[3] = $database->query();
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/edit.png' WHERE admin_menu_link='option=com_HeXimage&task=photo'");
          $iconresult[4] = $database->query();		
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/db.png' WHERE admin_menu_link='option=com_HeXimage&task=database'");
          $iconresult[5] = $database->query();				    		  
          $database->setQuery("UPDATE #__components SET admin_menu_img='js/ThemeOffice/user.png' WHERE admin_menu_link='option=com_HeXimage&task=about'");
          $iconresult[6] = $database->query();
          foreach ($iconresult as $i=>$icresult) {
            if ($icresult) {
              echo "<font color='green'>FINISHED:</font> Image of menu entry $i has been corrected.<br />";
            } else {
              echo "<font color='red'>ERROR:</font> Image of menu entry $i could not be corrected.<br />";
            }
          }

        ?>
        <font color="green"><b>Installation finished.</b></font></code><br><br>
		<font color="red" size="+1"><b><font size="+2">Final step!<br /><br />
		<a href="index2.php?option=com_heximage&task=config">&gt;&gt; click here &lt;&lt; </a> <br />
		<font size="+1">to enter the admin panel<br />
		<br />
		check the back-end settings and click<br />
		on save settings!!.</font></font></b></font><font size="+1"></code>
        </font></td>
    </tr>
  </table>
  </center>
  <?php
}
?>