<?php
//EDIT FTOTM
include ("admin_header.php");

$ftotm_choose_sql = $conn->query("
	select ftotm_id, ftotm_month, ftotm_year, first_name, last_name
	from ftotm, roster_members
	where ftotm.ftotm_tkid = roster_members.tkid
	order by ftotm_year desc, ftotm_month desc
");

echo "<form method=\"post\" action=\"ftotm_edit.php\">
Select entry to edit: <select name=\"ftotm_select\">
";

while ($row = $ftotm_choose_sql->fetch_assoc()) {
	$id = $row['ftotm_id'];
	$month = $row['ftotm_month'];
	$year = $row['ftotm_year'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	
	echo "	<option value=\"$id\">$month/$year: $first_name $last_name</option>
";
}

echo "</select>
<input type=\"submit\" value=\"Edit...\">
</form>
";

include ("admin_footer.php");
?>