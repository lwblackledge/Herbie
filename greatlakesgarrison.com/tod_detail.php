<html>
<head>
<link rel="stylesheet" href="css/01.css" type="text/css">
<style>
<!--
body, td	{
	background-image: none;
	background-color: #9bacb7;
	}
-->
</style>

<body>

<?
include ("z_dbaccess.php");
include ("z_dbconnect.php");

$selected_event_id = $_GET['id'];

$event_detail = mysql_query ("
	select *, date_format(event_date,'%M %e, %Y') as formatted_date
	from events
	where event_id = '$selected_event_id'
	");
	
$participant_query = mysql_query ("
	select *
	from roster_members, event_participation, events
	where roster_members.trooper_id = event_participation.trooper_id
	and event_participation.event_id = events.event_id
	and events.event_id = '$selected_event_id'
	and status_id = 1
	order by tkid
	");
	
while ($event_info_rows = mysql_fetch_array($event_detail)) {
	$info_event_name = $event_info_rows['event_name'];
	$info_event_description = $event_info_rows['event_description'];
	$info_event_date = $event_info_rows['event_date'];
	$info_formatted_date = $event_info_rows['formatted_date'];
	$info_event_city = $event_info_rows['event_city'];
	$info_event_state = $event_info_rows['event_state'];
	
	echo "<h1>$info_event_name</h1>";
	echo "<div class=\"container_text\">$info_formatted_date - $info_event_city, $info_event_state</div>";
	echo "<br><i>$info_event_description</i><br>";
	echo "<ul>";
	
	while ($row = mysql_fetch_array($participant_query)) {
		include ('z_dbvars.php');
	
		echo "	<li> <a href=\"rosterx.php?id=$trooper_id\" target=\"parent_window\">$tkid - $first_name $last_name</a>
";
	}
	
	echo "</ul>";
}

?>

</body>
</head>
</html>
