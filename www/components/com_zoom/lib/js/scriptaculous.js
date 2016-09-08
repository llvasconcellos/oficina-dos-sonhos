var Scriptaculous = {
    Version: '1.5_pre4',
    folded: new Array(),
    
    require :
    function(libraryName) {
    // inserting via DOM fails in Safari 2.0, so brute force approach
    document.write('<script type="text/javascript" src="'+libraryName+'"></script>');
    },
    
    slide :
    function(what, siteUrl) {
        var theImage = "";
        if (Scriptaculous.folded[what] == 1) {
          new Effect.SlideDown($(what + 'Body'));
          Scriptaculous.folded[what] = 0;
          theImage = siteUrl + "/components/com_zoom/www/images/blocks/arrow_up_white.png";
        } else {
          new Effect.SlideUp($(what + 'Body'));
          Scriptaculous.folded[what] = 1;
          theImage = siteUrl + "/components/com_zoom/www/images/blocks/arrow_down_white.png";
        }
        MM_swapImage(what + 'Image', '', theImage, 1);
    },
    
    toggleDisplay :
    function(what, siteUrl) {
        var theImage;
        if (Scriptaculous.folded[what] == 1) {
          new Element.show($(what + 'Body'));
          Scriptaculous.folded[what] = 0;
          theImage = "/components/com_zoom/www/images/blocks/arrow_up_white.png";
          MM_swapImage(blockImage, '', theImage, 1);
        } else {
          new Element.hide($(what + 'Body'));
          Scriptaculous.folded[what] = 1;
          theImage = siteUrl + "/components/com_zoom/www/images/blocks/arrow_down_white.png";
        }
        MM_swapImage(what + 'Image', '', theImage, 1);
    },
    
    changeArrow :
    function(what, color, siteUrl) {
        var theImage = "";
        var direction = "";
        if (Scriptaculous.folded[what] == 1) {
            direction = "down";
        } else {
            direction = "up";
        }
        theImage = siteUrl + "/components/com_zoom/www/images/blocks/arrow_" + direction + "_" + color + ".png";
        MM_swapImage(what + 'Image', '', theImage, 1);
    },

    emoticon :
    function(text) {
        var txtarea = document.post.comment;
        text = ' ' + text + ' ';
        if (txtarea.createTextRange && txtarea.caretPos) {
        	var caretPos = txtarea.caretPos;
        	caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? caretPos.text + text + ' ' : caretPos.text + text;
        	txtarea.focus();
        } else {
        	txtarea.value  += text;
        	txtarea.focus();
        }
    },
    
    storeCaret :
    function(textEl) {
        if (textEl.createTextRange) textEl.caretPos = document.selection.createRange().duplicate();
    },
  
    load :
    function() {
        if((typeof Prototype=='undefined') ||
          parseFloat(Prototype.Version.split(".")[0] + "." +
                     Prototype.Version.split(".")[1]) < 1.4)
          throw("script.aculo.us requires the Prototype JavaScript framework >= 1.4.0");
        var scriptTags = document.getElementsByTagName("script");
        for(var i=0;i<scriptTags.length;i++) {
            if(scriptTags[i].src && scriptTags[i].src.match(/scriptaculous\.js$/)) {
                var path = scriptTags[i].src.replace(/scriptaculous\.js$/,'');
                this.require(path + 'util.js');
                this.require(path + 'effects.js');
                this.require(path + 'mm.js');
                this.require(path + 'tjpzoom.js');
                break;
            }
        }
    }
}

Scriptaculous.load();