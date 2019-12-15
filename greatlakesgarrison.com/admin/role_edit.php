<?
include ('admin_header.php');

$role_query = mysql_query ("
	select *
	from roster_roles
	where role_id > 8
	order by role_id
	");
	
echo "Select role to edit:<P>";

while ($row = mysql_fetch_array($role_query)) {
	$role_id = $row['role_id'];
	$role_name = $row['role_name'];
	$role_abbr = $row['role_abbr'];
	
	echo "<a href=\"role_edit_form.php?id=$role_id\">$role_name ($role_abbr)</a><br>";
	}

include ('admin_footer.php');	
?>
