<?php
// $Id: main.php,v 1.3 2005/07/11 01:32:04 valcilon Exp $
//%%%%%%	File Name readpmsg.php 	%%%%%
define("_PM_DELETED","Mensages excluidas com sucesso!");
define("_PM_PRIVATEMESSAGE","Mensagens Particulares");
define("_PM_INBOX","Caixa de Entrada");
define("_PM_FROM","Remetente");
define("_PM_YOUDONTHAVE","Nenhuma mensagem particular");
define("_PM_FROMC","Perfil: ");
define("_PM_SENTC","Sent: "); // The date of message sent
define("_PM_PROFILE","Perfil");

// %s is a username
define("_PM_PREVIOUS","Anterior");
define("_PM_NEXT","Próxima");

//%%%%%%	File Name pmlite.php 	%%%%%
define("_PM_SORRY","Desculpe! Você não é um usuário registrado.");
define("_PM_REGISTERNOW","Registre-se agora!");
define("_PM_GOBACK","Voltar");
define("_PM_USERNOEXIST","O usuário selecionado não existe.");
define("_PM_PLZTRYAGAIN","Verifique o nome e tente novamente");
define("_PM_MESSAGEPOSTED","Mensagens enviadas com sucesso");
define("_PM_CLICKHERE","You can click here to view your private messages");
define("_PM_ORCLOSEWINDOW","Or click here to close this window.");
define("_PM_USERWROTE","%s escreveu:");
define("_PM_TO","Para: ");
define("_PM_SUBJECTC","Assunto: ");
define("_PM_MESSAGEC","Mensagem: ");
define("_PM_CLEAR","Limpar");
define("_PM_CANCELSEND","Cancelar");
define("_PM_SUBMIT","Enviar");

//%%%%%%	File Name viewpmsg.php 	%%%%%
define("_PM_SUBJECT","Assunto");
define("_PM_DATE","Data");
define("_PM_NOTREAD","Não lida");
define("_PM_SEND","Escrever nova mensagem");
define("_PM_DELETE","Excluir");
define("_PM_REPLY", "Responder");
define("_PM_PLZREG","Você deve se registrar primeiro para poder enviar mensagens particulares!");

define("_PM_ONLINE", "Online");

define("_PM_RECEIVE","RECEBIDAS");
define("_PM_POST","POST");
define("_PM_READBOX","READBOX");
define("_PM_RSAVEBOX","Receive_SAVEBOX");
define("_PM_OUTBOX","CAIXA DE SAÍDA");
define("_PM_SENTBOX","SENTBOX");
define("_PM_PSAVEBOX","Post_SAVEBOX");
define("_PM_SAVE","SALVAS");
define("_PM_SAVED","Mensagem foi salva com sucesso");
define("_PM_TOC","Remetente: ");

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

//WANISYS.NET PM HACK2.0
define("_PM_UNDELETE","undelete");
define("_PM_UNDELETED","Your message(s) has been undeleted");
define("_PM_RTRASHBOX","LIXEIRA");
define("_PM_PTRASHBOX","LIXEIRA");

//WANISYS.NET PM HACK2.5
define("_PM_INBOXTOTAL","Total : %d PM(s) found in INBOX");
define("_PM_READBOXTOTAL","Total : %d PM(s) found in READBOX");
define("_PM_RSAVEBOXTOTAL","Total : %d PM(s) found in Receive_SAVEBOX");
define("_PM_RTRASHBOXTOTAL","Total : %d PM(s) found in Receive_TRASHBOX");
define("_PM_OUTBOXTOTAL","Total : %d PM(s) found in OUTBOX");
define("_PM_SENTBOXTOTAL","Total : %d PM(s) found in SENTBOX");
define("_PM_PSAVEBOXTOTAL","Total : %d PM(s) found in Post_SAVEBOX");
define("_PM_PTRASHBOXTOTAL","Total : %d PM(s) found in Post_TRASHBOX");
define("_PM_INBOXSEARCHTOTAL","Result : %d PM(s) found in INBOX");
define("_PM_READBOXSEARCHTOTAL","Result : %d PM(s) found in READBOX");
define("_PM_RSAVEBOXSEARCHTOTAL","Result : %d PM(s) found in Receive_SAVEBOX");
define("_PM_RTRASHBOXSEARCHTOTAL","Result : %d PM(s) found in Receive_TRASHBOX");
define("_PM_OUTBOXSEARCHTOTAL","Result : %d PM(s) found in OUTBOX");
define("_PM_SENTBOXSEARCHTOTAL","Result : %d PM(s) found in SENTBOX");
define("_PM_PSAVEBOXSEARCHTOTAL","Result : %d PM(s) found in Post_SAVEBOX");
define("_PM_PTRASHBOXSEARCHTOTAL","Result : %d PM(s) found in Post_TRASHBOX");
define("_PM_SINCE","Since");
define("_PM_SINCEBEGIN","the beginning");
define("_PM_SINCE1","last 1 day");
define("_PM_SINCE2","last 2 days");
define("_PM_SINCE5","last 5 days");
define("_PM_SINCE7","last 7 days");
define("_PM_SINCE10","last 10 days");
define("_PM_SINCE20","last 20 days");
define("_PM_SINCE30","last 30 days");
define("_PM_SINCE40","last 40 days");
define("_PM_SINCE50","last 50 days");
define("_PM_SINCE60","last 60 days");
define("_PM_SINCE100","last 100 days");
define("_PM_SINCE365","the last year");
define("_PM_SEARCH","Search");
define("_PM_SEARCHFIELD","In");
define("_PM_TEXT","Message");

//WANISYS.NET PM HACK2.7
define("_PM_SEARCHAND","AND");
define("_PM_SEARCHOR","OR");

//WANISYS.NET PM HACK2.8
define("_PM_SEARCHKEYWORD","Search Keyword");
define("_PM_SEARCHNOKEYWORD","No Keyword");
define("_PM_SEARCHNOT","NOT");

//WANISYS.NET PM HACK3.0
define("_PM_PMCONFIG","PM Config");
define("_PM_EDITPMCONFIG","Edit PM Config");
define("_PM_USERNAME","User Name");
define("_PM_FILTEROK","PM FILTER SETTING");
define("_PM_FILTERNO","NO FILTERING");
define("_PM_FILTERYES","FILTERING");
define("_PM_FILTERWORD","FILTER WORD [ ex: sex,drug ]");
define("_PM_REJECTOK","PM REJECT SETTING");
define("_PM_REJECTNO","NO REJECT");
define("_PM_REJECTYES","REJECT");
define("_PM_REJECTREASON","REJECT Reason");
define("_PM_BLACKLIST","PM blacklist [ ex: devilboy,devilgirl ]");
define("_PM_TRASHBOXOK","PM TRASHBOX SETTING");
define("_PM_TRASHBOXNO","NO SHOW");
define("_PM_TRASHBOXYES","SHOW");
define("_PM_POPUPOK","PM POPUP SETTING");
define("_PM_POPUPNO","NO POPUP");
define("_PM_POPUPYES","POPUP");
define("_PM_MAILOK","PM MAIL NOTIFICATION SETTING");
define("_PM_MAILNO","NO MAIL NOTIFICATION");
define("_PM_MAILYES","MAIL NOTIFICATION");
define("_PM_RBOXMAX","PM user receive box max limit");
define("_PM_PBOXMAX","PM user postbox max limit");
define("_PM_SAVECHANGES","Save");
define("_PM_PMCONFIGUPDATED","Updated");
define("_PM_REJECTERROR","Failure!! Your partner is on the reject-mode!!Reject Reason:");
define("_PM_BLACKLISTERROR","Failure!! You're on the blacklist of your partner!!");
define("_PM_PBOXMAXERROR","Failure!! Your postbox Max Limit Error! Decrease PMs in Postbox");
define("_PM_RBOXMAXERROR","Failure!! Your partner's receivebox Max Limit Error! Your partner can't receive any PM because of this Error!");
define("_PM_FILTERERROR","Failure!! Subject or Message of your PM includes some words forbidden by your partner!");
define("_PM_MAILNOTIFY","%s-You've got a new PM from %s");
define("_PM_MAILMESSAGE","Hello!\nA New PM has arrived from %s\n\nTitle of PM is\n%s\n\nYou can view the PM here\n%s\n\n-----------\nYou are receiving this message because you selected to be notified when you receive a new PM\n\nYou can change your PM-Config\n%s\n\nPlease do not reply to this message\n\n---------\nBest Regards\n%s\n%s\n%s");

//WANISYS.NET PM HACK3.1
define("_PM_EDITPMCONFIGADMIN","Edit PM Config(Admin Only)");
define("_PM_UIDUNAMEUNMATCH","Failure!! uid doesn't match with uname!!");

//WANISYS.NET PM HACK3.5
define("_PM_GROUPPMLIMIT","GroupPM Limit(Per Month)");
define("_PM_GROUPPMLIMITNOW","Current Status of GroupPM Send");
define("_PM_GROUPPMLIMITSTART","GroupPM Send StartTime");
define("_PM_NOPMGROUP","Failure! You have no PM-Group");
define("_PM_GROUPPMLIMITERROR","Failure! You exceed your GroupPM-Limit");
define("_PM_CLOSEWINDOW","Close this window!");
define("_PM_MYGROUPLIST","My Groups List");
define("_PM_MYPMGROUPLIST","My PM-Groups List");
define("_PM_GROUPPMADMINOK","GroupPM to Admin Group");
define("_PM_GROUPPMADMINOKNO","Not Allow GroupPM to Admin Group");
define("_PM_GROUPPMADMINOKYES","Allow GroupPM to Admin Group");
define("_PM_GROUPPMMYGROUPOK","GroupPM to MY Groups");
define("_PM_GROUPPMMYGROUPOKNO","Not Allow GroupPM to MY Groups");
define("_PM_GROUPPMMYGROUPOKYES","Allow GroupPM to MY Groups");
define("_PM_GROUPPMRUSERGROUPOK","GroupPM to Registered Users Group");
define("_PM_GROUPPMRUSERGROUPOKNO","Not Allow GroupPM to Registered Users Group");
define("_PM_GROUPPMRUSERGROUPOKYES","Allow GroupPM to Registered Users Group");
define("_PM_PMGROUPLIST","Select PMGROUPs allowed to users");
define("_PM_GROUPNOEXIST","The selected group doesn't exist in the database.");
define("_PM_SENDSUCCESS","Send Success: ");
define("_PM_SENDFAILURE","Send Failure: ");
define("_PM_GROUPSEND","G-Send");
define("_PM_TOGROUP","To (Group): ");

//WANISYS.NET PM HACK3.6
define("_PM_FORWARD","PM Forward");
define("_PM_GROUPFORWARD","PM Group-Forward");
define("_PM_PRINT","PM Print");

//WANISYS.NET PM HACK3.7
define("_PM_PRINTPM","Print");
define("_PM_BACKUP","BackUp");
define("_PM_BACKUP1","HTML");
define("_PM_BACKUP2","SQL");

//WANISYS.NET PM HACK3.8
define("_PM_AM_GROUP","Target Group");
define("_PM_SHOWSTATUS","Show Status");
define("_PM_EDITPMPOLICY","Edit PM Policy(Admin Only)");
define("_PM_RECEIVEBOXTOTAL","Total : %d PM(s) found in RECEIVEBOX");
define("_PM_POSTBOXTOTAL","Total : %d PM(s) found in POSTBOX");
define("_PM_RECEIVEBOXSEARCHTOTAL","Result : %d PM(s) found in RECEIVEBOX");
define("_PM_POSTBOXSEARCHTOTAL","Result : %d PM(s) found in POSTBOX");
define("_PM_RECEIVEBOX","RECEIVEBOX");
define("_PM_POSTBOX","POSTBOX");
define("_PM_EMPTYBOX","Empty Box");
define("_PM_PERCENT","Total/Limit(%)");
define("_PM_BOX","Box");
define("_PM_RBOXSTATUS","[Receive Boxes Status]");
define("_PM_PBOXSTATUS","[Post Boxes Status]");
define("_PM_CONFIRMTEXT","Do you really want to empty this box?");
define("_PM_EMPTIED","Box has been emptied");

//WANISYS.NET PM HACK3.9
define("_PM_TYPE2","PM Type");
define("_PM_TYPE2NORMAL","Normal");
define("_PM_TYPE2URGENT","Urgent");
define("_PM_TYPE2ENCRYPTED","Encrypted");
define("_PM_EDITPMUSERKEY","Edit PM User Key");
define("_PM_USERKEYTYPE","Key Type");
define("_PM_USERALGTYPE","Key Generation Algorithm Type");
define("_PM_USERALGTYPE2","Hash Algorithm Type");
define("_PM_USERPUBLICKEY","Public Key");
define("_PM_USERDESCRIPTION","Description(How to Use)");
define("_PM_USERKEYUPDATED","Updated");
define("_PM_USERKEYNOEXIST","The selected user's Key-Info doesn't exist in the database.<br /> Maybe Key-Info not registered yet!!");
define("_PM_USERKEYINFO","PM User Key Info");
define("_PM_USERKEYSEARCH","PM User Key Search");
define("_PM_USERKEYSEARCHS","Search Key");
define("_PM_MESSAGESIGC","Msg Signature: ");
define("_PM_DOWNTOCHECK","Download for Check/Calculation");

//WANISYS.NET PM HACK4.0
define("_PM_EDITPMSYSTEMCONFIGADMIN","Set PM System Policy(Admin Only)");
define("_PM_FUNCTIONON","ON^^Use this function!!");
define("_PM_FUNCTIONOFF","OFF^^Not Use this function!!");
define("_PM_PMPARTNERSEARCHSELECT","PM partner Search Mode");
define("_PM_PMPARTNERSEARCHMODE0","Old User Select Method^^");
define("_PM_PMPARTNERSEARCHMODE1","PM Partner Search Popup(Not ReadOnly)");
define("_PM_PMPARTNERSEARCHMODE2","PM Partner Search Popup(ReadOnly)");
define("_PM_PMCONFIGOK","PM Config Function");
define("_PM_GROUPPMOK","GroupPM(GPM) Function");
define("_PM_PMUSERKEYOK","PM Userkey(PKI) Function");
define("_PM_PMTYPEOK","PM Type Function");
define("_PM_PMBACKUPOK","PM Backup Function");
define("_PM_PMPRINTOK","PM Print Function");
define("_PM_PMPDFOK","PM PDF Function");
define("_PM_PMBUDDYOK","PM Buddy Function");
define("_PM_PMHELPOK","PM Help Function");
define("_PM_PMPRBOXOK","PM Post/Receive Box");
define("_PM_PMLITEOK","PM Send(pmlite.php) Function");
define("_PM_PMPOLICYOK","PM Policy Function(ex:Filtering)");
define("_PM_GROUPPMPOLICYOK","GroupPM Policy Function(ex:PM-Group)");
define("_PM_FUNCTIONOFFMODE","This function is now on the OFF mode(by Admin). Please contact Admin!!");
define("_PM_EDITPMCONFIGHELP1","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No1@pmsg.php)");
define("_PM_EDITPMCONFIGHELP2","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No2@pmsg.php)");
define("_PM_EDITPMCONFIGHELP3","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No3@pmsg.php)");
define("_PM_EDITPMCONFIGHELP4","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No4@pmsg.php)");
define("_PM_EDITPMCONFIGHELP5","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No5@pmsg.php)");
define("_PM_EDITPMCONFIGHELP6","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No6@pmsg.php)");
define("_PM_EDITPMCONFIGHELP7","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No7@pmsg.php)");
define("_PM_EDITPMCONFIGHELP8","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No8@pmsg.php)");
define("_PM_EDITPMCONFIGHELP9","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No9@pmsg.php)");
define("_PM_EDITPMCONFIGHELP10","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No10@pmsg.php)");
define("_PM_EDITPMCONFIGHELP11","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No11@pmsg.php)");
define("_PM_EDITPMCONFIGHELP12","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No12@pmsg.php)");
define("_PM_EDITPMCONFIGHELP13","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No13@pmsg.php)");
define("_PM_EDITPMCONFIGHELP14","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No14@pmsg.php)");
define("_PM_EDITPMCONFIGHELP15","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No15@pmsg.php)");
define("_PM_EDITPMCONFIGHELP16","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No16@pmsg.php)");
define("_PM_EDITPMCONFIGHELP17","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No17@pmsg.php)");
define("_PM_EDITPMCONFIGHELP18","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No18@pmsg.php)");
define("_PM_EDITPMCONFIGHELP19","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No19@pmsg.php)");
define("_PM_EDITPMCONFIGHELP20","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No20@pmsg.php)");
define("_PM_EDITPMCONFIGHELP21","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No21@pmsg.php)");
define("_PM_EDITPMCONFIGHELP22","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No22@pmsg.php)");
define("_PM_EDITPMCONFIGHELP23","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No23@pmsg.php)");
define("_PM_EDITPMCONFIGHELP24","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No24@pmsg.php)");
define("_PM_SHOWSTATUSHELP1","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No1b@pmsg.php)");
define("_PM_SHOWSTATUSHELP2","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No2b@pmsg.php)");
define("_PM_SHOWSTATUSHELP3","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No3b@pmsg.php)");
define("_PM_SHOWSTATUSHELP4","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No4b@pmsg.php)");
define("_PM_SHOWSTATUSHELP5","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No5b@pmsg.php)");
define("_PM_VIEWPMSGHELP1","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No1c@pmsg.php)");
define("_PM_VIEWPMSGHELP2","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No2c@pmsg.php)");
define("_PM_VIEWPMSGHELP3","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No3c@pmsg.php)");
define("_PM_VIEWPMSGHELP4","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No4c@pmsg.php)");
define("_PM_VIEWPMSGHELP5","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No5c@pmsg.php)");
define("_PM_VIEWPMSGHELP6","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No6c@pmsg.php)");
define("_PM_VIEWPMSGHELP7","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No7c@pmsg.php)");
define("_PM_VIEWPMSGHELP8","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No8c@pmsg.php)");
define("_PM_VIEWPMSGHELP9","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No9c@pmsg.php)");
define("_PM_VIEWPMSGHELP10","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No10c@pmsg.php)");
define("_PM_VIEWPMSGHELP11","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No11c@pmsg.php)");

//WANISYS.NET PM HACK4.1
define("_PM_WRONGTICKET","Failure!! You don't have the proper PM-Ticket!");
define("_PM_FUNCTIONSTATUS","[PM System Function Status]");
define("_PM_SHOWSTATUSHELP6","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No6b@pmsg.php)");
define("_PM_SHOWSTATUSHELP7","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No7b@pmsg.php)");
define("_PM_SHOWSTATUSHELP8","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No8b@pmsg.php)");
define("_PM_SHOWSTATUSHELP9","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No9b@pmsg.php)");
define("_PM_SHOWSTATUSHELP10","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No10b@pmsg.php)");
define("_PM_SHOWSTATUSHELP11","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No11b@pmsg.php)");
define("_PM_SHOWSTATUSHELP12","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No12b@pmsg.php)");
define("_PM_SHOWSTATUSHELP13","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No13b@pmsg.php)");
define("_PM_SHOWSTATUSHELP14","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No14b@pmsg.php)");
define("_PM_SHOWSTATUSHELP15","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No15b@pmsg.php)");
define("_PM_SHOWSTATUSHELP16","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No16b@pmsg.php)");
define("_PM_SHOWSTATUSHELP17","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No17b@pmsg.php)");
define("_PM_SHOWSTATUSHELP18","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No18b@pmsg.php)");
define("_PM_SHOWSTATUSHELP19","No Help yet^^Admin!<br />Please Write Your Help or Tip^^<br />(No19b@pmsg.php)");
define("_PM_STATUS","Status");
define("_PM_FUNCTION","Function");

//WANISYS.NET PM HACK4.2
define("_PM_PDF","PM PDF");
define("_PM_PDFPM","PDF");

//WANISYS.NET PM HACK4.5
define("_PM_SELECT_FORMTYPE","Select your desired form type");
define("_PM_SELECT_FORMTYPES","Select form types allowed to PM-users");
define("_PM_FORM_COMPACT","Compact");
define("_PM_FORM_DHTML","DHTML");
define("_PM_FORM_SPAW","Spaw Editor");
define("_PM_FORM_HTMLAREA","HTMLArea");
define("_PM_FORM_FCK","FCK Editor");
define("_PM_FORM_KOIVI","Koivi Editor");
define("_PM_FORM_TINYMCE","TinyMCE Editor");
define("_PM_POSTINTERVAL","Set time-interval of consecutive-send");
define('_PM_POSTINTERVALERROR','Error! Time-interval for consecutive-send is set to %d sec.');
define("_PM_SELECT_VIEWMODE","Select your PM View Mode");
define("_PM_VIEWMODE1","Wysiwyg View Mode(HTML+Smiley+Xcode)");
define("_PM_VIEWMODE2","Show View Mode1(NO HTML+Smiley+Xcode+Image+br)");
define("_PM_VIEWMODE3","Show View Mode2(HTML+Smiley+Xcode+Image+br)");
define("_PM_VIEWMODE4","Edit View Mode");
define("_PM_VIEWMODE5","Preview View Mode1(NO HTML+Smiley+Xcode+Image+br)");
define("_PM_VIEWMODE6","Preview View Mode2(HTML+Smiley+Xcode+Image+br)");
define("_PM_VIEWMODE7","FormPreview View Mode");
define("_PM_ADVANCEVIEW","PM Advance View");
?>
