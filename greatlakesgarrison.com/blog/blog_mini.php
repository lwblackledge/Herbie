<div class="blog_box">
<p><big>Latest Posts</big></p>
<?php
/*
Select the posts from the database.
*/
$sql = 'SELECT t.topic_id, t.topic_time, p.post_subject ';
$sql .= 'FROM ' . $table_prefix . 'topics as t, ' . $table_prefix . 'posts_text as p ';
$sql .= 'WHERE t.forum_id=' . $forum . ' AND t.topic_first_post_id=p.post_id ';
if ($hide_stickies) {
	$sql .= 'AND t.topic_type=0 ';
}
$sql .= 'ORDER BY t.topic_time DESC ';
$sql .= 'LIMIT ' . $max_blogs;

if (!$result = $db->sql_query($sql)) {
	message_die(GENERAL_ERROR, 'Querying the database didn\'t work.  Feeling helpful?  Email the webmaster.');
}

/*
Loop through the results, clean 'em up, and print 'em out.
*/
while ($row = $db->sql_fetchrow($result)) {
	$topic_id = $row['topic_id'];
	$topic_time = $row['topic_time'];
	$subject = $row['post_subject'];
	$topic_url = $phpbb_url . 'viewtopic.' . $phpEx . '?t=' . $topic_id;
	$orig_word = array();
	$replacement_word = array();
	obtain_word_list($orig_word, $replacement_word);
	if (count($orig_word)) {
		$subject = preg_replace($orig_word, $replacement_word, $subject);
	}
	/*
	REPLACE gmdate WITH create_date???
	*/
	$blog_time = ($show_dates) ? gmdate($board_config['default_dateformat'], $topic_time + (3600 * $board_config['board_timezone'])) . ': ' : '';
?>

<?php echo $blog_time; ?><a href="<?php echo $topic_url; ?>"><?php echo $subject; ?></a><br />

<?php
}
$db->sql_freeresult($result);
?>

<p><small>___<br />Powered by <a href="http://www.outshine.com/phpbbblog/">phpBB Blog</a>.</small></p>
</div>
