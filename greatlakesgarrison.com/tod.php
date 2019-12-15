<?
include ('z_header.php');

include ('tod_head.php');
?>

<!--img src="img/tod_head.png" width=500 height=200 style="border: 1px solid #2e4c82"-->
<P>
<?
$tour_query=$conn->query("
	select event_id, event_date, date_format(event_date, '%c / %e / %y') as formatted_date, year(event_date) as event_year, event_name, event_city, event_state
	from events
	where event_date <= current_date()
	and event_date >= '2005-01-01'
	and is_active = 1
	order by event_date desc
	");
	

$year_check=0;
$total_events = mysql_num_rows ($tour_query);

echo "Total recorded events: $total_events";
echo "<P>Click on the <img src=\"img/tod_pop.gif\"> symbol to call up a detailed listing of the event, including participants.";

while ($row=$tour_query->fetch_assoc()) {
	include ('z_dbvars.php');	
	$event_year = $row['event_year'];
	$formatted_date = $row['formatted_date'];

	if ($event_year != $year_check) {
		if ($year_check != 0) {
			echo "</ul>";
		}
	echo "<h1>" . $event_year . "</h1>";
	echo"
	<ul style=\"list-style-image: url(img/bluearrow.gif); margin-left: -20px;\">
";
		$year_check = $event_year;
	}
		
		echo "		<li> <a href=\"#\" onclick=\"window.open('tod_detail.php?id=$event_id','TOD Detail','width=400,height=300,status=no,toolbar=no,location=no,address=no,scrollbars=yes'); return false;\"><img src=\"img/tod_pop.gif\" border=0></a> <b>$formatted_date:</b>  $event_name ($event_city, $event_state)
";
}

include ('z_footer.php');
?>