<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: english.backend.php,v 1.5 2005/05/24 16:00:16 johanjanssens Exp $
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

// -- Files
DEFINE("_DML_ORPHANS" 			, "Orphans");
DEFINE("_DML_ORPHANS_LINKED" 	, "File(s) not deleted. Cannot delete file(s) linked to documents.");
DEFINE("_DML_ORPHANS_PROBLEM" 	, "File(s) not deleted. There is a problem with the file permissions.");
DEFINE("_DML_ORPHANS_DELETED" 	, "File(s) deleted.");
DEFINE("_DML_LINKS" 		, "Links");
DEFINE("_DML_NEXT" 			, "Next");
DEFINE("_DML_SUCCESS" 		, "Success!");
DEFINE("_DML_UPLOADMORE" 	, "Upload more");
DEFINE("_DML_UPLOADWIZARD" 	, "Upload wizard");
DEFINE("_DML_UPLOADMETHOD" 	, "Choose the upload method");
DEFINE("_DML_ISUPLOADING" 	, "DOCMan is Uploading");
DEFINE("_DML_PLEASEWAIT" 	, "Please Wait");
DEFINE("_DML_UPLOADDISK" 	, "Upload wizard - Upload a file from your hard disk");
DEFINE("_DML_FILETOUPLOAD" 	, "Choose the file to upload");
DEFINE("_DML_BATCHMODE" 	, "Batch Mode");
DEFINE("_DML_BATCHMODETT" 	, "Batch mode uploads a zipped package containing multiple files. The package will be unzipped on-the-fly after uploading. You should not include zipped directories and/or subdirectories in the package. Have in mind that the process could overwrite DOCMan files present in the DocMan documents directory that have the same filename; there is no overwrite protection using zipped files. This is experimental and you should use it with caution.");

DEFINE("_DML_DOCMANISTRANSF" 	, "DOCMan is transfering<br />the file");
DEFINE("_DML_TRANSFERFROMWEB" 	, _DML_UPLOADWIZARD . " - " . "transfer a file from a web server");
DEFINE("_DML_REMOTEURL" 		, "Remote URL");
DEFINE("_DML_LINKURLTT" 		, "Enter the remote URL that you want to access. The URL must include a scheme (http:// or ftp://) and any other access information required. For example: http://mamboforge.net/frs/download.php/2026/docmanV1.3.zip.");
DEFINE("_DML_REMOTEURLTT" 		, _DML_LINKURLTT . "<br />You may call the file anything you wish on this system by using the &quot;Local Name&quot; field.");
DEFINE("_DML_LOCALNAME" 		, "Local Name");
DEFINE("_DML_LOCALNAMETT" 		, "Enter the local name of the file as you wish it stored on this system."
     . "This is a required field as the URL does not give sufficient information for the document.");
DEFINE("_DML_DOCUPDATED" 		, "Document has been updated.");
DEFINE("_DML_FILEUPLOADED" 		, "File has been uploaded.");
DEFINE("_DML_MAKENEWENTRY" 		, "Make a new document entry using this file.");
DEFINE("_DML_DISPLAYFILES" 		, "Display Files.");
DEFINE("_DML_ALLFILES" 			, "All Files");
DEFINE("_DML_DOCFILES" 			, "Document Files");
DEFINE("_DML_CREATEALINK" 		, "Create a Linked Document");
DEFINE("_DML_SELECTMETHODFIRST" , "Please Select a Document Transfer Method");
DEFINE("_DML_ERROR_UPLOADING" 	, "Error uploading.");
DEFINE("_DML_ZLIB_ERROR" 		, "The operation could not proceed because zlib library is not present in php.");
DEFINE("_DML_UNZIP_ERROR" 		, "Could not unzip the files.");
DEFINE("_DML_SUBMIT" 			, "Submit");
DEFINE("_DML_SELECT_FILE" 		, "Select a file:");

// -- Documents
DEFINE("_DML_MOVECAT" 			, "Move Category");
DEFINE("_DML_MOVETOCAT" 		, "Move to Category");
DEFINE("_DML_DOCSMOVED" 		, "Documents being moved");
DEFINE("_DML_DOCS_NOT_APPROVED" , "documents not approved");
DEFINE("_DML_DOCS_NOT_PUBLISHED", "documents not published");
DEFINE("_DML_NO_PENDING_DOCS" 	, "No pending documents.");
DEFINE("_DML_FILE_MISSING" 		, "***file missing***");
DEFINE("_DML_YOU_MUST_UPLOAD" 	, "You must upload a document for this section first.");
DEFINE("_DML_THE_MODULE" 		, "The module");
DEFINE("_DML_IS_BEING" 			, "is currently being edited by another administrator");
DEFINE("_DML_NO_LICENSE" 		, "no license");
DEFINE("_DML_LINKED" 			, "->LINKED DOCUMENT<-");
DEFINE("_DML_CURRENT" 			, "Current");
DEFINE("_DML_LICENSE_TYPE" 		, "License Type");
DEFINE("_DML_FILETITLE" 		, "File Title");
DEFINE("_DML_OWNER_TOOLTIP" , "This determines who can download and view the document. Choose: "
     . "*Everybody* if you want anyone to be able to access the document. "
     . "*All registered users* only allows users that have an account at your site access to the document. "
     . "You can assign the document to a single registered user by selecting a name under " . _DML_USERS . "; "
     . "only that user will be granted access. "
     . "You can assign the document to a group of registered users by selecting the group name under " . _DML_GROUPS . "; "
     . "only the group members will be granted access to the document.");
DEFINE("_MANT_TOOLTIP" 			, "This determines who can edit, or maintain, the document. "
     . "When a user, or member of a group, is the " . _DML_MAINTAINER . " of a document it means that they can use the specific document management options: edit, update, move, check in/out and delete.");
DEFINE("_DML_MAKE_SURE" 		, 'Make sure to start the url<br />with "http://"');
DEFINE("_DML_DOCURL" 			, "URL of Document:");
DEFINE("_DML_DOCURL_TOOLTIP" 	, "When you have LINKED documents you must enter the website address (URL) for the document here. Always include the protocol (http:// or ftp://) at the begining.");
DEFINE("_DML_HOMEPAGE_TOOLTIP" 	, "You may optionally enter a website address (URL) for information that is related to this document. Always include http:// at the beginning of the url or it will not work.");
DEFINE("_DML_LICENSE_TOOLTIP" 	, "A document can have an agreement license that the viewers should accept to access it. Here you can define the license type.");
DEFINE("_DML_DISPLAY_LICENSE" , "Display agreement/License when viewing");
DEFINE("_DML_DISPLAY_LIC_TOOLTIP" , "Choose`*yes* if you want that the license displayed to the user before access is granted.");
DEFINE("_DML_APPROVED_TOOLTIP" , "A document should be approved to be visible and available on the repository. Say *yes* here and don\'t forget to publish it too! Both options should be set so the document can be listed on the frontend");
DEFINE("_DML_PLEASE_SEL_CAT"        , "Please define at least one category first");
DEFINE("_DML_MANT_TOOLTIP" 		, "This determines who can edit, or maintain, the document. "
     . "When a user, or member of a group, is the " . _DML_MAINTAINER . " of a document it means that they can use the specific document management options: edit, update, move, check in/out and delete.");
DEFINE("_DML_DISPLAY_LIC" 		, "Display agreement");

DEFINE("_DML_TAB_PERMISSIONS" 	, "Permissions");
DEFINE("_DML_TAB_LICENSE" 		, "License");
DEFINE("_DML_TAB_DETAILS" 		, "Details");
DEFINE("_DML_TAB_PARAMS" 		, "Parameters");

DEFINE("_DML_TITLE_DOCINFORMATION",	"Document Information");
DEFINE("_DML_TITLE_DOCPERMISSIONS", "Document Permissions");
DEFINE("_DML_TITLE_DOCLICENSES"   , "Document Licenses");
DEFINE("_DML_TITLE_DOCDETAILS"	  , "Document Details");
DEFINE("_DML_TITLE_DOCPARAMETERS" , "Document Parameters");

DEFINE("_DML_CREATED_BY" 		, "Created by");
DEFINE("_DML_UPDATED_BY" 		, "Last updated by");
DEFINE("_DML_SELECT_ITEM_DEL" 	, "Select an item to delete");
DEFINE("_DML_SELECT_ITEM_MOVE" 	, "Select an item to move");
DEFINE("_STATUS_YOU"     		, "This document is checked-out by you.");
DEFINE("_STATUS_NOT_OUT" 		, "This document is not checked-out.");

// -- Categories
DEFINE("_DML_CATDETAILS" 		, "Category Details");
DEFINE("_DML_CATTITLE" 			, "Category Title");
DEFINE("_DML_CATNAME" 			, "Category Name");
DEFINE("_DML_LONGNAME" 			, "A long name to be displayed in headings");
DEFINE("_DML_PARENTITEM" 		, "Parent Item");
DEFINE("_DML_IMAGE" 			, "Image");
DEFINE("_DML_PREVIEW" 			, "Preview");
DEFINE("_DML_IMAGEPOS" 			, "Image Position");
DEFINE("_DML_ORDERING" 			, "Ordering");
DEFINE("_DML_ACCESSLEVEL" 		, "Access Level");
DEFINE("_DML_CREATEMENUITEM"	, "This will create a new menu item in the menu you select");
DEFINE("_DML_SELECTMENU" 		, "Select a Menu");
DEFINE("_DML_SELECTMENUTYPE"	, "Select Menu Type");
DEFINE("_DML_MENUITEMNAME" 		, "Menu Item Name");
DEFINE("_DML_SELECTCATTO" 		, "Select category to");
DEFINE("_DML_REORDER" 			, "Order");
DEFINE("_DML_ACCESS" 			, "Access");
DEFINE("_DML_CAT_MUST_SELECT_NAME" , "The category must have a name");

// -- Groups
DEFINE("_DML_TITLE_GROUPS" 		, "Groups");
DEFINE("_DML_CANNOT_DEL_GROUP" 	, "Cannot delete a group at this moment because a document is owned by it.");
DEFINE("_DML_USERS_AVAILABLE" 	, "Users available");
DEFINE("_DML_MEMBERS_IN_GROUP" 	, "Members in this group");
DEFINE("_DML_ADD_GROUP_TIP" 	, "Double click over a name or select it and use the arrow to add/delete an user member. "
     . "To select more than one member at a time, " . _DML_MULTIPLE_SELECTS);
DEFINE("_DML_ADDING_USERS" 		, "Adding user members to groups");
DEFINE("_DML_FILL_FORM" 		, "Please fill in the form correctly");
DEFINE("_DML_ONLY_ADMIN_EMAIL" 	, "Only a Super Administrator can send mass e-mail!");
DEFINE("_DML_NO_TARGET_EMAIL" 	, "There are no users with valid email addresses in group");
DEFINE("_DML_THIS_IS" 			, "This is an e-mail message from");
DEFINE("_DML_SENT_BY" 			, "sent by DOCMan to the members of the documents group");
DEFINE("_DML_EMAIL_SENT_TO" 	, "E-mail sent to");
DEFINE("_DML_MEMBERS" 			, "Members");
DEFINE("_DML_EMAIL"				, "Email");

// -- Licenses
DEFINE("_DML_LICENSE_TEXT" 		, "License Text");
DEFINE("_DML_CANNOT_DEL_LICENSE", "Cannot delete a license because a document is using it.");

// -- Config
DEFINE("_DML_VERSION" 			, "Version");
DEFINE("_DML_FRONTEND" 			, "Frontend");
DEFINE("_DML_PERMISSIONS" 		, "Permissions");
DEFINE("_DML_RESETDEFAULT" 		, "Reset default");
DEFINE("_DML_ASCENDENT" 		, "Ascendent");
DEFINE("_DML_DESCENDENT" 		, "Descendent");

DEFINE("_DML_CONFIGURATION" 	, "DOCMan Configuration");
DEFINE("_DML_CONFIG_UPDATED" 	, "The configuration details have been updated.");
DEFINE("_DML_CONFIG_WARNING" 	, "WARNING: Configuration updated but Upload-Max Filesize is larger than PHP maximum: ");
DEFINE("_DML_CONFIG_ERROR" 		, "An Error Has Occurred: Unable to open config file to write!");
DEFINE("_DML_CONFIG_ERROR_UPLOAD", "ERROR: The Upload-Max Filesize cannot be negative.");

DEFINE("_DML_CFG_DOCMANTT" 		, "DOCMan tooltip...");
DEFINE("_DML_CFG_ALLOWBLANKS" 	, "Allow blanks");
DEFINE("_DML_CFG_REJECT" 		, "Reject");
DEFINE("_DML_CFG_CONVERTUNDER" 	, "Convert to underscores");
DEFINE("_DML_CFG_CONVERTDASH" 	, "Convert to dash");
DEFINE("_DML_CFG_REMOVEBLANKS" 	, "Remove Blanks");
DEFINE("_DML_CFG_PATHFORSTORING", "Path for storing files");
DEFINE("_DML_CFG_PATHTT" 		, "Here you should define the local directory where all the files will be stored. This should be an absolute path. You can accept the default value or, if you prefer a different document directory, enter the full directory path here.<br /><br />"
     . "For example, on a *NIX system this could be something like /var/usr/www/dmdocuments<br /><br />"
     . "If you are using a windows based server, you can use, for example, c:/inetpub/www/dmdocuments");
DEFINE("_DML_CFG_SECTIONISDOWN" , "Section is down?");
DEFINE("_DML_CFG_SECTIONTT" 	, "If you want to stop regular users from having access to the documents repository, set this option to *Yes*. <br />"
     . "This is useful for testings or when upgrading the repository.<br /><br />"
     . "Administrators and special users will always have access even when the option is set to *No*. <br />"
    );
DEFINE("_DML_CFG_NUMBEROFDOCS" 	, "Number of documents per page");
DEFINE("_DML_CFG_NUMBERTT" 		, "Number of documents to display in one page. If the total number of documents is greater than this number, a pagination bar is displayed for easy navigation.");

DEFINE("_DML_CFG_GUEST" 		, "Guests");
DEFINE("_DML_CFG_GUEST_NO" 		, "No Access");
DEFINE("_DML_CFG_GUEST_X" 		, "Browse only");
DEFINE("_DML_CFG_GUEST_RX" 		, "Browse, Download and View");
DEFINE("_DML_CFG_GUEST_TT" 		, "This decides what guests (non-registered users) can do: <br />*"
     . _DML_CFG_GUEST_NO . "* No documents are not visible<br />*"
     . _DML_CFG_GUEST_X . "* Allows them to see documents exist but not to access them. <br />*"
     . _DML_CFG_GUEST_RX . "* Allows them to see and access document."
     . "<br /><br />This permission is in addition to an individual document\'s access permission."
     . "</span>");
     
DEFINE("_DML_CFG_AUTHOR_NONE" 	, "No Access");
DEFINE("_DML_CFG_AUTHOR_READ" 	, "Download Only");
DEFINE("_DML_CFG_AUTHOR_BOTH"	, "Download and Edit");

DEFINE("_DML_CFG_ICONSIZE" 		, "Icon size");
DEFINE("_DML_CFG_DAYSFORNEW" 	, "Days for new");
DEFINE("_DML_CFG_DAYSFORNEWTT" 	, "Number of days that a file is still considered new. Will display the label *" . _DML_NEW . "* next to the document\'s name when a list of documents is displayed. If the value is set to zero, no label will be added.");
DEFINE("_DML_CFG_HOT" 			, "Downloads to be hot");
DEFINE("_DML_CFG_HOTTT" 		, "Number of accesses before a document is considered popular. Will display the label *" . _DML_HOT . "* near the document\'s name when the total number of accesses reaches this value. If the value is set to zero, no label will be added.");
DEFINE("_DML_CFG_DISPLAYLICENSES" , "Display licenses?");

DEFINE("_DML_CFG_VIEW" 				, "View");
DEFINE("_DML_CFG_VIEWTT" 			, "This lets you set the default user/group that can download and view documents. This may be overridden at a document level.");
DEFINE("_DML_CFG_MAINTAIN" 			, "Maintain");
DEFINE("_DML_CFG_MAINTAINTT" 		, "This lets you set the default user/group that will maintain the document. This may be overridden at a document level.");
DEFINE("_DML_CFG_CREATORS_PERM" 	, "Creators can");
DEFINE("_DML_CFG_CREATORSPERMTT" 	, "This lets you set, globally, what a document\'s creator can do.<br /><br />"
     . "This is in addition to the permissions granted by the Viewer or Maintainer fields in each document.");
DEFINE("_DML_CFG_WHOCANAREADER" 	, "Download");
DEFINE("_DML_CFG_WHOCANAREADERTT" 	, "This lets you decide if creator/maintainers can change who can view a document.<br /><br />"
     . "N.B.: Administrators can always assign viewing permission.");
DEFINE("_DML_CFG_WHOCANAEDITOR" 	, "Edit");
DEFINE("_DML_CFG_WHOCANAEDITORTT" 	, "This lets you decide if creator/maintainers can change who the maintainers are.<br /><br />"
     . "N.B.: Administrators can always select an maintainer.");

DEFINE("_DML_CFG_EMAILGROUP" 	, "E-mail group users?");
DEFINE("_DML_CFG_EMAILGROUPTT" 	, "If *yes* and first option is *yes*, will be displayed a link in each document owned by a group to allow a user to send an e-mail to all the other members of that group for discussing.");

DEFINE("_DML_CFG_UPLOAD" 		, "Upload");
DEFINE("_DML_CFG_UPLOADTT" 		, "This lets you set the user/group that can upload documents. This controls all upload methods: http, link and transfer");
DEFINE("_DML_CFG_APPROVE" 		, "Approve");
DEFINE("_DML_CFG_APPROVETT" 	, "This lets you set the user/group that can approve documents.<br />Documents must be approved and published before being available.");
DEFINE("_DML_CFG_PUBLISH" 		, "Publish");
DEFINE("_DML_CFG_PUBLISHTT" 	, "This lets you set the user/group that can publish documents.<br />Documents must be approved and published before being available.");
DEFINE("_DML_CFG_USER_UPLOAD" 		, "Select Who Can Upload");
DEFINE("_DML_CFG_USER_APPROVE" 		, "Select Who Can Approve");
DEFINE("_DML_CFG_USER_PUBLISH" 		, "Select Who Can Publish");

DEFINE("_DML_CFG_EXTALLOWED" 	, "Extensions allowed");
DEFINE("_DML_CFG_EXTALLOWEDTT" 	, "File type extensions allowed, separated by |. Backend users can upload any file type.");
DEFINE("_DML_CFG_MAXFILESIZE" 	, "Max. filesize allowed when uploading");
DEFINE("_DML_CFG_MAXFILESIZETT" , "Maximum allowable filesize for frontend uploads. You may use K/M/G as shortcuts for the entry.<br />This limit does not apply to backend (admin) uploads. <br /><hr />There is also a PHP config value, upload_max_filesize, which is set to ");
DEFINE("_DML_CFG_USERCANUPLOAD" , "User can upload all file types?");
DEFINE("_DML_CFG_USERCANUPLOADTT" 	, "If *yes* and previous *user upload* is *yes*, registered users can upload all files types, ignoring previous restriction.");
DEFINE("_DML_CFG_OVERWRITEFILES" 	, "Overwrite files?");
DEFINE("_DML_CFG_OVERWRITEFILESTT" 	, "If yes, files will be overwritten on upload when the filename is the same.");
DEFINE("_DML_CFG_LOWERCASE" 		, "Lowercase names?");
DEFINE("_DML_CFG_LOWERCASETT" 		, "If *yes*, uploaded filenames are converted to lowercase, e.g.&nbsp;YourFile.TXT becomes yourfile.txt.<br />If *no*, filenames will be saved with upper and lower case characters.");
DEFINE("_DML_CFG_FILENAMEBLANKS" 	, "Filenames with blanks");
DEFINE("_DML_CFG_FILENAMEBLANKSTT" 	, "Handling filenames that contain blanks:<br />"
     . "*Allow blanks* will save them with blanks.<br />"
     . "*Reject* will not allow the file to be uploaded.<br /><br />"
     . "You may also convert blanks to underscores (_), dashes (-) or to remove blanks from the filename.");
DEFINE("_DML_CFG_REJECTFILENAMES" 	, "Reject filenames");
DEFINE("_DML_CFG_REJECTFILENAMESTT" , "Enter a list of filenames that are not allowed to be uploaded, seperated by a vertical bar (|). These are names of files that have special meaning to the system. <br />You may also use regular expressions between the | symbol to stop filenames that contain troublesome characters.(e.g: * $ ?)");
DEFINE("_DML_CFG_UPMETHODS" 		, "Upload methods?");
DEFINE("_DML_CFG_UPMETHODSTT" 		, "Select all of the methods the user can use. For multiple methods, " . _DML_MULTIPLE_SELECTS);

DEFINE("_DML_CFG_ANTILEECH" 		, "Anti-leech system?");
DEFINE("_DML_CFG_ANTILEECHTT" 		, "The anti-leech system prevents unauthorized linking to your documents. "
     . "When set to *Yes* every request is checked to see if the download/view request "
     . "(the HTTP referer) originated from a system on the \'Allowed Hosts\' list. If it didn\'t, access will be denied. "
     . "This guards against other systems using your repository for their benefit.<br /><br />"
     . "N.B. DocMAN supports direct linking between systems. "
     . "If you use links, make sure the source system includes this host in it\'s \'Allowed Hosts\' list."
    );
DEFINE("_DML_CFG_ALLOWEDHOSTS" 		, "Allowed hosts");
DEFINE("_DML_CFG_ALLOWEDHOSTSTT" 	, "A list of hosts that can request files when the anti-leech system in activated. If you want multiple hosts to be able to refer to these files, enter their names separated by a vertical bar (|).<br />The default value is usually safe.");

DEFINE("_DML_CFG_LOG" 	, "Log views?");
DEFINE("_DML_CFG_LOGTT" , "This logs the remote ip, date and time and filename of document viewed. "
     . "A lot of information may be inserted in the database with this option enabled.<hr />"
     . "Mambots are available for additional logging capability.");

DEFINE("_DML_CFG_UPDATESERVER" 		, "Update server");
DEFINE("_DML_CFG_UPDATESERVERTT" 	, "DOCMan can update itself from the web and also install new DOCMan related modules, plugins and bots. It even can do database changes on-the-fly while upgrading! Here, you should enter the url of the DOCMan update web server. If the server has not changed (we hope not!) leave this with the default value.");
DEFINE("_DML_CFG_DEFAULTLISTING" 	, "Default listing order");
DEFINE("_DML_CFG_TRIMWHITESPACE" 	, "Trim Whitespace");
DEFINE("_DML_CFG_TRIMWHITESPACETT" 	, "Trim leading white space and blank lines from theme output, cleaning up code and saving bandwidth");

DEFINE("_DML_CFG_ERR_DOCPATH" 		, 'Tab [' . _DML_GENERAL . '] \'' . _DML_CFG_PATHFORSTORING . '\' must be provided.');
DEFINE("_DML_CFG_ERR_PERPAGE" 		, 'Tab [' . _DML_FRONTEND . '] \'' . _DML_CFG_NUMBEROFDOCS . '\' must be numeric and greater than zero');
DEFINE("_DML_CFG_ERR_NEW" 			, 'Tab [' . _DML_FRONTEND . '] \'' . _DML_CFG_DAYSFORNEW . '\' must be numeric and zero or greater');
DEFINE("_DML_CFG_ERR_HOT" 			, 'Tab [' . _DML_FRONTEND . '] \'' . _DML_CFG_HOT . '\' must be numeric and zero or greater');
DEFINE("_DML_CFG_ERR_UPLOAD" 		, 'Tab [' . _DML_PERMISSIONS . '] \'' . _DML_CFG_UPLOAD . '\': Select who can upload documents.');
DEFINE("_DML_CFG_ERR_APPROVE" 		, 'Tab [' . _DML_PERMISSIONS . '] \'' . _DML_CFG_APPROVE . '\': Select who can approve documents.');
DEFINE("_DML_CFG_ERR_DOWNLOAD" 		, 'Tab [' . _DML_PERMISSIONS . '] \'' . _DML_CFG_VIEW . '\': Select a default user/group.');
DEFINE("_DML_CFG_ERR_EDIT" 			, 'Tab [' . _DML_PERMISSIONS . '] \'' . _DML_CFG_MAINTAIN . '\': Select a default user/group for document maintenance');
DEFINE("_DML_CFG_EXTENSIONSVIEWING" , "Extensions for viewing");
DEFINE("_DML_CFG_EXTENSIONSVIEWINGTT" , "File type extensions that can be viewed. Use blank for none, * for all. Use a | between types (txt|pdf).");

// -- Statistics
DEFINE("_DML_STATS" 	, "Statistics");
DEFINE("_DML_DOCSTATS" 	, "DOCMan statistics - Top 50 downloads");
DEFINE("_DML_RANK" 		, "Rank");

// -- Logs
DEFINE("_DML_DOWNLOAD_LOGS"	, "Download logs");
DEFINE("_DML_IP" 			, "IP");
DEFINE("_DML_BROWSER" 		, "Browser");
DEFINE("_DML_OS" 			, "Operating System");
DEFINE("_DML_ANONYMOUS" 	, "Anonymous");

// -- Updates
DEFINE("_DML_UPGRADE" 			, "Upgrade");
DEFINE("_DML_YOU_HAVE_VERSION" 	, "you have version");
DEFINE("_DML_UPTODATE" 			, "Your version is up-to-date.");
DEFINE("_DML_NO_UP_AVAIL" 		, "No updates available at this time.");
DEFINE("_DML_COULD_NOT_COPY" 	, "Could not copy all the files to their directories. Check permissions. Stopped at file");
DEFINE("_DML_UPDATING_DB" 		, "Updating database...");
DEFINE("_DML_DELETING_OLD" 		, "Deleting old files...");
DEFINE("_DML_ERROR_DELETING_OLD", "Error deleting old files. Not a critical error.");
DEFINE("_DML_PACKAGE" 			, "Package");
DEFINE("_DML_INST_CLICK" 		, "installed. Click");
DEFINE("_DML_HERE" 				, "here");
DEFINE("_DML_TO_CONT" 			, "to continue");
DEFINE("_DML_ERROR_READING" 	, "error reading");
DEFINE("_DML_XML_ERROR" 		, "XML file invalid");
DEFINE("_DML_CHECKING_UP" 		, "Checking for updates");
DEFINE("_DML_RELEASED_ON" 		, "Released on");

// -- Themes
DEFINE("_DML_THEMES" 			, "Themes");
DEFINE("_DML_THEME_INSTALLED" 	, "Icon theme installed.");
DEFINE("_DML_ADJUST_CONFIG" 	, "Adjust configuration.");


//Moved to theme language file (27-01-2005)
//DEFINE("_CAT_VIEW" , "Downloads Home"); 

//DEFINE ("_MUST_LOGIN" , "You must login to submit new documents");
//DEFINE ("_SEARCH_DOC" , "Search document");

//DEFINE ("_ORDER_BY" , "Order by");
//DEFINE ("_ONAME" , "name");
//DEFINE ("_ODATE" , "date");
//DEFINE ("_OHITS" , "hits");
//DEFINE ("_ASCENT" , "ascendent");
//DEFINE ("_DESCENT" , "descendent"); 
//DEFINE("_DATEADDED" , "Date added");
//DEFINE("_DETAILSFOR" , "Details for");
//DEFINE("_LBL_NAME" , "Name");
//DEFINE("_LBL_DESC" , _DESCRIPTION);
//DEFINE("_LBL_FNAME", _FILENAME . ":");
//DEFINE("_LBL_FSIZE", "Filesize:");
//DEFINE("_LBL_FTYPE", "Filetype:");
//DEFINE("_LBL_SUBBY", _TXT_SUBBY . ":");
//DEFINE("_LBL_SUBDT", "Created On:");
//DEFINE("_LBL_OWNER", _OWNER . ":");
//DEFINE("_LBL_MAINT", _MANTAINEDBY . ":");
//DEFINE("_LBL_HITS" , _DOWNLOADS . ":");
//DEFINE("_LBL_LASTUP", "Last updated on:");
//DEFINE("_LBL_LASTBY", "Last updated by:");
//DEFINE("_LBL_HOME" , _HOMEPAGE . ":");
//DEFINE("_LBL_MIME" , _MIME . ":");
//DEFINE("_LBL_CHECKED_OUT", _CHECKED_OUT . ":");
//DEFINE("_LBL_CHECKED_BY", _STATUS . ":");
//DEFINE("_DMTB_DOWNLOAD" , "Download");
//DEFINE("_DMTB_VIEW" , "View");
//DEFINE("_DMTB_DETAILS" , "Details");
//DEFINE("_DMTB_EDIT" , "Edit");
//DEFINE("_DMTB_MOVE" , "Move");
//DEFINE("_DMTB_CHECKOUT" , "Checkout");
//DEFINE("_DMTB_CHECKIN" , "Checkin");
//DEFINE("_DMTB_UNPUBLISH", "Unpublish");
//DEFINE("_DMTB_PUBLISH" , "Publish");
//DEFINE("_DMTB_BACK" , "Back");
//DEFINE("_DMTB_RESET" , "Reset");
//DEFINE("_DMTB_APPROVE" , "Approve");
//DEFINE("_MOVEDOCOTHER" , "Move document to other category");

// UNUSED -> keepin in until development cycle is over.
//DEFINE ("_SELECCAT" , "Select category");
//DEFINE ("_ALLCATS" , "All categories");
//DEFINE ("_SEARCH_WHERE" , "Search where");
//DEFINE ("_SEARCHBY" , "Search by");
//DEFINE ("_SEARCH_MODE" , "Search by");
//DEFINE ("_SEARCH" , "Search");
//DEFINE ("_SEARCH_REVRS" , "Reverse");
//DEFINE ("_SEARCH_REGEX" , "Regular Expression");
//DEFINE ("_NOT" , "Not"); // Used for Inversion
//DEFINE("_TXT_NAME" , "Name");
//DEFINE("_TXT_DESC" , "Description");
//DEFINE("_TXT_SUBBY" , "Creator");
//DEFINE("_TXT_OWNER" , _DML_OWNER);
//DEFINE ("_UPLOADED" , "uploaded.");
//DEFINE ("_ERROR" , "Error. Please select another document to upload.");
//DEFINE ("_ISNO" , "Auto-approve is on. This submission was auto-approved and published");
//DEFINE ("_ISONFOR" , "Auto-approve is on for personal/group documents. This submission was sent to \"everybody\". You need to approved and publish the submission");
//DEFINE ("_ISOFF" , "Auto-approve is off. You, or another admin, needs to approve and publish this submission");
//DEFINE ("_STEP" , "Step");
//DEFINE ("_OF" , "of");
//DEFINE ("_CHECKOUT" , "Check-out this document. When a document is checked-out other users can not edit, view or update a document.");
//DEFINE ("_CHECKIN" , "Check-in this document to allow other users to edit, view or update it.");
// Download
//DEFINE ("_PROCEED" , "Click here to proceed");
//DEFINE("_ANTILEECH_ACTIVE" , "You are trying to access from a non-authorized domain.");
//DEFINE("_YOU_MUST" , "You must accept the agreement to view the document.");
//DEFINE ("_NOTDOWN" , "The document is being edited/updated by an user and is unavailable at this moment.");
//DEFINE("_RETURNTO" , "Return to documents");
//DEFINE ("_WILL" , "The document will be available after approval by administrator.");
//DEFINE ("_THANKSDOCMAN" , "Thank you for your submission.");
//DEFINE ("_CREATED_ON" , "Created on");
//DEFINE ("_ON" , "on");
//DEFINE ("_BY" , "by");
//DEFINE ("_LAST_MODIFIED_ON" , "Last modified on");
//DEFINE("_MANTAINEDBY" , "Maintained by");
//DEFINE("_DOCMOVED" , "Document has been moved");
//DEFINE("_MOVETO" , "Move to");
//DEFINE("_MOVE" , "Move");
//DEFINE("_MOVETHEFILES" , "Move the files");
//DEFINE("_OP_CANCELED" , "Operation Canceled");
//DEFINE("_OWNERSHIP" , "Ownership");
//DEFINE ("_RESULTS" , "Results");
//DEFINE ("_NOFILES_SEARCH" , "The search did not find any matching documents.");
//DEFINE("_NOLOG" , "You must login to access the document section.");
//DEFINE("_NOLOG_UPLOAD" , "You must login and be authorized to upload documents.");
//DEFINE("_NOLOG_DOWNLOAD" , "You must login and be authorized to access documents.");
//DEFINE ("_STATUS" , "Checked out by");
//DEFINE ("_NOT_AUTHORIZED" , "Not authorized");
//DEFINE ("_ISDOWN" , "Sorry, this section is temporary down for maintenance. Try again later.");
//DEFINE ("_ISDOWNADMIN" , "NOTE: This section is down and will not be displayed to regular users.");
//DEFINE ("_NEW_DOC_SUB" , "New document submitted for");
//DEFINE ("_HELLO_ADMIN" , "Hello;\n\nA new document, \"");
//DEFINE ("_HASBEEN" , "\", has been submitted to the website");
//DEFINE ("_PLEASEDONOT" , "\nPlease do not respond to this message; It has been automatically generated by DOCMan and is for information purposes only.");
// Files
//DEFINE("_DOCLINKTO" , "Document linked to ");
//DEFINE("_DOCLINKON" , "Link created on ");
//DEFINE("_ERROR_LINKING" , "Error connecting to host.");
//DEFINE("_LINKTO" , "Link to ");
//DEFINE("_DONE" , "Done.");
//DEFINE("_CFG_ERRORS" , "DOCMan System Message"
//     . '\nPlease correct the following error(s):');
//DEFINE("_CFG_DETAILS_NONE" , "No details");
//DEFINE("_CFG_DETAILS_TOOLTIP" , "Tooltip");
//DEFINE("_CFG_DETAILS_PAGE" , "Details page");
//DEFINE("_CFG_MAXFILESIZETT_2" , "in the php.ini file that applies to everyone. You cannot affect that value here.");
//DEFINE("_CFG_MAXALLOWED" , "Max. Filesize allowed");
//DEFINE("_CFG_DISPLAYDETAILS" , "Display document details");
//DEFINE("_CFG_DISPLAYDETAILSTT" , "Will display document details using a rollover tooltip side-by-side the document name or using a per document details page.");
//DEFINE("_INSTALLING" , "Installing...");
//DEFINE("_CFG_ASSIGN_NONE" , "Administrator Only");
//DEFINE("_CFG_ASSIGN_AUTHOR" , "Admin and Creator Only");
//DEFINE("_CFG_ASSIGN_EDITOR" , "Admin and Maintainer Only");
//DEFINE("_CFG_ASSIGN_BOTH" , "Admin, Creator and Maintainer");

//DEFINE("_CFG_CATIMAGE" , "Category image?");
//DEFINE("_CFG_DOCIMAGE" , "Document image?");
//DEFINE("_CFG_SHOWDESC" , "Show description?");
//DEFINE("_CFG_SHOWSITE" , "Show homepage?");
//DEFINE("_CFG_SHOWCOUNTER" , "Show counter");
//DEFINE("_CFG_SHOWDATE" , "Show date?");
//DEFINE("_CFG_LNK_DOWNLOAD" , "Show download link?");
//DEFINE("_CFG_LNK_VIEW" , "Show view link?");
//DEFINE("_CFG_AUTHOR_EDIT" , "Download and Edit");
//DEFINE("_JUST_FOR" , "Just for personal/group files");
//DEFINE("_FOR_EVERYBODY" , "For everybody");
//DEFINE("_USERS_LC" , "users");
//DEFINE("_NOIMAGE" , "No image");
//DEFINE("_FOLDERICON" , "Folder Icon");
//DEFINE("_FILEICON" , "File Icon");
//DEFINE("_WRITABLE" , "Writable");
//DEFINE("_UNWRITABLE" , "Unwritable");
//DEFINE("_ALLREGISTERED" , "All registered users");
//DEFINE("_DISPLAY_LIC" , "Display agreement");
//DEFINE("_MUST_SELECT" , "You must select a category");
//DEFINE("_PENDING" , "Pending");
//DEFINE("_AUTHORS" , "Creators");
//DEFINE("_DOCMANISLINKING" , "DOCMan is checking <br />the link");
//DEFINE("_URL_BLANK" , "URL is blank");
//DEFINE("_URL_MISSING" , "URL missing ");
//DEFINE("_URL_BAD" , "URL portion invalid -");
//DEFINE("_URL_CANT_OPEN" , "Can not connect to URL ");
//DEFINE("_ERRO", "ERROR!");
//DEFINE("_UNKKNOWN" , "Unknown");
//DEFINE("_USER_LC", "User");
//DEFINE ("_EVERY" , "Everybody");
//DEFINE("_SELECT_MANT" , "Select Maintainer");
//DEFINE("_UNKNOWN" , "Unknown User");
// DEFINE("_FILTER"		, "Filter");
//DEFINE ("_DELETE" , "Delete");
//DEFINE("_DETAILS" , "Details");
//DEFINE("_NOT_PUBLISHED" , "Not published");
//DEFINE("_TRANSFER" , "Transfer");
//DEFINE("_LINK" , "Link");
//DEFINE("_DISPLAY" , "Display");
//DEFINE("_SECTION_TITLE" , "Downloads");
//DEFINE("_TOOLTIP" , "Tooltip");
//DEFINE("_DETAILSPAGE" , "Details page");
//DEFINE("_EMAIL_GROUP" , "Email Group Members");
//DEFINE("_SUBJECT" , "Subject");
//DEFINE("_EMAIL_LEADIN", "Message leadin");
//DEFINE("_MESSAGE" , "Message");
//DEFINE("_SEND_EMAIL" , "Send Email");
// DEFINE("_UPLOADMRE","Upload more files.");
// DEFINE("_DM_UPLOAD_WIZARD_XFER", ' - Transfer from another server' );
// DEFINE("_INTERNAL_ERROR"	,"Internal Error - please report this to developers.");
// DEFINE("_SELECT_ITEM_TO","Select an item to");
// DEFINE("_NO_MANT","No maintainer");
// DEFINE("_ONLY_GROUPS","Only groups");
// DEFINE("_ONLY_USERS","Only individual users");
// DEFINE("_GROUPS_USERS","Groups/Individual users");
// DEFINE("_NO_ORPHANS","No orphan files founded.");
// DEFINE("_PACKAGE_DOESNT","The package doesnt exist.");
// DEFINE("_SHOW_PENDING","Show only pending documents");
// DEFINE("_RESET_FILTER","reset filter");
// DEFINE("_PUBLISHED_BUT_IS","Published, but is");
// DEFINE("_PUBLISHED_AND_IS","Published, and is");
// DEFINE("_TOGGLE","Click on icon to toggle state.");
// DEFINE("_INSTALL_ICON","Install an icon theme");
// DEFINE("_SELECT_THEME","Select a theme file (zip compressed)");
// DEFINE("_ERROR_THEME","Error. Please select another document to upload.");
// DEFINE("_ONLY_CHARS","Files must only contain alphanumeric characters and no spaces please.");
// DEFINE("_NO_SPACE_DISK","Not enough space on disk.");
// DEFINE("_NOFILES","No files available in this category.");
// DEFINE("_HOW","Click over the icon to download the file.");
// DEFINE("_HOW2","Click over the name to download the file.");
// DEFINE("_LISTING_CONTENTS","Listing contents on");
// DEFINE("_NO_CONTENT","No content in this folder.");
// DEFINE("_DOCUMENTNAME","Title");
// DEFINE("_RELATED_URL","Homepage");
// DEFINE("_PAGES","Page");
// DEFINE("_DOWN_START","You are about to start downloading");
// DEFINE("_DOWN_CLICK","Click here to download");
// DEFINE("_DOWN_BACK","or here to return to previous page");
// DEFINE("_DOWNLOADED","hits");
// DEFINE("_CATEGORY_SELECT","Please select the category");
// DEFINE ("_MUST_BE","File must only contain alphanumeric characters and no spaces please.");
// DEFINE ("_EXEC_NO","Executables not allowed. Try a different file.");
// DEFINE ("_T_DOC","The document already exists. Try with a different filename.");
// DEFINE ("_FILETYPENALLOWED","Filetype not allowed. Please use only one of the following extensions:");
// DEFINE ("_FILESIZE","Filesize is bigger than allowed.");
// DEFINE ("_ESTIMATED","Estimated download time");
// DEFINE ("_SEC","sec. at");
// DEFINE ("_MUST_SELECT_NAME","The document must have a name");
// DEFINE ("_NOT_WRITABLE","Directory not writable or doesn\"t exist at all. Please contact the web administrator.");
// DEFINE ("_NO_SPACE","No available space. Please contact the web administrator.");
// DEFINE ("_PROBLEM","There was a problem while uploading. Please try again.");
// DEFINE ("_ERROR_SAVE_FILE","Error saving file. Check permissions.");
// DEFINE ("_SAVED","Document saved.");
// DEFINE ("_SAVE","Save");
// DEFINE ("_ISBEING","The document is being edited/checked out by another user.");
// DEFINE ("_UPDATETHIS","Update this document, uploading a new file.");
// DEFINE ("_SELOWNER","Select owner");
// DEFINE ("_MYSELF","Myself");
// DEFINE ("_UPDATEDOC","Update a document");
// DEFINE ("_ALWAYS","This will ALWAYS overwrite the file if the name is the same.");
// DEFINE ("_SELECTFILE","Select a file");
// DEFINE ("_DOCUMENTSUBCAT","Documents in this subcategory");
// DEFINE ("_URLNOTE","("._MAKE_SURE.")");
// DEFINE ("_UPDATE_DOC","Update");
// DEFINE ("_HISTORY","View history");
// DEFINE ("_OWNED_BY","Document owned by");
// DEFINE ("_EMAIL_GROUP_USERS","Send an e-mail to other members of the group to discuss this file");
// DEFINE ("_VIEWDOC","Click over this icon to see the document.");
// DEFINE ("_VIEWDOC2","View document.");
// DEFINE("_FILEUPDATED","File updated");
// DEFINE("_SUBMIT_NEW_DOC","Submit");
// DEFINE("_PROBLEM_FILES","There is a configuration problem. Please inform the administrator");
// DEFINE("_MOVEDOCDES","Click here to move this document to other category or subcategory");
// DEFINE("_UNPUBLISHDES","Click here to unpublish this document");
// DEFINE("_DELETEDES","Click here to delete this document. THIS WILL NOT BE CONFIRMED! For extra safety, the physical file will not be deleted.");
// DEFINE("_RESETCOUNTER","Reset Counter");
// DEFINE("_RESETDESC","Click here to reset this download counter.");
// DEFINE("_UNPUBLISHED","The document has been unpublished.");
// DEFINE("_DELETED","The document has been deleted.");
// DEFINE("_RESETED","The download counter has been reset.");

?>