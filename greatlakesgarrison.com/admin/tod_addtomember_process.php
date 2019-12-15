<?
include ('admin_header.php');

$check = $_POST["event"];
$trooper_id_form = $_POST['id'];
$num_events = sizeof($check);

for ($a = 0; $a < $num_events; $a++) {
	mysql_query("
		insert into event_participation (event_participation_id,event_id, trooper_id)
		values ('', '$check[$a]', '$trooper_id_form')
	");
}

?>

Added.
<P>
<a href="search_member.php?lookup=tod_addtomember">Add events to another trooper</a> or <a href="index.php">return to main menu</a>.