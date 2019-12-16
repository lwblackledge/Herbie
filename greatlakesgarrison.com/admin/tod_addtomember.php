<?php
// ADD TOD TO MEMBER

include ('admin_header.php');

$trooper_id_selection = $_GET['id'];

// TROOPER'S NAME & ALL SORTS OF OTHER IDENTIFYING INFO
$trooper_info = $conn->query("
	select *
	from roster_members
	where trooper_id = $trooper_id_selection
	");

// EVENTS THAT THIS TROOPER HAS PARTICIPATED IN
$events_attended = $conn->query("
	select event_participation_id, event_name, date_format(event_date, '%c/%e/%y') as formatted_date, event_date, event_city, event_state, event_participation.participation_role_id, participation_role_name
	from event_participation, events, event_participation_role
	where trooper_id = $trooper_id_selection
	and events.event_id = event_participation.event_id
	and is_active = 1
	and event_participation.participation_role_id = event_participation_role.participation_role_id
	order by event_date desc
	");
	
$num_events_attended = $events_attended->num_rows;
	
// EVENTS THAT THIS TROOPER HAS *NOT* PARTICIPATED IN
$events_unattended = $conn->query("
	select events.event_id, event_name, date_format(event_date, '%c/%e/%y') as formatted_date, event_date, event_city, event_state, forum_topic_id
	from events
	where not exists (
		select *
		from event_participation
		where events.event_id = event_participation.event_id
		and event_participation.trooper_id = $trooper_id_selection)
	and is_active = 1
	order by event_date desc
	");

$num_events_unattended = $events_unattended->num_rows;

echo "<a href=\"index.php\">Back to main menu</a><P>
";

while ($trooper_info_sql = $trooper_info->fetch_assoc()) {
	$first_name = $trooper_info_sql['first_name'];
	$last_name = $trooper_info_sql['last_name'];
	$tkid = $trooper_info_sql['tkid'];
	
	echo "<b>Trooper $tkid: $first_name $last_name</b><br>
<table width=\"100%\" cellspacing=20>
	<tr>
		<td width=\"50%\" valign=top>
	<b>Attended Events:</b><p>
	<form action=\"tod_removefromevent_process.php\" method=\"post\">
		<input type=\"submit\" value=\"Remove from Database\"> * <input type=\"reset\"><P>

";
	if ($num_events_attended != 0) {
		while ($events_attended_sql = $events_attended->fetch_assoc()) {
			$event_participation_id = $events_attended_sql['event_participation_id'];
			$event_name = $events_attended_sql['event_name'];
			$event_date = $events_attended_sql['event_date'];
			$event_city = $events_attended_sql['event_city'];
			$event_state = $events_attended_sql['event_state'];
			$formatted_date = $events_attended_sql['formatted_date'];
			$part_role_id = $events_attended_sql['participation_role_id'];
			$part_role_name = $events_attended_sql['participation_role_name'];

			switch ($part_role_id) {
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
		
			echo "	<input type=\"checkbox\" name=\"event[]\" value=\"$event_participation_id\"> (<span style=\"color: $role_color; font-weight: bold\">$part_role_name</span>) $formatted_date: $event_name ($event_city, $event_state)<br>
";
		}
	} else {
		echo "<i>No events attended since January 1, 2007</i>";
	}
	
}
?>
			<P>
			<input type="submit" value="Remove from Database"> * <input type="reset">
			</form>
		</td>
		<td width="50%" valign=top>
<b>Unattended Events:</b>
<P>
<form method="post" action="tod_addtomember_process.php">
	<input type="hidden" name="id" value="<?php echo $trooper_id_selection; ?>">
	<P>
	<input type="submit" value="Add to Database"> * <input type="reset"><P>

<?php
while ($events_unattended_sql = $events_unattended->fetch_assoc()) {
	$u_event_id = $events_unattended_sql['event_id'];
	$u_event_name = $events_unattended_sql['event_name'];
	$u_event_date = $events_unattended_sql['event_date'];
	$u_event_city = $events_unattended_sql['event_city'];
	$u_event_state = $events_unattended_sql['event_state'];
	$u_forum_topic_id = $events_unattended_sql['forum_topic_id'];
	$u_formatted_date = $events_unattended_sql['formatted_date'];
	
	echo "	<input type=\"checkbox\" name=\"event[]\" value=\"$u_event_id\"> <b>$u_formatted_date</b>: ";
	if ($u_forum_topic_id != 0) {
		echo "<a href=\"http://www.greatlakesgarrison.com/forum/viewtopic.php?t=$u_forum_topic_id\" target=\"_new\">$u_event_name</a>";
		} else {
			echo $u_event_name;
		}
	echo " ($u_event_city, $u_event_state)
	<br>
";
	}
?>
	<input type="hidden" name="id" value="<?php echo $trooper_id_selection; ?>">
	<P>
	<input type="submit" value="Add to Database"> * <input type="reset">
</form>
		</td>
	</tr>
</table>
<a href="index.php">Back to main menu</a>