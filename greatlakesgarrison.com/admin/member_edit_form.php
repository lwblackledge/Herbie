<?
include ('admin_header.php');

$id = $_GET['id'];

$trooper_detail = mysql_query("
	select *
	from roster_members
	where trooper_id = $id
");

$status_query=mysql_query("
	select * from roster_status
");

$role_query = mysql_query("
	select * from roster_roles
");

// State listings
$state_sql = mysql_query("
	select state_id, state_abbr
	from roster_state_id
	order by state_abbr
");

?>
<h2>Edit Member</h2>
<form action="member_edit_process.php" method="post">

<?
while ($row=mysql_fetch_array($trooper_detail)) {
	include ('../z_dbvars.php');
	echo "
<input type=\"hidden\" name=\"trooper_id\" value=\"$trooper_id\">
<table cellpadding=0 cellspacing=10 border=0>
	<tr>
		<td>
			TKID:
		</td>
		<td>
			<input type=\"text\" name=\"new_tkid\" value=\"$tkid\" maxlength=5 size=10>
		</td>
	</tr>
	<tr>
		<td>
			First Name:
		</td>
		<td>
			<input type=\"text\" name=\"new_first_name\" value=\"$first_name\" size=20>
		</td>
	</tr>
	<tr>
		<td>
			Last Name:
		</td>
		<td>
			<input type=\"text\" name=\"new_last_name\" value=\"$last_name\" size=20>
		</td>
	</tr>
	<tr>
		<td>
			E-Mail Address:
		</td>
		<td>
			<input type=\"text\" name=\"new_e_mail\" value=\"$e_mail\" size=20>
		</td>
	</tr>
	<tr>
		<td>
			City:
		</td>
		<td>
			<input type=\"text\" name=\"new_city\" value=\"$city\" size=20>
		</td>
	</tr>
	<tr>
		<td>
			State:
		</td>
		<td>
			<select name=\"state\">
";
			while ($state_compare = mysql_fetch_array($state_sql)) {
				echo "
				<option value=\"" . $state_compare['state_id'] . "\"";
				if ($state_compare['state_id'] == $state_id) {
					echo " selected";
				}
				echo "
				>" . $state_compare['state_abbr'] . "</option>";
			}
echo "
			</select>
		</td>
	</tr>
	<tr>
		<td valign=top>
			Status:
		</td>
		<td>
";
	$trooper_status=$status_id;

	while ($row2=mysql_fetch_array($status_query)) {
		$status_id = $row2['status_id'];
		$status = $row2['status'];
		
		echo "<input type=\"radio\" name=\"status\" value=\"$status_id\"";
	
		if ($trooper_status == $status_id) {
			echo " checked";
		}
	
		echo "> $status<br>
";
	}

?>
		</td>
	</tr>
	<!--tr>
		<td>
			Member Since:<br>
		</td>
		<td>
			<select name="member_month">
<?
/*
$this_month = date('n',$member_since);
for ($q = 1; $q < 13; $q++) {
	echo "
				<option value=\"$q\"";
	if ($q == $this_month) {
		echo " checked";
	}
	echo ">";
	echo date('F', $q);
}
?>
			</select>
			<select name="member_year">
			<?
				$select_year = date("Y");
				include ("event_year_list.php");
*/			?>
			</select>
		</td>
	</tr-->
	<tr>
		<td valign=top>
			Role:
		</td>
		<td>
<?
	$trooper_role = $role_id;

	while ($row3 = mysql_fetch_array($role_query)) {
		$role_table_id = $row3['role_id'];
		$role_name = $row3['role_name'];
		
		echo "<input type=\"radio\" name=\"role\" value=\"$role_table_id\"";

		if ($trooper_role == $role_table_id) {
			echo " checked";
		}
	
	echo "> $role_name<br>
";	
	}
}
?>
		</td>
	</tr>
	<tr>
		<td>
			Classified?:
		</td>
		<td>
<?
	switch ($classified) {
		case 1:
			echo "			<input type=\"radio\" name=\"classified\" value=\"1\" checked> Yes |
			<input type=\"radio\" name=\"classified\" value=\"0\"> No
";
			break;
		case 0:
			echo "			<input type=\"radio\" name=\"classified\" value=\"1\"> Yes |
			<input type=\"radio\" name=\"classified\" value=\"0\" checked> No
";
			break;
	}
?>		
		</td>
	</tr>
</table>

<input type="submit" value="Save"> * <input type="reset">
</form>

<? include ('admin_footer.php'); ?>