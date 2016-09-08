<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: docman.html.php,v 1.15 2005/04/18 16:05:33 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_HTML_DOCMAN')) {
    return;
} else {
    define('_DOCMAN_HTML_DOCMAN', 1);
} 

class HTML_DMDocman 
{
    function showCPanel()
    {
        ?><script language="JavaScript" src="<?php echo $mosConfig_live_site;?>/administrator/components/com_docman/includes/js/docmanjavascript.js"></script>
        <table class="adminheading">
            <tr>
                <th><?php echo _DML_CPANEL;
        ?></th>
            </tr>
        </table>

        <table class="adminform">
            <tr>
                <td width="50%" valign="top">
                    <table width="100%" class="cpanel">
                    <tr>
                         <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=files" style="text-decoration:none;">
                            <img src="components/com_docman/images/upload.png" align="middle" alt="files" border="0" />
                            <br />
                         	<?php echo _DML_FILES;?>
                            </a>
                        </td>
                        <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=documents" style="text-decoration:none;">
                            <img src="components/com_docman/images/docs.png" align="middle" alt="documents" border="0" />
                            <br />
                            <?php echo _DML_DOCS;?>
                            </a>
                        </td>
                        <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=categories" style="text-decoration:none;">
                            <img src="images/categories.png" align="middle" alt="categories" border="0" />
                            <br />
                            <?php echo _DML_CATS;?>
                            </a>
                        </td>
                    </tr>
                    <tr>
              
                        <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=groups" style="text-decoration:none;">
                            <img src="images/user.png" align="middle" alt="groups" border="0" />
                            <br />
                            <?php echo _DML_GROUPS;?>
                            </a>
                        </td>
                        <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=licenses" style="text-decoration:none;">
                            <img src="components/com_docman/images/licenses.png" align="middle" alt="licenses" border="0" />
                            <br />
                            <?php echo _DML_LICENSES;?>
                            </a>
                        </td>
                          <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=themes" style="text-decoration:none;">
                            <img src="images/templatemanager.png" align="middle" alt="orphans" border="0" />
                            <br />
                            <?php echo _DML_THEMES;?>
                            </a>
                        </td>
                        
                    </tr>
                    <tr>
                      <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=config" style="text-decoration:none;">
                            <img src="images/config.png" align="middle" alt="configuration" border="0" />
                            <br />
                            <?php echo _DML_CONFIG;?>
                            </a>
                        </td>
                        <td align="center" height="100">
                            <a href="index2.php?option=com_docman&section=updates" style="text-decoration:none;">
                            <img src="components/com_docman/images/updates.png" align="middle" alt="updates" border="0" />
                            <br />
                            <?php echo _DML_UPDATES;?>
                            </a>
                        </td>
                        <td align="center" height="100">
                            <a href="index2.php?option=com_docman&task=stats" style="text-decoration:none;">
                            <img src="images/searchtext.png" align="middle" alt="statistics" border="0" />
                            <br />
                            <?php echo _DML_STATS;?>
                            </a>
                        </td>
                    </tr>
                    </table>
                </td>
                <td width="50%" valign="top">
                    <div style="width=100%;">
                        <form action="index2.php" method="post" name="adminForm">
                            <?php mosLoadAdminModules('dmcpanel', 1);?>
                            <input type="hidden" name="sectionid" value="" />
                            <input type="hidden" id="cid" name="cid[]" value="" />
                            <input type="hidden" name="option" value="com_docman" />
                            <input type="hidden" name="task" value="" />
                        </form>
                    </div>
                </td>
            </tr>
        </table>
        <?php include_once("../components/com_docman/footer.php");
    } 

    function showStatistics(&$row)
    {
        ?>
        <table class="adminheading">
            <tr>
                <th><?php echo _DML_DOCSTATS;?></th>
            </tr>
        </table>
        <br />
        <table class="adminlist" width="98%" cellspacing="2" cellpadding="2" border="0" align="center">
            <tr>
                <td width="15%" align="center"><?php echo _DML_RANK;?></td>
                <td width="60%"><?php echo _DML_TITLE;?></td>
                <td width="25%" align="center"><?php echo _DML_DOWNLOADS;?></td>
            </tr>
		<?php
        $enum = 1;
        $color = 0;
        foreach($row as $rows) {

            ?>
				<tr class="row<?php echo $color;?>">
					<td width="15%" align="center"><?php echo $enum;?></td>
					 <td width="60%"><?php echo $rows->dmname;?></td>
					 <td width="25%" align="center"><b><?php echo $rows->dmcounter;?></b></td>
				</tr>
				<?php
            if (!$color) {
                $color = 1;
            } else {
                $color = 0;
            } 
            $enum++;
        } 

        ?>
		</table>
		<?php
    } 

    function showCredits()
    {
        global $_DOCMAN;

        ?>
        <table width="100%">
        <tr valign="top">
            <td align="center">
                <img border="0" alt="Docman logo" src="components/com_docman/images/logo.jpg" />
            </td>
        </tr>
    </table>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#FFFFFF"> 
            	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
            	<tr>
            	<td align="center"><h1>DOCMan - the Mambo document manager</h2>version <?php echo $_DOCMAN->getCfg('docman_version');?><br /><br /><i>"Purity must be achieved<br />by an indivisible unity of method and wisdom".</i><br /><b><i>Dalai Lama</i></b><br /><br />
           		</tr>
           		</table>
           	</td>
       	</tr>
    	</table>
    	<table>
    	<tr>
    	<td>
      	<div style="width: 300px; background-color: #EEE; padding: 10px;">
          	<div align="center"><b>The DOCMan development team members are:</b><br /><br />
           	<script language="JavaScript1.2">
        
        /*
        Fading Scroller- By DynamicDrive.com
        For full source code, and usage terms, visit http://www.dynamicdrive.com
        This notice MUST stay intact for use
        */
        
        var delay=1000 //set delay between message change (in miliseconds)
        var fcontent=new Array()
        begintag='' //set opening tag, such as font declarations
        fcontent[0]="<h3>Vasco Nunes<br /></h3>DOCMan Project Leader";
        fcontent[1]="<h3>Johan Janssens, aka Mr. Jinx<br /></h3>DOCMan Project Manager";
        fcontent[2]="<h3>Charles Gentry<br /></h3>DOCMan Lead Developer";
        fcontent[3]="<h3>Alex Kempkens<br /></h3>DOCMan developer";
        fcontent[4]="<h3>Timothy Beutels<br /></h3>DOCMan developer";
        fcontent[5]="<h3>Ilias Chronas<br /></h3>DOCMan developer";
        fcontent[6]="<h3>Paulo Bruckmann, aka Peek<br /></h3>DOCMan Graphic designer";
        fcontent[7]="<h3>Shayne Bartlett<br /></h3>DOCMan doc writer";
        fcontent[8]="<h3>Contributors<br /></h3>Ben Jones, David McKinnis";
        closetag=''
        
        var fwidth='250px' //set scroller width
        var fheight='50px' //set scroller height
        
        var fadescheme=0 //set 0 to fade text color from (white to black), 1 for (black to white)
        var fadelinks=1 //should links inside scroller content also fade like text? 0 for no, 1 for yes.
        
        ///No need to edit below this line/////////////////
        
        var hex=(fadescheme==0)? 255 : 0
        var startcolor=(fadescheme==0)? "rgb(255,255,255)" : "rgb(0,0,0)"
        var endcolor=(fadescheme==0)? "rgb(0,0,0)" : "rgb(255,255,255)"
        
        var ie4=document.all&&!document.getElementById
        var ns4=document.layers
        var DOM2=document.getElementById
        var faderdelay=0
        var index=0
        
        if (DOM2)
        faderdelay=2000
        
        //function to change content
        function changecontent(){
            if (index>=fcontent.length)
                index=0
                if (DOM2){
                    document.getElementById("fscroller").style.color=startcolor
                    document.getElementById("fscroller").innerHTML=begintag+fcontent[index]+closetag
                    linksobj=document.getElementById("fscroller").getElementsByTagName("A")
                    if (fadelinks)
                        linkcolorchange(linksobj)
                        colorfade()
                    } else if (ie4)
                        document.all.fscroller.innerHTML=begintag+fcontent[index]+closetag
                    else if (ns4){
                    document.fscrollerns.document.fscrollerns_sub.document.write(begintag+fcontent[index]+closetag)
                    document.fscrollerns.document.fscrollerns_sub.document.close()
                }
            index++
            setTimeout("changecontent()",delay+faderdelay)
        }
        
        // colorfade() partially by Marcio Galli for Netscape Communications.  ////////////
        // Modified by Dynamicdrive.com
        
        frame=20;
        
        function linkcolorchange(obj){
            if (obj.length>0){
                for (i=0;i<obj.length;i++)
                    obj[i].style.color="rgb("+hex+","+hex+","+hex+")"
                }
            }
        
        function colorfade() {
        // 20 frames fading process
        if(frame>0) {
            hex=(fadescheme==0)? hex-12 : hex+12 // increase or decrease color value depd on fadescheme
            document.getElementById("fscroller").style.color="rgb("+hex+","+hex+","+hex+")"; // Set color value.
            if (fadelinks)
                linkcolorchange(linksobj)
                frame--;
                setTimeout("colorfade()",20);
            } else {
                document.getElementById("fscroller").style.color=endcolor;
                frame=20;
                hex=(fadescheme==0)? 255 : 0
            }
        }
        
        if (ie4||DOM2)
            document.write('<div id="fscroller" style="border:0px solid black;width:'+fwidth+';height:'+fheight+';padding:2px"></div>')
            window.onload=changecontent
        </script>
        <ilayer id="fscrollerns" width=&{fwidth}; height=&{fheight};>
           	<layer id="fscrollerns_sub" width=&{fwidth}; height=&{fheight}; left=0 top=0></layer>
        </ilayer>
        </div>
        </td>
        </tr>
        </table>
        
        <table class="adminform">
		<tr>
			<th>
			Application
			</th>
			<th>
			URL
			</th>
			<th>
			Version
			</th>
			<th>
			License
			</th>
		</tr>
		<tr>
			<td>
			Savant2
			</td>
			<td>
			<a href="http://www.phpsavant.com" target="_blank">
			http://www.phpsavant.com
			</a>
			</td>
			<td>
			2.3.2
			</td>
			<td>
			<a href="http://www.gnu.org/copyleft/lesser.html" target="_blank">
			LGPL
			</a>
			</td>
		</tr>
		<tr>
			<td>
			PEAR HTML Package
			</td>
			<td>
			<a href="http://pear.php.net" target="_blank">
			http://pear.php.net
			</a>
			</td>
			<td>
			1.1
			</td>
			<td>
			<a href="http://www.php.net/license/2_02.txt" target="_blank">
			PHP License
			</a>
			</td>
		</tr>
		
		</table>
      <?php
    } 
} 

?>
