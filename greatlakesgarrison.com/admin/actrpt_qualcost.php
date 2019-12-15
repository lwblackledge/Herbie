<?
include ("../z_dbaccess.php");
include ("../z_dbconnect.php");

$participation_sql = $conn->query("
	select trooper_id, tkid, first_name, last_name, e_mail, date_format(member_since, '%m/%y') as member_since
	from roster_members
	where trooper_id not in
		(
		SELECT distinct roster_members.trooper_id
		FROM roster_members, event_participation, event_participation_role, events
		WHERE roster_members.trooper_id = event_participation.trooper_id
		AND event_participation.participation_role_id = event_participation_role.participation_role_id
		and events.event_id = event_participation.event_id
		AND event_participation.participation_role_id=1
		and event_date not between curdate() and date_sub(curdate(), interval 365 day)
		)
	and status_id = 1
	order by last_name
") or die(mysql_error());

?>

<b>Active Troopers Without Qualifying Costumed Troops</b>
<P>
<table cellpadding=5 cellspacing=0 border=1>
	<tr>
		<th width=30>
			TKID
		</th>
		<th width=200>
			Name
		</th>
		<th width=120>
			Stats
		</th>
		<th colspan=3>&nbsp;
			
		</th>
	</tr>

<?
while ($row = $participation_sql->fetch_assoc()) {
	$id = $row['trooper_id'];
	$tkid = $row['tkid'];
	$full_name = $row['first_name'] . " " . $row['last_name'];
	$e_mail = $row['e_mail'];
	$member_since = $row['member_since'];

$part_non_sql = $conn->query("
	select *
	from event_participation
	where trooper_id = '$id'
	and participation_role_id = '2'
");

$part_ncs_sql = $conn->query("
	select *
	from event_participation
	where trooper_id = '$id'
	and participation_role_id = '3'
");

	$part_non_count = mysql_num_rows($part_non_sql);

	$part_ncs_count = mysql_num_rows($part_ncs_sql);

	echo "
	<tr>
		<td>$tkid</td>
		<td>$full_name<br><i>Joined $member_since</i></td>
		<td>
			<div style=\"color: #f07c00\">non-501st: $part_non_count</div>
			<div style=\"color: #ff0000\">NCS: $part_ncs_count</div>
		</td>
		<td>(<a href=\"../rosterx.php?id=$id\">link to profile</a>) (<a href=\"mailto:$e_mail?subject=[MI501st] Trooping in 501st-Approved Costume\">Send e-mail</a>)</td>
		<td>(<a href=\"member_edit_form.php?id=$id\">edit record</a>)</td>
		<td>(<a href=\"tod_addtomember.php?id=$id\">add event</a>) (<a href=\"rpt_demog.php?id=$id\">view event activity</a>)</td>
	</tr>
";
}
?>
</table>

		