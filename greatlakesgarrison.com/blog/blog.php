<script language="JavaScript">
function trackbackPopup(topic) {
	eval("trackback" + topic + " = window.open('<?php echo $blog_url, 'trackback.', $phpEx . '/'; ?>" + topic + "','trackback" + topic + "','menubar,scrollbars,resizable,width=450,height=300')")
	return false
}
</script>
<?php
/*
Set up a few variables.
*/
$count = 0;
$previous_link = 'previous';
$next_link = 'next';
$first_link = 'first';
/*
If a permalink is needed, grab previous/next/first links.  This is SQL
intensive.  You can help by using the "first_id" in settings.php.  But I also
will need to optimize this in later versions.
*/
if (isset($_GET['permalink'])) {
	$max_blogs = 1;
	$parting_shots = 0;
	$perma_id = preg_replace("/[^0-9]/", "", $_GET['permalink']);
	$sql = 'SELECT topic_id FROM ' . $table_prefix . 'topics WHERE forum_id=' . $forum . ' AND topic_id<' . $perma_id . ' ';
	if ($hide_stickies) {
		$sql .= 'AND topic_type=0 ';
	}
	$sql .= 'ORDER BY topic_time DESC LIMIT 1';
	if (!$result = $db->sql_query($sql)) {
		message_die(GENERAL_ERROR, 'Querying the database didn\'t work.  Feeling helpful?  Email the webmaster.');
	}
	while ($row = $db->sql_fetchrow($result)) {
		$previous_id = $row['topic_id'];
		$previous_link = '<a href="' . $blog_url . '?permalink=' . $previous_id . '">previous</a>';
	}
	$sql = 'SELECT topic_id FROM ' . $table_prefix . 'topics WHERE forum_id=' . $forum . ' AND topic_id>' . $perma_id . ' ';
	if ($hide_stickies) {
		$sql .= 'AND topic_type=0 ';
	}
	$sql .= 'ORDER BY topic_time ASC LIMIT 1';
	if (!$result = $db->sql_query($sql)) {
		message_die(GENERAL_ERROR, 'Querying the database didn\'t work.  Feeling helpful?  Email the webmaster.');
	}
	while ($row = $db->sql_fetchrow($result)) {
		$next_id = $row['topic_id'];
		$next_link = '<a href="' . $blog_url . '?permalink=' . $next_id . '">next</a>';
	}
	if (!$first_id) {
		$sql = 'SELECT topic_id FROM ' . $table_prefix . 'topics WHERE forum_id=' . $forum . ' ';
		if ($hide_stickies) {
			$sql .= 'AND topic_type=0 ';
		}
		$sql .= 'ORDER BY topic_time ASC LIMIT 1';
		if (!$result = $db->sql_query($sql)) {
			message_die(GENERAL_ERROR, 'Querying the database didn\'t work.  Feeling helpful?  Email the webmaster.');
		}
		while ($row = $db->sql_fetchrow($result)) {
			$first_id = $row['topic_id'];
			$first_link = '<a href="' . $blog_url . '?permalink=' . $first_id . '">first</a>';
		}
	}
	else {
		$first_link = '<a href="' . $blog_url . '?permalink=' . $first_id . '">first</a>';
	}
	$first_link = ($first_id == $perma_id) ? 'first' : $first_link;
}
if (isset($_GET['archive'])) {
	list($archive_year, $archive_month) = explode(",", $_GET['archive']);
	$archive_year = preg_replace("/[^0-9]/", "", $archive_year);
	$archive_month = preg_replace("/[^0-9]/", "", $archive_month);
	if (empty($archive_year) || empty($archive_month)) {
		unset($_GET['archive']);
	}
	else {
		$month_names = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		echo '<h2 align="center">', $month_names[$archive_month - 1], ' ', $archive_year, '</h2>';
		$month_start = mktime(23, 59, 59, $archive_month, 0, $archive_year);
		$month_end = mktime(0, 0, 0, $archive_month + 1, 1, $archive_year);
	}
}
$total_blogs = $max_blogs + $parting_shots;

/*
Select the posts from the database.
*/
$sql = 'SELECT t.topic_id, t.topic_poster, t.topic_time, t.topic_replies, u.username, u.user_avatar, p.bbcode_uid, p.post_subject, p.post_text ';
$sql .= 'FROM ' . $table_prefix . 'topics as t, ' . $table_prefix . 'users as u, ' . $table_prefix . 'posts_text as p ';
$sql .= 'WHERE t.forum_id=' . $forum . ' AND t.topic_poster=u.user_id AND t.topic_first_post_id=p.post_id ';
if ($hide_stickies) {
	$sql .= 'AND t.topic_type=0 ';
}
if (isset($_GET['permalink'])) {
	$sql .= 'AND t.topic_id=' . $perma_id . ' ';
}
if (isset($_GET['archive'])) {
	$sql .= 'AND t.topic_time > ' . $month_start . ' AND t.topic_time < ' . $month_end . ' ';
	$sql .= 'ORDER BY t.topic_time ASC';
}
else {
	$sql .= 'ORDER BY t.topic_time DESC ';
	$sql .= 'LIMIT ' . $total_blogs;
}

if (!$result = $db->sql_query($sql)) {
	message_die(GENERAL_ERROR, 'Querying the database didn\'t work.  Feeling helpful?  Email the webmaster.');
}

/*
Loop through the results, clean 'em up, and print 'em out.
*/
while ($row = $db->sql_fetchrow($result)) {
	$topic_id = $row['topic_id'];
	$userid = $row['topic_poster'];
	$topic_time = $row['topic_time'];
	$replies = $row['topic_replies'];
	$username = $row['username'];
	$user_avatar = $row['user_avatar'];
	$bid = $row['bbcode_uid'];
	$subject = $row['post_subject'];
	$text = $row['post_text'];
	$topic_url = $phpbb_url . 'viewtopic.' . $phpEx . '?t=' . $topic_id;
	$topic_url = ($comment_via_forum) ? $topic_url : $blog_url . 'comment.' . $phpEx . '?t=' . $topic_id;
	$perma_url = $blog_url . '?permalink=' . $topic_id;
	$trackback_url = $blog_url . 'trackback.' . $phpEx . '/' . $topic_id;
	$trackback_link = '| <a href="' . $trackback_url . '" onclick="return trackbackPopup(' . $topic_id . ')">trackback</a> ';
	$trackback_ping = 'trackback:ping="' . $trackback_url . '" ';
	if ($hide_trackbacks) {
		$trackback_url = '';
		$trackback_link = '';
		$trackback_ping = '';
	}
	$podcast_path = $phpbb_root_path . 'podcast/' . $topic_id . '.mp3';
	$podcast_tag = '';
	if (file_exists($podcast_path)) {
		$podcast_url = $phpbb_url . 'podcast/' . $topic_id . '.mp3';
		$podcast_tag = '<a href="' . $podcast_url . '">audio available</a>';
	}
	if (isset($_GET['archive']) || $count < $max_blogs) {
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
		$blog_time = ($show_dates) ? ' on ' . gmdate($board_config['default_dateformat'], $topic_time + (3600 * $board_config['board_timezone'])) : '';
		$avatar_url = $phpbb_url . 'images/avatars/' . $user_avatar;
		$avatar = '<img border="0" src="' . $avatar_url . '" />';
		if ($hide_avatars) {
			$avatar = '';
		}
?>

<div class="blog_entry">
<div style="font-weight: bold; color: #1c54a9; font-size: 9pt">
<?php echo $avatar,$subject; ?>
</div>

<div style="font-size: 7pt; color: #fff">
by <?php echo $profile_link_start,$username,$profile_link_end,$blog_time; ?>
</div>
<?php echo $podcast_tag; ?>

</div>
<?php echo $text; ?>
<br><br>

<?php
		if (isset($_GET['permalink'])) {
?>
<br /><?php echo $previous_link; ?> | <?php echo $first_link; ?> | <?php echo $next_link; ?>
<?php
		}
?>
</div>

<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:trackback="http://madskills.com/public/xml/rss/module/trackback/">
<rdf:Description rdf:about="<?php echo $perma_url; ?>" dc:identifier="<?php echo $perma_url; ?>" dc:title="<?php echo addslashes($subject); ?>" <?php echo $trackback_ping; ?>/>
</rdf:RDF>
</div>
<?php
	}
	else {
?>

<a href="<?php echo $perma_url; ?>"><?php echo $subject; ?></a><br />
<?php
	}
	$count++;
}
$db->sql_freeresult($result);
?>
