<?php
include ('admin_header.php');

$trooper_id=$_GET[id];
$getname = $conn->query("
	select concat(first_name, ' ', last_name) as name
	from roster_members
	where trooper_id = $trooper_id
");

$trooper_participation = $conn->query("
	select *
	from event_participation, events
	where event_participation.trooper_id = $trooper_id
	and event_participation.event_id = events.event_id
	order by event_date desc
	");
	
if ($trooper_participation->num_rows == 0) {
	while ($row1=$getname->fetch_assoc()) {
		$fullname = $row1["name"];
		echo "$fullname does not have any tours of duty.
";
	}
} else {
	while ($row=$trooper_participation->fetch_assoc()) {
		include ('../dbvars.php');
		echo "$event_date: $event_name<br>";
	}
}

include ("tod_event_checklist.php");
include ('admin_footer.php');
?>
