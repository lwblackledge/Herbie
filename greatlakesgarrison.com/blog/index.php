<?php
/*
Fetch the settings file.  This MUST appear before ANY other tags.
*/
if (!@include_once('settings.php')) {
	die('Unable to open settings.php.  Feeling helpful?  Send an email to the webmaster.');
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

<tr>
<td id="navigation" valign="top" width="200">
<p style="text-align:center"><a href="<?php echo $blog_url; ?>">Home</a><br />
<a href="<?php echo $blog_url, 'rss.', $phpEx; ?>"><img alt="RSS 2.0 feed" border="0" src="images/rss.png" /></a>
<?php
if (is_dir($phpbb_root_path . 'podcast/')) {
	echo '<br /><a href="', $blog_url, 'rss.', $phpEx, '"><img alt="RSS 2.0 feed" border="0" src="images/podcast.gif" /></a>';
}
echo '</p>';

if (!@include_once('calendar.' . $phpEx)) {
	echo 'Unable to open calendar.php.  Feeling helpful?  Send an email to the webmaster.';
}

/*
Grab the blogs by year, month.  THIS ONLY WORKS FOR MYSQL, because I'm using
FROM_UNIXTIME.  I've wrapped it in a $dbms check, so what should happen is
MySQL users get an archive, and we're quiet for others.  If anyone knows how to
get the same results with PostgreSQL or MS SQL, let me know.
*/
$using_mysql = strpos($dbms, 'mysql');
if ($using_mysql !== false) {
	echo '<div align="center"><b>Archives</b></div>';
	$previous_year = '';
	$sql = 'SELECT DISTINCT(FROM_UNIXTIME(topic_time,\'%Y,%b,%c\')) AS topic_time ';
	$sql .= 'FROM ' . $table_prefix . 'topics ';
	$sql .= 'WHERE forum_id=' . $forum . ' ';
	if ($hide_stickies) {
		$sql .= 'AND topic_type=0 ';
	}
	$sql .= 'ORDER BY topic_time DESC';
	if (!$result = $db->sql_query($sql)) {
		message_die(GENERAL_ERROR, 'Querying the database didn\'t work.  Feeling helpful?  Email the webmaster.  ' . $sql);
	}
	while ($row = $db->sql_fetchrow($result)) {
		list($temp_year, $temp_month_name, $temp_month) = explode(',', $row['topic_time']);
		if ($previous_year != $temp_year) {
			echo '<div align="center">', $temp_year, '</div>';
			$previous_year = $temp_year;
		}
		else {
			echo ', ';
		}
		echo '<a href="', $blog_url, '?archive=', $temp_year, ',', $temp_month, '">', $temp_month_name, '</a>';
	}
}

?></td>
<td id="content" valign="top">
<?php
if (!@include_once('blog.' . $phpEx)) {
	echo 'Unable to open blog.php.  Feeling helpful?  Send an email to the webmaster.';
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
