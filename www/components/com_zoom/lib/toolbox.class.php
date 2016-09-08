<?php
//zOOm Media Gallery//
/**
-----------------------------------------------------------------------
|  zOOm Media Gallery! by Mike de Boer - a multi-gallery component    |
-----------------------------------------------------------------------

-----------------------------------------------------------------------
|                                                                     |
| Date: December, 2005                                                |
| Author: Mike de Boer, <http://www.mikedeboer.nl>                    |
| Copyright: copyright (C) 2004 by Mike de Boer                       |
| Description: zOOm Media Gallery, a multi-gallery component for      |
|              Joomla!. It's the most feature-rich gallery component  |
|              for Joomla!! For documentation and a detailed list     |
|              of features, check the zOOm homepage:                  |
|              http://www.zoomfactory.org                             |
| License: GPL                                                        |
| Filename: toolbox.class.php                                         |
| Version: 2.5                                                        |
|                                                                     |
-----------------------------------------------------------------------
* @package zOOmGallery
* @author Mike de Boer <mailme@mikedeboer.nl> 
**/
// MOS Intruder Alerts
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
 *  -----------------------------------------------------------------------
 * |                                                                     |
 * | What is the toolbox? --> well, it's an object that bundles all      |
 * | medium-manipulation tools into one convenient class.                |
 * | These tools would include:                                          |
 * |                                                                     |
 * | - Image resizing                                                    |
 * | - Image rotating                                                    |
 * | - Image watermarking with custom TrueType fonts                     |
 * | - Image EXIF data processing (reading AND writing)                  |
 * | - Parse Directories for media types                                 |
 * | - PDF/ documents searching                                          |
 * | - Video JPEG capturing                                              |
 * | - MP3 id3 tag processing                                            |
 * | - Streaming video file metadata processing                          |
 * | - ALL image manipulation tools have implementations for the         |
 * |   following software: ImageMagick, NetPBM, GD1.x and GD2.x.         |
 * |                                                                     |
 * -----------------------------------------------------------------------
 * @access public
 */
class toolbox extends zoom {
    /**
     * @var int
     * @access private
    */
    var $_conversiontype = null;
	/**
     * @var string
     * @access private
     */
	var $_IM_path = null;
	/**
     * @var string
     * @access private
     */
	var $_NETPBM_path = null;
	/**
     * @var string
     * @access private
     */
	var $_FFMPEG_path = null;
	/**
	 * @var int
	 * @access private
	 */
	var $_JPEG_quality = null;
	/**
     * @var string
     * @access private
     */
	var $_PDF_path = null;
	/**
     * @var boolean
     * @access private
     */
	var $_use_FFMPEG = null;
	/**
     * @var boolean
     * @access private
     */
	var $_use_PDF = null;
	/**
     * @var int
     * @access private
     */
    var $_err_num = null;
    /**
     * @var array
     * @access private
     */
    var $_err_names = array();
    /**
     * @var array
     * @access private
     */
    var $_err_types = array();
    /**
     * @var string
     * @access private
     */
	var $_wmtext = null;
	/**
     * @var string
     * @access private
     */
	var $_wmdatfmt = null;
	/**
     * @var string
     * @access private
     */
	var $_wmfont = null;
	/**
     * @var int
     * @access private
     */
	var $_wmfont_size = null;/**
	/**
     * @var string
     * @access private
     */
	var $_wmrgbtext = null;
	/**
     * @var string
     * @access private
     */
	var $_wmrgbtsdw = null;
	/**
     * @var int
     * @access private
     */
	var $_wmhotspot = null;
	/**
     * @var int
     * @access private
     */
	var $_wmtxp = null;
	/**
     * @var int
     * @access private
     */
	var $_wmtyp = null;
	/**
     * @var int
     * @access private
     */
	var $_wmsxp = null;
	/**
     * @var int
     * @access private
     */
	var $_wmsyp = null;
    /**
     * @var byte
     * @access private
     */
    var $_buffer = null;
	
	/**
	 * Toolbox object constructor.
	 *
	 * @return toolbox
	 * @access public
	 */
	function toolbox() {
		// constructor of the toolbox - primary init...
		global $mosConfig_absolute_path, $zoom;
		$this->_conversiontype = $zoom->_CONFIG['conversiontype'];
		$this->_IM_path = $zoom->_CONFIG['IM_path'];
		$this->_NETPBM_path = $zoom->_CONFIG['NETPBM_path'];
		$this->_FFMPEG_path = $zoom->_CONFIG['FFMPEG_path'];
		$this->_PDF_path = $zoom->_CONFIG['PDF_path'];
		$this->_JPEG_quality = $zoom->_CONFIG['JPEGquality'];
		// load watermark settings...
		if (!isset($zoom->_CONFIG['wmtext']))
			$this->_wmtext = "[date]";
		if (!isset($zoom->_CONFIG['wmfont']))
			$this->_wmfont = "ARIAL.TTF";
		if (!isset($zoom->_CONFIG['wmfont_size']))
			$this->_wmfont_size = 12;
		if (!isset($zoom->_CONFIG['wmrgbtext']))
			$this->_wmrgbtext = "FFFFFF";
		// truetype font shadow color in hex format...
		if (!isset($zoom->_CONFIG['wmrgbtsdw']))
			$this->_wmrgbtsdw = "000000";
		if (!isset($zoom->_CONFIG['wmhotspot']))
			$this->_wmhotspot = 8;
		$this->_wmdatfmt = "Y-m-d";
		// watermark offset coordinates...t = top and s = side.
		$this->_wmtxp = 0;
		$this->_wmtyp = 0;
		$this->_wmsxp = 1;
		$this->_wmsyp = 1;
		if($this->_FFMPEG_path == 'auto'){
			$this->_FFMPEG_path = '';
		}else{
			if($this->_FFMPEG_path){
				if(is_dir($this->_FFMPEG_path)){
					$this->_use_FFMPEG = true;
				}else{
					$this->_use_FFMPEG = false;
				}
			}
		}
		if($this->_PDF_path == 'auto'){
			$this->_PDF_path = '';
		}else{
			if($this->_PDF_path){
				if(is_dir($this->_PDF_path)){
					$this->_use_PDF = true;
				}else{
					$this->_use_PDF = false;
				}
			}
		}
		if ($zoom->privileges->hasPrivileges()) {
			switch ($this->_conversiontype){
				//Imagemagick
				case 1:
					if($this->_IM_path == 'auto'){
						$this->_IM_path = '';
					}else{
						if($this->_IM_path){
							if(!is_dir($this->_IM_path)){
									echo "<div align=\"center\"><font color=\"red\">Error: your ImageMagick path is not correct! Please (re)specify it in the Admin-system under 'Settings'</font><br />";
								}
						}
					}
					break;
				//NetPBM
				case 2:
					if($this->_NETPBM_path == 'auto'){
						$this->_NETPBM_path ='';
					}else{
						if($this->_NETPBM_path){
							if(!is_dir($this->_NETPBM_path)){
									echo "<div align=\"center\"><font color=\"red\">Error: your NetPBM path is not correct! Please (re)specify it in the Admin-system under 'Settings'</font><br /></div>";
								}
						}
					}
					break;
				//GD1
				case 3:
					if (!function_exists('imagecreatefromjpeg')) {
					    echo "<div align=\"center\"><font color=\"red\">PHP running on your server does not support the GD image library, check with your webhost if ImageMagick is installed</font><br /></div>";
					}
					break;
				//GD2
				case 4:
					if (!function_exists('imagecreatefromjpeg')) {
					    echo "<div align=\"center\"><font color=\"red\">Error: PHP running on your server does not support the GD image library, check with your webhost if ImageMagick is installed</font><br /></div>";
					}
					if (!function_exists('imagecreatetruecolor')) {
					    echo "<div align=\"center\"><font color=\"red\">Error: PHP running on your server does not support GD version 2.x, please switch to GD version 1.x on the config page</font><br /></div>";
					}
					break;
			}
		}
		$this->_err_num = 0;
		// toolbox ready for use...
	}
    /**
     * Make a newly uploaded medium ready for use in the gallery.
     *
     * @param string $image
     * @param string $filename
     * @param string $keywords
     * @param string $name
     * @param string $descr
     * @param int $rotate
     * @param int $degrees
     * @param int $copyMethod
     * @return boolean
     * @access public
     */
    function processImage($image, $filename, $keywords, $name, $descr, $rotate, $degrees = 0, $ignoresizes = 0) {
		global $mosConfig_absolute_path, $zoom;
		// reset script execution time limit (as set in MAX_EXECUTION_TIME ini directive)...
		// requires SAFE MODE to be OFF!
		if (ini_get('safe_mode') != 1 ) {
			set_time_limit(0);
		}
		$imagepath = $zoom->_CONFIG['imagepath'];
		$catdir = $zoom->_gallery->getDir();
		// the getimagesize() function appears to have problems with file extensions in uppercase,
		// so make them lowercase by default to avoid problems.
		$filename = strtolower(urldecode($filename));
        // replace every space-character with a single "_"
	    $filename = ereg_replace(" ", "_", $filename);
     	// Get rid of extra underscores
     	$filename = ereg_replace("_+", "_", $filename);
     	$filename = ereg_replace("(^_|_$)", "", $filename);
		$zoom->checkDuplicate($filename, 'filename');
		$filename = $zoom->_tempname;
        // replace space-characters in combination with a comma with 'air'...or nothing!
        $keywords = $zoom->cleanString($keywords);
        $name = $zoom->cleanString($name);
        $descr = $zoom->cleanString($descr);
        if (empty($name)) {
        	$name = $zoom->_CONFIG['tempName'];
        }
		$imgobj = new image(0); //create a new image object with a foo imgid
		$imgobj->setImgInfo($filename, $name, $keywords, $descr, $zoom->_gallery->_id, $zoom->_CurrUID, 1, 1);
		unset($filename, $name, $keywords, $descr); //clear memory, just in case...
        if ($zoom->acceptableFormat($imgobj->_type)) {
            // File is an image/ movie/ document...
            $file = "$mosConfig_absolute_path/$imagepath$catdir/".$imgobj->_filename;
            $desfile = "$mosConfig_absolute_path/$imagepath$catdir/thumbs/".$imgobj->_filename;
            if (is_uploaded_file($image)) {
            	if (!move_uploaded_file("$image", $file)) {
            		// some error occured while moving file, register this...
            	    $this->_err_num++;
            	    $this->_err_names[$this->_err_num] = $imgobj->_filename;
            	    $this->_err_types[$this->_err_num] = _ZOOM_ALERT_MOVEFAILURE;
            	    return false;
            	}
            } elseif (!$zoom->platform->copy("$image", $file)) {
                // some error occured while moving file, register this...
                $this->_err_num++;
                $this->_err_names[$this->_err_num] = $imgobj->_filename;
                $this->_err_types[$this->_err_num] = _ZOOM_ALERT_MOVEFAILURE;
                return false;
            }
            @chmod($file, 0755);
            if ($zoom->isImage($imgobj->_type)) {
                $imgobj->_size = getimagesize($file);
                // get image EXIF & IPTC data from file to save it in viewsize image and get a thumbnail...
                if ($zoom->_CONFIG['readEXIF'] && ($imgobj->_type === "jpg" || $imgobj->_type === "jpeg")){
                    // Retreive the EXIF, XMP and Photoshop IRB information from
                    // the existing file, so that it can be updated later on...
                    $jpeg_header_data = get_jpeg_header_data($file);
                    $EXIF_data = get_EXIF_JPEG($file);
                    $XMP_data = read_XMP_array_from_text( get_XMP_text( $jpeg_header_data ) );
                    $IRB_data = get_Photoshop_IRB( $jpeg_header_data );
                    $new_ps_file_info = get_photoshop_file_info($EXIF_data, $XMP_data, $IRB_data);
                    // Check if there is a default for the date defined
                    if ((!array_key_exists('date', $new_ps_file_info)) || ((array_key_exists('date', $new_ps_file_info)) && ($new_ps_file_info['date'] == ''))) {
                    	// No default for the date defined
                    	// figure out a default from the file
                    	// Check if there is a EXIF Tag 36867 "Date and Time of Original"
                    	if (($EXIF_data != FALSE) && (array_key_exists(0, $EXIF_data)) && (array_key_exists(34665, $EXIF_data[0])) && (array_key_exists(0, $EXIF_data[0][34665])) && (array_key_exists(36867, $EXIF_data[0][34665][0]))) {
                        	// Tag "Date and Time of Original" found - use it for the default date
                        	$new_ps_file_info['date'] = $EXIF_data[0][34665][0][36867]['Data'][0];
                        	$new_ps_file_info['date'] = preg_replace( "/(\d\d\d\d):(\d\d):(\d\d)( \d\d:\d\d:\d\d)/", "$1-$2-$3", $new_ps_file_info['date'] );
                        } elseif (($EXIF_data != FALSE) && (array_key_exists(0, $EXIF_data)) && (array_key_exists(34665, $EXIF_data[0])) && (array_key_exists(0, $EXIF_data[0][34665])) && (array_key_exists(36868, $EXIF_data[0][34665][0]))) {
                            // Check if there is a EXIF Tag 36868 "Date and Time when Digitized"
                        	// Tag "Date and Time when Digitized" found - use it for the default date
                        	$new_ps_file_info['date'] = $EXIF_data[0][34665][0][36868]['Data'][0];
                        	$new_ps_file_info['date'] = preg_replace( "/(\d\d\d\d):(\d\d):(\d\d)( \d\d:\d\d:\d\d)/", "$1-$2-$3", $new_ps_file_info['date'] );
                        } else if ( ( $EXIF_data != FALSE ) && (array_key_exists(0, $EXIF_data)) && (array_key_exists(306, $EXIF_data[0]))) {
                            // Check if there is a EXIF Tag 306 "Date and Time"
                        	// Tag "Date and Time" found - use it for the default date
                        	$new_ps_file_info['date'] = $EXIF_data[0][306]['Data'][0];
                        	$new_ps_file_info['date'] = preg_replace( "/(\d\d\d\d):(\d\d):(\d\d)( \d\d:\d\d:\d\d)/", "$1-$2-$3", $new_ps_file_info['date'] );
                        } else {
                        	// Couldn't find an EXIF date in the image
                        	// Set default date as creation date of file
                        	$new_ps_file_info['date'] = date ("Y-m-d", filectime( $file ));
                        }
                    }
                }
                // First, rotate the image (if that's mentioned in the 'job description')...
                if ($rotate) {
                   if (!$this->rotateImage($file, $file, $degrees, $imgobj)) {
                       $this->_err_num++;
                       $this->_err_names[$this->_err_num] = $imgobj->_filename;
                       $this->_err_types[$this->_err_num] = "Error rotating image";
                       return false;
                   }
                }
                // if the image size is greater than the given maximum: resize it!
                if (($imgobj->_size[0] > $zoom->_CONFIG['maxsize'] || $imgobj->_size[1] > $zoom->_CONFIG['maxsize']) && !$ignoresizes) {
                    $viewsize = $mosConfig_absolute_path."/".$imagepath.$catdir."/viewsize/".$imgobj->_filename;
                    if ($this->resizeImage($file, $viewsize, $zoom->_CONFIG['maxsize'], $imgobj)) {
                    	if ($zoom->_CONFIG['readEXIF'] && ($imgobj->_type === "jpg" || $imgobj->_type = "jpeg") && $this->_conversiontype == 4){
                    		// put the EXIF info back in the resized file...
                    		// Update the JPEG header information with the new Photoshop File Info
                    		// NOTE: this only seems to work with GD2.x. Why? I don't know ;-)
                        	$jpeg_header_data = put_photoshop_file_info( $jpeg_header_data, $new_ps_file_info, $EXIF_data, $XMP_data, $IRB_data );
                        	if (put_jpeg_header_data( $file, $viewsize, $jpeg_header_data ) == false) {
                        		$this->_err_num++;
                                $this->_err_names[$this->_err_num] = $imgobj->_filename;
                                $this->_err_types[$this->_err_num] = _ZOOM_ALERT_IMGERROR;
                                return false;
                        	}
                    	}
                    } else {
                        $this->_err_num++;
                        $this->_err_names[$this->_err_num] = $imgobj->_filename;
                        $this->_err_types[$this->_err_num] = _ZOOM_ALERT_IMGERROR;
                        return false;
                    }
                }
                // resize to thumbnail...
                // JPEG files often carry pre-made thumbnails in them, so we'll use that one
                // if it exists at all (a better check has to be implemented yet).
                if ($zoom->_CONFIG['readEXIF'] && ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") && count($EXIF_data) >= 2 && is_array($EXIF_data[1][513]) && !empty($EXIF_data[1][513]['Data'])) {
                	if (!$zoom->writefile($desfile, $EXIF_data[1][513]['Data'])) {
                        $this->_err_num++;
                        $this->_err_names[$this->_err_num] = $imgobj->_filename;
                        $this->_err_types[$this->_err_num] = _ZOOM_ALERT_IMGERROR;
                        return false;
                	}
                } elseif (!$this->resizeImage($file, $desfile, $zoom->_CONFIG['size'], $imgobj)) {
                   $this->_err_num++;
                   $this->_err_names[$this->_err_num] = $imgobj->_filename;
                   $this->_err_types[$this->_err_num] = _ZOOM_ALERT_IMGERROR;
                   return false;
                }
            } elseif($zoom->isDocument($imgobj->_type)) {
               if ($zoom->isIndexable($imgobj->_type) && $this->_use_PDF) {
                	if (!$this->indexDocument($file, $imgobj->_filename)) {
                	   $this->_err_num++;
                       $this->_err_names[$this->_err_num] = $imgobj->_filename;
                       $this->_err_types[$this->_err_num] = _ZOOM_ALERT_INDEXERROR;
                       return false;
                	}
               }
            } elseif($zoom->isMovie($imgobj->_type)) {
               //if movie is 'thumbnailable' -> make a thumbnail then!
               if ($zoom->isThumbnailable($imgobj->_type) && $this->_use_FFMPEG) {
                   if (!$this->createMovieThumb($file, $zoom->_CONFIG['size'], $imgobj->_filename)) {
                       $this->_err_num++;
                       $this->_err_names[$this->_err_num] = $imgobj->_filename;
                       $this->_err_types[$this->_err_num] = _ZOOM_ALERT_IMGERROR;
                       return false;
                   }
               }
            } elseif($zoom->isAudio($imgobj->_type)) {
            		// TODO: indexing audio files (mp3-files, etc.) properties, e.g. id3vX tags...
            }
            if (!$imgobj->save()) {
            	$this->_err_num++;
            	$this->_err_names[$this->_err_num] = $imgobj->_filename;
            	$this->_err_types[$this->_err_num] = "Database failure";
            }
        } else {
            //Not the right format, register this...
            $this->_err_num++;
            $this->_err_names[$this->_err_num] = $imgobj->_filename;
            $this->_err_types[$this->_err_num] = _ZOOM_ALERT_WRONGFORMAT_MULT;
            return false;
        }
        return true;
    }
	/**
	 * Resize an image to a prefered size.
	 *
	 * @param string $file
	 * @param string $desfile
	 * @param int $size
	 * @param image $imgobj
	 * @return boolean
	 * @access public
	 */
	function resizeImage($file, $desfile, $size, $imgobj) {
		switch ($this->_conversiontype){
			//Imagemagick
			case 1:
				if($this->_resizeImageIM($file, $desfile, $size))
					return true;
				else
					return false;
				break;
			//NetPBM
			case 2:
				if($this->_resizeImageNETPBM($file, $desfile, $size, $imgobj))
					return true;
				else
					return false;
				break;
			//GD1
			case 3:
				if($this->_resizeImageGD1($file, $desfile, $size, $imgobj))
					return true;
				else
					return false;
				break;
			//GD2
			case 4:
				if($this->_resizeImageGD2($file, $desfile, $size, $imgobj))
					return true;
				else
					return false;
				break;
		}
		return true;
	}
	/**
	 * Resize an image to a prefered size using the ImageMagick library.
	 *
	 * @param string $src_file
	 * @param string $dest_file
	 * @param int $new_size
	 * @return boolean
	 * @access private
	 */
	function _resizeImageIM($src_file, $dest_file, $new_size) {
		$cmd = $this->_IM_path."convert -resize $new_size \"$src_file\" \"$dest_file\"";
		exec($cmd, $output, $retval);
		if($retval) {
			return false;
		} else {
			return true;
		}
	}
	/**
	 * Resize an image to a prefered size using the NetPBM library.
	 *
	 * @param string $src_file
	 * @param string $des_file
	 * @param int $new_size
	 * @param image $imgobj
	 * @return boolean
	 * @access private
	 */
	function _resizeImageNETPBM($src_file, $des_file, $new_size, $imgobj) {
		if ($imgobj->_size == null) {
			return false;
		}
		// height/width
		$ratio = max($imgobj->_size[0], $imgobj->_size[1]) / $new_size;
		$ratio = max($ratio, 1.0);
		$destWidth = (int)($imgobj->_size[0] / $ratio);
		$destHeight = (int)($imgobj->_size[1] / $ratio);
		if (eregi("\.png", $imgobj->_filename)) {
			$cmd = $this->_NETPBM_path . "pngtopnm $src_file | " . $this->_NETPBM_path . "pnmscale -xysize $destWidth $destHeight | " . $this->_NETPBM_path . "pnmtopng > $des_file" ; 
		} elseif (eregi("\.(jpg|jpeg)", $imgobj->_filename)) {
			$cmd = $this->_NETPBM_path . "jpegtopnm $src_file | " . $this->_NETPBM_path . "pnmscale -xysize $destWidth $destHeight | " . $this->_NETPBM_path . "ppmtojpeg -quality=" . $this->_JPEG_quality . " > $des_file" ;
		} elseif (eregi("\.gif", $imgobj->_filename)) {
			$cmd = $this->_NETPBM_path . "giftopnm $src_file | " . $this->_NETPBM_path . "pnmscale -xysize $destWidth $destHeight | " . $this->_NETPBM_path . "ppmquant 256 | " . $this->_NETPBM_path . "ppmtogif > $des_file" ; 
		} else {
			return false;
		}
		exec($cmd, $output, $retval);
		if ($retval) {
			return false;
		} else {
			return true;
		}
	}
	/**
	 * Resize an image to a prefered size using the GD1 library.
	 *
	 * @param string $src_file
	 * @param string $dest_file
	 * @param int $new_size
	 * @param image $imgobj
	 * @return boolean
	 * @access private
	 */
	function _resizeImageGD1($src_file, $dest_file, $new_size, $imgobj) {
		if ($imgobj->_size == null) {
			return false;
		}
		// GD1 can only handle JPG & PNG images
		if ($imgobj->_type !== "jpg" && $imgobj->_type !== "jpeg" && $imgobj->_type !== "png") {
			return false;
		}
		// height/width
		$ratio = max($imgobj->_size[0], $imgobj->_size[1]) / $new_size;
		$ratio = max($ratio, 1.0);
		$destWidth = (int)($imgobj->_size[0] / $ratio);
		$destHeight = (int)($imgobj->_size[1] / $ratio);
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			$src_img = imagecreatefromjpeg($src_file);
		} else {
			$src_img = imagecreatefrompng($src_file);
		}
		if (!$src_img) {
			return false;
		}
		$dst_img = imagecreate($destWidth, $destHeight);
		imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $destWidth, (int)$destHeight, $imgobj->_size[0], $imgobj->_size[1]);
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			imagejpeg($dst_img, $dest_file, $this->_JPEG_quality);
		} else {
			imagepng($dst_img, $dest_file);
		}
		imagedestroy($src_img);
		imagedestroy($dst_img);
		return true; 
	}
	/**
	 * Resize an image to a prefered size using the GD2 library.
	 *
	 * @param string $src_file
	 * @param string $dest_file
	 * @param int $new_size
	 * @param image $imgobj
	 * @return boolean
	 * @access private
	 */
	function _resizeImageGD2($src_file, $dest_file, $new_size, $imgobj) {
		if ($imgobj->_size == null) {
			return false;
		}
		// GD can only handle JPG & PNG images
		if ($imgobj->_type !== "jpg" && $imgobj->_type !== "jpeg" && $imgobj->_type !== "png") {
			return false;
		}
		
		// height/width
		$ratio = max($imgobj->_size[0], $imgobj->_size[1]) / $new_size;
		$ratio = max($ratio, 1.0);
		$destWidth = (int)($imgobj->_size[0] / $ratio);
		$destHeight = (int)($imgobj->_size[1] / $ratio);
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			$src_img = imagecreatefromjpeg($src_file);
		} else {
			$src_img = imagecreatefrompng($src_file);
		}
		if (!$src_img) {
			return false;
		}
		$dst_img = imagecreatetruecolor($destWidth, $destHeight);
		imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $destWidth, $destHeight, $imgobj->_size[0], $imgobj->_size[1]);
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			imagejpeg($dst_img, $dest_file, $this->_JPEG_quality);
		} else {
			imagepng($dst_img, $dest_file);
		}
		imagedestroy($src_img);
		imagedestroy($dst_img);
		return true;
	}
	/**
	 * Rotate an image with the prefered number of degrees.
	 *
	 * @param string $file
	 * @param string $desfile
	 * @param int $degrees
	 * @param image $imgobj
	 * @return boolean
	 * @access public
	 */
	function rotateImage($file, $desfile, $degrees, $imgobj) {
		$degrees = intval($degrees);
		switch ($this->_conversiontype){
			//Imagemagick
			case 1:
				if($this->_rotateImageIM($file, $desfile, $degrees))
					return true;
				else
					return false;
				break;
			//NetPBM
			case 2:
				if($this->_rotateImageNETPBM($file, $desfile, $degrees, $imgobj))
					return true;
				else
					return false;
				break;
			//GD1
			case 3:
				if($this->_rotateImageGD1($file, $desfile, $degrees, $imgobj))
					return true;
				else
					return false;
				break;
			//GD2
			case 4:
				if($this->_rotateImageGD2($file, $desfile, $degrees, $imgobj))
					return true;
				else
					return false;
				break;
		}
		return true;
	}
	/**
	 * Rotate an image with the prefered number of degrees using the ImageMagick library.
	 *
	 * @param string $file
	 * @param string $desfile
	 * @param int $degrees
	 * @return boolean
	 * @access private
	 */
	function _rotateImageIM($file, $desfile, $degrees) {
		$cmd = $this->_IM_path."convert -rotate $degrees \"$file\" \"$desfile\"";
		exec($cmd, $output, $retval);
		if($retval) {
			return false;
		} else {
			return true;
		}
	}
	/**
	 * Rotate an image with the prefered number of degrees using the NetPBM library.
	 *
	 * @param string $file
	 * @param string $desfile
	 * @param int $degrees
	 * @param image $imgobj
	 * @return boolean
	 * @access private
	 */
	function _rotateImageNETPBM($file, $desfile, $degrees, $imgobj) {
		$fileOut = "$file.1";
		$zoom->platform->copy($file, $fileOut); 
		if (eregi("\.png", $imgobj->_filename)) {
			$cmd = $this->_NETPBM_path . "pngtopnm $file | " . $this->_NETPBM_path . "pnmrotate $degrees | " . $this->_NETPBM_path . "pnmtopng > $fileOut" ; 
		} elseif (eregi("\.(jpg|jpeg)", $imgobj->_filename)) {
			$cmd = $this->_NETPBM_path . "jpegtopnm $file | " . $this->_NETPBM_path . "pnmrotate $degrees | " . $this->_NETPBM_path . "ppmtojpeg -quality=" . $this->_JPEG_quality . " > $fileOut" ;
		} elseif (eregi("\.gif", $imgobj->_filename)) {
			$cmd = $this->_NETPBM_path . "giftopnm $file | " . $this->_NETPBM_path . "pnmrotate $degrees | " . $this->_NETPBM_path . "ppmquant 256 | " . $this->_NETPBM_path . "ppmtogif > $fileOut" ; 
		} else {
			return false;
		}
		exec($cmd, $output, $retval);
		if ($retval) {
			return false;
		} else {
			$erg = $zoom->platform->rename($fileOut, $desfile); 
			return true;
		}
	}
	/**
	 * Rotate an image with the prefered number of degrees using the GD1 library.
	 *
	 * @param string $file
	 * @param string $desfile
	 * @param int $degrees
	 * @param image $imgobj
	 * @return boolean
	 * @access private
	 */
	function _rotateImageGD1($file, $desfile, $degrees, $imgobj) {
		// GD can only handle JPG & PNG images
		if ($imgobj->_type !== "jpg" && $imgobj->_type !== "jpeg" && $imgobj->_type !== "png") {
			return false;
		}
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			$src_img = imagecreatefromjpeg($file);
		} else {
			$src_img = imagecreatefrompng($file);
		}
		if (!$src_img) {
			return false;
		}
		// The rotation routine...
		$dst_img = imagerotate($src_img, $degrees, 0);
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			imagejpeg($dst_img, $desfile, $this->_JPEG_quality);
		} else {
			imagepng($dst_img, $desfile);
		}
		imagedestroy($src_img);
		imagedestroy($dst_img);
		return true; 
	}
	/**
	 * Rotate an image with the prefered number of degrees using the GD2 library.
	 *
	 * @param string $file
	 * @param string $desfile
	 * @param int $degrees
	 * @param image $imgobj
	 * @return boolean
	 * @access private
	 */
	function _rotateImageGD2($file, $desfile, $degrees, $imgobj) {
		// GD can only handle JPG & PNG images
		if ($imgobj->_type !== "jpg" && $imgobj->_type !== "jpeg" && $imgobj->_type !== "png") {
			return false;
		}
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			$src_img = imagecreatefromjpeg($file);
		} else {
			$src_img = imagecreatefrompng($file);
		}
		if (!$src_img) {
			return false;
		}
		// The rotation routine...
		$dst_img = imagerotate($src_img, $degrees, 0);
		if ($imgobj->_type == "jpg" || $imgobj->_type == "jpeg") {
			imagejpeg($dst_img, $desfile, $this->_JPEG_quality);
		} else {
			imagepng($dst_img, $desfile);
		}
		imagedestroy($src_img);
		imagedestroy($dst_img);
		return true;
	}
	/**
	 * Watermark an image with a TrueType font using the GD library.
	 * Originally by Elf Qrin ( http://www.ElfQrin.com/ ) - modified for use with zOOm.
	 *
	 * @param string $file
	 * @param string $desfile
	 * @return boolean
	 * @access public
	 */
	function watermark($file, $desfile) {
		$suffx = substr($file,strlen($file)-4,4);
		if ($suffx == ".jpg" || $suffx == "jpeg" || $suffx == ".png") {
			$text = str_replace("[date]",date($this->_wmdatfmt),$this->_wmtext);
			if ($suffx == ".jpg" || $suffx == "jpeg") {
				$imgobj = imagecreatefromjpeg($file);
			}
			if ($suffx == ".png") {
				$imgobj = imagecreatefrompng($file);
			}
			$rgbtext = HexDec($this->_wmrgbtext);
			$txtr = floor($rgbtext/pow(256,2));
			$txtg = floor(($rgbtext%pow(256,2))/pow(256,1));
			$txtb = floor((($rgbtext%pow(256,2))%pow(256,1))/pow(256,0));
			
			$rgbtsdw = HexDec($this->_wmrgbtsdw);
			$tsdr = floor($rgbtsdw/pow(256,2));
			$tsdg = floor(($rgbtsdw%pow(256,2))/pow(256,1));
			$tsdb = floor((($rgbtsdw%pow(256,2))%pow(256,1))/pow(256,0));
			
			$coltext = imagecolorallocate($image,$txtr,$txtg,$txtb);
			$coltsdw = imagecolorallocate($image,$tsdr,$tsdg,$tsdb);
			
			if ($this->_wmhotspot != 0) {
				$ix = imagesx($image);
				$iy = imagesy($image);
				$tsw = strlen($text)*$this->_wmfont_size/imagefontwidth($this->_wmfont)*3;
				$tsh = $this->_wmfont_size/imagefontheight($this->_wmfont);
				switch ($this->_wmhotspot) {
					case 1:
						$txp = $this->_wmtxp;
						$typ = $tsh*$tsh+imagefontheight($this->_wmfont)*2+$this->_wmtyp;
						break;
					case 2:
						$txp = floor(($ix-$tsw)/2);
						$typ = $tsh*$tsh+imagefontheight($this->_wmfont)*2+$this->_wmtyp;
						break;
					case 3:
						$txp = $ix-$tsw-$txp;
						$typ = $tsh*$tsh+imagefontheight($this->_wmfont)*2+$this->_wmtyp;
						break;
					case 4:
						$txp = $this->_wmtxp;
						$typ = floor(($iy-$tsh)/2);
						break;
					case 5:
						$txp = floor(($ix-$tsw)/2);
						$typ = floor(($iy-$tsh)/2);
						break;
					case 6:
						$txp = $ix-$tsw-$this->_wmtxp;
						$typ = floor(($iy-$tsh)/2);
						break;
					case 7:
						$txp = $this->_wmtxp;
						$typ = $iy-$tsh-$this->_wmtyp;
						break;
					case 8:
						$txp = floor(($ix-$tsw)/2);
						$typ = $iy-$tsh-$this->_wmtyp;
						break;
					case 9:
						$txp = $ix-$tsw-$this->_wmtxp;
						$typ = $iy-$tsh-$this->_wmtyp;
						break;
				}
			}
			ImageTTFText($image, $this->_wmfont_size, 0, $txp+$sxp, $typ+$syp, $coltsdw, $this->_wmfont,$text);
			ImageTTFText($image, $this->_wmfont_size, 0, $txp, $typ, $coltext, $this->wmfont, $text);	
			if ($suffx == ".jpg" || $suffx == "jpeg") {
				imagejpeg($image, $desfile, $zoom->_CONFIG['JPEGquality']);
			}elseif($suffx == ".png"){
				imgepng($image, $desfile);
			}
			imagedestroy($image);
			return true;
		}else{
			return false;
		}
	}
	/**
	 * Generate a thumbnail from a video stream using the FFMpeg library.
	 *
	 * @param string $file
	 * @param string $size
	 * @param string $filename
	 * @return boolean
	 * @access public
	 */
	function createMovieThumb($file, $size, $filename) {
		global $mosConfig_absolute_path, $zoom;
		if ($this->_FFMPEG_path == 'auto') {
			$this->_FFMPEG_path = '';
		} else {
			if ($this->_FFMPEG_path) {
				if (!is_dir($this->_FFMPEG_path)) {
						echo ("<div align=\"center\"><font color=\"red\">Error: your FFmpeg path is not correct! Please (re)specify it in the Admin-system under 'Settings'</font></div>");
						return false;
					}
			}
		}
		$desfile = ereg_replace("(.*)\.([^\.]*)$", "\\1", $filename).".jpg";
		if ($tempdir = $zoom->createTempDir()) {
		    $gen_path = $mosConfig_absolute_path."/".$tempdir;
			$cmd = $this->_FFMPEG_path."ffmpeg -an -y -t 0:0:0.001 -i \"$file\" -f singlejpeg \"$gen_path/file.jpg\"";
			exec($cmd, $output, $retval);
			if (!$retval) {
				if (file_exists($gen_path."/file.jpg")) {
					$the_thumb = $gen_path."/file.jpg";
					$imgobj = new image(0);
					$imgobj->_filename = $desfile;
					$imgobj->_type = "jpg";
					$imgobj->_size = $zoom->platform->getimagesize($the_thumb);
					$target = $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->getDir()."/thumbs/".$desfile;
					if (!$this->resizeImage($the_thumb, $target, $size, $imgobj)) {
						return false;
					} else {
					    @$zoom->deldir($gen_path);
					    return true;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	/**
	 * Perform a search with a given search-string in PDF-index files generated by zOOm.
	 *
	 * @param string $file
	 * @param string $searchText
	 * @return boolean
	 * @access public
	 */
	function searchPdf($file, $searchText) {
        global $mosConfig_absolute_path, $zoom;
        if (empty($file->_filename)) {
        	$file->getInfo();
        }
        $source = $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$file->getDir()."/".ereg_replace("(.*)\.([^\.]*)$", "\\1", $file->_filename).".txt";
        if ($zoom->platform->is_file($source)) {
        	$txt = strtolower(file_get_contents($source));
        	if (preg_match("/$searchText/", $txt)) {
        		return true;
        	}else{
        		return false;
        	}
        	unset($txt);
        }else{
        	return false;
        }
	}
	/**
	 * Extract the raw text from a PDF document (format: '{filename}.txt') with the Xpdf library (pdftotext)
	 *
	 * @param string $file
	 * @param string $filename
	 * @return boolean
	 * @access public
	 */
	function indexDocument($file, $filename) {
		global $mosConfig_absolute_path, $zoom;
		// this function will contain the algorithm to index a document (like a pdf)...
		// Method: use PDFtoText to create a plain ASCII text-file, which can be easily
		//         searched through. The text-file will be placed into the same dir as the
		//         original pdf.
		// Note: support for MS Word, Excel and Powerpoint indexing will be added later.
		if ($this->_PDF_path == 'auto') {
			$this->_PDF_path = '';
		} else {
			if ($this->_PDF_path) {
				if (!is_dir($this->_PDF_path)) {
						echo ("<div align=\"center\"><font color=\"red\">Error: your PDFtoText path is not correct! Please (re)specify it in the Admin-system under 'Settings'</font></div>");
						return false;
					}
			}
		}
		$desfile = ereg_replace("(.*)\.([^\.]*)$", "\\1", $filename).".txt";
		$target = $mosConfig_absolute_path."/".$zoom->_CONFIG['imagepath'].$zoom->_gallery->getDir()."/".$desfile;
		$cmd = $this->_PDF_path."pdftotext \"$file\" \"$target\"";
		exec($cmd, $output, $retval);
		if(!$retval) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Search a local directory - including subdirectories - for media.
	 *
	 * @param string $dir
	 * @return array
	 * @access public
	 */
	function parseDir($dir) {
		global $zoom;
		// start the scan...(open the local dir)
		$images = array();
		$handle = $zoom->platform->opendir($dir);
		while (($file = $zoom->platform->readdir($handle)) != false) {
			if ($file != "." && $file != "..") {
				$tag = ereg_replace(".*\.([^\.]*)$", "\\1", $file);
				$tag = strtolower($tag);
				if ($zoom->acceptableFormat($tag)) {
					// Tack it onto images...
					$images[] = $file;
				}
			}
		}
		$zoom->platform->closedir($handle);
		return $images;
	}
	/**
	 * Image Libraries auto-detection.
	 *
	 * @return array
	 * @access public
	 */
	function getImageLibs() {
		// do auto-detection on the available graphics libraries
		// This assumes the executables are within the shell's path
		$imageLibs= array();
		// do various tests:
		if (!(bool) ini_get('safe_mode')) {
		    if ($testIM = $this->_testIM()) {
		    	$imageLibs['imagemagick'] = $testIM;
		    }
		    if ($testNetPBM = $this->_testNetPBM()) {
    			$imageLibs['netpbm'] = $testNetPBM;
    		}
    		if ($testFFmpeg = $this->_testFFmpeg()) {
    			$imageLibs['ffmpeg'] = $testFFmpeg;
    		}
    		if ($testXpdf = $this->_testXpdf()) {
    			$imageLibs['pdftotext'] = $testXpdf;
    		}
		}			
		$imageLibs['gd'] = $this->_testGD();		
		return $imageLibs;
	}
	/**
	 * Detect if ImageMagick is available on the system.
	 *
	 * @return string
	 * @access private
	 */
	function _testIM() {
		exec('convert -version', $output, $status);
		if (!$status) {
			if(preg_match("/imagemagick[ \t]+([0-9\.]+)/i",$output[0],$matches)) {
			   return $matches[0];
			}
		}
		unset($output, $status);
	}
	/**
	 * Detect if NetPBM is available on the system.
	 *
	 * @return string
	 * @access private
	 */
	function _testNetPBM() {
		exec('jpegtopnm -version 2>&1',  $output, $status);
		if (!$status) {
			if (preg_match("/netpbm[ \t]+([0-9\.]+)/i",$output[0],$matches)) {
			   return $matches[0];
			}
		}
		unset($output, $status);
	}
	/**
	 * Detect if GD is available on the system.
	 *
	 * @return string
	 * @access private
	 */
	function _testGD() {
		$gd = array();
		$GDfuncList = get_extension_funcs('gd');
		ob_start();
		@phpinfo(INFO_MODULES);
		$output=ob_get_contents();
		ob_end_clean();
		$matches[1]='';
		if (preg_match("/GD Version[ \t]*(<[^>]+>[ \t]*)+([^<>]+)/s",$output,$matches)) {
			$gdversion = $matches[2];
		}
		if ($GDfuncList) {
		 if (in_array('imagegd2', $GDfuncList)) {
			$gd['gd2'] = $gdversion;
		 } else {
			$gd['gd1'] = $gdversion;
		 }
		}
		return $gd;
	}
	/**
	 * Detect if FFmpeg is available on the system.
	 *
	 * @return string
	 * @access private
	 */
	function _testFFmpeg() {
		exec('ffmpeg -h',  $output, $status);
		if (!empty($output[0])) {
			if (preg_match("/ffmpeg.*(\.[0-9])/i",$output[0],$matches)) {
			   return $matches[0];
			}
		}
		unset($output, $status);
	}
	/**
	 * Detect if Xpdf is available on the system.
	 *
	 * @return string
	 * @access private
	 */
	function _testXpdf() {
		exec('pdftotext',  $output, $status);
		if (!empty($output[0])) {
			if (preg_match("/pdftotext/i",$output[0],$matches)) {
			   return "pdftotext";
			}
		}
		unset($output, $status);
	}
	/**
	 * Get the ID3v2.x tag from an mp3 file.
	 *
	 * @param string $file
	 * @return array
	 * @access public
	 */
	function getid3($file) {
	    global $mosConfig_absolute_path, $database;
	    require_once($mosConfig_absolute_path."/components/com_zoom/lib/getid3/getid3.php");
	    require_once($mosConfig_absolute_path."/components/com_zoom/lib/getid3/extension.cache.mysql.php");
	    $getid3 = new getID3_cached_mysql($database);
	    $fileInfo = $getid3->analyze($file);
	    getid3_lib::CopyTagsToComments($fileInfo);
	    return $fileInfo;
	}
	/**
	 * Give a fancy HTML layout to the found ID3 data.
	 *
	 * @param array $id3_data
	 * @return string
	 * @access public
	 */
	function interpret_ID3_to_HTML($id3_data){
		$title = (!empty($id3_data["comments_html"]["title"][0])) ? $id3_data["comments_html"]["title"][0] : "no title";
		$artist = (!empty($id3_data["comments_html"]["artist"][0])) ? $id3_data["comments_html"]["artist"][0] : "no artist";
		$album = (!empty($id3_data["comments_html"]["album"][0])) ? $id3_data["comments_html"]["album"][0] : "no album";
		$year = (!empty($id3_data["id3v1"]["year"])) ? $id3_data["id3v1"]["year"] : "no year";
		$comment = (!empty($id3_data["comment"])) ? $id3_data["comment"] : "no comment";
		$genre = (!empty($id3_data["comments_html"]["genre"][0])) ? $id3_data["comments_html"]["genre"][0] : "no genre";
		$html = ("\t\t<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"70%\">\n"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_LENGTH."</td>\n"
		 . "\t\t<td align=\"left\">".$id3_data["playtime_string"]."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_QUALITY."</td>\n"
		 . "\t\t<td align=\"left\">".$id3_data["bitrate"]." bit/s @ ".$id3_data['audio']['sample_rate']." Hz ".$id3_data['audio']['channelmode']."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_TITLE."</td>\n"
		 . "\t\t<td align=\"left\">".$title."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_ARTIST."</td>\n"
		 . "\t\t<td align=\"left\">".$artist."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_ALBUM."</td>\n"
		 . "\t\t<td align=\"left\">".$album."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_YEAR."</td>\n"
		 . "\t\t<td align=\"left\">".$year."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_COMMENT."</td>\n"
		 . "\t\t<td align=\"left\">".$comment."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_GENRE."</td>\n"
		 . "\t\t<td align=\"left\">".$genre."</td>\n"
		 . "\t\t</tr>\n"
		 . "\t\t</table>");
		 return $html;
	}
	/**
	 * Give a fancy HTML layout to the found video meta-data.
	 *
	 * @param array $metadata
	 * @return string
	 * @access public
	 */
	function interpret_META_to_HTML($metadata) {
	    $title = (!empty($id3_data["comments_html"]["title"][0])) ? $id3_data["comments_html"]["title"][0] : "no title";
		$artist = (!empty($id3_data["comments_html"]["artist"][0])) ? $id3_data["comments_html"]["artist"][0] : "no artist";
		$album = (!empty($id3_data["comments_html"]["album"][0])) ? $id3_data["comments_html"]["album"][0] : "no album";
		$year = (!empty($id3_data["id3v1"]["year"])) ? $id3_data["id3v1"]["year"] : "no year";
		$comment = (!empty($id3_data["comment"])) ? $id3_data["comment"] : "no comment";
		$genre = (!empty($metadata["comments_html"]["genre"][0])) ? $metadata["comments_html"]["genre"][0] : "no genre";
		$html = ("\t\t<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"70%\">\n"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_ID3_LENGTH."</td>\n"
		 . "\t\t<td align=\"left\">".$metadata["playtime_string"]."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_VIDEO_PIXELRATIO."</td>\n"
		 . "\t\t<td align=\"left\">".$metadata["mpeg"]["video"]["pixel_aspect_ratio_text"]."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_VIDEO_QUALITY."</td>\n"
		 . "\t\t<td align=\"left\">".$metadata["video"]["bitrate"]." bit/s @ ".$metadata['video']['frame_rate']." frame/s</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_VIDEO_AUDIOQUALITY."</td>\n"
		 . "\t\t<td align=\"left\">".$metadata["audio"]["bitrate"]." bit/s @ ".$metadata['audio']['sample_rate']." Hz ".$metadata['audio']['channelmode']."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_VIDEO_CODEC."</td>\n"
		 . "\t\t<td align=\"left\">".$metadata["video"]["codec"]."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t<tr>\n"
		 . "\t\t<td align=\"left\">"._ZOOM_VIDEO_RESOLUTION."</td>\n"
		 . "\t\t<td align=\"left\">".$metadata["video"]["resolution_x"]." x ".$metadata["video"]["resolution_y"]."</td>\n"
		 . "\t\t</tr>"
		 . "\t\t</table>");
		 return $html;
	}
	//--------------------Error handling functions-------------------------//
	/**
	 * Display the errors the ToolBox encountered in a HTML table.
	 *
	 * @access public
	 */
	function displayErrors(){
		if ($this->_err_num <> 0){
			echo "<center><table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"70%\">";
			echo "<tr class=\"sectiontableheader\"><td width=\"100\" align=\"left\">Medium Name</td><td align=\"left\">Error type</td></tr>";
			$tabcnt = 0;
			for ($x = 0; $x <= $this->_err_num; $x++){
				echo "<tr class=\"".$this->tabclass[$tabcnt]."\" align=\"left\"><td>".$this->_err_names[$x]."</td><td align=\"left\">".$this->_err_types[$x]."</td></tr>";
				if ($tabcnt == 1){
	    			$tabcnt = 0;
				} else {
					$tabcnt++;
	    		}
			}
			echo "</table></center>";
		}
	}
	//--------------------END error handling functions----------------------//
}