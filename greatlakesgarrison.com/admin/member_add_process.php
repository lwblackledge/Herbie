<?php
include ('admin_header.php');

$add_fname=$_POST['first_name'];
$add_lname=$_POST['last_name'];
$add_tk=$_POST['tkid'];
$add_email=$_POST['e_mail'];
$add_city=$_POST['city'];
$add_state=$_POST['state'];
$add_costume=$_POST['costume'];
$add_status=$_POST['status'];
$add_month = $_POST['member_month'];
$add_year = $_POST['member_year'];
$add_classified = $_POST['classified'];

$unix_event_date = mktime(0,0,0,$add_month,1,$add_year);
$member_date=date("Y-m-j" , $unix_event_date);

/* CHECK IF RECORD ALREADY EXISTS */
$check_table=mysql_query("select * from roster_members where tkid=$add_tk");
$num_rows=mysql_num_rows($check_table);

if ($num_rows>0){
	echo"TKID $add_tk already exists.<P>Click <b>Back</b> to correct or 
<a href=\"member_edit.php?tkid=$add_tk\">edit Trooper $add_tk's info.</a>
";


/* END OF EXISTING RECORD CHECK, UNIQUE RECORD CONDITION */
	} else {

$insert_trooper="INSERT INTO roster_members (tkid, first_name, last_name, e_mail, city, state_id, member_since, status_id, role_id, classified)
VALUES ('$add_tk', '$add_fname', '$add_lname', '$add_email', '$add_city', '$add_state', '$member_date', '$add_status', '1', '$add_classified')";

$get_new_trooper_id = "
	select trooper_id
	from roster_members
	where tkid = $add_tk
	";

$insert_outfit = "insert into roster_outfit (trooper_id, costume_id, outfit_variant)
values ('$new_trooper_index', '$add_costume', '1')";

mysql_query($insert_trooper);

$new_trooper_id = mysql_query($get_new_trooper_id);

while ($row = mysql_fetch_array($new_trooper_id)) {
	$new_trooper_index = $row['trooper_id'];
	mysql_query("insert into roster_outfit (trooper_id, costume_id, outfit_variant)
values ('$new_trooper_index', '$add_costume', '1')");
	}
	

echo "<h1>Add Member</h1>";
echo"Record added.<P>
";

echo"<a href=\"member_add_costume.php&tkid=$add_tk\">Add additional costumes for this member</a>";

} 

include ('admin_footer.php');

?>
