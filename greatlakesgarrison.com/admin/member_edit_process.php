<?php
include ('admin_header.php');

$trooper_id=$_POST['trooper_id'];
$new_tkid=$_POST['new_tkid'];
$new_first_name=$_POST['new_first_name'];
$new_last_name=$_POST['new_last_name'];
$new_e_mail=$_POST['new_e_mail'];
$new_city=$_POST['new_city'];
$new_state = $_POST['state'];
$new_status=$_POST['status'];
$new_role=$_POST['role'];
$new_classified = $_POST['classified'];

$conn->query("
update roster_members
set tkid=$new_tkid, first_name='$new_first_name', last_name='$new_last_name', e_mail='$new_e_mail', city='$new_city',
	state_id = '$new_state', status_id='$new_status', role_id='$new_role', classified = '$new_classified'
where trooper_id=$trooper_id
");

$record_select=$conn->query("
select *
from roster_members
where trooper_id = $trooper_id
");

while ($row=$record_select->fetch_assoc()) {
	include ('../z_dbvars.php');
	echo "<h1>Updated!</h1>";
	echo "$first_name $last_name<br>";
	echo "Legion ID: $new_tkid<br>";
	echo "$e_mail<br>";
	echo "$city<P>";
	echo "Classified status: ";
	switch ($new_classified) {
		case 0:
			echo "No";
			break;
		case 1:
			echo "Yes";
			break;
	}
	}

$conn->close();

include ("admin_footer.php");
?>