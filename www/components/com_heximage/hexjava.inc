<script language="javascript" src="<?php echo $mosConfig_live_site;?>/components/com_heximage/hexviewer.js"></script>
<script language="JavaScript"> 
function openDir( form ) { 
	var newIndex = form.fieldname.selectedIndex; 
	if ( newIndex == 0 ) { 
		alert( "Maak eerst een keuze!" ); 
	} else { 
		cururl = form.fieldname.options[ newIndex ].value; 
		window.location.assign( cururl ); 
	} 
} 
</script>


<SCRIPT LANGUAGE="JScript">
  var oPopup = window.createPopup();
  function ButtonClick(x,w,h)
  {
    var oPopBody = oPopup.document.body;
    oPopBody.style.backgroundColor = "black";
    oPopBody.style.border = "solid white 1px";
    oPopBody.innerHTML = x;
    oPopup.show(1, 0, w, h, document.body);
  	}
 </SCRIPT>

