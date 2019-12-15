<?
include ("admin_header.php");

$role_name = $_POST['role_name'];
$role_abbr = $_POST['role_abbr'];

mysql_query("
	insert into roster_roles(role_name,role_abbr)
	values ('$role_name','$role_abbr')
") or die("Role could not be added to database due to communication error");

echo "Role " . $role_name . " added successfully.";
include ("admin_footer.php");

?>