<?php
include ('admin_header.php');

$outfit_id_form = $_GET['o_id'];
$get_set = $_GET['set'];

$conn->query("
		update roster_outfit
		set active_flag = $get_set
		where outfit_id = $outfit_id_form
");

?>

Costume activated/deactivated
<P>
<a href="search_member.php?lookup=costumes_edit">Add costumes to another trooper</a> or <a href="index.php">return to main menu</a>.