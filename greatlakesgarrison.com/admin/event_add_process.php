<?
include ('admin_header.php');

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

$unix_event_date = mktime(0,0,0,$event_date_month,$event_date_day,$event_date_year);
$event_date=date("Y-m-j" , $unix_event_date);

$event_name=addslashes($event_name);
$event_description=addslashes($event_description);

$add_event_query="insert into events (event_name, event_description, event_date, event_city, event_state, event_postcode, forum_topic_id, is_private, is_active) values
('$event_name', '$event_description', '$event_date', '$event_city', '$event_state', '$event_postcode', '$forum_topic_id', '$is_private', '1')";

$conn->query($add_event_query) or die ("Database update failure: " . mysql_error());

$event_name_clean=stripslashes($event_name);

echo "Event added:
<br>
Name: $event_name_clean<br>
Location: $event_city, $event_state<br>
Date: $event_date<br>
<P>
<a href=\"event_add.php\">Add another event</a> or <a href=\"index.php\">return to main menu</a>.
<P>
<hr size=1>
";

$get_event_id = mysql_insert_id();

?>
<form action="tod_addtoevent.php" method="post">
	<input type="hidden" name="event_list" value="<? echo $get_event_id; ?>">
	<input type="submit" value="Add troopers">
</form>
<?

if ($forum_topic_id != null) {
	echo "Jump to <a href=\"http://dev.mi501st.com/forum/viewtopic.php?t=$forum_topic_id\">forum topic</a>.";
}

include ('admin_footer.php');
?>