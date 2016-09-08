<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS  
* @version $Id: DOCMAN_user.class.php,v 1.32 2005/08/04 16:35:46 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
*/

defined('_VALID_MOS') or die('Direct access to this location is not allowed.');

if (defined('_DOCMAN_USER')) {
    return true;
} else {
    define('_DOCMAN_USER', 1);
} 

/**
* DOCMAN permissions class.
* 
* @desc class purpose is to handle users and groups permissions and related functions
*/

class DOCMAN_User 
{
   /** 
    * @access 	public 
    * @var 		int 
    */
    var $userid = null;

   /**
    * @access 	public 
    * @var 		string 
    */
    var $usertype = null;
    
   /** 
    * @access 	public 
    * @var 		int 
    */
    var $gid = null;

   /** 
    * @access 	public 
    * @var 		string 
    */
    var $username = null;

   /**
    * @access 	public 
    * @var 		bool
    */
    var $isAdmin = 0;

   /** 
    * @access 	public 
    * @var 		bool 
    */
    var $isEditor = 0;

   /**
    * @access 	public 
    * @var 		bool 
    */
    var $isPublisher = 0;
    
   /** 
    * @access 	public 
    * @var 		bool 
    */
    var $isAuthor = 0;

   /** 
    * @access 	public 
    * @var 		bool 
    */
    var $isManager = 0;
    
    /** 
    * @access 	public 
    * @var 		bool 
    */
    var $isRegistered = 0;

   /**
    * @access 	public 
    * @var 		string 		Contains a 'negative' number list.
    */
    var $groupsIn = null;

   /**
    * @desc 	constructor
    * @return 	void 
    */
    function DOCMAN_User()
    {
        global $my;

        $user = $my;

        $this->userid 	= $user->id;
        $this->username = $user->username;
        $this->usertype = strtolower($user->usertype);
        $this->gid 		= $user->gid;
		
		$this->setUsertype();
        $this->groupsIn = $this->getGroupsIn();
        
    } 

    function setUsertype()
    {
        switch($this->usertype)
        {
        	case 'super administrator' :
        	{
        		$this->isAdmin   	= 1;
        		$this->isRegistered = 1;
        	} break;
        	case 'administrator'	   :
        	{
        		$this->isAdmin   	= 1;
        		$this->isRegistered = 1;
        	} break;
        	case 'manager'			   :
        	{
        		$this->isAdmin 		= 1;
            	$this->isManager 	= 1;
            	$this->isRegistered = 1;
        	} break;
        	case 'editor'				:
        	{
        		$this->isEditor 	= 1;
        		$this->isRegistered = 1;
        	} break;
        	case 'publisher'			:
        	{
        		$this->isPublisher 	= 1;
        		$this->isRegistered = 1;
        	} break;
        	case 'author'				:
        	{
        		$this->isAuthor 	= 1;
        		$this->isRegistered = 1;
        	} break;
        	case 'user'				:
        	case 'registered' 		:
        	{
        		$this->isRegistered = 1;
        	} break;
        }
    } 


   /**
    * @desc 	Checks if the user can access the component.
    * @return 	bool 
    */

    function getGroupsIn()
    {
        global $database;
        
        $groups_in = array();
        
        //Add DOCMan groups
        $database->setQuery("SELECT groups_id,groups_members " . "\n FROM #__docman_groups");
        $all_groups = $database->loadObjectList();
       
        if (count($all_groups)) {
            foreach ($all_groups as $a_group) {
                $group_list = array();
                $group_list = explode(',', $a_group->groups_members);
                if (in_array($this->userid , $group_list))
				{
				  	$groups_in[] = trim(-1 * ($a_group->groups_id + 10));
                }
            } 
        }
        
        //Add Mambo groups
        if($this->isAuthor) {
        	$groups_in[] = _DM_PERMIT_AUTHOR;
        }
        if($this->isEditor) {
        	$groups_in[] = _DM_PERMIT_EDITOR;
        }
        if($this->isPublisher)	{
        	$groups_in[] = _DM_PERMIT_PUBLISHER;
        }
        
        if ( empty($groups_in) ) 
        	return '0,0';
        		
        return implode(',',$groups_in);
    }

   /**
    * @desc 			Checks if the the user is a member of a group
    * @param 	int 	Group $ ID to check (must be a negative number)
    * @return 	bool 
    */

    function isInGroup( $group_number )
    {
        return preg_match("/(^|,)$group_number(,|$)/" , $this->groupsIn) ;
    }
    
    /**
    * @desc 	checks if the user can preform a certain task
    * @access  	public 
    * @return 	string	error message 
    */
    function canPreformTask($document = null, $task)
	{
    	$err = '';
    	
    	if ($this->userid > _DM_PERMIT_USER) 
    	{
       		//Make sure we have a document object
        	$this->isDocument($document);
        	
        	// user has no permissions to preform the operation
     		$func = "can".$task;
      		if (!call_user_func(array(&$this, "".$func.""), $document)) {
         		$err .= _DML_NOT_AUTHORIZED;
      		} 
       		
       		// document already checked out by other user
       		if (!is_null($document) && $document->checked_out) {
         		if ($document->checked_out != $this->userid) {
             		$err .= _DML_THE_MODULE . " $document->dmname " . _DML_IS_BEING;
           		} 
      		}
    	} else {
        	$err .= _DML_NOLOG;
    	} 
    
    	return $err;
	}
    
   /**
    * @desc checks in the user can access the component.
    * @access  	public 
    * @return 	bool 
    */

    function canAccess()
    {
        global $_DOCMAN; 
        // if the user is not logged in...
        if (!$this->userid && $_DOCMAN->getCfg('registered') == _DM_GRANT_NO) {
            return 0;
        } 
        // check if the component is down
        if (!$this->isAdmin && $_DOCMAN->getCfg('isDown')) {
            return -1;
        } 

        return 1;
    }  

   /**
    * @desc 	checks if the user can download a document
    * @access  	public 
    * @return 	bool 
    */

    function canUpload()
    {
        global $_DOCMAN;
         
        // preform checks
        if ($this->isAdmin) {
            return true;
        } 

        if ($this->userid) 
        {
            $upload = $_DOCMAN->getCfg('user_upload');

            if ($upload == $this->userid || $upload == _DM_PERMIT_REGISTERED) {
                return true;
            }
             
            if ($this->isInGroup($upload)) {
              	return true;
            }  
        } 

        return false;
    } 

   /**
    * @desc 	Checks if the user can download a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canDownload($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);
         
        //check if user has access to the document's category
        if(!$this->canAccessCategory($document->catid)) {
        	return false;
        }
        
        // preform checks
        if ($this->isAdmin ) {
            return true;
        }
        
        if($this->canEdit($document, false)) {
        	return true;
        }
          
        if ($this->userid == 0 && $_DOCMAN->getCfg('registered') != _DM_GRANT_RX) {
            return false;
        } 

        if ($document->dmowner == _DM_PERMIT_EVERYONE) {
            return true;
        } 

        if ($this->userid) {
            if ($document->dmowner == _DM_PERMIT_REGISTERED) {
                return true;
            } 

            if ($document->dmowner > _DM_PERMIT_USER && $document->dmowner == $this->userid) {
                return true;
            } 

            if ($document->dmowner < _DM_PERMIT_GROUP && $this->isInGroup($document->dmowner)) {
                return true;
            } 

            if ($document->dmsubmitedby == $this->userid) {
                if (is_a($document, 'mosDMDocument')) {
                    $authorCan = $document->authorCan();
                } else { // Naughty! No object. Create a temp one
                    $tempDoc = new mosDMDocument($database);
                    $tempDoc->attribs = $document->attribs;
                    $authorCan = $tempDoc->authorCan();
                } 
                if ($authorCan >= _DM_AUTHOR_CAN_READ) {
                    return true;
                } 
            } 
        } 
        return false;
    } 

   /** 
    * @desc 	Checks if the user can edit a document entry
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canEdit($document = null, $checkCreator = true)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);
        
        // preform checks
        if ($this->isAdmin) { // admin
            return true;
        } 
        
        //check if user has access to the document's category
        if(!$this->canAccessCategory($document->catid)) {
        	return false;
        }
        
        $maintainer = $document->dmmantainedby;
              
        if($this->userid)
        {
        	if ( ($maintainer == $this->userid) || ($maintainer == _DM_PERMIT_REGISTERED) ) { // maintainer
            	return true;
        	} 
           
        	// Check Creator 	
        	if ($checkCreator && $document->dmsubmitedby == $this->userid) {
            	if (is_a($document, 'mosDMDocument')) {
                	$authorCan = $document->authorCan();
            	} else { // Naughty! No object. Create a temp one
             	   $tempDoc = new mosDMDocument($database);
                	$tempDoc->attribs = $document->attribs;
                	$authorCan = $tempDoc->authorCan();
            	} 
            	if ($authorCan &_DM_AUTHOR_CAN_EDIT) {
                	return true;
            	} 
        	}
         
        	if ($this->isInGroup($maintainer)) {
            	   	return true;
        	}  
        }

        return false; // DEFAULT: can't edit
    } 

   /**
    * @desc 	Checks if the user can approve a document entry
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return	bool 
    */

    function canApprove()
    {
        global $_DOCMAN;
        
        // preform checks
        if ($this->isAdmin) {
            return true;
        } 

        if ($this->userid) {
            $approve = $_DOCMAN->getCfg('user_approve');

            if ($approve == $this->userid || $approve == _DM_PERMIT_REGISTERED) {
                return true;
            } 

           	if ($this->isInGroup($approve)) {
               	return true;
            }  
        } 
        return false; // DEFAULT: can't approve
    } 

   /**
    * @desc 	Checks if the user can publish a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canPublish($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);

        if(!is_null($document)) {
        	//make sure the document isn't published and is approved
        	if ($document->published || !$document->approved) {
           	 	return false;
        	} 
        }
		
        if ($this->isAdmin) {
            return true;
        }
        
        if ($this->userid) 
        {
            $publish = $_DOCMAN->getCfg('user_publish');

            if ($publish == $this->userid || $publish == _DM_PERMIT_REGISTERED) {
                return true;
            } 
            
            
           
          	if ($this->isInGroup($publish)) {
              	return true; 
            } 
        } 
        return false; // DEFAULT: can't publish 
    } 

   /** 
    * @desc 	Checks if the user can unpublish a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return	bool 
    */

    function canUnPublish($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);

        //make sure the document is published and is approved
        if (!$document->published || !$document->approved) {
            return false;
        } 

        if ($this->isAdmin) {
            return true;
        }
        
         if ($this->userid) 
         {
            $publish = $_DOCMAN->getCfg('user_publish');

            if ($publish == $this->userid || $publish == _DM_PERMIT_REGISTERED) {
                return true;
            } 
           
          	if ($this->isInGroup($publish)) {
              	return true; 
            } 
        } 
        return false; // DEFAULT: can't unpublish  
    } 

   /**
    * @desc 	checks if the user can checkout a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canCheckOut($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);

        if ($document->checked_out) {
            return false;
        } 

        return $this->canEdit($document);
    } 

   /** 
    * @desc 	Checks if the user can checkin a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canCheckIn($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);

        if (!$document->checked_out) {
            return false;
        } 

        return $this->canEdit($document);
    } 

   /** 
    * @desc 	Checks if the user can move a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canMove($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);
        
        return $this->canEdit($document);
    } 

   /**
    * @desc 	Checks if the user can reset a documents hit counter
    * @param 	object $ or numeric $document
    * @access  	public
    * @return 	bool 
    */
    function canReset($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);
        
        return $this->canEdit($document);
    }
    
   /**
    * @desc 	Checks if the user can delete a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canDelete($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);
        
        return $this->canEdit($document);
    }
    
    /**
    * @desc 	Checks if the user can update a document
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */

    function canUpdate($document = null)
    {
        global $_DOCMAN;
        
        //Make sure we have a document object
        $this->isDocument($document);
        
        return $this->canEdit($document);
    }  
    
   /**
    * @desc 	Checks if the user can assign viewers
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */
    
    function canAssignViewer($document = null)
    {
    	global $_DOCMAN;
    	
    	//Make sure we have a document object
        $this->isDocument($document);
       
        if ($this->isAdmin) {
            return true;
        }
        
        if ($_DOCMAN->getCfg('reader_assign') & _DM_ASSIGN_BY_AUTHOR ) 
        {
        	if($this->userid == $document->dmsubmitedby) {
        		return true;
        	}
        }
        
        if ($_DOCMAN->getCfg('reader_assign') & _DM_ASSIGN_BY_EDITOR ) 
        {
        	if($this->canEdit($document, false)) {
        		return true;
        	}
        }
        
        return false; // DEFAULT: can't assign viewer
    }
    
   /**
    * @desc 	Checks if the user can assign maintainer
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */
    function canAssignMaintainer($document = null)
    {
    	global $_DOCMAN, $database; 
    	
    	//Make sure we have a document object
        $this->isDocument($document);
         
       	if ($this->isAdmin) {
            return true;
        }
        
        if ($_DOCMAN->getCfg('editor_assign') & _DM_ASSIGN_BY_AUTHOR ) 
        {
        	if($this->userid == $document->dmsubmitedby) {
        		return true;
        	}
        }
        
        if ($_DOCMAN->getCfg('editor_assign') & _DM_ASSIGN_BY_EDITOR ) 
        {
        	if($this->canEdit($document, false)) {
        		return true;
        	}
        }

       	return false; // DEFAULT: can't assign maintainer
    }
    
    /**
    * @desc 	Checks if the user can access a category
    * @param 	mixed	object or numeric $document
    * @access  	public
    * @return 	bool 
    */
    function canAccessCategory($category = null)
    {
    	global $_DOCMAN, $database; 
    	
    	//Make sure we have a document object
        $this->isCategory($category);
        
        $result = false;
        
        switch($category->access) 
        {
        	case '0' : //public
				$result = true;
        		break;
        	case '1' :	//registered
        		if($this->isRegistered) {
        			$result = true;
        		} 
        		break;
        	break;
        	case '2' :	//special
        		if($this->isAdmin) {
        			$result = true;
        		} 
        		break;
        	break;
        }
        
        return $result;
    }
    
   /**
    * @desc 	Transform the document to a object is necessary
    * @param 	mixed	object or numeric $document
    * @access  	private
    * @return 	object 	a document object 
    */
    
    function isDocument(&$document)
    {
   		global $database;
   		
   		// check to see if we have a object
        if (!is_a($document, 'mosDMDocument')) {
            $id = $document; 
            // try to create a document db object
            if (is_numeric($id)) {
                $document = new mosDMDocument($database);
                $document->load($id);
            } 
        }
    }
    
    /**
    * @desc 	Transform the document to a object is necessary
    * @param 	mixed	object or numeric $document
    * @access  	private
    * @return 	object 	a document object 
    */
    
    function isCategory(&$category)
    {
   		global $database;
   		
   		// check to see if we have a object
        if (!is_a($category, 'mosDMCategory')) {
            $id = $category; 
            // try to create a document db object
            if (is_numeric($id)) {
                $category = new mosDMCategory($database);
                $category->load($id);
            } 
        }
    }
    
     
} // end class

?>
