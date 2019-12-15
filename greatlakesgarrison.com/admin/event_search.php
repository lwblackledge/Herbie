<?
$search_type = $_GET['type'];

include ('admin_header.php');

$event_list = mysql_query("
	select * from events
	where is_active = 1
	order by event_date desc
");

?>

<form method="post" action="<? echo $search_type; ?>.php">

Select event (events displayed in reverse chronological order):<br>
	<select name="event_list">
<?
while ($row = mysql_fetch_array($event_list)) {
	include ('../z_dbvars.php');
	echo "		<option value=\"$event_id\">$event_date - $event_name ($event_city)</option>
";
}
?>

	</select>
<br><br>
<input type="submit" value="Proceed">
<input type="reset">

</form>

<? include ('admin_footer.php'); ?>