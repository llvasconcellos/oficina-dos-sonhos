<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Set as an extension parent
define( '_JCE_EXT', 1 );
/**
 * MediaManager Class.
 * @author $Author: Ryan Demmer
 */ 
class MediaManager extends Manager {
        /* 
		* @var string
		*/
		var $_ext = 'windowsmedia=avi,wmv,wm,asf,asx,wmx,wvx;quicktime=mov,qt,mpg,mp3,mp4,mpeg;flash=swf,flv,xml;shockwave=dcr;real=rm,ra,ram;divx=divx';
		/**
		* @access	protected
		*/
		function __construct(){
			parent::__construct();
			
			// Set the file type map from parameters
			$this->setFileTypes( $this->getPluginParam('mediamanager_extensions', $this->_ext) );
			// Init plugin
			$this->init();		
		}
		/**
		 * Returns a reference to a manager object
		 *
		 * This method must be invoked as:
		 * 		<pre>  $manager = &MediaManager::getInstance();</pre>
		 *
		 * @access	public
		 * @return	MediaManager  The manager object.
		 * @since	1.5
		 */
		function &getInstance(){
			static $instance;
	
			if ( !is_object( $instance ) ){
				$instance = new MediaManager();
			}
			return $instance;
		}
		function getID3Instance(){
			static $id3;	
			if ( !is_object( $id3 ) ){
				if( !class_exists( 'getID3' ) ){
					require_once( dirname( __FILE__ ) . '/getid3/getid3.php' );
				}
				$id3 = new getID3();
			}
			return $id3;
		}
		function id3Data( $path ){
			jimport( 'joomla.filesystem.file' );			
            clearstatcache();
            
            $dim = array('x'=>'', 'y'=>'', 'time'=>'');
			
			$ext = JFile::getExt( $path );

            // Initialize getID3 engine
            $id3 = $this->getID3Instance(); 
            // Get information from the file
            @$fileinfo = $id3->analyze( $path );
            getid3_lib::CopyTagsToComments( $fileinfo );

            // Output results
            if ( !empty($fileinfo['video']['resolution_x'] ) ) {
                $dim['x'] = round( $fileinfo['video']['resolution_x'] );
            }
            if ( !empty( $fileinfo['video']['resolution_y'] ) ) {
                $dim['y'] = round( $fileinfo['video']['resolution_y'] );
            }
            if ( !empty( $fileinfo['playtime_string'] ) ) {
                $dim['time'] = $fileinfo['playtime_string'];
            }
            if( $ext == 'swf' && $dim['x'] == '' ){
                $size = @getimagesize( $path );
                $dim['x'] = round( $size[0] );
                $dim['y'] = round( $size[1] );
            }
			if( $ext == 'wmv' && $dim['x'] == '' ){
            	$dim['x'] = round( $fileinfo['asf']['video_media']['2']['image_width'] );
            	$dim['y'] = round( ( $fileinfo['asf']['video_media']['2']['image_height'] ) + 60 );
            }
            return $dim;
        }
		function getFileDetails( $file ){
			jimport( 'joomla.filesystem.file' );
			clearstatcache();
			
			$path 	= Utils::makePath( $this->getBaseDir(), rawurldecode( $file ) );
			$date 	= Utils::formatDate( @filemtime( $path ) );
            $size 	= Utils::formatSize( @filesize( $path ) );
			
			if( preg_match( '/\.(xml)/i', $file ) ){
				$width 	= 160;
				$height = 120;
				$time 	= '--:--';
			}else{
				$dim 	= $this->id3Data( $path );
				$width 	= ( !$dim['x'] ) ? '100' : $dim['x'];
            	$height = ( !$dim['y'] ) ? '100' : $dim['y'];
            	$time 	= ( !$dim['time'] ) ? '--:--' : $dim['time'];
			}
			
			$h = array( 
				'dimensions'=>	$width. ' x ' .$height,
				'size'		=>	$size, 
				'modified'	=>	$date,
				'duration'	=>	$time
			);
			return $h;
		}
		function getDimensions( $file ){		
			jimport( 'joomla.filesystem.file' );
			
			$path 	= Utils::makePath( $this->getBaseDir(), rawurldecode( $file ) );
			$ext 	= JFile::getExt( $path );
			$dim 	= $this->id3Data( $path );
			
			$width 	= ( !$dim['x'] ) ? '100' : $dim['x'];
            $height = ( !$dim['y'] ) ? '100' : $dim['y'];
			
			$h = array( 
				'extension'	=>	$ext,
				'width'		=>	$width,
				'height'	=>	$height
			);
			return $h;
		}
		/**
		 * Get a list of media extensions
		 *
		 * @access public
		 * @param boolean	Map the extensions to media type
		 * @return string	Extension list or type map
		*/
		function getMediaTypes( $map=false ){			
			$extensions = $this->getPluginParam( 'mediamanager_extensions', $this->_ext );
			
			if( $map ){
				return $extensions;	
			}else{
				$this->listFileTypes( $extensions );
			}			  
		}
		function getViewable(){
			return $this->_filetypes;
		}
}
?>