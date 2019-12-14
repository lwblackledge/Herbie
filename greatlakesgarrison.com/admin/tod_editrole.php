<?
$form_event_id = $_POST['event_list'];
//$form_event_id = 290;

include ("admin_header.php");

$participation_sql = mysql_query ("
	select *
	from events, event_participation, event_participation_role, roster_members
	where roster_members.trooper_id = event_participation.trooper_id
	and event_participation.participation_role_id = event_participation_role.participation_role_id
	and event_participation.event_id = events.event_id
	and events.event_id = $form_event_id
	order by last_name
	") or die (mysql_error());
	
$event_info_sql = mysql_query ("
	select event_name, date_format(event_date, '%c/%e/%y') as event_date, event_city, event_state, is_active
	from events
	where event_id = $form_event_id
	");
	
while ($ev_row = mysql_fetch_array($event_info_sql)) {
	$event_name = $ev_row['event_name'];
	$event_city = $ev_row['event_city'];
	$event_state = $ev_row['event_state'];
	$event_date = $ev_row['event_date'];
	
	echo "<b>$event_name</b> ($event_city, $event_state) -- $event_date<p>
";	
	echo "<form action=\"tod_editrole_process.php\" method=\"post\">";
	echo "<table cellpadding=0 cellspacing=10 border=0>";

	while ($row = mysql_fetch_array($participation_sql)) {
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$tkid = $row['tkid'];
		$trooper_id = $row['trooper_id'];
		$part_role = $row['participation_role_name'];
		$part_id = $row['participation_role_id'];

		switch ($part_id) {
			case '1':
				$role_color = "#00cc00";
				break;
			case '2':
				$role_color = "#f07c00";
				break;
			case '3':
				$role_color = "#ff0000";
				break;
		}
		
		echo "	<tr>
	<td><b>$tkid</b></td>
	<td><span style=\"color: $role_color; font-weight: bold;\">$first_name $last_name</span>
		<input type=\"hidden\" name=\"trooper[]\" value=\"$trooper_id\">
	</td>
	<td>
";
		echo "	<select name=\"select_role[]\">
";

		switch ($part_id) {
			case 1:
				echo "		<option value=\"1\" selected=\"yes\">501st Costume</option>
";
				echo "		<option value=\"2\">Non-501st Costume</option>
";
				echo "		<option value=\"3\">NCS</option>
";
				break;
			case 2:
				echo "		<option value=\"1\">501st Costume</option>
";
				echo "		<option value=\"2\" selected=\"yes\">Non-501st Costume</option>
";
				echo "		<option value=\"3\">NCS</option>
";
				break;
			case 3:
				echo "		<option value=\"1\">501st Costume</option>
";
				echo "		<option value=\"2\">Non-501st Costume</option>
";
				echo "		<option value=\"3\" selected=\"yes\">NCS</option>
";
				break;
		}

/*
				echo "		<option value=\"1\">501st Costume</option>
";
				echo "		<option value=\"2\">Non-501st Costume</option>
";
				echo "		<option value=\"3\">NCS</option>
";
*/			
		echo "	</select></td>
	</tr>
";
	}
}
echo "</table>";
echo "<input type=\"hidden\" name=\"event_id\" value=\"$form_event_id\">
<input type=\"submit\" value=\"Update trooper\"> * <input type=\"reset\">
</form>
";

include ("admin_footer.php");
?>