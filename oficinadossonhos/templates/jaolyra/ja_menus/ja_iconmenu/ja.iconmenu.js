var title;
var arr_img;
var timer = 0;

function iconmenu_over(imgid){
	if (imgid)
		curr_img=imgid;
	clearTO();
	timer = setTimeout("showtitle()",100);
}

function clearTO () {
	if (timer) clearTimeout(timer);
	timer = 0;
}

function iconmenu_out(){
	clearTO();
	timer = setTimeout("hidetitle()",100);
}

function showtitle() {
		var imageElem=arr_img[curr_img];
		if (!imageElem) return;
		
		title.innerHTML = imageElem.alt;
		left = Math.floor((icon_small-title.offsetWidth)/2) + icon_small * (curr_img-1) + icon_padding * (2 * curr_img-1);
		title.style.left = left + "px";
}

function hidetitle () {
	title.style.left = "-1000px";
}

function iconmenu_init(){
	var menuicon = document.getElementById ('ja-iconmenu');
	var imgs = menuicon.getElementsByTagName ('IMG');
	arr_img=new Array(imgs.length);

	for(var j=1;j<imgs.length;j++){
		arr_img[j]=imgs[j];
		arr_img[j].idx = j;
		arr_img[j].onmouseover = function () {
			iconmenu_over(this.idx);
		}
		arr_img[j].onmouseout = function () {
			iconmenu_out();
		}
	}
	title=document.getElementById('ja-imageTitle');
	title.onmouseover = function () {
		iconmenu_over(0);
	}
	title.onmouseout = function () {
		iconmenu_out();
	}
	hidetitle ();
	title.style.display = "block";
}

jaAddEvent (window, 'load', iconmenu_init);
