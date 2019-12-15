<?
include ('admin_header.php');

$check = $_POST["costume_select"];
$trooper_id_form = $_POST['trooperid'];
$num_events = sizeof($check);

for ($a = 0; $a < $num_events; $a++) {
	mysql_query("
		insert into roster_outfit (outfit_id, trooper_id, costume_id, outfit_variant, active_flag)
		values ('', '$trooper_id_form', '$check[$a]', '1', '1')
	");
}

?>

Added.
<P>
<a href="search_member.php?lookup=costumes_edit">Add costumes to another trooper</a> or <a href="index.php">return to main menu</a>.