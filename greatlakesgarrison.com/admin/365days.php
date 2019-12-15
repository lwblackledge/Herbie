<?
include ("../z_dbaccess.php");
include ("../z_dbconnect.php");

$over_one_year_sql = $conn->query("
select tkid, roster_members.trooper_id, first_name, last_name, date_format(max(event_date), '%m/%d/%y') as last_event, e_mail, participation_role_id
from roster_members, event_participation, events
where roster_members.trooper_id = event_participation.trooper_id
and event_participation.event_id = events.event_id
and status_id = 1
and participation_role_id = 1
group by tkid having max(event_date) < date_sub(curdate(), interval 365 day)
order by event_date


");
?>
<b>Troopers over one year since last activity in approved 501st costume:</b><P>
<table cellpadding=5 cellspacing=0 border=1>
	<tr>
		<th width=30>TKID</th>
		<th width=200>Name</th>
		<th width=120>Last event date</th>
		<th colspan=3>&nbsp;</th>
	</tr>
<?
while ($row=$over_one_year_sql->fetch_assoc()) {
	$tkid = $row['tkid'];
	$trooper_id = $row['trooper_id'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$last_event = $row['last_event'];
	$e_mail = $row['e_mail'];
	echo "	<tr>
		<td width=30>$tkid</td>
		<td>$first_name $last_name</td>
		<td>$last_event</td>
		<td>(<a href=\"../rosterx.php?id=$trooper_id\">link to profile</a>) (<a href=\"mailto:$e_mail?subject=[MI501st] Over One Year Since Activity\">Send e-mail</a>)</td>
		<td>(<a href=\"member_edit_form.php?id=$trooper_id\">edit record</a>)</td>
		<td>(<a href=\"tod_addtomember.php?id=$trooper_id\">add event</a>) (<a href=\"rpt_demog.php?id=$trooper_id\">view event activity</a>)</td>
	</tr>
";
	}

?>
</table>
