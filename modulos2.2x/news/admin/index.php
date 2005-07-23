<?php
// $Id: index.php,v 1.3 2005/07/23 03:00:18 mauriciodelima Exp $
// ------------------------------------------------------------------------ //
// XOOPS - PHP Content Management System  				                    //
// Copyright (c) 2000 XOOPS.org                         					//
// <http://www.xoops.org/>                             						//
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// 																			//
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// 																			//
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// 																			//
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
include_once '../../../include/cp_header.php';
include_once XOOPS_ROOT_PATH."/class/xoopstopic.php";
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH."/modules/news/class/class.newsstory.php";
include_once XOOPS_ROOT_PATH."/modules/news/class/class.newstopic.php";
include_once XOOPS_ROOT_PATH."/modules/news/class/class.sfiles.php";
include_once XOOPS_ROOT_PATH.'/class/uploader.php';
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
include_once XOOPS_ROOT_PATH.'/modules/news/admin/functions.php';
include_once XOOPS_ROOT_PATH.'/modules/news/include/functions.php';
include_once XOOPS_ROOT_PATH."/class/tree.php";
$dateformat=getmoduleoption('dateformat');
$myts =& MyTextSanitizer::getInstance();
$topicscount=0;

/**
 * Show new submissions
 *
 * This list can be view in the module's admin when you click on the tab named "Post/Edit News"
 * Submissions are news that was submit by users but who are not approved, so you need to edit
 * them to approve them.
 * Actually you can see the the story's title, the topic, the posted date, the author and a
 * link to delete the story. If you click on the story's title, you will be able to edit the news.
 * The table contains ALL the new submissions.
 * The system's block called "Waiting Contents" is listing the number of those news.
 */
function newSubmissions()
{
    global $dateformat;
    $storyarray = NewsStory :: getAllSubmitted();
    if ( count( $storyarray ) > 0 )
    {
		news_collapsableBar('newsub', 'topnewsubicon');
		echo "<img onclick='toggle('toptable'); toggleIcon('toptableicon');' id='topnewsubicon' name='topnewsubicon' src=" . XOOPS_URL . "/modules/news/images/close12.gif alt='' /></a>&nbsp;"._AM_NEWSUB."</h4>";
		echo "<div id='newsub'>";
		echo "<br />";
        echo "<div style='text-align: center;'><table width='100%' cellspacing='1' cellpadding='3' border='0' class='outer'><tr class='bg3'><td align='center'>" . _AM_TITLE . "</td><td align='center'>" . _AM_TOPIC . "</td><td align='center'>" . _AM_POSTED . "</td><td align='center'>" . _AM_POSTER . "</td><td align='center'>" . _AM_ACTION . "</td></tr>\n";
        $class='';
        foreach( $storyarray as $newstory )
        {
            $class = ($class == 'even') ? 'odd' : 'even';
            echo "<tr class='".$class."'><td align='left'>\n";
            $title = $newstory->title();
            if (!isset($title) || ($title == "" )) {
                echo "<a href='".XOOPS_URL."/modules/news/admin/index.php?op=edit&amp;returnside=1&amp;storyid=" . $newstory -> storyid() . "'>" . _AD_NOSUBJECT . "</a>\n";
            } else {
                echo "&nbsp;<a href='".XOOPS_URL."/modules/news/submit.php?returnside=1&amp;op=edit&amp;storyid=" . $newstory -> storyid() . "'>" . $title . "</a>\n";
            }
            echo "</td><td>" . $newstory->topic_title() . "</td><td align='center' class='nw'>" . formatTimestamp($newstory->created(),$dateformat) . "</td><td align='center'><a href='" . XOOPS_URL . "/userinfo.php?uid=" . $newstory->uid() . "'>" . $newstory->uname() . "</a></td><td align='right'><a href='".XOOPS_URL."/modules/news/admin/index.php?op=delete&amp;storyid=" . $newstory->storyid() . "'>" . _AM_DELETE . "</a></td></tr>\n";
        }
        echo "</table></div>";
        echo "<br /></div><br />";
    }
}

/**
 * Shows all automated stories
 *
 * Automated stories are stories that have a publication's date greater than "now"
 * This list can be view in the module's admin when you click on the tab named "Post/Edit News"
 * Actually you can see the story's ID, its title, the topic, the author, the
 * programmed date and time, the expiration's date  and two links. The first link is
 * used to edit the story while the second is used to remove the story.
 * Unlike the other lists of this page, ALL the stories are visibles.
 */
function autoStories()
{
    global $xoopsModule, $dateformat;
    $storyarray = NewsStory :: getAllAutoStory();
    $class='';
    if(count($storyarray) > 0)
    {
		news_collapsableBar('autostories', 'topautostories');
		echo "<img onclick='toggle('toptable'); toggleIcon('toptableicon');' id='topautostories' name='topautostories' src=" . XOOPS_URL . "/modules/news/images/close12.gif alt='' /></a>&nbsp;"._AM_AUTOARTICLES."</h4>";
		echo "<div id='autostories'>";
		echo "<br />";
        echo "<div style='text-align: center;'>\n";
        echo "<table width='100%' cellspacing='1' cellpadding='3' border='0' class='outer'><tr class='bg3'><td align='center'>" . _AM_STORYID . "</td><td align='center'>" . _AM_TITLE . "</td><td align='center'>" . _AM_TOPIC . "</td><td align='center'>" . _AM_POSTER . "</td><td align='center' class='nw'>" . _AM_PROGRAMMED . "</td><td align='center' class='nw'>" . _AM_EXPIRED . "</td><td align='center'>" . _AM_ACTION . "</td></tr>";
        foreach($storyarray as $autostory)
        {
            $topic = $autostory -> topic();
            $expire = ( $autostory->expired() > 0 ) ? formatTimestamp($autostory->expired(),$dateformat) : '';
            $class = ($class == 'even') ? 'odd' : 'even';
            echo "<tr class='".$class."'>";
        	echo "<td align='center'><b>" . $autostory -> storyid() . "</b>
        		</td><td align='left'><a href='" . XOOPS_URL . "/modules/news/article.php?storyid=" . $autostory->storyid() . "'>" . $autostory->title() . "</a>
        		</td><td align='center'>" . $topic->topic_title() . "
        		</td><td align='center'><a href='" . XOOPS_URL . "/userinfo.php?uid=" . $autostory->uid() . "'>" . $autostory->uname() . "</a></td><td align='center' class='nw'>" . formatTimestamp($autostory->published(),$dateformat) . "</td><td align='center'>" . $expire . "</td><td align='center'><a href='".XOOPS_URL."/modules/news/submit.php?returnside=1&amp;op=edit&amp;storyid=" . $autostory->storyid() . "'>" . _AM_EDIT . "</a>-<a href='".XOOPS_URL."/modules/news/admin/index.php?op=delete&amp;storyid=" . $autostory->storyid() . "'>" . _AM_DELETE . "</a>";
            echo "</td></tr>\n";
        }
        echo "</table></div></div><br />";
    }
}

/**
 * Shows last x published stories
 *
 * This list can be view in the module's admin when you click on the tab named "Post/Edit News"
 * Actually you can see the the story's ID, its title, the topic, the author, the number of hits
 * and two links. The first link is used to edit the story while the second is used to remove the story.
 * The table only contains the last X published stories.
 * You can modify the number of visible stories with the module's option named
 * "Number of new articles to display in admin area".
 * As the number of displayed stories is limited, below this list you can find a text box
 * that you can use to enter a story's Id, then with the scrolling list you can select
 * if you want to edit or delete the story.
 */
function lastStories()
{
    global $xoopsModule, $xoopsModuleConfig, $dateformat;
	news_collapsableBar('laststories', 'toplaststories');
	echo "<img onclick='toggle('toptable'); toggleIcon('toptableicon');' id='toplaststories' name='toplaststories' src=" . XOOPS_URL . "/modules/news/images/close12.gif alt='' /></a>&nbsp;".sprintf(_AM_LAST10ARTS,$xoopsModuleConfig['storycountadmin'])."</h4>";
	echo "<div id='laststories'>";
	echo "<br />";
    echo "<div style='text-align: center;'>";
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
    $storyarray = NewsStory :: getAllPublished($xoopsModuleConfig['storycountadmin'], $start, false, 0, 1 );
    $storiescount = NewsStory :: getAllPublishedCount($xoopsModuleConfig['storycountadmin'], 0, false, 0, 1 );
    $pagenav = new XoopsPageNav( $storiescount, $xoopsModuleConfig['storycountadmin'], $start, 'start', 'op=newarticle');
    $class='';
    echo "<table width='100%' cellspacing='1' cellpadding='3' border='0' class='outer'><tr class='bg3'><td align='center'>" . _AM_STORYID . "</td><td align='center'>" . _AM_TITLE . "</td><td align='center'>" . _AM_TOPIC . "</td><td align='center'>" . _AM_POSTER . "</td><td align='center' class='nw'>" . _AM_PUBLISHED . "</td><td align='center' class='nw'>" . _AM_HITS . "</td><td align='center'>" . _AM_ACTION . "</td></tr>";
    foreach( $storyarray as $eachstory )
    {
        $published = formatTimestamp($eachstory->published(),$dateformat );
        // $expired = ( $eachstory -> expired() > 0 ) ? formatTimestamp($eachstory->expired(),$dateformat) : '---';
        $topic = $eachstory -> topic();
        $class = ($class == 'even') ? 'odd' : 'even';
        echo "<tr class='".$class."'>";
        echo "<td align='center'><b>" . $eachstory -> storyid() . "</b>
        	</td><td align='left'><a href='" . XOOPS_URL . "/modules/news/article.php?storyid=" . $eachstory -> storyid() . "'>" . $eachstory -> title() . "</a>
        	</td><td align='center'>" . $topic -> topic_title() . "
        	</td><td align='center'><a href='" . XOOPS_URL . "/userinfo.php?uid=" . $eachstory -> uid() . "'>" . $eachstory -> uname() . "</a></td><td align='center' class='nw'>" . $published . "</td><td align='center'>" . $eachstory -> counter() . "</td><td align='center'><a href='".XOOPS_URL."/modules/news/submit.php?returnside=1&amp;op=edit&amp;storyid=" . $eachstory -> storyid() . "'>" . _AM_EDIT . "</a>-<a href='".XOOPS_URL."/modules/news/admin/index.php?op=delete&amp;storyid=" . $eachstory -> storyid() . "'>" . _AM_DELETE . "</a>";
        echo "</td></tr>\n";
    }
    echo "</table><br />";
	echo "<div align='right'>".$pagenav->renderNav().'</div><br />';

    echo "<form action='index.php' method='post'>" . _AM_STORYID . " <input type='text' name='storyid' size='10' />
    	<select name='op'>
    		<option value='edit' selected='selected'>" . _AM_EDIT . "</option>
    		<option value='delete'>" . _AM_DELETE . "</option>
    	</select>
		<input type='hidden' name='returnside' value='1'>
    	<input type='submit' value='" . _AM_GO . "' />
    	</form>
	</div>";
    echo "</div><br />";
}


/**
 * Display a list of the expired stories
 *
 * This list can be view in the module's admin when you click on the tab named "Post/Edit News"
 * Actually you can see the story's ID, the title, the topic, the author,
 * the creation and expiration's date and you have two links, one to delete
 * the story and the other to edit the story.
 * The table only contains the last X expired stories.
 * You can modify the number of visible stories with the module's option named
 * "Number of new articles to display in admin area".
 * As the number of displayed stories is limited, below this list you can find a text box
 * that you can use to enter a story's Id, then with the scrolling list you can select
 * if you want to edit or delete the story.
 */
function expStories()
{
    global $xoopsModule, $dateformat;
    $storyarray = NewsStory :: getAllExpired( 10, 0, 0, 1 );

    if(count($storyarray) > 0) {
    	$class='';
		news_collapsableBar('expstories', 'topexpstories');
		echo "<img onclick='toggle('toptable'); toggleIcon('toptableicon');' id='topexpstories' name='topexpstories' src=" . XOOPS_URL . "/modules/news/images/close12.gif alt='' /></a>&nbsp;"._AM_EXPARTS."</h4>";
		echo "<div id='expstories'>";
		echo "<br />";
    	echo "<div style='text-align: center;'>";
    	echo "<table width='100%' cellspacing='1' cellpadding='3' border='0' class='outer'><tr class='bg3'><td align='center'>" . _AM_STORYID . "</td><td align='center'>" . _AM_TITLE . "</td><td align='center'>" . _AM_TOPIC . "</td><td align='center'>" . _AM_POSTER . "</td><td align='center' class='nw'>" . _AM_CREATED . "</td><td align='center' class='nw'>" . _AM_EXPIRED . "</td><td align='center'>" . _AM_ACTION . "</td></tr>";
    	foreach( $storyarray as $eachstory )
    	{
	        $created = formatTimestamp($eachstory->created(),$dateformat);
        	$expired = formatTimestamp($eachstory->expired(),$dateformat);
        	$topic = $eachstory -> topic();
        	// added exired value field to table
        	$class = ($class == 'even') ? 'odd' : 'even';
        	echo "<tr class='".$class."'>";
        	echo "<td align='center'><b>" . $eachstory -> storyid() . "</b>
	        	</td><td align='left'><a href='" . XOOPS_URL . "/modules/news/article.php?returnside=1&amp;storyid=" . $eachstory -> storyid() . "'>" . $eachstory -> title() . "</a>
        		</td><td align='center'>" . $topic -> topic_title() . "
        		</td><td align='center'><a href='" . XOOPS_URL . "/userinfo.php?uid=" . $eachstory -> uid() . "'>" . $eachstory -> uname() . "</a></td><td align='center' class='nw'>" . $created . "</td><td align='center' class='nw'>" . $expired . "</td><td align='center'><a href='".XOOPS_URL."/modules/news/submit.php?returnside=1&amp;op=edit&amp;storyid=" . $eachstory -> storyid() . "'>" . _AM_EDIT . "</a>-<a href='".XOOPS_URL."/modules/news/admin/index.php?op=delete&amp;storyid=" . $eachstory -> storyid() . "'>" . _AM_DELETE . "</a>";
        	echo "</td></tr>\n";
    	}
    	echo "</table><br />";
    	echo "<form action='index.php' method='post'>
	    	" . _AM_STORYID . " <input type='text' name='storyid' size='10' />
    		<select name='op'>
	    		<option value='edit' selected='selected'>" . _AM_EDIT . "</option>
    			<option value='delete'>" . _AM_DELETE . "</option>
    		</select>
			<input type='hidden' name='returnside' value='1'>
    		<input type='submit' value='" . _AM_GO . "' />
    		</form>
		</div>";
    	echo"</div><br />";
    }
}

/**
 * Delete (purge/prune) old stories
 *
 * You can use this function in the module's admin when you click on the tab named "Prune News"
 * It's useful to remove old stories. It is, of course, recommended
 * to backup (or export) your news before to purge news.
 * You must first specify a date. This date will be used as a reference, everything
 * that was published before this date will be deleted.
 * The option "Only remove stories who have expired" will enable you to only remove
 * expired stories published before the given date.
 * Finally, you can select the topics inside wich you will remove news.
 * Once you have set all the parameters, the script will first show you a confirmation's
 * message with the number of news that will be removed.
 * Note, the topics are not deleted (even if there are no more news inside them).
 */
function PruneManager()
{
    global $xoopsDB;
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    xoops_cp_header();
    adminmenu(3);
    echo "<br />";
	$sform = new XoopsThemeForm(_AM_NEWS_PRUNENEWS, "pruneform", XOOPS_URL.'/modules/news/admin/index.php', 'post');
	$sform->addElement(new XoopsFormTextDateSelect(_AM_NEWS_PRUNE_BEFORE, 'prune_date',15,time()), true);
	$onlyexpired=new xoopsFormCheckBox('', 'onlyexpired');
	$onlyexpired->addOption(1, _AM_NEWS_PRUNE_EXPIREDONLY);
	$sform->addElement($onlyexpired, false);

	$sform->addElement(new XoopsFormHidden('op', 'confirmbeforetoprune'), false);

	$topiclist=new XoopsFormSelect(_AM_NEWS_PRUNE_TOPICS, 'pruned_topics','',5,true);
	$topics_arr=array();
	$xt = new NewsTopic();
	$allTopics = $xt->getAllTopics(false);				// The webmaster can see everything
	$topic_tree = new XoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
	$topics_arr = $topic_tree->getAllChild(0);
	if(count($topics_arr)) {
		foreach ($topics_arr as $onetopic) {
			$topiclist->addOption($onetopic->topic_id(),$onetopic->topic_title());
		}
	}
	$topiclist->setDescription(_AM_NEWS_EXPORT_PRUNE_DSC);
	$sform->addElement($topiclist,false);
	$button_tray = new XoopsFormElementTray('' ,'');
	$submit_btn = new XoopsFormButton('', 'post', _SUBMIT, 'submit');
	$button_tray->addElement($submit_btn);
	$sform->addElement($button_tray);
	$sform->display();
}

// A confirmation is asked before to prune stories
function ConfirmBeforeToPrune()
{
	global $dateformat;
	$story = new NewsStory();
	xoops_cp_header();
	$topiclist="";
	if(isset($_POST['pruned_topics'])) {
		$topiclist=implode(",",$_POST['pruned_topics']);
	}
	echo "<h4>" . _AM_NEWS_PRUNENEWS . "</h4>";
	$expired=0;
	if(isset($_POST['onlyexpired'])) {
		$expired = intval($_POST['onlyexpired']);
	}
	$date=$_POST['prune_date'];
	$timestamp=mktime(0,0,0,intval(substr($date,5,2)), intval(substr($date,8,2)), intval(substr($date,0,4)));
	$count=$story->GetCountStoriesPublishedBefore($timestamp, $expired, $topiclist);
	if($count) {
		$displaydate=formatTimestamp($timestamp,$dateformat);
		$msg=sprintf(_AM_NEWS_PRUNE_CONFIRM,$displaydate, $count);
		xoops_confirm(array( 'op' => 'prunenews', 'expired' => $expired, 'pruned_topics' => $topiclist, 'prune_date' => $timestamp, 'ok' => 1), 'index.php', $msg);
	} else {
		printf(_AM_NEWS_NOTHING_PRUNE);
	}
	unset($story);
}

// Effectively delete stories (published before a date), no more confirmation
function PruneNews()
{
	$story = new NewsStory();
	$timestamp=intval($_POST['prune_date']);
	$expired= intval($_POST['expired']);
	$topiclist="";
	if(isset($_POST['pruned_topics'])) {
		$topiclist=$_POST['pruned_topics'];
	}

	if(intval($_POST['ok'])==1) {
		$story = new NewsStory();
		xoops_cp_header();
		$count=$story->GetCountStoriesPublishedBefore($timestamp,$expired,$topiclist);
		$msg=sprintf(_AM_NEWS_PRUNE_DELETED,$count);
		$story->DeleteBeforeDate($timestamp,$expired,$topiclist);
		unset($story);
		updateCache();
		redirect_header( 'index.php', 3, $msg);
	}
}

/**
* Newsletter's configuration
*
* You can create a newsletter's content from the admin part of the News module when you click on the tab named "Newsletter"
* First, let be clear, this module'functionality will not send the newsletter but it will prepare its content for you.
* To send the newsletter, you can use many specialized modules like evennews.
* You first select a range of dates and if you want, a selection of topics to use for the search.
* Once it's done, the script will use the file named /xoops/modules/language/yourlanguage/newsletter.php to create
* the newsletter's content. When it's finished, the script generates a file in the upload folder.
*/
function Newsletter()
{
    global $xoopsDB;
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    xoops_cp_header();
    adminmenu(5);
    echo "<br />";
	$sform = new XoopsThemeForm(_AM_NEWS_NEWSLETTER, "newsletterform", XOOPS_URL.'/modules/news/admin/index.php', 'post');
	$dates_tray = new XoopsFormElementTray(_AM_NEWS_NEWSLETTER_BETWEEN);
	$date1 = new XoopsFormTextDateSelect('', 'date1',15,time());
	$date2 = new XoopsFormTextDateSelect(_AM_NEWS_EXPORT_AND, 'date2',15,time());
	$dates_tray->addElement($date1);
	$dates_tray->addElement($date2);
	$sform->addElement($dates_tray);

	$topiclist=new XoopsFormSelect(_AM_NEWS_PRUNE_TOPICS, 'export_topics','',5,true);
	$topics_arr=array();
	$xt = new NewsTopic();
	$allTopics = $xt->getAllTopics(false);				// The webmaster can see everything
	$topic_tree = new XoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
	$topics_arr = $topic_tree->getAllChild(0);
	if(count($topics_arr)) {
		foreach ($topics_arr as $onetopic) {
			$topiclist->addOption($onetopic->topic_id(),$onetopic->topic_title());
		}
	}
	$topiclist->setDescription(_AM_NEWS_EXPORT_PRUNE_DSC);
	$sform->addElement($topiclist,false);
	$sform->addElement(new XoopsFormHidden('op', 'launchnewsletter'), false);
	$sform->addElement(new XoopsFormRadioYN(_AM_NEWS_REMOVE_BR, 'removebr',1),false);
	$button_tray = new XoopsFormElementTray('' ,'');
	$submit_btn = new XoopsFormButton('', 'post', _SUBMIT, 'submit');
	$button_tray->addElement($submit_btn);
	$sform->addElement($button_tray);
	$sform->display();
}


// Launch the creation of the newsletter's content
function LaunchNewsletter()
{
	global $xoopsModule, $xoopsConfig, $dateformat;
	xoops_cp_header();
	adminmenu(5);

	if (file_exists(XOOPS_ROOT_PATH.'/modules/news/language/'.$xoopsConfig['language'].'/newsletter.php')) {
		include_once XOOPS_ROOT_PATH.'/modules/news/language/'.$xoopsConfig['language'].'/newsletter.php';
	} else {
		include_once XOOPS_ROOT_PATH.'/modules/news/language/english/newsletter.php';
	}
	echo "<br />";
	$story = new NewsStory();
	$exportedstories=array();
	$topiclist='';
	$removebr=false;
	if(isset($_POST['removebr']) && intval($_POST['removebr'])==1) {
		$removebr=true;
	}
	$date1=$_POST['date1'];
	$date2=$_POST['date2'];
	$timestamp1=mktime(0,0,0,intval(substr($date1,5,2)), intval(substr($date1,8,2)), intval(substr($date1,0,4)));
	$timestamp2=mktime(0,0,0,intval(substr($date2,5,2)), intval(substr($date2,8,2)), intval(substr($date2,0,4)));
	if(isset($_POST['export_topics'])) {
		$topiclist=implode(",",$_POST['export_topics']);
	}
	$tbltopics=array();
	$exportedstories=$story->NewsExport($timestamp1, $timestamp2, $topiclist, 0, $tbltopics);
    $newsfile=XOOPS_ROOT_PATH.'/uploads/newsletter.txt';
	if(count($exportedstories)) {
		$fp=fopen($newsfile,'w');
		if(!$fp) {
			redirect_header('index.php',4,sprintf(_AM_NEWS_EXPORT_ERROR,$newsfile));
		}

		foreach($exportedstories as $onestory)
		{
			$content=$newslettertemplate;
			$content=str_replace('%title%',$onestory->title(),$content);
			$content=str_replace('%uname%',$onestory->uname(),$content);
			$content=str_replace('%created%',formatTimestamp($onestory->created(),$dateformat),$content);
			$content=str_replace('%published%',formatTimestamp($onestory->published(),$dateformat),$content);
			$content=str_replace('%expired%',formatTimestamp($onestory->expired(),$dateformat),$content);
			$content=str_replace('%hometext%',$onestory->hometext(),$content);
			$content=str_replace('%bodytext%',$onestory->bodytext(),$content);
			$content=str_replace('%description%',$onestory->description(),$content);
			$content=str_replace('%keywords%',$onestory->keywords(),$content);
			$content=str_replace('%reads%',$onestory->counter(),$content);
			$content=str_replace('%topicid%',$onestory->topicid(),$content);
			$content=str_replace('%topic_title%',$onestory->topic_title(),$content);
			$content=str_replace('%comments%',$onestory->comments(),$content);
			$content=str_replace('%rating%',$onestory->rating(),$content);
			$content=str_replace('%votes%',$onestory->votes(),$content);
			$content=str_replace('%publisher%',$onestory->uname(),$content);
			$content=str_replace('%publisher_id%',$onestory->uid(),$content);
			$content=str_replace('%link%',XOOPS_URL.'/modules/news/article.php?storyid='.$onestory->storyid(),$content);
			if($removebr) {
				$content=str_replace('<br />',"\r\n",$content);
			}
			fwrite($fp,$content);
		}
		fclose($fp);
		$newsfile=XOOPS_URL.'/uploads/newsletter.txt';
		printf(_AM_NEWS_NEWSLETTER_READY,$newsfile,XOOPS_URL.'/modules/news/admin/index.php?op=deletefile&amp;type=newsletter');
	} else {
		printf(_AM_NEWS_NOTHING);
	}
}



/**
* News export
*
* You can use this function in the module's admin when you click on the tab named "News Export"
* First select a range of date, possibly a range of topics and if you want, check the option "Include Topics Definitions"
* to also export the topics.
* News, and topics, will be exported to the XML format.
*/
function NewsExport()
{
    global $xoopsDB;
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    xoops_cp_header();
    adminmenu(4);
    echo "<br />";
	$sform = new XoopsThemeForm(_AM_NEWS_EXPORT_NEWS, "exportform", XOOPS_URL.'/modules/news/admin/index.php', 'post');
	$dates_tray = new XoopsFormElementTray(_AM_NEWS_EXPORT_BETWEEN);
	$date1 = new XoopsFormTextDateSelect('', 'date1',15,time());
	$date2 = new XoopsFormTextDateSelect(_AM_NEWS_EXPORT_AND, 'date2',15,time());
	$dates_tray->addElement($date1);
	$dates_tray->addElement($date2);
	$sform->addElement($dates_tray);

	$topiclist=new XoopsFormSelect(_AM_NEWS_PRUNE_TOPICS, 'export_topics','',5,true);
	$topics_arr=array();
	$xt = new NewsTopic();
	$allTopics = $xt->getAllTopics(false);				// The webmaster can see everything
	$topic_tree = new XoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
	$topics_arr = $topic_tree->getAllChild(0);
	if(count($topics_arr)) {
		foreach ($topics_arr as $onetopic) {
			$topiclist->addOption($onetopic->topic_id(),$onetopic->topic_title());
		}
	}
	$topiclist->setDescription(_AM_NEWS_EXPORT_PRUNE_DSC);
	$sform->addElement($topiclist,false);
	$sform->addElement(new XoopsFormRadioYN(_AM_NEWS_EXPORT_INCTOPICS, 'includetopics',0),false);
	$sform->addElement(new XoopsFormHidden('op', 'launchexport'), false);
	$button_tray = new XoopsFormElementTray('' ,'');
	$submit_btn = new XoopsFormButton('', 'post', _SUBMIT, 'submit');
	$button_tray->addElement($submit_btn);
	$sform->addElement($button_tray);
	$sform->display();
}

// Launch stories export (to the xml's format)
function LaunchExport()
{
	xoops_cp_header();
	adminmenu(4);
	echo "<br />";
	$story = new NewsStory();
	$topic= new NewsTopic();
	$exportedstories=array();
	$date1=$_POST['date1'];
	$date2=$_POST['date2'];
	$timestamp1=mktime(0,0,0,intval(substr($date1,5,2)), intval(substr($date1,8,2)), intval(substr($date1,0,4)));
	$timestamp2=mktime(0,0,0,intval(substr($date2,5,2)), intval(substr($date2,8,2)), intval(substr($date2,0,4)));
	$topiclist='';
	if(isset($_POST['export_topics'])) {
		$topiclist=implode(",",$_POST['export_topics']);
	}
	$topicsexport=intval($_POST['includetopics']);
	$tbltopics=array();
	$exportedstories=$story->NewsExport($timestamp1, $timestamp2, $topiclist, $topicsexport, $tbltopics);
	if(count($exportedstories))
	{
		$xmlfile=XOOPS_ROOT_PATH.'/uploads/stories.xml';
		$fp=fopen($xmlfile,'w');
		if(!$fp) {
			redirect_header('index.php',4,sprintf(_AM_NEWS_EXPORT_ERROR,$xmlfile));
		}

		fwrite($fp,"<?xml version=\"1.0\" ?>\n");
		fwrite($fp,"<xoops_stories>\n");
		if($topicsexport)
		{
			foreach($tbltopics as $onetopic)
			{
				fwrite($fp,"<xoops_topic>\n");
				$topic->NewsTopic($onetopic);
				fwrite($fp,sprintf("\t<topic_id>%u</topic_id>\n",$topic->topic_id()));
				fwrite($fp,sprintf("\t<topic_pid>%u</topic_pid>\n",$topic->topic_pid()));
				fwrite($fp,sprintf("\t<topic_imgurl>%s</topic_imgurl>\n",$topic->topic_imgurl()));
				fwrite($fp,sprintf("\t<topic_title>%s</topic_title>\n",$topic->topic_title('F')));
				fwrite($fp,sprintf("\t<menu>%d</menu>\n",$topic->menu()));
				fwrite($fp,sprintf("\t<topic_frontpage>%d</topic_frontpage>\n",$topic->topic_frontpage()));
				fwrite($fp,sprintf("\t<topic_rssurl>%s</topic_rssurl>\n",$topic->topic_rssurl('E')));
				fwrite($fp,sprintf("\t<topic_description>%s</topic_description>\n",$topic->topic_description()));
				fwrite($fp,sprintf("</xoops_topic>\n"));
			}
		}

		foreach($exportedstories as $onestory)
		{
			fwrite($fp,"<xoops_story>\n");
    		fwrite($fp,sprintf("\t<storyid>%u</storyid>\n",$onestory->storyid()));
    		fwrite($fp,sprintf("\t<uid>%u</uid>\n",$onestory->uid()));
    		fwrite($fp,sprintf("\t<uname>%s</uname>\n",$onestory->uname()));
    		fwrite($fp,sprintf("\t<title>%s</title>\n",$onestory->title()));
    		fwrite($fp,sprintf("\t<created>%u</created>\n",$onestory->created()));
    		fwrite($fp,sprintf("\t<published>%u</published>\n",$onestory->published()));
    		fwrite($fp,sprintf("\t<expired>%u</expired>\n",$onestory->expired()));
    		fwrite($fp,sprintf("\t<hostname>%s</hostname>\n",$onestory->hostname()));
    		fwrite($fp,sprintf("\t<nohtml>%d</nohtml>\n",$onestory->nohtml()));
    		fwrite($fp,sprintf("\t<nosmiley>%d</nosmiley>\n",$onestory->nosmiley()));
    		fwrite($fp,sprintf("\t<hometext>%s</hometext>\n",$onestory->hometext()));
    		fwrite($fp,sprintf("\t<bodytext>%s</bodytext>\n",$onestory->bodytext()));
    		fwrite($fp,sprintf("\t<description>%s</description>\n",$onestory->description()));
    		fwrite($fp,sprintf("\t<keywords>%s</keywords>\n",$onestory->keywords()));
    		fwrite($fp,sprintf("\t<counter>%u</counter>\n",$onestory->counter()));
    		fwrite($fp,sprintf("\t<topicid>%u</topicid>\n",$onestory->topicid()));
    		fwrite($fp,sprintf("\t<ihome>%d</ihome>\n",$onestory->ihome()));
    		fwrite($fp,sprintf("\t<notifypub>%d</notifypub>\n",$onestory->notifypub()));
    		fwrite($fp,sprintf("\t<story_type>%s</story_type>\n",$onestory->type()));
    		fwrite($fp,sprintf("\t<topicdisplay>%d</topicdisplay>\n",$onestory->topicdisplay()));
    		fwrite($fp,sprintf("\t<topicalign>%s</topicalign>\n",$onestory->topicalign()));
    		fwrite($fp,sprintf("\t<comments>%u</comments>\n",$onestory->comments()));
    		fwrite($fp,sprintf("\t<rating>%f</rating>\n",$onestory->rating()));
	    	fwrite($fp,sprintf("\t<votes>%u</votes>\n",$onestory->votes()));
    		fwrite($fp,sprintf("</xoops_story>\n"));
		}
		fwrite($fp,"</xoops_stories>\n");
		fclose($fp);
		$xmlfile=XOOPS_URL.'/uploads/stories.xml';
		printf(_AM_NEWS_EXPORT_READY,$xmlfile,XOOPS_URL.'/modules/news/admin/index.php?op=deletefile&amp;type=xml');
	} else {
		printf(_AM_NEWS_EXPORT_NOTHING);
	}
}



/*
* Topics manager
*
* It's from here that you can list, add, modify an delete topics
* At first, you can see a list of all the topics in your databases. This list contains the topic's ID, its name,
* its parent topic, if it should be visible in the Xoops main menu and an action (Edit or Delete topic)
* Below this list you find the form used to create and edit the topics.
* use this form to :
* - Type the topic's title
* - Enter its description
* - Select its parent topic
* - Choose a color
* - Select if it must appear in the Xoops main menu
* - Choose if you want to see in the front page. If it's not the case, visitors will have to use the navigation box to see it
* - And finally you ca select an image to represent the topic
* The text box called "URL of RSS feed" is, for this moment, not used.
*/
function topicsmanager()
{
    global $xoopsDB, $xoopsConfig, $xoopsModule, $xoopsModuleConfig, $myts;
    include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
    xoops_cp_header();
    adminmenu(0);
    $uploadfolder=sprintf(_AM_UPLOAD_WARNING,XOOPS_URL . "/modules/" . $xoopsModule->dirname().'/images/topics');
    $uploadirectory="/modules/" . $xoopsModule -> dirname().'/images/topics';
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0;

	$xt = new XoopsTree($xoopsDB->prefix("topics"), "topic_id", "topic_pid");
	$topics_arr = $xt->getChildTreeArray(0,"topic_title");
	$totaltopics = count($topics_arr);
	$class='';

    echo "<h4>" . _AM_CONFIG . "</h4>";
	news_collapsableBar('topicsmanager', 'toptopicsmanager');
	echo "<img onclick='toggle('toptable'); toggleIcon('toptableicon');' id='toptopicsmanager' name='toptopicsmanager' src=" . XOOPS_URL . "/modules/news/images/close12.gif alt='' /></a>&nbsp;"._AM_TOPICSMNGR . ' (' . $totaltopics . ')'."</h4>";
	echo "<div id='topicsmanager'>";
	echo "<br />";
    echo "<div style='text-align: center;'>";
    echo "<table width='100%' cellspacing='1' cellpadding='3' border='0' class='outer'><tr class='bg3'><td align='center'>" . _AM_TOPIC . "</td><td align='left'>" . _AM_TOPICNAME . "</td><td align='center'>" . _AM_PARENTTOPIC . "</td><td align='center'>" . _AM_SUB_MENU_YESNO . "</td><td align='center'>" . _AM_ACTION . "</td></tr>";
	if(is_array($topics_arr) && $totaltopics) {
		$cpt=1;
		$tmpcpt=$start;
		$ok=true;
		$output='';
		while($ok) {
			if($tmpcpt < $totaltopics) {
				$linkedit = XOOPS_URL . '/modules/'.$xoopsModule->dirname() . '/admin/index.php?op=topicsmanager&amp;topic_id=' . $topics_arr[$tmpcpt]['topic_id'];
				$linkdelete = XOOPS_URL . '/modules/'.$xoopsModule->dirname() . '/admin/index.php?op=delTopic&amp;topic_id=' . $topics_arr[$tmpcpt]['topic_id'];
				$action=sprintf("<a href='%s'>%s</a> - <a href='%s'>%s</a>",$linkedit,_AM_EDIT , $linkdelete, _AM_DELETE);
				$parent='&nbsp;';
				if($topics_arr[$tmpcpt]['topic_pid']>0)	{
					$xttmp = new XoopsTopic($xoopsDB->prefix("topics"),$topics_arr[$tmpcpt]['topic_pid']);
					$parent = $xttmp->topic_title();
					unset($xttmp);
				}
				if($topics_arr[$tmpcpt]['topic_pid']!=0) {
					$topics_arr[$tmpcpt]['prefix'] = str_replace(".","-",$topics_arr[$tmpcpt]['prefix']) . '&nbsp;';
				} else {
					$topics_arr[$tmpcpt]['prefix'] = str_replace(".","",$topics_arr[$tmpcpt]['prefix']);
				}
				$submenu=$topics_arr[$tmpcpt]['menu'] ? _YES : _NO;
				$class = ($class == 'even') ? 'odd' : 'even';
				$output  = $output . "<tr class='".$class."'><td>" . $topics_arr[$tmpcpt]['topic_id'] . "</td><td align='left'>" . $topics_arr[$tmpcpt]['prefix'] . $myts->displayTarea($topics_arr[$tmpcpt]['topic_title']) . "</td><td align='left'>" . $parent . "</td><td>" . $submenu . "</td><td>" . $action . "</td></tr>";
			} else {
				$ok=false;
			}
			if($cpt>=$xoopsModuleConfig['storycountadmin'])	{
				$ok=false;
			}
			$tmpcpt++;
			$cpt++;
		}
		echo $output;
	}
	$pagenav = new XoopsPageNav( $totaltopics, $xoopsModuleConfig['storycountadmin'], $start, 'start', 'op=topicsmanager');
	echo "</table><div align='right'>".$pagenav->renderNav().'</div><br />';
	echo "</div></div><br />\n";

	$topic_id = isset($_GET['topic_id']) ? intval($_GET['topic_id']) : 0;
	if($topic_id>0) {
		$xtmod = new NewsTopic($topic_id);
		$topic_title=$xtmod->topic_title('E');
		$topic_description=$xtmod->topic_description('E');
		$topic_rssfeed=$xtmod->topic_rssurl('E');
		$op='modTopicS';
		if(xoops_trim($xtmod->topic_imgurl())!='') {
			$topicimage=$xtmod->topic_imgurl();
		} else {
			$topicimage="blank.png";
		}
		$btnlabel=_AM_MODIFY;
		$parent=$xtmod->topic_pid();
		$formlabel=_AM_MODIFYTOPIC;
		$submenu=$xtmod->menu();
		$topic_frontpage=$xtmod->topic_frontpage();
		$topic_color=$xtmod->topic_color();
		unset($xtmod);
	} else {
		$topic_title='';
		$topic_frontpage=1;
		$topic_description='';
		$op='addTopic';
		$topicimage='xoops.gif';
		$btnlabel=_AM_ADD;
		$parent=-1;
		$submenu=0;
		$topic_rssfeed='';
		$formlabel=_AM_ADD_TOPIC;
		$topic_color='000000';
	}

	$sform = new XoopsThemeForm($formlabel, "topicform", XOOPS_URL.'/modules/'.$xoopsModule->getVar('dirname').'/admin/index.php', 'post');
	$sform->setExtra('enctype="multipart/form-data"');
	$sform->addElement(new XoopsFormText(_AM_TOPICNAME, 'topic_title', 50, 255, $topic_title), true);
	$editor=news_getWysiwygForm(_AM_TOPIC_DESCR,'topic_description', $topic_description, 15, 60, 'hometext_hidden');
	if($editor) {
		$sform->addElement($editor,false);
	}

	$sform->addElement(new XoopsFormHidden('op', $op), false);
	$sform->addElement(new XoopsFormHidden('topic_id', $topic_id), false);

	include_once XOOPS_ROOT_PATH."/modules/news/class/class.newstopic.php";
	$xt = new NewsTopic();
	$sform->addElement(new XoopsFormLabel(_AM_PARENTTOPIC, $xt->MakeMyTopicSelBox(1, $parent,'topic_pid','',false)));
	// Topic's color
	// Code stolen to Zoullou, thank you Zoullou ;-)
	$select_color = "\n<select name='topic_color'  onchange='xoopsGetElementById(\"NewsColorSelect\").style.backgroundColor = \"#\" + this.options[this.selectedIndex].value;'>\n<option value='000000'>"._AM_NEWS_COLOR."</option>\n";
	$color_values = array('000000','000033','000066','000099','0000CC','0000FF','003300','003333','003366','0033CC','0033FF','006600','006633',
							'006666','006699','0066CC','0066FF','009900','009933','009966','009999','0099CC','0099FF','00CC00','00CC33','00CC66','00CC99',
							'00CCCC','00CCFF','00FF00','00FF33','00FF66','00FF99','00FFCC','00FFFF','330000','330033','330066','330099','3300CC','3300FF',
							'333300','333333','333366','333399','3333CC','3333FF','336600','336633','336666','336699','3366CC','3366FF','339900','339933',
							'339966','339999','3399CC','3399FF','33CC00','33CC33','33CC66','33CC99','33CCCC','33CCFF','33FF00','33FF33','33FF66','33FF99',
							'33FFCC','33FFFF','660000','660033','660066','660099','6600CC','6600FF','663300','663333','663366','663399','6633CC','6633FF',
							'666600','666633','666666','666699','6666CC','6666FF','669900','669933','669966','669999','6699CC','6699FF','66CC00','66CC33',
							'66CC66','66CC99','66CCCC','66CCFF','66FF00','66FF33','66FF66','66FF99','66FFCC','66FFFF','990000','990033','990066','990099',
							'9900CC','9900FF','993300','993333','993366','993399','9933CC','9933FF','996600','996633','996666','996699','9966CC','9966FF',
							'999900','999933','999966','999999','9999CC','9999FF','99CC00','99CC33','99CC66','99CC99','99CCCC','99CCFF','99FF00','99FF33',
							'99FF66','99FF99','99FFCC','99FFFF','CC0000','CC0033','CC0066','CC0099','CC00CC','CC00FF','CC3300','CC3333','CC3366','CC3399',
							'CC33CC','CC33FF','CC6600','CC6633','CC6666','CC6699','CC66CC','CC66FF','CC9900','CC9933','CC9966','CC9999','CC99CC','CC99FF',
							'CCCC00','CCCC33','CCCC66','CCCC99','CCCCCC','CCCCFF','CCFF00','CCFF33','CCFF66','CCFF99','CCFFCC','CCFFFF','FF0000','FF0033',
							'FF0066','FF0099','FF00CC','FF00FF','FF3300','FF3333','FF3366','FF3399','FF33CC','FF33FF','FF6600','FF6633','FF6666','FF6699',
							'FF66CC','FF66FF','FF9900','FF9933','FF9966','FF9999','FF99CC','FF99FF','FFCC00','FFCC33','FFCC66','FFCC99','FFCCCC','FFCCFF',
							'FFFF00','FFFF33','FFFF66','FFFF99','FFFFCC','FFFFFF');

	foreach($color_values as $color_value) {
		if($topic_color == $color_value) {
			$selected = " selected='selected'";
		} else {
			$selected = "";
		}
		$select_color .= "<option".$selected." value='".$color_value."' style='background-color:#".$color_value.";color:#".$color_value.";'>#".$color_value."</option>\n";
	}

	$select_color .= "</select>&nbsp;\n<span id='NewsColorSelect'>&nbsp;&nbsp;&nbsp;&nbsp;</span>";
	$sform->addElement( new XoopsFormLabel( _AM_NEWS_TOPIC_COLOR, $select_color) );
	// Sub menu ?
	$sform->addElement(new XoopsFormRadioYN(_AM_SUB_MENU, 'submenu', $submenu, _YES, _NO));
	$sform->addElement(new XoopsFormRadioYN(_AM_PUBLISH_FRONTPAGE, 'topic_frontpage', $topic_frontpage, _YES, _NO));
	// Unused for this moment... sorry
	//$sform->addElement(new XoopsFormText(_AM_NEWS_RSS_URL, 'topic_rssfeed', 50, 255, $topic_rssfeed), false);
	// ********** Picture
	$imgtray = new XoopsFormElementTray(_AM_TOPICIMG,'<br />');

	$imgpath=sprintf(_AM_IMGNAEXLOC, "modules/" . $xoopsModule -> dirname() . "/images/topics/" );
	$imageselect= new XoopsFormSelect($imgpath, 'topic_imgurl',$topicimage);
    $topics_array = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/modules/news/images/topics/" );
    foreach( $topics_array as $image ) {
        $imageselect->addOption("$image", $image);
    }
	$imageselect->setExtra( "onchange='showImgSelected(\"image3\", \"topic_imgurl\", \"" . $uploadirectory . "\", \"\", \"" . XOOPS_URL . "\")'" );
    $imgtray->addElement($imageselect,false);
    $imgtray -> addElement( new XoopsFormLabel( '', "<br /><img src='" . XOOPS_URL . "/" . $uploadirectory . "/" . $topicimage . "' name='image3' id='image3' alt='' />" ) );

    $uploadfolder=sprintf(_AM_UPLOAD_WARNING,XOOPS_URL . "/modules/" . $xoopsModule -> dirname().'/images/topics');
    $fileseltray= new XoopsFormElementTray('','<br />');
    $fileseltray->addElement(new XoopsFormFile(_AM_TOPIC_PICTURE , 'attachedfile', $xoopsModuleConfig['maxuploadsize']), false);
    $fileseltray->addElement(new XoopsFormLabel($uploadfolder ), false);
    $imgtray->addElement($fileseltray);
    $sform->addElement($imgtray);

	// Submit buttons
	$button_tray = new XoopsFormElementTray('' ,'');
	$submit_btn = new XoopsFormButton('', 'post', $btnlabel, 'submit');
	$button_tray->addElement($submit_btn);
	$sform->addElement($button_tray);
	$sform->display();
	echo "<script type='text/javascript'>\n";
	echo 'xoopsGetElementById("NewsColorSelect").style.backgroundColor = "#' . $topic_color .'";';
	echo "</script>\n";
}


// Save a topic after it has been modified
function modTopicS()
{
    global $xoopsDB, $xoopsModule, $xoopsModuleConfig;

    $xt = new NewsTopic(intval($_POST['topic_id']));
    if (intval($_POST['topic_pid']) == intval($_POST['topic_id'])) {
        redirect_header( 'index.php?op=topicsmanager', 2, _AM_ADD_TOPIC_ERROR1 );
    }
    $xt->setTopicPid(intval($_POST['topic_pid']));
    if (empty($_POST['topic_title'])) {
        redirect_header( "index.php?op=topicsmanager", 2, _AM_ERRORTOPICNAME );
    }
    $xt -> setTopicTitle($_POST['topic_title']);
    if (isset($_POST['topic_imgurl']) && $_POST['topic_imgurl']!= "") {
        $xt -> setTopicImgurl($_POST['topic_imgurl']);
    }
   	$xt->setMenu(intval($_POST['submenu']));
   	$xt->setTopicFrontpage(intval($_POST['topic_frontpage']));
   	$xt->setTopicDescription($_POST['topic_description']);
   	//$xt->Settopic_rssurl($_POST['topic_rssfeed']);
   	$xt->setTopic_color($_POST['topic_color']);

	if(isset($_POST['xoops_upload_file'])) {
		$fldname = $_FILES[$_POST['xoops_upload_file'][0]];
		$fldname = (get_magic_quotes_gpc()) ? stripslashes($fldname['name']) : $fldname['name'];
		if(xoops_trim($fldname!='')) {
			$sfiles = new sFiles();
			$dstpath = XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->dirname() . '/images/topics';
			$destname=$sfiles->createUploadName($dstpath ,$fldname, true);
			$permittedtypes=array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png');
			$uploader = new XoopsMediaUploader($dstpath, $permittedtypes, $xoopsModuleConfig['maxuploadsize']);
			$uploader->setTargetFileName($destname);
			if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
				if ($uploader->upload()) {
					$xt->setTopicImgurl(basename($destname));
				} else {
					echo _AM_UPLOAD_ERROR . ' ' . $uploader->getErrors();
				}
			} else {
				echo $uploader->getErrors();
			}
		}
   	}
    $xt->store();
    updateCache();
    redirect_header( 'index.php?op=topicsmanager', 1, _AM_DBUPDATED );
    exit();
}

// Delete a topic and its subtopics and its stories and the related sotries
function delTopic()
{
    global $xoopsDB, $xoopsModule;
    if (!isset($_POST['ok'])) {
        xoops_cp_header();
        echo "<h4>" . _AM_CONFIG . "</h4>";
        $xt = new XoopsTopic( $xoopsDB->prefix("topics"), intval($_GET['topic_id']));
        xoops_confirm(array( 'op' => 'delTopic', 'topic_id' => intval($_GET['topic_id']), 'ok' => 1), 'index.php', _AM_WAYSYWTDTTAL . '<br />' . $xt->topic_title('S'));
    } else {
        $xt = new XoopsTopic($xoopsDB->prefix("topics"), intval($_POST['topic_id']));
        // get all subtopics under the specified topic
        $topic_arr = $xt->getAllChildTopics();
        array_push( $topic_arr, $xt );
        foreach( $topic_arr as $eachtopic ) {
            // get all stories in each topic
            $story_arr = NewsStory :: getByTopic( $eachtopic -> topic_id() );
            foreach( $story_arr as $eachstory ) {
                if (false != $eachstory->delete()) {
                    xoops_comment_delete( $xoopsModule -> getVar( 'mid' ), $eachstory -> storyid() );
                    xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'story', $eachstory->storyid());
                }
            }
            // all stories for each topic is deleted, now delete the topic data
            $eachtopic -> delete();
            // Delete also the notifications and permissions
            xoops_notification_deletebyitem( $xoopsModule -> getVar( 'mid' ), 'category', $eachtopic -> topic_id );
			xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'news_approve', $eachtopic -> topic_id);
			xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'news_submit', $eachtopic -> topic_id);
			xoops_groupperm_deletebymoditem($xoopsModule->getVar('mid'), 'news_view', $eachtopic -> topic_id);
        }
        updateCache();
        redirect_header( 'index.php?op=topicsmanager', 1, _AM_DBUPDATED );
        exit();
    }
}

// Add a new topic
function addTopic()
{
	global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
    $topicpid = isset($_POST['topic_pid']) ? intval($_POST['topic_pid']) : 0;
    $xt = new NewsTopic();
    if (!$xt->topicExists($topicpid, $_POST['topic_title'])) {
        $xt->setTopicPid($topicpid);
        if (empty($_POST['topic_title']) || xoops_trim($_POST['topic_title'])=='') {
            redirect_header( "index.php?op=topicsmanager", 2, _AM_ERRORTOPICNAME );
        }
        $xt->setTopicTitle($_POST['topic_title']);
        //$xt->Settopic_rssurl($_POST['topic_rssfeed']);
        $xt->setTopic_color($_POST['topic_color']);
        if (isset($_POST['topic_imgurl'] ) && $_POST['topic_imgurl'] != "") {
            $xt->setTopicImgurl($_POST['topic_imgurl'] );
        }
		$xt->setMenu(intval($_POST['submenu']));
		$xt->setTopicFrontpage(intval($_POST['topic_frontpage']));
		if(isset($_POST['xoops_upload_file'])) {
			$fldname = $_FILES[$_POST['xoops_upload_file'][0]];
			$fldname = (get_magic_quotes_gpc()) ? stripslashes($fldname['name']) : $fldname['name'];
			if(xoops_trim($fldname!='')) {
				$sfiles = new sFiles();
				$dstpath = XOOPS_ROOT_PATH . "/modules/" . $xoopsModule -> dirname() . '/images/topics';
				$destname=$sfiles->createUploadName($dstpath ,$fldname, true);
				$permittedtypes=array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png');
				$uploader = new XoopsMediaUploader($dstpath, $permittedtypes, $xoopsModuleConfig['maxuploadsize']);
				$uploader->setTargetFileName($destname);
				if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
					if ($uploader->upload()) {
						$xt->setTopicImgurl(basename($destname));
					} else {
						echo _AM_UPLOAD_ERROR . ' ' . $uploader->getErrors();
					}
				} else {
					echo $uploader->getErrors();
				}
			}
		}
		$xt->setTopicDescription($_POST['topic_description']);
		$xt->store();
		updateCache();

        $notification_handler = & xoops_gethandler('notification');
        $tags = array();
        $tags['TOPIC_NAME'] = $_POST['topic_title'];
        $notification_handler->triggerEvent( 'global', 0, 'new_category', $tags);
        redirect_header('index.php?op=topicsmanager', 1, _AM_DBUPDATED);
    } else {
        redirect_header('index.php?op=topicsmanager', 2, _AM_ADD_TOPIC_ERROR);
    }
    exit();
}

/**
 * Statistics about stories, topics and authors
 *
 * You can reach the statistics from the admin part of the news module by clicking on the "Statistics" tabs
 * The number of visible elements in each table is equal to the module's option called "storycountadmin"
 * There are 3 kind of different statistics :
 * - Topics statistics
 *   For each topic you can see its number of articles, the number of time each topics was viewed, the number
 *   of attached files, the number of expired articles and the number of unique authors.
 * - Articles statistics
 *   This part is decomposed in 3 tables :
 *   a) Most readed articles
 *      This table resumes, for all the news in your database, the most readed articles.
 *      The table contains, for each news, its topic, its title, the author and the number of views.
 *   b) Less readed articles
 *      That's the opposite action of the previous table and its content is the same
 *   c) Best rated articles
 *      You will find here the best rated articles, the content is the same that the previous tables, the last column is just changing and contains the article's rating
 * - Authors statistics
 *   This part is also decomposed in 3 tables
 *   a) Most readed authors
 *		To create this table, the program compute the total number of reads per author and displays the most readed author and the number of views
 *   b) Best rated authors
 *      To created this table's content, the program compute the rating's average of each author and create a table
 *   c) Biggest contributors
 *      The goal of this table is to know who is creating the biggest number of articles.
 */
function Stats()
{
    global $xoopsModule, $xoopsConfig, $xoopsModuleConfig;
    xoops_cp_header();
    $myts =& MyTextSanitizer::getInstance();
	if (file_exists(XOOPS_ROOT_PATH.'/modules/news/language/'.$xoopsConfig['language'].'/main.php')) {
		include_once XOOPS_ROOT_PATH.'/modules/news/language/'.$xoopsConfig['language'].'/main.php';
	} else {
		include_once XOOPS_ROOT_PATH.'/modules/news/language/english/main.php';
	}
    adminmenu(6);
    $news = new NewsStory();
    $stats = array();
    $stats=$news->GetStats($xoopsModuleConfig['storycountadmin']);
	$totals=array(0,0,0,0,0);
    printf("<h1>%s</h1>\n",_AM_NEWS_STATS);

    // First part of the stats, everything about topics
	$storiespertopic=$stats['storiespertopic'];
	$readspertopic=$stats['readspertopic'];
	$filespertopic=$stats['filespertopic'];
	$expiredpertopic=$stats['expiredpertopic'];
	$authorspertopic=$stats['authorspertopic'];
	$class='';

	echo "<div style='text-align: center;'><b>" . _AM_NEWS_STATS0 . "</b><br />\n";
	echo "<table border='1' width='100%'><tr class='bg3'><td align='center'>"._AM_TOPIC."</td><td align='center'>" . _NW_ARTICLES . "</td><td>" . _NW_VIEWS . "</td><td>" . _AM_UPLOAD_ATTACHFILE . "</td><td>" . _AM_EXPARTS ."</td><td>" ._AM_NEWS_STATS1 ."</td></tr>";
	foreach ( $storiespertopic as $topicid => $data ) {
		$url=XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/index.php?storytopic=" . $topicid;
		$views=0;
		if(array_key_exists($topicid,$readspertopic)) {
			$views=$readspertopic[$topicid];
		}
		$attachedfiles=0;
		if(array_key_exists($topicid,$filespertopic)) {
			$attachedfiles=$filespertopic[$topicid];
		}
		$expired=0;
		if(array_key_exists($topicid,$expiredpertopic)) {
			$expired=$expiredpertopic[$topicid];
		}
		$authors=0;
		if(array_key_exists($topicid,$authorspertopic)) {
			$authors=$authorspertopic[$topicid];
		}
		$articles=$data['cpt'];

        $totals[0]+=$articles;
        $totals[1]+=$views;
        $totals[2]+=$attachedfiles;
        $totals[3]+=$expired;
        $class = ($class == 'even') ? 'odd' : 'even';
		printf("<tr class='".$class."'><td align='left'><a href='%s' target ='_blank'>%s</a></td><td align='right'>%u</td><td align='right'>%u</td><td align='right'>%u</td><td align='right'>%u</td><td align='right'>%u</td></tr>\n",$url,$myts->displayTarea($data['topic_title']),$articles,$views,$attachedfiles,$expired,$authors);
	}
	$class = ($class == 'even') ? 'odd' : 'even';
	printf("<tr class='".$class."'><td align='center'><b>%s</b></td><td align='right'><b>%u</b></td><td align='right'><b>%u</b></td><td align='right'><b>%u</b></td><td align='right'><b>%u</b></td><td>&nbsp;</td>\n",_AM_NEWS_STATS2,$totals[0],$totals[1],$totals[2],$totals[3]);
	echo "</table></div><br /><br /><br />";

	// Second part of the stats, everything about stories
	// a) Most readed articles
	$mostreadednews=$stats['mostreadednews'];
	echo "<div style='text-align: center;'><b>" . _AM_NEWS_STATS3 . "</b><br /><br />" . _AM_NEWS_STATS4 . "<br />\n";
	echo "<table border='1' width='100%'><tr class='bg3'><td align='center'>"._AM_TOPIC."</td><td align='center'>" . _AM_TITLE . "</td><td>" . _AM_POSTER . "</td><td>" . _NW_VIEWS . "</td></tr>\n";
	foreach ( $mostreadednews as $storyid => $data ) {
		$url1=XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/index.php?storytopic=" . $data['topicid'];
		$url2=XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/article.php?storyid=" . $storyid;
		$url3=XOOPS_URL . '/userinfo.php?uid=' . $data['uid'];
		$class = ($class == 'even') ? 'odd' : 'even';
		printf("<tr class='".$class."'><td align='left'><a href='%s' target ='_blank'>%s</a></td><td align='left'><a href='%s' target='_blank'>%s</a></td><td><a href='%s' target='_blank'>%s</a></td><td align='right'>%u</td></tr>\n",$url1,$myts->displayTarea($data['topic_title']),$url2,$myts->displayTarea($data['title']),$url3,$myts->htmlSpecialChars($news->uname($data['uid'])),$data['counter']);
	}
	echo "</table>";

	// b) Less readed articles
	$lessreadednews=$stats['lessreadednews'];
	echo '<br /><br />'._AM_NEWS_STATS5;
	echo "<table border='1' width='100%'><tr class='bg3'><td align='center'>"._AM_TOPIC."</td><td align='center'>" . _AM_TITLE . "</td><td>" . _AM_POSTER . "</td><td>" . _NW_VIEWS . "</td></tr>\n";
	foreach ( $lessreadednews as $storyid => $data ) {
		$url1=XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/index.php?storytopic=" . $data['topicid'];
		$url2=XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/article.php?storyid=" . $storyid;
		$url3=XOOPS_URL . '/userinfo.php?uid=' . $data['uid'];
		$class = ($class == 'even') ? 'odd' : 'even';
		printf("<tr class='".$class."'><td align='left'><a href='%s' target ='_blank'>%s</a></td><td align='left'><a href='%s' target='_blank'>%s</a></td><td><a href='%s' target='_blank'>%s</a></td><td align='right'>%u</td></tr>\n",$url1,$myts->displayTarea($data['topic_title']),$url2,$myts->displayTarea($data['title']),$url3,$myts->htmlSpecialChars($news->uname($data['uid'])),$data['counter']);
	}
	echo "</table>";

	// c) Best rated articles (this is an average)
	$besratednews=$stats['besratednews'];
	echo '<br /><br />'._AM_NEWS_STATS6;
	echo "<table border='1' width='100%'><tr class='bg3'><td align='center'>"._AM_TOPIC."</td><td align='center'>" . _AM_TITLE . "</td><td>" . _AM_POSTER . "</td><td>" . _NW_RATING . "</td></tr>\n";
	foreach ( $besratednews as $storyid => $data ) {
		$url1=XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/index.php?storytopic=" . $data['topicid'];
		$url2=XOOPS_URL . "/modules/" . $xoopsModule -> dirname() . "/article.php?storyid=" . $storyid;
		$url3=XOOPS_URL . '/userinfo.php?uid=' . $data['uid'];
		$class = ($class == 'even') ? 'odd' : 'even';
		printf("<tr class='".$class."'><td align='left'><a href='%s' target ='_blank'>%s</a></td><td align='left'><a href='%s' target='_blank'>%s</a></td><td><a href='%s' target='_blank'>%s</a></td><td align='right'>%s</td></tr>\n",$url1,$myts->displayTarea($data['topic_title']),$url2,$myts->displayTarea($data['title']),$url3,$myts->htmlSpecialChars($news->uname($data['uid'])),number_format($data['rating'], 2));
	}
	echo "</table></div><br /><br /><br />";


	// Last part of the stats, everything about authors
	// a) Most readed authors
	$mostreadedauthors=$stats['mostreadedauthors'];
	echo "<div style='text-align: center;'><b>" . _AM_NEWS_STATS10 . "</b><br /><br />" . _AM_NEWS_STATS7 . "<br />\n";
	echo "<table border='1' width='100%'><tr class='bg3'><td>"._AM_POSTER."</td><td>" . _NW_VIEWS . "</td></tr>\n";
	foreach ( $mostreadedauthors as $uid => $reads) {
		$url=XOOPS_URL . '/userinfo.php?uid=' . $uid;
		$class = ($class == 'even') ? 'odd' : 'even';
		printf("<tr class='".$class."'><td align='left'><a href='%s' target ='_blank'>%s</a></td><td align='right'>%u</td></tr>\n",$url,$myts->htmlSpecialChars($news->uname($uid)),$reads);
	}
	echo "</table>";

    // b) Best rated authors
	$bestratedauthors=$stats['bestratedauthors'];
	echo '<br /><br />'._AM_NEWS_STATS8;
	echo "<table border='1' width='100%'><tr class='bg3'><td>"._AM_POSTER."</td><td>" . _NW_RATING . "</td></tr>\n";
	foreach ( $bestratedauthors as $uid => $rating) {
		$url=XOOPS_URL . '/userinfo.php?uid=' . $uid;
		$class = ($class == 'even') ? 'odd' : 'even';
		printf("<tr class='".$class."'><td align='left'><a href='%s' target ='_blank'>%s</a></td><td align='right'>%u</td></tr>\n",$url,$myts->htmlSpecialChars($news->uname($uid)),$rating);
	}
	echo "</table>";

	// c) Biggest contributors
	$biggestcontributors=$stats['biggestcontributors'];
	echo '<br /><br />'._AM_NEWS_STATS9;
	echo "<table border='1' width='100%'><tr class='bg3'><td>"._AM_POSTER."</td><td>" . _AM_NEWS_STATS11 . "</td></tr>\n";
	foreach ( $biggestcontributors as $uid => $count) {
		$url=XOOPS_URL . '/userinfo.php?uid=' . $uid;
		$class = ($class == 'even') ? 'odd' : 'even';
		printf("<tr class='".$class."'><td align='left'><a href='%s' target ='_blank'>%s</a></td><td align='right'>%u</td></tr>\n",$url,$myts->htmlSpecialChars($news->uname($uid)),$count);
	}
	echo "</table></div><br />";
}


// **********************************************************************************************************************************************
// **** Main
// **********************************************************************************************************************************************
$op = 'default';
if(isset($_POST['op'])) {
 $op=$_POST['op'];
} else {
	if(isset($_GET['op'])) {
		$op=$_GET['op'];
	}
}


switch ($op)
{
	case "deletefile":
		xoops_cp_header();
		if($_GET['type']=='newsletter')	{
			$newsfile=XOOPS_ROOT_PATH.'/uploads/newsletter.txt';
			if(unlink($newsfile)) {
				redirect_header('index.php', 2, _AM_NEWS_DELETED_OK);
			} else {
				redirect_header('index.php', 2, _AM_NEWS_DELETED_PB);
			}
		} else {
			if($_GET['type']=='xml') {
				$xmlfile=XOOPS_ROOT_PATH.'/uploads/stories.xml';
				if(unlink($xmlfile)) {
					redirect_header( 'index.php', 2, _AM_NEWS_DELETED_OK );
				} else {
					redirect_header( 'index.php', 2, _AM_NEWS_DELETED_PB );
				}
			}
		}

    case "newarticle":
        xoops_cp_header();
        adminmenu(1);
        echo "<h4>" . _AM_CONFIG . "</h4>";
        include_once XOOPS_ROOT_PATH . "/class/module.textsanitizer.php";
        newSubmissions();
        autoStories();
        lastStories();
        expStories();
        echo "<br />";
        echo "<h4>" . _AM_POSTNEWARTICLE . "</h4>";
        $type = "admin";
        $title = "";
        $topicdisplay = 0;
        $topicalign = 'R';
        $ihome = 0;
        $hometext = '';
        $bodytext = '';
        $notifypub = 1;
        $nohtml = 0;
        $approve = 0;
        $nosmiley = 0;
	    $autodate = '';
	    $expired = '';
	    $topicid = 0;
	    $returnside=1;
	    $published = 0;
	    $description='';
	    $keywords='';
        if (file_exists(XOOPS_ROOT_PATH.'/modules/news/language/'.$xoopsConfig['language'].'/main.php')) {
            include_once XOOPS_ROOT_PATH.'/modules/news/language/'.$xoopsConfig['language'].'/main.php';
        } else {
            include_once XOOPS_ROOT_PATH.'/modules/news/language/english/main.php';
        }

		if($xoopsModuleConfig['autoapprove'] == 1) {
			$approve=1;
		}
        $approveprivilege = 1;
        include_once XOOPS_ROOT_PATH.'/modules/news/include/storyform.inc.php';
        break;

    case "delete":
       	$storyid=0;
       	if(isset($_GET['storyid'])) {
			$storyid=intval($_GET['storyid']);
       	} else {
       		if(isset($_POST['storyid'])) {
       			$storyid=intval($_POST['storyid']);
	   		}
       	}

        if (!empty($_POST['ok'])) {
            if (empty($storyid)) {
                redirect_header( 'index.php?op=newarticle', 2, _AM_EMPTYNODELETE );
                exit();
            }
            $story = new NewsStory($storyid);
            $story->delete();
			$sfiles = new sFiles();
			$filesarr=Array();
			$filesarr=$sfiles->getAllbyStory($storyid);
			if(count($filesarr)>0) {
				foreach ($filesarr as $onefile) {
					$onefile->delete();
				}
			}
            xoops_comment_delete($xoopsModule->getVar('mid'),$storyid);
            xoops_notification_deletebyitem($xoopsModule->getVar('mid'), 'story', $storyid);
            updateCache();
            redirect_header( 'index.php?op=newarticle', 1, _AM_DBUPDATED );
            exit();
        } else {
        	$story = new NewsStory($storyid);
            xoops_cp_header();
            echo "<h4>" . _AM_CONFIG . "</h4>";
            xoops_confirm(array('op' => 'delete', 'storyid' => $storyid, 'ok' => 1), 'index.php', _AM_RUSUREDEL .'<br />' . $story->title());
        }
        break;

    case "topicsmanager":
        topicsmanager();
        break;

    case "addTopic":
        addTopic();
        break;

    case "delTopic":
        delTopic();
        break;

    case "modTopicS":
        modTopicS();
        break;

    case "edit":
		include_once XOOPS_ROOT_PATH.'/modules/news/submit.php';
		break;

    case "prune":
    	PruneManager();
    	break;

    case "confirmbeforetoprune":
    	ConfirmBeforeToPrune();
    	break;

    case "prunenews";
    	PruneNews();
    	break;

    case "export":
    	NewsExport();
    	break;

    case "launchexport":
    	LaunchExport();
    	break;

    case "configurenewsletter":
    	Newsletter();
    	break;

    case "launchnewsletter":
    	LaunchNewsletter();
    	break;

    case "stats":
    	Stats();
    	break;

    case "default":
    default:
        xoops_cp_header();
        adminmenu(-1);
        if(!TableExists($xoopsDB->prefix('stories_votedata')) || !TableExists($xoopsDB->prefix('stories_files')) )
        {
        	echo "<div align='center'>"._AM_NEWS_PLEASE_UPGRADE."</div><br/><br />";
        }

        echo "<h4>" . _AM_CONFIG . "</h4>";
        echo"<table width='100%' border='0' cellspacing='1' class='outer'><tr><td class=\"odd\">";
        echo " - <b><a href='index.php?op=topicsmanager'>" . _AM_TOPICSMNGR . "</a></b>";
        echo "<br /><br />\n";
        echo " - <b><a href='index.php?op=newarticle'>" . _AM_PEARTICLES . "</a></b>\n";
        echo "<br /><br />\n";
        echo " - <b><a href='groupperms.php'>" . _AM_GROUPPERM . "</a></b>\n";
        echo "<br /><br />\n";
        echo " - <b><a href='" . XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule -> getVar( 'mid' ) . "'>" . _AM_GENERALCONF . "</a></b>";
        echo "<br /><br />\n";
        echo " - <b><a href='index.php?op=prune'>" . _AM_NEWS_PRUNENEWS . "</a></b>\n";
        echo "<br /><br />\n";
        echo " - <b><a href='index.php?op=export'>" . _AM_NEWS_EXPORT_NEWS . "</a></b>\n";
        echo "<br /><br />\n";
        echo " - <b><a href='index.php?op=configurenewsletter'>" . _AM_NEWS_NEWSLETTER . "</a></b>\n";
        echo "<br /><br />\n";
        echo " - <b><a href='index.php?op=stats'>" . _AM_NEWS_STATS . "</a></b>\n";
        echo"</td></tr></table>";
        break;
}

xoops_cp_footer();
?>