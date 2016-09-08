<?php
/*
* DOCMan 1.3.0 for Mambo 4.5.1 CMS
* @version $Id: english.frontend.php,v 1.8 2005/05/20 23:24:13 johanjanssens Exp $
* @package DOCMan_1.3.0
* @copyright (C) 2003 - 2005 The DOCMan Development Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Oficial website: http://www.mambodocman.com/
* -------------------------------------------
* Default english language file
* Creator: The DOCMan development team
* Email: admin@mambodocman.com
* Revision: 1.0
* Date: April 2005
*/
// ensure this file is being included by a parent file */
defined("_VALID_MOS") or die("Direct Access to this location is not allowed.");

// -- General
DEFINE("_DML_NOLOG" 			, "You must login to access the document section.");
DEFINE("_DML_NOLOG_UPLOAD" 		, "You must login and be authorized to upload documents.");
DEFINE("_DML_NOLOG_DOWNLOAD" 	, "You must login and be authorized to access documents.");
DEFINE("_DML_ISDOWN" 			, "Sorry, this section is temporary down for maintenance. Try again later.");
DEFINE("_DML_SECTION_TITLE" 	, "Downloads");

// -- Files
DEFINE("_DML_DOCLINKTO" 	, "Document linked to ");
DEFINE("_DML_DOCLINKON" 	, "Link created on ");
DEFINE("_DML_ERROR_LINKING" , "Error connecting to host.");
DEFINE("_DML_LINKTO" 		, "Link to ");
DEFINE("_DML_DONE" 			, "Done.");

// -- Documents
DEFINE("_DML_TAB_PERMISSIONS" 	, "Permissions");
DEFINE("_DML_TAB_LICENSE" 		, "License");
DEFINE("_DML_TAB_DETAILS" 		, "Details");
DEFINE("_DML_TAB_PARAMS" 		, "Parameters");
DEFINE("_DML_OP_CANCELED" 		, "Operation Canceled");
DEFINE("_DML_CREATED_BY" 		, "Created by");
DEFINE("_DML_UPDATED_BY" 		, "Last updated by");
DEFINE("_DML_DOCMOVED" 			, "Document has been moved");
DEFINE("_DML_MOVETO" 			, "Move to");
DEFINE("_DML_MOVETHEFILES" 		, "Move the files");
DEFINE("_DML_SELECTFILE"		,"Select a file");
DEFINE("_DML_THANKSDOCMAN" 		, "Thank you for your submission.");
DEFINE("_DML_NO_LICENSE" 		, "no license");
DEFINE("_DML_DISPLAY_LIC" 		, "Display agreement");
DEFINE("_DML_LICENSE_TYPE" 		, "License Type");
DEFINE("_DML_MANT_TOOLTIP" 		, "This determines who can edit, or maintain, the document. "
     . "When a user, or member of a group, is the " . _DML_MAINTAINER . " of a document it means that they can use the specific document management options: edit, update, move, check in/out and delete.");
DEFINE("_DML_ON" 				, "on");
DEFINE("_DML_CURRENT" 			, "Current");
DEFINE("_DML_YOU_MUST_UPLOAD" 	, "You must upload a document for this section first.");
DEFINE("_DML_THE_MODULE" 		, "The module");
DEFINE("_DML_IS_BEING" 			, "is currently being edited by another administrator");
DEFINE("_DML_LINKED" 			, "->LINKED DOCUMENT<-");
DEFINE ("_DML_FILETITLE" 		, "File Title");
DEFINE("_DML_OWNER_TOOLTIP" , "This determines who can download and view the document. Choose: "
     . "*Everybody* if you want anyone to be able to access the document. "
     . "*All registered users* only allows users that have an account at your site access to the document. "
     . "You can assign the document to a single registered user by selecting a name under " . _DML_USERS . "; "
     . "only that user will be granted access. "
     . "You can assign the document to a group of registered users by selecting the group name under " . _DML_GROUPS . "; "
     . "only the group members will be granted access to the document.");
DEFINE("_DML_MAKE_SURE" 		, 'Make sure to start the url<br />with "http://"');
DEFINE("_DML_DOCURL" 			, "URL of Document:");
DEFINE("_DML_DOCDELETED" 		, "Document deleted.");
DEFINE("_DML_DOCURL_TOOLTIP" 	, "When you have LINKED documents you must enter the website address (URL) for the document here. Always include the protocol (http:// or ftp://) at the begining.");
DEFINE("_DML_HOMEPAGE_TOOLTIP" 	, "You may optionally enter a website address (URL) for information that is related to this document. Always include http:// at the beginning of the url or it will not work.");
DEFINE("_DML_LICENSE_TOOLTIP" 	, "A document can have an agreement license that the viewers should accept to access it. Here you can define the license type.");
DEFINE("_DML_DISPLAY_LICENSE" 	, "Display agreement/License when viewing");
DEFINE("_DML_DISPLAY_LIC_TOOLTIP" , "Choose`*yes* if you want that the license displayed to the user before access is granted.");
DEFINE("_DML_APPROVED_TOOLTIP" 	, "A document should be approved to be visible and available on the repository. Say *yes* here and don\'t forget to publish it too! Both options should be set so the document can be listed on the frontend");
DEFINE("_DML_RESET_COUNTER"		,"Reset Counter");

// -- Download
DEFINE("_DML_PROCEED" 	, "Click here to proceed");
DEFINE("_DML_YOU_MUST" 	, "You must accept the agreement to view the document.");
DEFINE("_DML_NOTDOWN" 	, "The document is being edited/updated by an user and is unavailable at this moment.");
DEFINE("_DML_ANTILEECH_ACTIVE" , "You are trying to access from a non-authorized domain.");
DEFINE("_DML_DONT_AGREE" 	, "I don't agree.");
DEFINE("_DML_AGREE" 		, "I agree.");

// -- Upload
DEFINE("_DML_UPLOADED" 		, "uploaded.");
DEFINE("_DML_SUBMIT"		, "Submit");
DEFINE("_DML_NEXT"			, "Next >>>");
DEFINE("_DML_BACK"			, "<<< Back");
DEFINE("_DML_LINK"			, "Link");
DEFINE("_DML_EDITDOC" 		, "Edit this document");
DEFINE("_DML_UPLOADWIZARD" 	, "Upload wizard");
DEFINE("_DML_UPLOADMETHOD" 	, "Choose the upload method");
DEFINE("_DML_ISUPLOADING" 	, "DOCMan is Uploading");
DEFINE("_DML_PLEASEWAIT" 	, "Please Wait");
DEFINE("_DML_DOCMANISLINKING" 	, "DOCMan is checking <br />the link");
DEFINE("_DML_DOCMANISTRANSF" 	, "DOCMan is transfering<br />the file");
DEFINE("_DML_TRANSFER" 		, "Transfer");
DEFINE("_DML_REMOTEURL" 	, "Remote URL");
DEFINE("_DML_LINKURLTT" 	, "Enter the remote URL that you want to access. The URL must include a scheme (http:// or ftp://) and any other access information required. For example: http://mamboforge.net/frs/download.php/2026/docmanV1.3.zip.");
DEFINE("_DML_REMOTEURLTT" 	, _DML_LINKURLTT . "<br />You may call the file anything you wish on this system by using the &quot;Local Name&quot; field.");
DEFINE("_DML_LOCALNAME" 	, "Local Name");
DEFINE("_DML_LOCALNAMETT" 	, "Enter the local name of the file as you wish it stored on this system."
     . "This is a required field as the URL does not give sufficient information for the document.");
DEFINE("_DML_ERROR_UPLOADING" , "Error uploading.");

// -- Search
DEFINE("_DML_SELECCAT" 		, "Select category");
DEFINE("_DML_ALLCATS" 		, "All categories");
DEFINE("_DML_SEARCH_WHERE" 	, "Search where");
DEFINE("_DML_SEARCH_MODE" 	, "Search by");
DEFINE("_DML_SEARCH" 		, "Search");
DEFINE("_DML_SEARCH_REVRS" 	, "Reverse");
DEFINE("_DML_SEARCH_REGEX" 	, "Regular Expression");
DEFINE("_DML_NOT" 			, "Not"); // Used for Inversion


//Moved to theme language file (27-01-2005)
//DEFINE("_DOCMAN_GROUPS" , "Docman Groups");
//DEFINE("_MAMBO_GROUPS" , "Mambo Groups");
//DEFINE("_CATS" , "Categories"); 
//DEFINE("_DOCS" , "Documents");
//DEFINE("_CAT_VIEW" , "Downloads Home"); 
//DEFINE("_FILES" , "Files");
//DEFINE ("_MUST_LOGIN" , "You must login to submit new documents");
//DEFINE ("_SEARCH_DOC" , "Search document");
//DEFINE ("_EDITDOC" , "Edit this document");
//DEFINE ("_ORDER_BY" , "Order by");
//DEFINE ("_ONAME" , "name");
//DEFINE ("_ODATE" , "date");
//DEFINE ("_OHITS" , "hits");
//DEFINE ("_ASCENT" , "ascendent");
//DEFINE ("_DESCENT" , "descendent"); 
//DEFINE("_HITS" , "Hits");
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
//DEFINE("_ALLREGISTERED" , "All registered users");
//DEFINE("_TXT_SUBBY" , "Creator");
//DEFINE("_TXT_OWNER" , _DML_OWNER);
//DEFINE("_PLEASE_SEL_CAT"        , "Please define at least one category first");
//DEFINE("_DISPLAY_LIC" , "Display agreement");
//DEFINE("_PENDING" , "Pending");
//DEFINE("_CURRENT" , "Current");

//DEFINE("_MANT" , _EDITOR);
//DEFINE ("_SEARCHBY" , "Search by");
//DEFINE ("_ERROR" , "Error. Please select another document to upload.");
//DEFINE ("_ISNO" , "Auto-approve is on. This submission was auto-approved and published");
//DEFINE ("_ISONFOR" , "Auto-approve is on for personal/group documents. This submission was sent to \"everybody\". You need to approved and publish the submission");
//DEFINE ("_ISOFF" , "Auto-approve is off. You, or another admin, needs to approve and publish this submission");
//DEFINE ("_SELECT_FILE" , "Select a file:");
//DEFINE("_RETURNTO" , "Return to documents");
//DEFINE ("_STATUS_YOU" , "This document is checked-out by you.");
//DEFINE ("_STATUS_NOT_OUT" , "This document is not checked-out.");
//DEFINE ("_CHECKOUT" , "Check-out this document. When a document is checked-out other users can not edit, view or update a document.");
//DEFINE ("_CHECKIN" , "Check-in this document to allow other users to edit, view or update it.");
//DEFINE("_SELECT_ITEM_DEL" , "Select an item to delete");
//DEFINE("_SELECT_ITEM_MOVE" , "Select an item to move");
//DEFINE ("_WILL" , "The document will be available after approval by administrator.");
//DEFINE("_MOVE" , "Move");
//DEFINE("_AUTHORS" , "Creators");
//DEFINE("_MOVECAT" , "Move Category");
//DEFINE("_MOVETOCAT" , "Move to Category");
//DEFINE("_DOCSMOVED" , "Documents being moved");
//DEFINE("_DOCS_NOT_APPROVED" , "documents not approved");
//DEFINE("_DOCS_NOT_PUBLISHED", "documents not published");
//DEFINE("_NO_PENDING_DOCS" , "No pending documents.");
//DEFINE("_FILE_MISSING" , "***file missing***");
//DEFINE ("_CREATED_ON" , "Created on");
//DEFINE ("_ON" , "on");
//DEFINE ("_BY" , "by");
//DEFINE ("_LAST_MODIFIED_ON" , "Last modified on");
//DEFINE("_MANTAINEDBY" , "Maintained by");
//DEFINE("_ZLIB_ERROR" , "The operation could not proceed because zlib library is not present in php.");
//DEFINE("_DML_UNZIP_ERROR" , "Could not unzip the files.");
//DEFINE("_EXT" , "Extension");
//DEFINE("_MIME" , "Mime Type");
//DEFINE("_SELECTMETHODFIRST" , "Please Select a Document Transfer Method");
//DEFINE("_DOCUPDATED" , "Document has been updated.");
//DEFINE("_FILEUPLOADED" , "File has been uploaded.");
//DEFINE("_MAKENEWENTRY" , "Make a new document entry using this file.");
//DEFINE("_DISPLAYFILES" , "Display Files.");
//DEFINE("_ALLFILES" , "All Files");
//DEFINE("_DOCFILES" , "Document Files");
//DEFINE("_UPLOADDISK" , "Upload wizard - Upload a file from your hard disk");
//DEFINE("_FILETOUPLOAD" , "Choose the file to upload");
//DEFINE("_BATCHMODE" , "Batch Mode");
//DEFINE("_BATCHMODETT" , "Batch mode uploads a zipped package containing multiple files. The package will be unzipped on-the-fly after uploading. You should not include zipped directories and/or subdirectories in the package. Have in mind that the process could overwrite DOCMan files present in the DocMan documents directory that have the same filename; there is no overwrite protection using zipped files. This is experimental and you should use it with caution.");
//DEFINE ("_ISDOWNADMIN" , "NOTE: This section is down and will not be displayed to regular users.");
//DEFINE ("_NEW_DOC_SUB" , "New document submitted for");
//DEFINE ("_HELLO_ADMIN" , "Hello;\n\nA new document, \"");
//DEFINE ("_HASBEEN" , "\", has been submitted to the website");
//DEFINE ("_PLEASEDONOT" , "\nPlease do not respond to this message; It has been automatically generated by DOCMan and is for information purposes only.");
//DEFINE("_OWNERSHIP" , "Ownership");
//DEFINE("_CREATED" , "Created");
//DEFINE ("_STATUS" , "Checked out by");
//DEFINE ("_RESULTS" , "Results");
//DEFINE ("_NOFILES_SEARCH" , "The search did not find any matching documents.");
//DEFINE("_ORPHANS" , "Orphans");
//DEFINE("_ORPHANS_LINKED" , "File(s) not deleted. Cannot delete file(s) linked to documents.");
//DEFINE("_ORPHANS_PROBLEM" , "File(s) not deleted. There is a problem with the file permissions.");
//DEFINE("_ORPHANS_DELETED" , "File(s) deleted.");
//DEFINE("_LINKS" , "Links");
//DEFINE("_NEXT" , "Next");
//DEFINE("_SUCCESS" , "Success!");
//DEFINE("_UPLOADMORE" , "Upload more");
//DEFINE("_ERRO", "ERROR!");
//DEFINE("_ENTRY_ERRORS" , "DOCMan System Message"
//     . '\nPlease correct the following error(s):');
//DEFINE("_ENTRY_TITLE" , "Entry should have a title.");
//DEFINE("_ENTRY_NAME" , "Entry must have a name.");
//DEFINE("_ENTRY_DATE" , "Entry must have a date.");
//DEFINE("_ENTRY_OWNER" , "Entry must have an owner.");
//DEFINE("_ENTRY_CAT" , "Entry must have a category.");
//DEFINE("_ENTRY_DOC" , "Entry must have a document selected.");
//DEFINE("_ENTRY_MAINT" , "Entry must have a maintainer specified.");
//DEFINE("_ENTRY_DOCLINK_LINK" , "Document needs to have LINK selected. (Linked document on Details tab.)");
//DEFINE("_ENTRY_DOCLINK" , "Document has both a filename and a document link on Details tab.");
//DEFINE("_ENTRY_DOCLINK_PROTOCOL" , "Unknown protocol for document link on Details tab");
//DEFINE("_ENTRY_DOCLINK_NAME" , "Need full document link on Details tab");
//DEFINE("_ENTRY_DOCLINK_HOST" , "A complete URL is required");
//DEFINE("_URL_BLANK" , "URL is blank");
//DEFINE("_URL_MISSING" , "URL missing ");
//DEFINE("_URL_BAD" , "URL portion invalid -");
//DEFINE("_URL_CANT_OPEN" , "Can not connect to URL ");
//DEFINE("_DML_OPTION_HTTP" , 'Upload a file from your computer');
//DEFINE("_DM_OPTION_XFER" , 'Transfer a file from another server to this server');
//DEFINE("_DM_OPTION_LINK" , 'Link a file from another server to this server');
//DEFINE("_SIZEEXCEEDS" , "Size exceeds maximum permitted.");
//DEFINE("_ONLYPARTIAL" , "Only partial file received. Try again.");
//DEFINE("_NOUPLOADED" , "No document uploaded.");
//DEFINE("_TRANSFERERROR" , "Transfer error occurred");
//DEFINE("_DIRPROBLEM" , "Directory problem-cannot move file.");
//DEFINE("_DIRPROBLEM2" , "Directory problem");
//DEFINE("_COULDNOTCONNECT" , "Could not connect to host");
//DEFINE("_COULDNOTOPEN" , "Could not open destination directory. Check permissions.");
//DEFINE("_FILETYPE" , "File type");
//DEFINE("_NOTPERMITED" , "not permitted");
//DEFINE("_FILE" , "File");
//EFINE("_ALREADYEXISTS" , "already exists.");
//DEFINE("_PROTOCOL" , "Protocol");
//DEFINE("_NOTSUPPORTED" , "not supported.");
//DEFINE("_NOFILENAME" , "No filename specified.");
//DEFINE("_FILENAME" , "Filename");
//DEFINE("_CONTAINBLANKS" , "contains blanks.");
//DEFINE("_ISNOTVALID" , "is not a valid filename");
//DEFINE("_SELECTIMAGE" , "Select Image");
//DEFINE("_UNKKNOWN" , "Unknown");
//DEFINE("_FAILEDTOCREATEDIR" , "Failed to create directory");
//DEFINE("_DIRNOTEXISTS" , "Directory does not exist; cannot remove files");
//DEFINE("_TEMPLATEEMPTY" , "Template id is empty; cannot remove files");
//DEFINE("_INTERRORMABOT" , "Internal error: no mambot set");
//DEFINE("_NOTARGGIVEN" , "not enough arguments given");
//DEFINE("_ARG" , "argument");
//DEFINE("_ISNOTARRAY" , "is not an array");
//DEFINE("_NO_USER_ACCESS", "No User Access");
//DEFINE("_AUTO_APPROVE" , "Auto Approve");
//DEFINE("_USER_LC", "User");
//DEFINE("_GROUP", "Group");
//DEFINE ("_EVERY" , "Everybody");
//DEFINE("_ALL_CATS" , "- All Categories");
//DEFINE("_SELECT_USER" , "Select User");
//DEFINE("_SELECT_MANT" , "Select Maintainer");
//DEFINE("_GENERAL" , "General");
//DEFINE("_TITLE" , "Title");
//DEFINE("_UNKNOWN" , "Unknown User");
// DEFINE("_FILTER"		, "Filter");
//DEFINE("_FILTER_NAME" , "Filter by name");
//DEFINE("_USER" , "User");
//DEFINE ("_DELETE" , "Delete");
//DEFINE("_DETAILS" , "Details");
//DEFINE("_SIZE" , "Size");
//DEFINE("_UNPUBLISH" , "Unpublish");
//DEFINE("_NOT_PUBLISHED" , "Not published");
//DEFINE("_OK" , "OK");
//DEFINE("_INSTALL" , "Install");
//DEFINE("_DISPLAY" , "Display");
//DEFINE("_DOWNLOADS" , "Downloads");
//DEFINE("_SECURITY" , "Security");
//DEFINE("_CPANEL" , "DOCMan control panel");
//DEFINE("_CONFIG" , "Configuration");
//DEFINE("_LICENSES" , "Licenses");
//DEFINE("_CAT" , "Category");
//DEFINE ("_CATEGORY" , "Category");
//DEFINE("_TOOLTIP" , "Tooltip");
//DEFINE("_DETAILSPAGE" , "Details page");
//DEFINE("_TOP" , "Top");
//DEFINE ("_DOC" , "Document");
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

