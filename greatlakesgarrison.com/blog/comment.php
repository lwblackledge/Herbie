<?php
/*
Fetch the settings file.  This MUST appear before ANY other tags.
*/
if (!@include_once('settings.php')) {
	die('Unable to open settings.php.  Feeling helpful?  Send an email to the webmaster.');
}

$topic_id = 0;
if ( isset($HTTP_GET_VARS[POST_TOPIC_URL]) )
{
	$topic_id = intval($HTTP_GET_VARS[POST_TOPIC_URL]);
}
else if ( isset($HTTP_GET_VARS['topic']) )
{
	$topic_id = intval($HTTP_GET_VARS['topic']);
}

if ( isset($HTTP_GET_VARS[POST_POST_URL]))
{
	$post_id = intval($HTTP_GET_VARS[POST_POST_URL]);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $language; ?>" lang="<?php echo $language; ?>">

<head>
<base target="_top" />
<link href="stylesheets/<?php echo $stylesheet; ?>.css" rel="stylesheet" title="<?php echo ucfirst($stylesheet); ?>" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $blog_url, 'rss.', $phpEx; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php echo $geo_meta_tags,$author_tag; ?>
<meta name="dc.language" content="<?php echo $iso639_language; ?>" />
<meta name="description" content="<?php echo $blog_summary; ?>" />
<meta name="copyright" content="<?php echo $copyright; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="developer" content="Anthony Boyd" />
<title><?php echo $blog_name; ?></title>
</head>

<body>

<table id="wrapper">

<tr>
<td id="header" colspan="2"><?php echo $logo_tag; ?> <h1><?php echo $blog_name; ?></h1></td>
</tr>


<td id="content" valign="top">
<?php

/*
Select the posts from the database.
*/
$sql = 'SELECT t.topic_id, p.post_id, p.poster_id, p.post_time, u.username, u.user_avatar, p.post_username, pt.bbcode_uid, pt.post_subject, pt.post_text ';
$sql .= 'FROM ' . $table_prefix . 'topics as t, ' . $table_prefix . 'posts as p,' . $table_prefix . 'users as u, ' . $table_prefix . 'posts_text as pt ';
$sql .= 'WHERE t.forum_id=' . $forum . ' AND p.topic_id=t.topic_id AND p.poster_id=u.user_id AND p.post_id=pt.post_id ';
$sql .= 'AND t.topic_type=0 ';
$sql .= 'AND t.topic_id=' . $topic_id . ' ';
$sql .= 'ORDER BY p.post_time ';


if (!$result = $db->sql_query($sql)) {
	message_die(GENERAL_ERROR, 'Querying the database didn\'t work.  Feeling helpful?  Email the webmaster.');
}

/*
Loop through the results, clean 'em up, and print 'em out.
*/
while ($row = $db->sql_fetchrow($result)) {
	$topic_id = $row['topic_id'];
	$post_id = $row['post_id'];
	$userid = $row['poster_id'];
	$post_time = $row['post_time'];
   	$user_avatar = $row['user_avatar'];
	if ($userid > 0) {
		$username = $row['username'];
	}
	else {
		$username = $row['post_username'];
    	if ($username == '') {
   	    	$username = 'Anonymous';
    	}
	}
	$subject = $row['post_subject'];
	if ($subject == '') {
   		$subject = 'Comment';
	}
	$bid = $row['bbcode_uid'];
	$text = $row['post_text'];
	$topic_url = $phpbb_url . 'viewtopic.' . $phpEx . '?t=' . $topic_id;
	$perma_url = $blog_url . '?permalink=' . $topic_id;
	$trackback_url = $blog_url . 'trackback.' . $phpEx . '/' . $topic_id;
	if (isset($_GET['archive']) || $count < 100) {
        /* missP: I chose 100 as maximum of shown comments in order to avoid
        another parameter in settings.php. Change this value according to
        your needs here or use a $max_comments parameter.
        */

		/*
		IN viewtopic.php, THERE IS SOME HTML PARSING HERE, BEFORE bbcode.
		SHOULD I INCLUDE THAT?  WHAT DOES IT DO?

		ALSO, thanks to the phpBB crew, because the next 20 lines are pretty
		much derived from viewtopic.php.
		*/
		if ($bid != '') {
			$text = ($board_config['allow_bbcode']) ? bbencode_second_pass($text, $bid) : preg_replace('/\:[0-9a-z\:]+\]/si', ']', $text);
		}
		$text = make_clickable($text);
		$orig_word = array();
		$replacement_word = array();
		obtain_word_list($orig_word, $replacement_word);
		if (count($orig_word)) {
			$subject = preg_replace($orig_word, $replacement_word, $subject);
			$text = preg_replace($orig_word, $replacement_word, $text);
		}
		$text = ($board_config['allow_smilies']) ? smilies_pass($text) : $text;
		$text = str_replace("\n", '<br />', $text);
		$text = preg_replace('/src ?= ?"images\/smiles\//', 'src="' . $phpbb_url . 'images/smiles/', $text);
		$text = ($blog_length) ? shorten($text, $blog_length) : $text;
		$profile_url = $phpbb_url . 'profile.' . $phpEx . '?mode=viewprofile&u=' . $userid;
		$profile_link_start = ($show_profiles) ? '<a href="' . $profile_url . '">' : '';
		$profile_link_end = ($show_profiles) ? '</a>' : '';
		/*
		REPLACE gmdate WITH create_date???
		*/
		$blog_time = ($show_dates) ? ' on ' . gmdate($board_config['default_dateformat'], $post_time + (3600 * $board_config['board_timezone'])) : '';
		$avatar_url = $phpbb_url . 'images/avatars/' . $user_avatar;
		$avatar = '<img border="0" src="' . $avatar_url . '" />';
		if ($hide_avatars) {
			$avatar = '';
		}
?>

<div class="blog_entry">
	<div class="subject">
		<?php echo $avatar,$subject; ?>

		<div class="tagline">
			<br />by <?php echo $profile_link_start,$username,$profile_link_end,$blog_time; ?>
		</div>
	</div>
	<?php echo $text; ?>
</div>

<?php
	}
	$count++;
}
$db->sql_freeresult($result);
?>

<?php
if ( $count > 0 ) {
?>

<div class="blog_entry">
 <div class="subject">
  <h2 id="postcomment">Leave a quick comment</h2>
<div class="tagline">
<br />or post your reply in the <a href="<?php echo $phpbb_url, 'viewtopic.', $phpEx; ?>?t=<?php echo $topic_id; ?>">Blog-Forum.</a>
</div>
 </div>

<form action="<?php echo $phpbb_url, 'posting.', $phpEx; ?>"  method="post" name="post" onsubmit="return checkForm(this)">

<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
	<tr>
		<td class="row1">
            <span class="genmed">
                <label for="author">Your Name </label>
                <input type="text" class="post" tabindex="1" name="username" size="25" maxlength="25" value="" />
            </span>
        </td>
	</tr>
	<tr>
		<td colspan="9">
            <span class="gen">
                <label for="message">Your Comment</label>
                <br />
                <textarea name="message" rows="5" cols="8" wrap="virtual" style="width:450px" tabindex="3" class="post" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);"></textarea>
			</span>
        </td>
	</tr>
    <tr>
        <td class="catBottom" colspan="2" height="20">
            <input type="hidden" name="mode" value="reply" />
            <input type="hidden" name="t" value="<?php echo $topic_id; ?>" />
            <input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="Submit" />
        </td>
    </tr>
</table>

</form>

</div>

<?php
}
else {
?>

<div class="blog_entry">
 <div class="subject">
  <h2 id="postcomment">There is no topic number <?php echo $topic_id; ?> in this blog. </h2>
<div class="tagline">
<br />Post your reply in the <a href="<?php echo $phpbb_url, 'viewtopic.', $phpEx, '?t=', $topic_id; ?>">Blog-Forum.</a>
</div>
 </div>
</div>

<?php
}
?>
</td>
</tr>

<tr>
<td id="footer" colspan="2"><?php echo $copyright; ?></td>
</tr>

</table>

</body>
</html>
