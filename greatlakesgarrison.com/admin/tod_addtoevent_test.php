<?
include ('admin_header.php');

//$form_event_id = $_POST['event_list'];
$form_event_id = 290;

// EVENT INFORMATION BASED ON EVENT_ID
$event_info_sql = mysql_query ("
	select event_name, event_date, event_city, event_state, is_active
	from events
	where event_id = $form_event_id
	and is_active = 1
	order by event_date
	");

// TROOPERS WHO HAVE PARTICIPATED IN THIS EVENT
$troopers_attended_sql = mysql_query ("
	select first_name, last_name, tkid, roster_members.trooper_id, event_participation_id, event_participation.participation_role_id, participation_role_name
	from event_participation, roster_members, event_participation_role
	where event_participation.trooper_id = roster_members.trooper_id
	and event_id = $form_event_id
	and status_id = 1
	and event_participation.participation_role_id = event_participation_role.participation_role_id
	order by last_name
	");

// TROOPERS WHO HAVEN'T PARTICIPATED IN THIS EVENT
$troopers_unattended_sql = mysql_query ("
	select first_name, last_name, tkid, trooper_id
	from roster_members
	where status_id < 4
	and not exists (
		select *
		from event_participation
		where roster_members.trooper_id = event_participation.trooper_id
		and event_id = $form_event_id)
	order by last_name
	");

echo "<a href=\"index.php\">Back to main menu</a><P>";

while ($event_info_array = $event_info_sql->fetch_assoc()) {
	$event_name = $event_info_array['event_name'];
	$event_date = $event_info_array['event_date'];
	$event_city = $event_info_array['event_city'];
	$event_state = $event_info_array['event_state'];

	echo "<b>$event_name</b> ($event_city, $event_state) -- $event_date<p>
";
	?>
	<table cellpadding=10 cellspacing=0 border=0>
		<tr>
			<th>
				Did Not Attend
			</th>
			<th>
				Attended
			</th>
		</tr>
		<tr>
			<td valign=top width=400>
<form method="post" action="tod_addtoevent_process_test.php">
	<input type="submit" value ="Add to Database"> * <input type="reset">
	<P>
				<table cellpadding=5 cellspacing=0 border=0>
	<?
		while ($troopers_unattended_array = $troopers_unattended_sql->fetch_assoc()) {
			$u_first_name = $troopers_unattended_array['first_name']; 
			$u_last_name = $troopers_unattended_array['last_name']; 
			$u_tkid = $troopers_unattended_array['tkid']; 
			$u_trooper_id = $troopers_unattended_array['trooper_id'];

			echo "		<tr>
			<td width=5><input type=\"checkbox\" name=\"trooper[]\" value=\"$u_trooper_id\"></td>
			<td width=30><b>$u_tkid</b></td>
			<td width=200>$u_first_name $u_last_name</td>
		</tr>
";
			}
	?>
		</table>
	<input type="hidden" name="id" value="<? echo $form_event_id; ?>">
	<P>
	<input type="submit" value ="Add to Database"> * <input type="reset">
</form>
			</td>
			<td valign=top width=400>
<form method="post" action="tod_removefromevent_process.php">
	<?
		while ($troopers_attended_array = $troopers_attended_sql->fetch_assoc()) {
			$a_first_name = $troopers_attended_array['first_name'];
			$a_last_name = $troopers_attended_array['last_name'];
			$a_tkid = $troopers_attended_array['tkid'];
			$a_trooper_id = $troopers_attended_array['trooper_id'];
			$a_event_part_id = $troopers_attended_array['event_participation_id'];
			$a_part_role_id = $troopers_attended_array['participation_role_id'];
			$a_part_role_name = $troopers_attended_array['participation_role_name'];
			
			echo "<input type=\"checkbox\" name=\"event[]\" value=\"$a_event_part_id\"> <b>$a_tkid</b>: $a_first_name $a_last_name";
			
			switch ($a_part_role_id) {
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
			echo " (<span style=\"font-weight: bold; color: " . $role_color . "\">$a_part_role_name</span>)<br>
";
			}
	}
	?>
	<P>
	<input type="submit" value ="Remove from list"> * <input type="reset">
</form>
	<form action="tod_editrole.php" method="post"><button name="event_list" value="<? echo $form_event_id; ?>">Edit participation role</button></form>
			</td>
		</tr>
	</table>
<P>
<a href="index.php">Back to main menu</a>
