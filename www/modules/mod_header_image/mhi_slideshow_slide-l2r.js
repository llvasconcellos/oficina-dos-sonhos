//Presentational Slideshow Script- By Dynamic Drive
//For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
//This credit MUST stay intact for legal use

/***********************************************
* Modified for use in Header Image
* v-1.0: Initial Version
***********************************************/

////NO need to edit beyond here/////////////

var fadearray=new Array() //array to cache slideshow instances
var fadeclear=new Array() //array to cache corresponding clearinterval pointers

var dom=(document.getElementById) //modern dom browsers
var iebrowser=document.all

function slideshow(theimages, slideshow_width, slideshow_height, borderwidth, slideshow_bgcolor, delay, pause, displayorder) {

	this.pausecheck=pause
	this.mouseovercheck=0
	this.delay=delay
	this.curimageindex=0
	this.nextimageindex=1
	
	this.degree=10 //initial opacity degree (10%)
	fadearray[fadearray.length]=this
	this.slideshowid=fadearray.length-1
	this.canvasbase="canvas"+this.slideshowid
	this.curcanvas=this.canvasbase+"_0"

	if (typeof displayorder!="undefined")
			theimages.sort(function() {return 0.5 - Math.random();}) //thanks to Mike (aka Mwinter) :)

	this.theimages=theimages
	this.imageborder=parseInt(borderwidth)
	this.postimages=new Array() //preload images

	for (p=0;p<theimages.length;p++){
		this.postimages[p]=new Image()
		this.postimages[p].src=theimages[p][0]
	}

	var slideshow_width=slideshow_width+this.imageborder*2
	var slideshow_height=slideshow_height+this.imageborder*2
	this.show_width=slideshow_width
	this.show_height=slideshow_height
	this.curpos=parseInt(slideshow_width)*(-1)

	if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
		document.write('<div id="master'+this.slideshowid+'" style="position:relative;width:'+slideshow_width+'px;height:'+slideshow_height+'px;overflow:hidden"><div id="'+this.canvasbase+'_0" style="position:absolute;width:'+slideshow_width+'px;height:'+slideshow_height+'px;background-color:'+slideshow_bgcolor+';left:-'+slideshow_width+'px"></div><div id="'+this.canvasbase+'_1" style="position:absolute;width:'+slideshow_width+'px;height:'+slideshow_height+'px;background-color:'+slideshow_bgcolor+';left:-'+slideshow_width+'px"></div></div>')
	else
		document.write('<div><a href="javascript:rotatelink()"><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'" border="'+this.imageborder+'px" alt="'+this.theimages[0][3]+'"></a></div>')

	if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
		this.startit()
	else
		setInterval("fadearray["+this.slideshowid+"].rotateimage()", this.delay)
}


function movepic(obj) {
	if (obj.curpos<0){
		obj.curpos=Math.min(obj.curpos+obj.degree,0)
		obj.tempobj.style.left=obj.curpos+"px"
	} else {
		clearInterval(fadeclear[obj.slideshowid])
//		obj.nextcanvas=(obj.curcanvas=="canvas_0")? "canvas_0" : "canvas_1"
		obj.nextcanvas=(obj.curcanvas==obj.canvasbase+"_0")? obj.canvasbase+"_0" : obj.canvasbase+"_1"

//		obj.tempobj=iebrowser? eval("document.all."+obj.nextcanvas) : document.getElementById(obj.nextcanvas)
		obj.tempobj=iebrowser? iebrowser[obj.nextcanvas] : document.getElementById(obj.nextcanvas)
	
		var slideimage='<img src="'+obj.postimages[obj.curimageindex].src+'" border="'+obj.imageborder+'px" alt="'+obj.theimages[obj.curimageindex][3]+'">'

		obj.tempobj.innerHTML=(obj.theimages[obj.curimageindex][1]!="")? '<a href="'+obj.theimages[obj.curimageindex][1]+'">'+slideimage+'</a>' : slideimage
		obj.nextimageindex=(obj.nextimageindex<obj.postimages.length-1)? obj.nextimageindex+1 : 0
		setTimeout("fadearray["+obj.slideshowid+"].rotateimage()",obj.delay)
	}
}


slideshow.prototype.rotateimage=function(){
	if (this.pausecheck==1) //if pause onMouseover enabled, cache object
		var cacheobj=this
	if (this.mouseovercheck==1)
		setTimeout(function(){cacheobj.rotateimage()}, 100)
	else if (iebrowser&&dom||dom){
		this.resetit()

		var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
	
		crossobj.style.zIndex++
		fadeclear[this.slideshowid]=setInterval("movepic(fadearray["+this.slideshowid+"])",50)
		this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"

	} else{
		var ns4imgobj=document.images['defaultslide'+this.slideshowid]
		ns4imgobj.src=this.postimages[this.curimageindex].src
	}
	this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
}


slideshow.prototype.rotateimage_old=function() {
	if (iebrowser||dom){
		this.resetit(this.curcanvas)
		var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
		this.crossobj.style.zIndex++
		var temp='setInterval("movepic()",50)'
		dropslide[this.slideshowid]=eval(temp)
		this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"
	} else 
		var ns4imgobj=document.images['defaultslide'+this.slideshowid]
		ns4imgobj.src=this.postimages[this.curimageindex].src
	
	this.linkindex=this.curimageindex
	this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
}


slideshow.prototype.rotatelink=function(picindex) {
	if (this.theimages[picindex][1]!="")
		window.location=this.theimages[picindex][1]
}


slideshow.prototype.populateslide=function(picobj, picindex){
	var slideHTML=""
	if (this.theimages[picindex][1]!="") //if associated link exists for image
		slideHTML='<a href="'+this.theimages[picindex][1]+'" target="'+this.theimages[picindex][2]+'">'
	slideHTML+='<img src="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px" alt="'+this.theimages[picindex][3]+'">'
	if (this.theimages[picindex][1]!="") //if associated link exists for image
		slideHTML+='</a>'
	picobj.innerHTML=slideHTML
}


slideshow.prototype.resetit=function(what) {
	this.curpos=parseInt(this.show_width)*(-1)
	var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)

	crossobj.style.left=this.curpos+"px"
}


slideshow.prototype.startit=function() {
	var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)

	this.populateslide(crossobj, this.curimageindex)

	if (this.pausecheck==1){ //IF SLIDESHOW SHOULD PAUSE ONMOUSEOVER
		var cacheobj=this
		var crossobjcontainer=iebrowser? iebrowser["master"+this.slideshowid] : document.getElementById("master"+this.slideshowid)
		crossobjcontainer.onmouseover=function(){cacheobj.mouseovercheck=1}
		crossobjcontainer.onmouseout=function(){cacheobj.mouseovercheck=0}
	}

	this.rotateimage()
}

