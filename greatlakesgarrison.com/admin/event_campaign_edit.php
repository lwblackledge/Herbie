<?
// ADD CAMPAIGN
include ('admin_header.php');

$id = $_GET['id'];
$mode = $_GET['mode'];

switch ($mode) {
	case "add":
		$campaign_query = mysql_query("
			select event_id, event_name, date_format(event_date, '%M %D, %Y') as formatted_date, event_city,
				event_state
			from events
			where event_id = $id
			");
		echo "<form method=\"post\" action=\"event_campaign_process.php\">
";

		while ($row = mysql_fetch_array($campaign_query)) {
			include ('../dbvars.php');
			$formatted_date = $row['formatted_date'];
	
			echo "<b>Event:</b> $event_name - $formatted_date - $event_city, $event_state<P>";
	
			echo "Image file name:
			<input type=\"text\" name=\"file_name\" size=20>
		<input type=\"hidden\" name=\"event_id\" value=\"$event_id\"><P>
";
		}
		echo"
		<input type=\"submit\" value=\"Add Campaign\"> || <input type=\"reset\">
		</form>
";
		break;

	case "subtract":
		mysql_query ("
			update event_awards
			set campaign_active = '0'
			where event_id = $id
		");
		echo "Deactivated campaign";
		break;

	case "reactivate":
		mysql_query ("
			update event_awards
			set campaign_active = '1'
			where event_id = $id
		");
		echo "Reactivated campaign";
		break;

	default:
		echo "Invalid mode \"$mode\" selected. Campaign not edited.";
		break;
}

include ('admin_footer.php');
?>