<?
include ('admin_header.php');

$check = $_POST["trooper"];
$event_id_form = $_POST['id'];
$num_events = sizeof($check);

for ($a = 0; $a < $num_events; $a++) {
	mysql_query("
		insert into event_participation (event_participation_id,event_id, trooper_id)
		values ('', '$event_id_form', '$check[$a]')
	") or die(mysql_error());
}

?>
Added.
<P>
<a href="tod_addtoevent_test.php">Back to test event</a>
<P>
<a href="event_search.php?type=tod_addtoevent">Add troopers to another event</a> or <a href="index.php">return to main menu</a>.