<?php
include ('admin_header.php');

$form_role_id = $_POST[form_role_id];
$form_role_name = $_POST[form_role_name];
$form_role_abbr = $_POST[form_role_abbr];

$conn->query("
	update roster_roles
	set role_name = '$form_role_name', role_abbr = '$form_role_abbr'
	where role_id = '$form_role_id'
	");
	
echo "Done.  Updated <b>$form_role_name ($form_role_abbr)</b>";

include ('admin_footer.php');	
?>
