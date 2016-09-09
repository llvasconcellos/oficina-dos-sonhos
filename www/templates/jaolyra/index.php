<?php
/*------------------------------------------------------------------------
# JA Olyra - Jul, 2007
# ------------------------------------------------------------------------
# Copyright (C) 2004-2007 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
-------------------------------------------------------------------------*/
defined( '_JEXEC' ) or die( 'Restricted access' );
defined( 'DS') || define( 'DS', DIRECTORY_SEPARATOR );
include_once (dirname(__FILE__).DS.'ja_vars.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<link href="<?php echo $tmpTools->templateurl();?>/css/template_css.css" rel="stylesheet" type="text/css" />

<?php if ($ja_iconmenu) { ?>
<!--<link href="<?php echo $tmpTools->templateurl();?>/ja_iconmenu/ja-iconmenu.css" rel="stylesheet" type="text/css" />-->
<?php } ?>

<script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl();?>/scripts/ja.script.js"></script>

<?php $tmpTools->genMenuHead(); ?>

<?php //if ( $my->id ) { initEditor(); } ?>

<!--[if lte IE 6]>
<style type="text/css">
.clearfix {	height: 1%;}
</style>
<![endif]-->

<!--[if gte IE 7.0]>
<style type="text/css">
.clearfix {	display: inline-block;}
</style>
<![endif]-->

<script type="text/javascript">
/*<![CDATA[*/
document.write ('<style type="text\/css">.ja-tab-content{display: none;}\n#ja-hpwrap{height:0;overflow:hidden;visibility:hidden;}<\/style>');
/*]]>*/
</script>

<link href="<?php echo $tmpTools->templateurl();?>/css/colors/<?php echo $tmpTools->getParam(JA_TOOL_COLOR); ?>.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" />

</head>
<?
$dir=opendir("C:\\ServidorWEB\\www\\oficinadossonhos\\images\\backgrounds");

$i=0;
while($imgfile=readdir($dir))
{
     if ($imgfile != "." && $imgfile!="..")
         {
        $imgarray[$i]=$imgfile;
        $i++;
        }
}

closedir($dir);

/*$rand=rand(0,count($imgarray)-1);

    if($rand >= 0)
    {
    $fundo = $imgarray[$rand];
    }*/
	
//	die("conteudo=" . file_get_contents("bg.txt"));

$num = intval(file_get_contents("bg.txt"));
$num++;
if($num > (count($imgarray)-1)) $num = 0;
file_put_contents("bg.txt", strval($num));

$fundo = $imgarray[$num];


if (eregi("MSIE 6",getenv("HTTP_USER_AGENT")) ||	eregi("Internet Explorer 6",getenv("HTTP_USER_AGENT"))) {
	?>
		<body id="bd" class="<?php echo $tmpTools->getParam(JA_TOOL_SCREEN)." fs".$tmpTools->getParam(JA_TOOL_FONT);?>" style="background-image:url(images/backgrounds/<?=$fundo?>); background-attachment:fixed">
        <div style="width:100%; height:100%;z-index:10; position:absolute;left:0px;top:0px;">
	<?
}
else {
?>
    <body id="bd" class="<?php echo $tmpTools->getParam(JA_TOOL_SCREEN)." fs".$tmpTools->getParam(JA_TOOL_FONT);?>">
    <img src="images/backgrounds/<?=$fundo?>" width="100%" height="100%" style="position:fixed !important;top:0;left:0;" />
    <div style="width:100%; height:100%;z-index:10; position:absolute;left:0px;top:0px;">
<?
}
?>
<ul class="accessibility">
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-content" title="Skip to content">Skip to content</a></li>
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-col1" title="">Skip to 1st column</a></li>
	<li><a href="<?php echo $tmpTools->getCurrentURL();?>#ja-col2" title="">Skip to 2nd column</a></li>
</ul>

<div id="ja-wrapper" style="border-right:solid 3px #FFFFFF;border-left:solid 3px #FFFFFF;">
<a name="Top" id="Top"></a>

<!-- BEGIN: HEADER -->
<div id="ja-headerwrap" style="margin-bottom:6px; background-image:url(images/cabecalho.jpg); height:225px">
	<div id="ja-header" class="clearfix">
		<table width="100%" border="0">
			<tr>
				<td width="25%" align="center" valign="bottom">
					<!--<img src="images/aecep.jpg" hspace="10" vspace="10" width="150" />-->
				</td>
				<td width="50%" align="center" valign="bottom"><br />
					<object data="images/stories/swfs/logo.swf" type="application/x-shockwave-flash" height="136" width="438">
						<param name="src" value="images/stories/swfs/logo.swf" />
						<param name="wmode" value="transparent" />
						<param name="base" value="/" />
						<param name="name" value="logo.swf" />
					</object>
				</td>
				<td width="25%" align="center" valign="bottom">
					<!--<img src="images/positivo.gif" hspace="10" vspace="10" width="150" />-->
				</td>
			</tr>
		</table>
	</div>
</div>

<!-- END: HEADER -->
<!-- BEGIN: MAIN NAVIGATION -->
<div id="ja-mainnavwrap" class="clearfix" style="margin-bottom:4px; width:100%;">

  <div id="ja-mainnav">
		<?php
			switch ($tmpTools->getParam(JA_TOOL_MENU)) {
	  			case 1: 
	  				$jamenu->genMenu (0);
	  				break;
	  			case 2:
	  				echo "<div class=\"sfmenu-inner\">";
	  					$jamenu->genMenu (0);
	  				echo "</div>";
	  				break;
	  			case 5:
	  				echo "<div class=\"transmenu-inner\">";
	  					$jamenu->genMenu (0);
	  				echo "</div>";
	  				break;
	    		case 6: 
	    			$jamenu->genMenu (0);
	    			break;
	  		}
		?>
	</div>

</div>
<!-- END: MAIN NAVIGATION -->

<?php 
  if ($this->countModules('user1')) {
?>
<!-- BEGIN: TOPSPOTLIGHT -->
<div id="ja-topslwrap" class="clearfix" style="margin-bottom:-6px;">
  <div id="ja-topsl">

    <?php
    $spotlight = array ('user1','user2','user5');
    $topsl = $tmpTools->calSpotlight ($spotlight);
    if( $topsl ) {
    ?>
    <div id="ja-topsl-leftwrap" style="width:100%;">
      <div class="innerpad" style="padding:0px">
        <div id="ja-topsl-head">
          Destaque
        </div>

        <div id="ja-topsl-left">
        <div class="wrap1"><div class="wrap2"><div class="wrap3 clearfix">
			<?php if( $this->countModules('user1') ) {?>
				<jdoc:include type="modules" name="user1" style="xhtml" />
			<?php } ?>
      	</div></div></div>
        </div>
      </div>
    </div>
    <?php } ?>
    

   
    
  </div>
</div>
<!-- END: TOPSPOTLIGHT -->
<?php } ?>
 <jdoc:include type="modules" name="newslight" style="xhtml" />	

<div id="ja-containerwrap">
	<div id="ja-container" class="clearfix">

		<!-- BEGIN: CONTENT -->
		<div id="ja-mainbody<?php echo $divid; ?>">
		<div id="ja-book-tl" class="clearfix"><div id="ja-book-bl" class="clearfix">

  		<div id="ja-contentwrap" class="clearfix">
  			<div id="ja-content">

	  		  <?php if ($tmpTools->isFrontPage()) {?>
					<div id="ja-pathway">
						<jdoc:include type="module" name="breadcrumbs" />
					</div><div class="clr"></div>
					<?php } ?>			

  				<jdoc:include type="component" />
  				<?php if ( $this->countModules('banner') ) { ?>
  				<div id="ja-banner">
  					<jdoc:include type="modules" name="banner" style="raw" />
  				</div>
  				<?php } ?>
  
  			</div>
  		</div>
  		
  		<?php if ($ja_left) { ?>
    		<!-- BEGIN: LEFT COLUMN -->
    		<div id="ja-col1">
    		  <div class="innerpad">
    		  <?php if ($hasSubnav) { ?>
    			<div id="ja-subnav" class="moduletable">
    				<h3><?php global $menuname; echo $menuname; ?></h3>
    				<?php $jamenu->genMenu (1,1);	?>
    			</div>
    			<?php } ?>
    		  
    			<jdoc:include type="modules" name="left" style="xhtml" />
    			</div>
    		</div>
    		<!-- END: LEFT COLUMN -->
  		<?php } ?>
  		
 		</div></div>
		</div>
  	<!-- END: CONTENT -->
  
		<?php if ($ja_right) { ?>
  		<!-- BEGIN: RIGHT COLUMN -->
  		<div id="ja-col2">
  		  <div class="innerpad">
				<jdoc:include type="modules" name="right" style="rounded" />
				</div>
  		</div>
  		<!-- END: RIGHT COLUMN -->
		<?php } ?>
	</div>
</div>

<!-- BEGIN: FOOTER -->
<div id="ja-footerwrap">
	<div id="ja-footer" class="clearfix">
	
	  <small>
			<?php include_once( dirname(__FILE__).DS.'footer.php' ); ?>
		</small>
		
	 <!--<div id="ja-cert">
	 <a href="<?php echo $tmpTools->baseurl(); ?>/index.php?option=com_rss&amp;feed=RSS2.0&amp;no_html=1" target="_blank" title="RSS 2.0" style="text-decoration: none;">
		<img src="<?php echo $tmpTools->templateurl();?>/images/<?php echo $tmpTools->getParam(JA_TOOL_COLOR); ?>/but-rss.gif" alt="RSS 2.0" />
	 </a>
		<?php if ($tmpTools->getParam(JA_TOOL_MENU) != 3 ) { ?>
		<a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo $tmpTools->baseurl();?>" target="_blank" title="Our site is valid CSS" style="text-decoration: none;">
			<img src="<?php echo $tmpTools->templateurl();?>/images/<?php echo $tmpTools->getParam(JA_TOOL_COLOR); ?>/but-css.gif" alt="Our site is valid CSS" />
		</a>
		<?php } ?>
		<a href="http://validator.w3.org/check/referer" target="_blank" title="Our site is valid XHTML 1.0 Transitional" style="text-decoration: none;">
			<img src="<?php echo $tmpTools->templateurl();?>/images/<?php echo $tmpTools->getParam(JA_TOOL_COLOR); ?>/but-xhtml10.gif" alt="Our site is valid XHTML 1.0 Transitional" />
		</a>
	</div>--><div class="clr"></div>

	</div> 
</div>
<!-- END: FOOTER -->
<br />
</div>


<!-- BEGIN: USER TOOLS -->
<script type="text/javascript">
/* <![CDATA[ */
  tool_height = 0;
  tool_done = 1;
  tool_timeoutid = 0;
  change_value = 20;
  tool_change = 0;
  tool_interval = 20;
  var tool_elem;

  function tool_init () {
	  tool_elem = document.getElementById ('ja-usertools');
  }

  function doopen() {
	tool_change = change_value;
	tool_timeoutid = setTimeout ("doanim()", 30);
  }

  function doclose() {
	tool_change = -change_value;
	tool_timeoutid = setTimeout ("doanim()", 30);
  }

  function doanim() {
	if (tool_timeoutid)
	{
		clearTimeout (tool_timeoutid);
	}
	
	tool_height += tool_change;
	tool_done = 0;
	if (tool_change > 0)
	{
		if (tool_height > tool_elem.scrollHeight) {
			tool_height = tool_elem.scrollHeight;
			tool_done = 1;
		}
	} else {
		if (tool_height < 0) {
			tool_height = 0;
			tool_done = 1;
		}
	}
	tool_elem.style.height = tool_height + "px";
	if (!tool_done)
	{
		tool_timeoutid = setTimeout ("doanim()", tool_interval);
		tool_done = 1;
	}
  }

	jaAddEvent (window, 'load', tool_init);
/* ]]> */
</script>

<?php if ($tmpTools->getParam(JA_TOOL_USER)) {
	if ($supported_browsers) {
		echo "<div id=\"jausertoolswrap\" style=\"position: fixed; bottom: 15px; right: 15px;\">";
	} else {
		?>
		<div id="jausertoolswrap" style="position: absolute; top: expression( ( -15 - jausertoolswrap.offsetHeight + ( document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight ) + ( ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ) ) + 'px' ); right: 15px;">
		<?php
	}
?>
		<div style="position:relative;display:block;" onmouseover="doopen()" onmouseout="doclose()">
		<span class="ja-sitetool">[+]</span>
		<div id="ja-usertools">
			<?php $tmpTools->genToolMenu($tmpTools->getParam(JA_TOOL_USER) & 7,'gif'); /*screen tool*/ ?>
		</div>
		</div>
	</div>
<?php } ?>
<!-- END: USER TOOLS -->
</div>
<jdoc:include type="modules" name="debug" style="raw" />
</body>

</html>
