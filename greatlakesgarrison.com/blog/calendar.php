<?
/*
   blog_calendar MOD for phpbb-blog MOD
   Version 1.0.0 released July 25, 2005 by wileydaver@snappitypop.com
   see http://www.snappitypop.com/demoblog for details

   Options: Set $enable_calendar to 0 to disable this mod.
            Set $cal_link_type to 1 to make calendar links to forum entries
            instead of permalinks.
            Add or modify "calendar", "cal_header", "cal_link", and
            "cal_normal" in your stylesheet to change calendar's appearance.
*/

if ( ($enable_calendar) || (! isset($enable_calendar) ) )
{
	$calendar=array();
	$cal_names = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	list($cal_year, $cal_month) = explode(",", $_GET['archive']);
	$cal_year = preg_replace("/[^0-9]/", "", $cal_year);
	$cal_month = preg_replace("/[^0-9]/", "", $cal_month);
	if (empty($cal_year) || empty($cal_month))
	{
		$today=getdate();
		$cal_month=$today['mon'];
		$cal_year=$today['year'];
	}
	$month_start = mktime(23, 59, 59, $cal_month, 0, $cal_year);
	$month_end = mktime(0, 0, 0, $cal_month + 1, 1, $cal_year);
	$cal_last = date('t',mktime(0,0,0,$cal_month,1,$cal_year)) ;
	$cal_start = date('w',mktime(0,0,0,$cal_month,1,$cal_year)) + 1;

	$sql=" SELECT t.topic_id, t.topic_time FROM {$table_prefix}topics as t
		   WHERE t.forum_id=$forum AND t.topic_type=0 AND t.topic_time > $month_start
		   AND t.topic_time < $month_end ORDER BY t.topic_time ASC ";

	if (!$result = $db->sql_query($sql)) {
			message_die(GENERAL_ERROR, 'Querying the database for the calendar didn\'t work.  Feeling helpful?  Email the webmaster.');
	}
	while ($row = $db->sql_fetchrow($result))
	{
		$cal_time = ($show_dates) ? gmdate("M d Y",
					 $row['topic_time'] + (3600 * $board_config['board_timezone'])) : '';
		list($blog_month,$blog_day,$blog_year)=explode(" ",$cal_time);
		$calendar[$blog_year.$blog_month.$blog_day]=$blog_url . '?permalink=' . $row['topic_id'];

		if ($cal_link_type)
		{
			$calendar[$blog_year.$blog_month.$blog_day]=$phpbb_url . 'viewtopic.' . $phpEx . '?t=' . $row['topic_id'];
		}
	}

	print '<div class="cal_header"><b>Calendar - '.$cal_names[$cal_month-1].", $cal_year</b></div>";
	print '<div class="calendar"><table width="150" border="0" id="old_table"><tr>';
	if ($cal_start - 1 != 0) {
	print "<td class='calendar' colspan=". ($cal_start-1) .">&nbsp</td>";
	}
	$cal_pos=$cal_start;

	for ($j=1;$j<=$cal_last;$j++)
	{
		$day=$j;
		if ($j<10)
		{
			$day='0'.$j;
		}

		if ($calendar[$cal_year.$cal_names[$cal_month - 1].$day]!='')
		{
			print '<td width="20" class="old_td"><span="cal_link">';
			print "<a href='".$calendar[$cal_year.$cal_names[$cal_month - 1].$day]."'>$day</a></span></td>";
		}
		else
		{
			print '<td width="20" class="old_td"><span="cal_normal">' . $day . '</span></td>';
		}
		$cal_pos++;
		if ($cal_pos % 8 == 0)
		{
			print "</tr><tr>";
			$cal_pos=1;
		}
	}
	print "</tr></table></div>";
}
?>
