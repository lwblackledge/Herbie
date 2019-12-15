<?
$event_sql = mysql_query("
	select event_name, event_description, date_format(event_date, '%a., %c/%e') as short_date, event_city, event_state
	from events
	where is_private <> 1
	and is_active = 1
	and event_date >= current_date()
	order by event_date
	limit 0,5
	");
	
$downthepike = mysql_query ("
	select event_name, date_format(event_date, '%c/%e') as short_date_dtp, event_city, event_state
	from events
	where is_private <> 1
	and is_active = 1
	and event_date >= current_date()
	order by event_date
	limit 5,5
	");

while ($row=mysql_fetch_array($event_sql)) {
	$event_name=$row['event_name'];
	$event_description=$row['event_description'];
	$short_date=$row['short_date'];
	$event_city=$row['event_city'];
	$event_state=$row['event_state'];

	$event_entry = "$short_date: $event_name ($event_city, $event_state)";

	echo "<div style=\"font-weight: bold; font-size: 12px; color: #94aaca\">";
	echo $event_entry;
	echo "</div>$event_description
";
	echo "<P>";
}
?>
<?
while ($row_b = mysql_fetch_array($downthepike)) {
	$event_name_b=$row_b['event_name'];
	$short_date_b=$row_b['short_date_dtp'];
	$event_city_b=$row_b['event_city'];
	$event_state_b=$row_b['event_state'];

	echo "<div style=\"font-weight: bold; font-size: 12px; color: #94aaca\">";
	echo "$short_date_b: $event_name_b ($event_city_b, $event_state_b)</div><br>
";
}


?>