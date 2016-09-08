<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: english.common.php,v 1.6 2005/05/19 01:44:42 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Official website: http://www.mambodocman.com/
* -------------------------------------------
* Default english language file
* Creator: The DOCMan development team
* Email: admin@mambodocman.com
* Revision: 1.0
* Date: April 2005
*/
// ensure this file is being included by a parent file */
defined("_VALID_MOS") or die("Direct Access to this location is not allowed.");

define ('_DM_DATEFORMAT_LONG','%d.%m.%Y %H:%M'); // use PHP strftime Format, more info at http://php.net
define ('_DM_DATEFORMAT_SHORT','%d.%m.%Y');		 // use PHP strftime Format, more info at http://php.net
define ('_DM_ISO','iso-8859-1');
define ('_DM_LANG','en');

// -- General
DEFINE("_DML_NAME"			, "Name");
DEFINE("_DML_DATE"			, "Date");
DEFINE("_DML_DATE_MODIFIED"	, "Date modified");
DEFINE("_DML_HITS" 			, "Hits");
DEFINE("_DML_SIZE" 			, "Size");
DEFINE("_DML_EXT" 			, "Extension");
DEFINE("_DML_MIME" 			, "Mime Type");
DEFINE("_DML_THUMBNAIL" 	, "Thumbnail");
DEFINE("_DML_DESCRIPTION" 	, "Description:");

DEFINE("_DML_FOLDER"		, "Folder");
DEFINE("_DML_FOLDERS"		, "Folders");		
DEFINE("_DML_FILE" 			, "File");
DEFINE("_DML_FILES" 		, "Files");

DEFINE("_DML_TOP" 			, "Top");

DEFINE("_DML_DOC" 			, "Document");
DEFINE("_DML_DOCS" 			, "Documents");
DEFINE("_DML_DOCUMENT" 		, "Document");

DEFINE("_DML_CAT" 			, "Category");
DEFINE("_DML_CATS" 			, "Categories"); 
DEFINE("_DML_CATEGORY" 		, "Category");

DEFINE("_DML_UPLOAD" 		, "Upload");
DEFINE("_DML_SECURITY" 		, "Security");
DEFINE("_DML_CPANEL" 		, "DOCMan control panel");
DEFINE("_DML_CONFIG" 		, "Configuration");
DEFINE("_DML_LICENSES" 		, "Licenses");
DEFINE("_DML_UPDATES" 		, "Updates");
DEFINE("_DML_DOWNLOADS" 	, "Downloads");

DEFINE("_DML_HOMEPAGE" 		, "Homepage");

DEFINE("_DML_NO" 			, "No");
DEFINE("_DML_YES" 			, "Yes");
DEFINE("_DML_OK" 			, "OK");
DEFINE("_DML_CANCEL"		, "Cancel");	
DEFINE("_DML_ADD" 			, "Add");
DEFINE("_DML_EDIT"	 		, "Edit");

DEFINE("_DML_APPROVED" 		, "Approved");
DEFINE("_DML_DELETED"		, "Deleted");

DEFINE("_DML_INSTALL" 		, "Install");
DEFINE("_DML_PUBLISHED" 	, "Published");
DEFINE("_DML_UNPUBLISH" 	, "Unpublish");
DEFINE("_DML_CHECKED_OUT" 	, "Checked out");

DEFINE("_DML_TOOLTIP"		, "DOCMAn tooltip");
DEFINE("_DML_FILTER_NAME" 	, "Filter by name");

DEFINE("_DML_TITLE" 		, "Title");
DEFINE("_DML_MULTIPLE_SELECTS" , "hold down the <b>Ctrl</b> key (for Windows/Unix/Linux) or <b>Command</b> key (for Mac) while selecting.");

DEFINE("_DML_USER" 			, "User");
DEFINE("_DML_OWNER" 		, "Viewers");
DEFINE("_DML_CREATOR" 		, "Creator");
DEFINE("_DML_EDITOR" 		, "Maintainer");
DEFINE("_DML_MAINTAINER" 	, "Maintainer");

DEFINE("_DML_FILEICON_ALT"	, "File Icon"); 

DEFINE("_DML_NOT_AUTHORIZED", "Not authorized");

// -- HTML Class
DEFINE("_DML_SELECT_CAT" 	, "Select Category");
DEFINE("_DML_SELECT_DOC" 	, "Select Document");
DEFINE("_DML_ALL_CATS" 		, "- All Categories");
DEFINE("_DML_SELECT_USER" 	, "Select User");
DEFINE("_DML_GENERAL" 		, "General");
DEFINE("_DML_GROUPS" 		, "Groups");
DEFINE("_DML_DOCMAN_GROUPS" , "Docman Groups");
DEFINE("_DML_MAMBO_GROUPS" 	, "Mambo Groups");
DEFINE("_DML_USERS" 		, "Users");
DEFINE("_DML_EVERYBODY" 	, "Everybody");
DEFINE("_DML_ALL_REGISTERED", "All registered users");
DEFINE("_DML_NO_USER_ACCESS", "No User Access");
DEFINE("_DML_AUTO_APPROVE" 	, "Auto Approve");
DEFINE("_DML_AUTO_PUBLISH" 	, "Auto Publish");
DEFINE("_DML_GROUP"			, "Group");

// -- File Clas
DEFINE("_DML_OPTION_HTTP" 	, 'Upload a file from your computer');
DEFINE("_DML_OPTION_XFER" 	, 'Transfer a file from another server to this server');
DEFINE("_DML_OPTION_LINK" 	, 'Link a file from another server to this server');
DEFINE("_DML_SIZEEXCEEDS" 	, "Size exceeds maximum permitted.");
DEFINE("_DML_ONLYPARTIAL" 	, "Only partial file received. Try again.");
DEFINE("_DML_NOUPLOADED" 	, "No document uploaded.");
DEFINE("_DML_TRANSFERERROR" , "Transfer error occurred");
DEFINE("_DML_DIRPROBLEM" 	, "Directory problem-cannot move file.");
DEFINE("_DML_DIRPROBLEM2" 	, "Directory problem");
DEFINE("_DML_COULDNOTCONNECT" , "Could not connect to host");
DEFINE("_DML_COULDNOTOPEN" 	  , "Could not open destination directory. Check permissions.");
DEFINE("_DML_FILETYPE" 		, "File type");
DEFINE("_DML_NOTPERMITED" 	, "not permitted");

DEFINE("_DML_ALREADYEXISTS" , "already exists.");
DEFINE("_DML_PROTOCOL" 		, "Protocol");
DEFINE("_DML_NOTSUPPORTED" 	, "not supported.");
DEFINE("_DML_NOFILENAME" 	, "No filename specified.");
DEFINE("_DML_FILENAME" 		, "Filename");
DEFINE("_DML_CONTAINBLANKS" , "contains blanks.");
DEFINE("_DML_ISNOTVALID" 	, "is not a valid filename");
DEFINE("_DML_SELECTIMAGE" 	, "Select Image");
DEFINE("_DML_FAILEDTOCREATEDIR" , "Failed to create directory");
DEFINE("_DML_DIRNOTEXISTS" 	, "Directory does not exist; cannot remove files");
DEFINE("_DML_TEMPLATEEMPTY" , "Template id is empty; cannot remove files");
DEFINE("_DML_INTERRORMABOT" , "Internal error: no mambot set");
DEFINE("_DML_NOTARGGIVEN" 	, "not enough arguments given");
DEFINE("_DML_ARG" 			, "argument");
DEFINE("_DML_ISNOTARRAY" 	, "is not an array");

DEFINE("_DML_NEW" , "new!");
DEFINE("_DML_HOT" , "hot!");

// -- Form Validation
DEFINE("_DML_ENTRY_ERRORS" 	, "DOCMan System Message : Please correct the following error(s):");
DEFINE("_DML_ENTRY_TITLE" 	, "Entry should have a title.");
DEFINE("_DML_ENTRY_NAME" 	, "Entry must have a name.");
DEFINE("_DML_ENTRY_DATE" 	, "Entry must have a date.");
DEFINE("_DML_ENTRY_OWNER" 	, "Entry must have an owner.");
DEFINE("_DML_ENTRY_CAT" 	, "Entry must have a category.");
DEFINE("_DML_ENTRY_DOC" 	, "Entry must have a document selected.");
DEFINE("_DML_ENTRY_MAINT" 	, "Entry must have a maintainer specified.");

DEFINE("_DML_ENTRY_DOCLINK_LINK" 	, "Document needs to have LINK selected. (Linked document on Details tab.)");
DEFINE("_DML_ENTRY_DOCLINK" 		, "Document has both a filename and a document link on Details tab.");
DEFINE("_DML_ENTRY_DOCLINK_PROTOCOL", "Unknown protocol for document link on Details tab");
DEFINE("_DML_ENTRY_DOCLINK_NAME" 	, "Need full document link on Details tab");
DEFINE("_DML_ENTRY_DOCLINK_HOST" 	, "A complete URL is required");
DEFINE("_DML_ENTRY_DOCLINK_INVALID" , "File not found");

?>