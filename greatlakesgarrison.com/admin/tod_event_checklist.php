<form>
<?
// TOD EVENT CHECKLIST

include ("../dbaccess.php");
include ("../dbconnect.php");

$event_list = mysql_query("
	select *
	from events
	where is_active = 1
	order by event_date desc
	");


while ($row=mysql_fetch_array($event_list)) {
	include ("../dbvars.php");
	echo "<b>$event_date</b> - $event_name ($event_city, $event_state) <input type=\"checkbox\"><br>
";
}

?>
</form>