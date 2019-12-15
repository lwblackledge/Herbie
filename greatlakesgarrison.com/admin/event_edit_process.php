<?
include ('admin_header.php');

$event_id = $_POST[event_id];
$event_name=$_POST[event_name];
$event_description=$_POST[event_description];
$event_city=$_POST[event_city];
$event_state=$_POST[event_state];
$event_postcode = $_POST[event_postcode];
$event_date_month=$_POST[event_date_month];
$event_date_day=$_POST[event_date_day];
$event_date_year=$_POST[event_date_year];
$forum_topic_id=$_POST[forum_topic_id];
$is_private=$_POST[is_private];
$is_active=$_POST[is_active];

$unix_event_date = mktime(0,0,0,$event_date_month,$event_date_day,$event_date_year);
$event_date=date("Y-m-j" , $unix_event_date);

$event_name=addslashes($event_name);
$event_description=addslashes($event_description);

$edit_event_query="
update events
set event_name='$event_name', event_description='$event_description', event_date='$event_date', event_city='$event_city',
	event_state='$event_state', event_postcode = '$event_postcode', forum_topic_id='$forum_topic_id', is_private='$is_private', is_active='$is_active'
where event_id = $event_id
";

mysql_query($edit_event_query) or die("Update failed: ".mysql_error());

$event_name_clean=stripslashes($event_name);

echo "Event updated:
<br>
Name: $event_name_clean<br>
Location: $event_city, $event_state<br>
Date: $event_date<br>
<P>
<hr size=1>
";

if ($forum_topic_id != null || $forum_topic_id != 0) {
	echo "Jump to <a href=\"http://www.greatlakesgarrison.com/forum/viewtopic.php?t=$forum_topic_id\" target=\"_new\">forum topic</a>.<br>";
}

include ('admin_footer.php');
?>