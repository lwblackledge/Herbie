<?
include ("admin_header.php");

$campaign_rpt = $conn->query("
	select *
	from events, event_awards
	where events.event_id = event_awards.event_id
	order by event_file, event_date
	");
	
echo "
<table cellpadding=5 cellspacing=0 border=1>
	<tr>
		<td>
			Event ID
		</td>
		<td>
			Event Name
		</td>
		<td>
			Event Date
		</td>
		<td>
			Campaign Image
		</td>
		<td>
			Actions
		</td>
	</tr>
";
while ($row = $campaign_rpt->fetch_assoc()) {
	include ("../dbvars.php");
	
	echo "
	<tr>
		<td>
			$event_id
		</td>
		<td>
			$event_name
		</td>
		<td>
			$event_date
		</td>
		<td>
";
	if (file_exists("../img/$event_file")) {
		echo "			<img src=\"/img/$event_file\">
";
	} else {
		echo "No image available";
	}
	
	echo "
		</td>
		<td>
			<form method=\"post\" action=\"event_edit.php\"><button name=\"event_list\" value=\"$event_id\">Edit event</button></form>
			<form method=\"post\" action=\"tod_addtoevent.php\"><button name=\"event_list\" value=\"$event_id\">Edit ToD</button></form>
		</td>			
	</tr>
";
}

echo "</table>
";

include ("admin_footer.php");
?>