<?php
// $Id: main.php,v 1.1 2005/08/02 18:47:09 mauriciodelima Exp $
//%%%%%%	File Name readpmsg.php 	%%%%%
define("_PM_DELETED","Your message(s) has been deleted");
define("_PM_PRIVATEMESSAGE","Private Messages");
define("_PM_INBOX","Inbox");
define("_PM_FROM","From");
define("_PM_YOUDONTHAVE","You don't have any private messages");
define("_PM_FROMC","From: ");
define("_PM_SENTC","Sent: "); // The date of message sent
define("_PM_PROFILE","Profile");

// %s is a username
define("_PM_PREVIOUS","Previous Message");
define("_PM_NEXT","Next Message");

//%%%%%%	File Name pmlite.php 	%%%%%
define("_PM_SORRY","Sorry! You are not a registered user.");
define("_PM_REGISTERNOW","Register Now!");
define("_PM_GOBACK","Go Back");
define("_PM_USERNOEXIST","The selected user doesn't exist in the database.");
define("_PM_PLZTRYAGAIN","Please check the name and try again.");
define("_PM_MESSAGEPOSTED","Your message has been posted");
define("_PM_CLICKHERE","You can click here to view your private messages");
define("_PM_ORCLOSEWINDOW","Or click here to close this window.");
define("_PM_USERWROTE","%s wrote:");
define("_PM_TO","To: ");
define("_PM_SUBJECTC","Subject: ");
define("_PM_MESSAGEC","Message: ");
define("_PM_CLEAR","Clear");
define("_PM_CANCELSEND","Cancel Send");
define("_PM_SUBMIT","Submit");
define("_PM_SAVEINOUTBOX", "Save a copy in your outbox?");

//%%%%%%	File Name viewpmsg.php 	%%%%%
define("_PM_SUBJECT","Subject");
define("_PM_DATE","Date");
define("_PM_NOTREAD","Not Read");
define("_PM_SEND","Send");
define("_PM_DELETE","Delete");
define("_PM_TOSAVE","Save");
define("_PM_UNSAVE","Unset save");
define("_PM_EMPTY","Empty");
define("_PM_REPLY", "Reply");
define("_PM_PLZREG","Please register first to send private messages!");
define("_PM_SAVED_PART","You are allowed %d in your savebox and you saved %d messages for this time");
define("_PM_SAVED_ALL","Messages have been moved to savebox");
define("_PM_UNSAVED","Messages have been removed from savebox");
define("_PM_EMPTIED","The box has been emptied");
define("_PM_RUSUREEMPTY","Are you sure you want to empty the box?");
define("_PM_RUSUREDELETE","Are you sure you want to delete these message(s)?");

define("_PM_ONLINE", "Online");

define("_PM_RECEIVE","RECEIVE");
define("_PM_POST","POST");
define("_PM_READBOX","READBOX");
define("_PM_RSAVEBOX","Receive_SAVEBOX");
define("_PM_OUTBOX","Outbox");
define("_PM_SAVEBOX","Savebox");
define("_PM_SENTBOX","SENTBOX");
define("_PM_PSAVEBOX","Post_SAVEBOX");
define("_PM_SAVE","SAVE");
define("_PM_SAVED","Saved Successfully");
define("_PM_TOC","From: ");

//WANISYS.NET PM HACK1.5
define("_PM_SORT","SORT");
define("_PM_ORDER","ORDER");
define("_PM_UID","Partner's UID");
define("_PM_TIME","Post DATE");
define("_PM_ASC","ASC");
define("_PM_DESC","DESC");
define("_PM_LIMIT","PMs per Page");
define("_PM_BACKTOBOX","Back to Box");
define("_PM_SORTSUBMIT","Submit");
define("_PM_PREVIOUSP","Previous");
define("_PM_NEXTP","Next");

define("_PM_MAILNOTIFY","%s-You've got a new PM from %s");
define("_PM_MAILMESSAGE","Hello!\nA New PM has arrived from %s\n\nTitle of PM is\n%s\n\nYou can view the PM here\n%s\n\n-----------\nYou are receiving this message because you selected to be notified when you receive a new PM\n\nYou can change your PM-Config\n%s\n\nPlease do not reply to this message\n\n---------\nBest Regards\n%s\n%s\n%s");

define("_PM_EMAIL", "Email");
define("_PM_EMAIL_DESC", "Dear %s, this is a message transfered from your account at ".$xoopsConfig['sitename']);
define("_PM_EMAIL_FROM", "From %s");
define("_PM_EMAIL_TO", "To %s");
define("_PM_EMAIL_SUBJECT", "[message]%s");
define("_PM_EMAIL_MESSAGE", "Message content");

define("_PM_ACTION_DONE", "Operation executed successfully");
define("_PM_ACTION_ERROR", "Operation failed");
?>