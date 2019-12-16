<?
include ('admin_header.php');

$id = $_GET['id'];

// GET TROOPER INFO
$trooper_info = $conn->query("
	select *
	from roster_members, roster_state_id, roster_status, roster_roles
	where trooper_id = $id
	and roster_members.state_id = roster_state_id.state_id
	and roster_members.status_id = roster_status.status_id
	and roster_members.role_id = roster_roles.role_id
	");
	
// GET COSTUME INFO
$costume_info = $conn->query("
	select *
	from roster_outfit, roster_costumes
	where roster_outfit.costume_id = roster_costumes.costume_id
	and roster_outfit.trooper_id = $id
	");
	
// GET EVENT INFO
$event_info = $conn->query("
	select *
	from events, event_participation, event_participation_role
	where event_participation.event_id = events.event_id
	and event_participation.trooper_id = $id
	and event_participation.participation_role_id = event_participation_role.participation_role_id
	and is_active = 1
	order by event_date desc
	");
	
echo "<h1>Demographic Info</h1>
";

while ($t_row = $trooper_info->fetch_assoc()) {
	$trooper_id = $t_row['trooper_id'];
	$first_name = $t_row['first_name'];
	$last_name = $t_row['last_name'];
	$tkid = $t_row['tkid'];
	$e_mail = $t_row['e_mail'];
	$city = $t_row['city'];
	$state_name = $t_row['state_name'];
	$status = $t_row['status'];
	$role_name = $t_row['role_name'];
	
	echo "<b>$first_name $last_name</b> (<a href=\"member_edit_form.php?id=$trooper_id\">edit</a>)<br>
Trooper $tkid<br>
$city, $state_name<br>
<a href=\"mailto:$e_mail\">$e_mail</a>
<P>
<b>Garrison Role</b>: $role_name<br>
<b>Status</b>: $status<br>
";
	}

echo "<hr size=1>
<b>Costume(s):</b>
<ul>
";

while ($c_row = $costume_info->fetch_assoc()) {
	$costume_name = $c_row['costume_name'];
	$costume_abbr = $c_row['costume_abbr'];
	
	echo "	<li> $costume_name ($costume_abbr)
";
	}
echo "</ul>
";

echo "<hr size=1>
<b>Event(s):</b>
<table cellpadding=5 cellspacing=0 border=0 style=\"border: 2px solid #000\">
	<tr>
		<th style=\"border-bottom: 2px solid #000\">&nbsp;</th>
		<th style=\"border-bottom: 2px solid #000\">Date</th>
		<th style=\"border-bottom: 2px solid #000\">Event Name</th>
		<th style=\"border-bottom: 2px solid #000\">Location</th>
		<th style=\"border-bottom: 2px solid #000\">Participation Role</th>
		<th style=\"border-bottom: 2px solid #000\">&nbsp;</th>
	</tr>
";
$event_count = 1;
while ($e_row = $event_info->fetch_assoc()) {
	$event_id = $e_row['event_id'];
	$event_date = $e_row['event_date'];
	$event_name = $e_row['event_name'];
	$event_city = $e_row['event_city'];
	$event_state = $e_row['event_state'];
	$forum_topic_id = $e_row['forum_topic_id'];
	$part_id = $e_row['participation_role_id'];
	$part_name = $e_row['participation_role_name'];

	echo "	<tr>
		<td style=\"background-color: #ddd; border-bottom: 1px dashed #eee\">$event_count</td>
		<td style=\"border-bottom: 1px dashed #ccc\">$event_date</td>
		<td style=\"border-bottom: 1px dashed #ccc\">
			$event_name
			<form method=\"post\" action=\"event_edit.php\"><button name=\"event_list\" value=\"$event_id\">Edit event</button></form>
		</td>
		<td style=\"border-bottom: 1px dashed #ccc\">$event_city, $event_state</td>
		<td style=\"border-bottom: 1px dashed #ccc\">";

	role_color ($part_id, $part_name);

	echo "</td>
		<td style=\"border-bottom: 1px dashed #ccc\">
			<form method=\"get\" action=\"tod_addtomember.php\"><button name=\"id\" value=\"$trooper_id\">Edit ToD</button></form>
			<form method=\"post\" action=\"tod_editrole.php\"><button name=\"event_list\" value=\"$event_id\">Edit role</button></form>
	</tr>
";
	$event_count++;
	}
echo "</table>
";

include ("admin_footer.php");
?>