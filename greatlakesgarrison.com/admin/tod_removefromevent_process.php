<?php
include ('admin_header.php');

$check = $_POST["event"];
//$event_id_form = $_POST['id'];

$num_events = sizeof($check);

for ($a = 0; $a < $num_events; $a++) {
	$conn->query("
		delete from event_participation
		where event_participation_id = '$check[$a]'
	");
}

?>

Removed.
<P>
<a href="event_search.php?type=tod_addtoevent">Add/remove troopers from another event</a> or <a href="index.php">return to main menu</a>.