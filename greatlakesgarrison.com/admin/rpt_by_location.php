<?php

include ("admin_header.php");

$track_city_sql = mysql_query("
select distinct event_city, event_state
from events
where is_active = 1
and event_state = 'MI'
and event_date < curdate()
order by event_city
	");
	
while ($row = mysql_fetch_array($track_city_sql)) {
	$event_city = $row['event_city'];
	echo "<h3>$event_city</h3>";
	echo "<ul>";

	$events_by_city_sql = mysql_query("
	select event_id, event_name, event_date
	from events
	where event_city = '$event_city'
	and event_date < curdate()
	and is_active = 1
	order by event_date
	");
	
	while ($row_a = mysql_fetch_array($events_by_city_sql)) {
		$event_id = $row_a['event_id'];
		$event_name = $row_a['event_name'];
		$event_date = date("m/d/y",strtotime($row_a['event_date']));
		echo "	<li> $event_date: $event_name ($event_id)</li>";
		echo "		<ul type=circle>";	

		$troopers_by_city_sql = mysql_query("
			select first_name, last_name, tkid, city, roster_members.trooper_id
			from roster_members, event_participation
			where roster_members.trooper_id = event_participation.trooper_id
			and event_participation.event_id = '$event_id'
			order by last_name
			");
		
		while ($row_b = mysql_fetch_array($troopers_by_city_sql)) {
			$first_name = $row_b['first_name'];
			$last_name = $row_b['last_name'];
			$tkid = $row_b['tkid'];
			$city = $row_b['city'];
			$trooper_id = $row_b['trooper_id'];
			
			echo "	<li> $first_name $last_name - $tkid ($city)</li>";
		}
		echo "		</ul><br>";
	}
	
	echo "</ul>";
}

include ("admin_footer.php");
?>