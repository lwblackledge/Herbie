<?
include ('admin_header.php');

$id = $_GET['id'];

$trooper_detail = $conn->query("
	select *
	from roster_members
	where trooper_id = $id
");

?>
<h2>Trooper of the Month</h2>
<form action="totm_process.php" method="post">
<?
while ($row = $trooper_detail->fetch_assoc()) {
	include ("../dbvars.php");
	echo "<b>$first_name $last_name ($tkid)</b><P>
";
	echo "Date: ";
	$select_month = date("m") - 1;
?>
<select name="totm_month">
<?
	include ("totm_month_list.php");
?>
</select>
<select name="totm_year">
<?
	$select_year = date("Y");
	include ("event_year_list.php");
?>
</select>
<P>
Description:<br>
<textarea name="totm_desc" cols=40 rows=10></textarea>
<P>
Tied result for this month?
<input type="radio" name="is_tied" value="1"> Yes ||
<input type="radio" name="is_tied" value="0" checked> No
<P>
<input type="hidden" name="trooper_id" value="<? echo $id; ?>">
<input type="submit" value="Add..."> * <input type="reset">
<P>
<?
	}
	
include ("admin_footer.php");
?>
