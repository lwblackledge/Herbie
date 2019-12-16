<?
include ("admin_header.php");

$check = $_POST['trooper'];
$event_id_form = $_POST['event_id'];
$select_role = $_POST['select_role'];
$num_troops = sizeof($select_role);

for ($a = 0; $a < $num_troops; $a++) {
	if (!$conn->query("
		update event_participation
		set participation_role_id = '$select_role[$a]'
		where event_id = '$event_id_form'
		and trooper_id = '$check[$a]'
	")) {
		throw new Exception("SQL Query failed: (" . $conn->errno . ") " . $conn->error);
	}
	
}

echo "Updated!<P>
";
include ("admin_footer.php");
?>