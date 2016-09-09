<?php
/**
 * ImageManager Class.
 * @author $Author: Ryan Demmer $
 * @version $Id: manager.class.php 27 2005-09-14 17:51:00 Ryan Demmer $
 */
class ImageManager extends Manager {
	/* 
	* @var string
	*/
	var $_ext = 'image=jpg,jpeg,gif,png';
	/*
	*  @var boolean
	*/
	var $_cache = true;
	/*
	*  @var boolean
	*/
	var $_gd = true;
	/**
	* @access	protected
	*/
	function __construct(){
		$this->addEvent( 'onGetItems', 'onGetItems' );
		$this->addEvent( 'onUpload', 'onUpload' );
		$this->addEvent( 'onFileDelete', 'onFileDelete' );
	
		// Call parent
		parent::__construct();
		
		// Set the file type map from parameters
		$this->setFileTypes( $this->getPluginParam('imgmanager_ext_extensions', 'image=jpg,jpeg,gif,png') );
		// Init plugin
		$this->init();
		
		$cache = $this->getCacheDirectory();
		
		if( !is_dir( $cache ) || !is_writable( $cache ) ){
			$this->addAlert( 'alert', JText::_( 'No Cache' ),  JText::_( 'No Cache Desc' ) );
			$this->_cache = false;
		}
		if( !function_exists( 'gd_info' ) ){
			$this->addAlert( 'alert', JText::_( 'No GD' ), JText::_( 'No GD Desc' ) );
			$this->_gd = false;
		}
	}
	/**
	 * Returns a reference to a editor object
	 *
	 * This method must be invoked as:
	 * 		<pre>  $browser = &JCE::getInstance();</pre>
	 *
	 * @access	public
	 * @return	JCE  The editor object.
	 * @since	1.5
	 */
	function &getInstance(){
		static $instance;
	
		if ( !is_object( $instance ) ){
			$instance = new ImageManager();
		}
		return $instance;
	}
	function canEdit(){
		return !$this->_gd || !$this->_cache ? 0 : 1;
	}
	/**
	 * Manipulate file and folder list
	 *
	 * @param	file/folder array reference
	 * @param	mode variable list/images
	 * @since	1.5
	 */
	function onGetItems( &$result, $mode ){			
		$files 	= $result['files'];			
		$nfiles = array();
		
		jimport('joomla.filesystem.file');
		
		foreach( $files as $file ){
			$thumbnail 	= $this->getThumbnail( $file['id'] );
			$classes 	= !$thumbnail || $thumbnail == $file['id']? '' : ' thumbnail';
			$nfiles[] 	= array(
				'name'		=>	$file['name'],
				'id'		=>	$file['id'],
				'classes'	=>	$file['classes'] . $classes,
				'preview'	=>  $mode == 'images' ? $this->getCacheThumb( $file['id'], true, 50, 50, JFile::getExt( $file['name'] ), 50 ) : ''
			);
		}
		$result['files'] = $nfiles;
	}
	function onUpload( $file ){
		$params = $this->getPluginParams();
		// Resize
		$resize		= JRequest::getVar( 'upload-resize', 	$params->get( 'imgmanager_ext_force_resize', '0') );
		// Rotate
		$rotate 	= JRequest::getVar( 'upload-rotate', 	$params->get( 'imgmanager_ext_force_rotate', '0') );	
		// Thumbnail
		$thumbnail 	= JRequest::getVar( 'upload-thumbnail', $params->get( 'imgmanager_ext_force_thumbnail', '0') );	
					
		if( $resize ){				
			$rw 	= JRequest::getVar( 'upload-resize-width', 			$params->get( 'imgmanager_ext_resize_width', '640') );
			$rh 	= JRequest::getVar( 'upload-resize-height', 		$params->get( 'imgmanager_ext_resize_height', '480') );
			$rwt	= JRequest::getVar( 'upload-resize-width-type', 	$params->get( 'imgmanager_ext_resize_width_type', 'px') );
			$rht	= JRequest::getVar( 'upload-resize-height-type', 	$params->get( 'imgmanager_ext_resize_width_type', 'px') );
			$rq		= JRequest::getVar( 'upload-resize-quality', 		$params->get( 'imgmanager_ext_resize_quality', '80') );
			
			if( !$this->resize( $file, '', $rw, $rh, $rwt, intval( $rq ) * 10 ) ){
				$this->_result['error'] = JText::_('Resize Error');
			}
		}
		if( $rotate ){
			$ra	= JRequest::getVar( 'upload-rotate-angle', $params->get( 'imgmanager_ext_rotate_angle', '90') );
			if( !$this->rotate( $file, $ra ) ){
				$this->_result['error'] = JText::_('Rotate Error');
			}
		}
		if( $thumbnail ){
				$ts 	= JRequest::getVar( 'upload-thumbnail-size', 		$params->get( 'imgmanager_ext_thumbnail_size', '150') );
				$tst 	= JRequest::getVar( 'upload-thumbnail-size-type', 	$params->get( 'imgmanager_ext_thumbnail_size_type', 'px') );
				$tq 	= JRequest::getVar( 'upload-thumbnail-quality', 	$params->get( 'imgmanager_ext_thumbnail_quality', '80') );
				$tm 	= JRequest::getVar( 'upload-thumbnail-mode', 		$params->get( 'imgmanager_ext_thumbnail_mode', '0') );
				// Make relative
				$file = str_replace( $this->getBaseDir(), '', $file );
				$this->_result = $this->createThumbnail( $file, $ts, $tst, $tq, $tm );
		}
		return $this->returnResult();
	}
	function onFileDelete( $file ){
		if( file_exists( Utils::makePath( $this->getBaseDir(), $this->getThumbPath( $file ) ) ) ){
			return $this->deleteThumbnail( $file );
		}
	}
	function getFileDetails( $file ){
		global $mainframe;
		jimport('joomla.filesystem.file');
		clearstatcache();
		
		$h = array();
		
		$path = Utils::makePath( $this->getBaseDir(), rawurldecode( $file ) );
		if( file_exists( $path ) ){
			$ext 	= JFile::getExt( $path );
			$dim 	= @getimagesize( $path );
			
			$date 	= Utils::formatDate( @filemtime( $path ) );
			$size 	= Utils::formatSize( @filesize( $path ) );
			
			if( $this->canEdit() ){
				$preview = Utils::makePath( $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base(), $this->getCacheThumb( rawurldecode( $file ), true, 80, 80, $ext, 50 ) );
				$thumbnail = $this->getThumbnail( $file );
				if( $thumbnail ){
					$trigger = ( $thumbnail == $file ) ? '' : 'thumb-delete';
				}else{
					$trigger = 'thumb-create';
				}
				$pw = $ph = 80;
			}else{
				$pw 	= ( $dim[0] >= 100 ) ? 100 : $dim[0];
				$ph 	= ( $pw / $dim[0] ) * $dim[1];
				if( $ph > 80 ){
					$ph = 80;
					$pw = ( $ph / $dim[1] ) * $dim[0];
				}
				$preview = Utils::makePath( $this->getBaseUrl(), rawurldecode( $file ) );
				$trigger = '';
			}
			$h = array(
				'dimensions'	=>	$dim[0]. ' x ' .$dim[1],
				'size'			=>	$size, 
				'modified'		=>	$date,
				'preview'		=>	array(
					'src'		=>	$preview,
					'width'		=>	$pw,
					'height'	=> 	$ph
				),
				'trigger'		=> 	array( $trigger )
			);
		}
		return $h;
	}
	function getDimensions( $file ){			
		$base = strpos( rawurldecode( $file ), $this->getBase() ) === false ? $this->getBaseDir() : JPATH_ROOT;			
		$path = Utils::makePath( $base, rawurldecode( $file ) );
		$h = array(
			'width'		=>	'', 
			'height'	=>	''
		);
		if( file_exists( $path ) ){
			$dim = @getimagesize( $path );
			$h = array(
				'width'		=>	$dim[0], 
				'height'	=>	$dim[1]
			);
		}
		return $h;
	}
	function getThumbnailDimensions( $file ){
		return $this->getDimensions( $this->getThumbPath( $file ) );
	}
	function getCacheDirectory(){
		jimport('joomla.filesystem.folder');
		$dir = Utils::makePath( JPATH_SITE, $this->getPluginParam( 'imgmanager_ext_cache', 'tmp' ) );			
		if( !is_dir( $dir ) ){
			@JFolder::create( $dir, 0755 );
		}
		return $dir;
	}
	function phpthumbSetConfig( &$phpthumb ){			
		$params = $this->getPluginParams();
		
		$phpthumb->config_document_root 				= JPATH_SITE;			
		$phpthumb->config_use_imagemagick				= intval( $params->get('imgmanager_ext_use_imagemagick', 0 ) );
		$phpthumb->config_prefer_imagemagick			= intval( $params->get('imgmanager_ext_use_imagemagick', 0 ) );
		$phpthumb->config_imagemagick_path				= $params->get( 'imgmanager_ext_imagemagick_path', '' );
		$phpthumb->config_use_exif_thumbnail_for_speed 	= true;
		$phpthumb->config_max_source_pixels				= 0;
		$phpthumb->cache_directory						= $phpthumb->temp_directory = $this->getCacheDirectory();
	}
	function cleanCacheDir(){
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
		
		$params = $this->getPluginParams();
		
		$this->cache_max_size 	= $params->get( 'imgmanager_ext_cache_size', 10 ) * 1024 * 1024;
		$this->cache_max_age 	= $params->get( 'imgmanager_ext_cache_age', 30 ) * 86400;
		$this->cache_max_files 	= $params->get( 'imgmanager_ext_cache_files', 50 );
		
		if( ( $this->cache_max_age > 0) || ( $this->cache_max_size > 0 ) || ( $this->cache_max_files > 0 ) ){
			$path 	= $this->getCacheDirectory();
			$files 	= JFolder::files( $path, '\.(jpg|jpeg|gif|png)$' );
			$num 	= count( $files );
			$size 	= 0;
			$cutofftime = time() - 3600;
			foreach( $files as $file ){
				$file = Utils::makePath( $path, $file );
				if( strpos( $file, 'thumb_cache' ) === true && is_file( $file ) ){
					$ftime = @fileatime( $file );
					$fsize = @filesize( $file );
					if( $cutofftime > $ftime ){
						if( $fsize == 0 ){
							@JFile::delete( $file );
						}
						if( $num > $this->cache_max_files ){
							@JFile::delete( $file );
							$num--;
						}
						if( $ftime < ( time() - $this->cache_max_age ) ){
							@JFile::delete( $file );
						}			
						if( ( $size + $fsize ) > $this->cache_max_size ){
							@JFile::delete( $file );
						}		
					}
				}
			}
		}
		return true;
	}
	function getCacheThumb( $src, $create, $w, $h, $t, $q ){			
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
		
		$this->cleanCacheDir();
		
		require_once( JCE_PLUGIN . DS. 'classes' .DS. 'phpthumb' .DS. 'phpthumb.class.php' );
		$phpthumb = new phpThumb();
		$this->phpthumbSetConfig( $phpthumb );
		
		if( strpos( $src, $this->getBaseDir() ) === false ){
			$src = Utils::makePath( $this->getBaseDir(), $src );
		}
	
		$phpthumb->src 	= $src;
		$phpthumb->w 	= $w;
		$phpthumb->h 	= $h;
		$phpthumb->q 	= $q;
		$phpthumb->f 	= $t;
		$phpthumb->far 	= 1;
		
		$mtime = @filemtime( $src );
		$thumb = 'jce_thumb_cache_' . md5( basename( JFile::stripExt( $src ) ) . $mtime . $w ) . '.' . JFile::getExt( $src );
		$thumb = Utils::makePath( $this->getCacheDirectory(), $thumb );
					
		if( file_exists( $thumb ) && !$create ){
			@JFile::delete( $thumb );
			return true;
		}
		if( !file_exists( $thumb ) && $create ){
			$phpthumb->GenerateThumbnail();
			$phpthumb->RenderToFile( $thumb );
			@JPath::setPermissions( $thumb );
		}
		unset( $phpthumb );
		if( file_exists( $thumb ) ){
			return Utils::makePath( $this->getPluginParam( 'imgmanager_ext_cache', 'tmp' ), basename( $thumb ) );
		}else{
			return 'plugins/editors/jce/tiny_mce/plugins/imgmanager_ext/img/noimage_' . $w . '.gif';
		}
	}
	function cleanCacheThumb( $src ){
		jimport('joomla.filesystem.file');
		$t = $this->getCacheThumb( $src, false, 120, 120, JFile::getExt( $src ), 75 );
		$p = $this->getCacheThumb( $src, false, 50, 50, JFile::getExt( $src ), 75 );
	}
	/**
	 * PHPThumb Resize function for resizing and thumbnailing
	 * @param string $src Fullpath of the source file
	 * @param string $dest Fullpath of the destination file if any
	 * @param string $width Width to resize to.
	 * @param string $height Height to resize to.
	 * @param string $quality Quality of resizing.
	 */
	function resize( $src, $dest='', $width, $height, $type, $quality, $rm='' ){
		if( !$this->canEdit() ){
			return false;
		}
		jimport('joomla.filesystem.path');
		
		if( !$dest  ) $dest = $src;
				
		if( $type == 'pct' ){
			$dim = @getimagesize( $src );
			$width 	= $dim[0] * $width / 100;
			$height = $dim[1] * $height / 100;
		}
		
		require_once( JCE_PLUGIN .DS. 'classes' .DS. 'phpthumb' .DS. 'phpthumb.class.php' );
	   
		$phpthumb = new phpThumb();
		$this->phpthumbSetConfig( $phpthumb );
					
		$phpthumb->src = $src;
		
		$phpthumb->w = $width;
		$phpthumb->h = $height;
		$phpthumb->q = $quality;
		
		
		if( $rm == '1' ){
			$phpthumb->zc = 1;
		}else{
			$phpthumb->aoe = 1;
		}
										
		if ( $phpthumb->GenerateThumbnail() ) {
			$phpthumb->RenderToFile( $dest );
			@JPath::setPermissions( $dest );
			unset( $phpthumb );
			return true;
		}else{
			unset( $phpthumb );
			return false;
		}
	}
	/**
	 * Check for the thumbnail for a given file
	 * @param string $relative The relative path of the file
	 * @return The thumbnail URL or false if none.
	 */
	function getThumbnail( $relative ){
		$params = $this->getPluginParams();
		
		$path 	= Utils::makePath( $this->getBaseDir(), $relative );
		$dim 	= @getimagesize( $path );
			
		$dir 		= Utils::makePath( str_replace( "\\", "/", dirname( $relative ) ), $params->get( 'imgmanager_ext_thumbnail_folder', 'thumbnails') );
		$thumbnail 	= Utils::makePath( $dir, $this->getThumbName( $relative ) );
		
		// Image is a thumbnail
		if( strpos( $relative, $params->get( 'imgmanager_ext_thumbnail_prefix', 'thumb_' ) ) ){
			return $relative;
		}
	
		//the original image is smaller than thumbnails,
		//so just return the url to the original image.
		if ( $dim[0] <= $params->get( 'imgmanager_ext_thumbnail_size', '150' ) && $dim[1] <= $params->get('imgmanager_ext_thumbnail_size', '150' ) ){
			return $relative;
		}
		//check for thumbnails, if exists return the thumbnail url
		if( file_exists( Utils::makePath( $this->getBaseDir(), $thumbnail ) ) ){
		   return $thumbnail;
		}
		return false;
	}
	function getThumbnails( $files ){
		jimport('joomla.filesystem.file');
		$thumbnails = array();
		foreach( $files as $file ){
			$thumbnails[$file['name']] = $this->getCacheThumb( Utils::makePath( $this->getBaseDir(), $file['url'] ), true, 50, 50, JFile::getExt( $file['name'] ), 50 );
		}
		return $thumbnails;
	}
	function getThumbPath( $file ){		
		return Utils::makePath( $this->getThumbDir( $file, false ), $this->getThumbName( $file ) );
	}
	/**
	 * For a given image file, get the respective thumbnail filename
	 * no file existence check is done.
	 * @param string $file the full path to the image file
	 * @return string of the thumbnail file
	 */
	function getThumbName( $file ){
		return $this->getPluginParam( 'thumbnail-prefix', 'thumb_' ) . basename( $file );
	}
	function getThumbDir( $file, $create ){
		$dir = Utils::makePath( str_replace( "\\", "/", dirname( $file ) ), $this->getPluginParam('imgmanager_ext_thumbnail_folder', 'thumbnails') );
		if( $create ){
			$dir = Utils::makePath( $this->getBaseDir(), $dir );
			if( !is_dir( $dir ) ){
				$this->folderCreate( $dir );
			}
		}			
		return $dir;
	}
	function transformImage( $file, $rs, $rsw, $rsh, $rst, $rsq, $ro, $roa ){
		$file = Utils::makePath( $this->getBaseDir(), rawurldecode( $file ) );
		
		if( $rs ){
			if( !$this->resize( $file, '', $rsw, $rsh, $rst, intval( $rsq ) * 10 ) ){
				$this->_result['error'] = JText::_('Resize Error');
			}
		}
		if( $ro ){
			if( !$this->rotate( $file, $roa ) ){
				$this->_result['error'] = JText::_('Rotate Error');
			}
		}
		return $this->returnResult();
	}
	function rotate( $file, $angle ){
		require_once( JCE_PLUGIN .DS. 'classes' .DS. 'phpthumb' .DS. 'phpthumb.class.php' );
	   
		$phpthumb = new phpThumb();
		$this->phpthumbSetConfig( $phpthumb );
		
		$phpthumb->src 	= $file;
		switch( $angle ){
			case '-90':
			case '180':
			case '90':
				$phpthumb->ra = $angle;
				break;
			case 'vertical':
				$phpthumb->fltr[] = 'flip|y';
				break;
			case 'horizontal':
				$phpthumb->fltr[]= 'flip|x';
				break;
		}
		if ( $phpthumb->GenerateThumbnail() ) {
			$phpthumb->RenderToFile( $file );
			unset( $phpthumb );
			return true;
		}else{
			unset( $phpthumb );
			return false;
		}			
	}
	/**
	 * Create a thumbnail
	 * @param string $file relative path of the image
	 * @param string $width thumbnail width
	 * @param string $height thumbnail height
	 * @param string $quality thumbnail quality (%)
	 * @param string $mode thumbnail mode
	 */
	function createThumbnail( $file, $size, $type, $quality, $mode ){			
		$path 	= Utils::makePath( $this->getBaseDir(), $file );
		$thumb 	= Utils::makePath( $this->getThumbDir( $file, true ), $this->getThumbName( $file ) );				
					
		if( !$this->resize( $path, $thumb, $size, $size, $type, intval( $quality )* 10, $mode ) ){
			$this->_result['error'] = JText::_('Thumbnail Error');
		}			
		return $this->returnResult();			
	}
	function deleteThumbnail( $file ){
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');
		
		$thumbnail 	= Utils::makePath( $this->getBaseDir(), $this->getThumbPath( $file ) );
		$dir 		= Utils::makePath( $this->getBaseDir(), $this->getThumbDir( $file, false ) );
		if( !JFile::delete( $thumbnail ) ){
			$this->_result['error'] = JText::_('Thumbnail Delete Error');
		}else{
			if( !Utils::countFiles( $dir ) && !Utils::countDirs( $dir ) ){
				if( !JFolder::delete( $dir ) ){
					$this->_result['error'] = JText::_('Thumbnail Folder Delete Error');
				}else{
					$this->_result['text'] 	= true;
				}
			}
		}
		return $this->returnResult();				
	}
}
?>