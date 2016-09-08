function initTheme()
{
	 addPopupBehavior();
}

function addPopupBehavior()
{
	var x = document.getElementsByTagName('a');
	for (var i=0;i<x.length;i++)
	{
		if (x[i].getAttribute('type') == 'popup')
		{
			x[i].onclick = function () {
				return popupWindow(this.href)
			}
			x[i].title += ' (Popup)';
		}
	}
}

/* -------------------------------------------- */
/* -- utility functions ----------------------- */
/* -------------------------------------------- */

function popupWindow(href)
{
	newwindow = window.open(href,'DOCMan Popup','height=600,width=800');
	return false;
}

/* -------------------------------------------- */
/* -- page loader ----------------------------- */
/* -------------------------------------------- */

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}

addLoadEvent(function() {
  initTheme();
});
