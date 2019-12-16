<form>
<?php
// TOD EVENT CHECKLIST

include ("../dbaccess.php");
include ("../dbconnect.php");

$event_list = $conn->query("
	select *
	from events
	where is_active = 1
	order by event_date desc
	");


while ($row=$event_list->fetch_assoc()) {
	include ("../dbvars.php");
	echo "<b>$event_date</b> - $event_name ($event_city, $event_state) <input type=\"checkbox\"><br>
";
}

?>
</form>