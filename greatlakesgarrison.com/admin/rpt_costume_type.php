<?
include ('admin_header.php');

$costume_list = $conn->query("
	select *
	from roster_costumes
	order by costume_abbr asc
	");
	
?>

<form method="post" action="rpt_costume_display.php">

<?
while ($row = $costume_list->fetch_assoc()) {
	include ('../dbvars.php');
	echo "	<input type=\"radio\" name=\"costume_select\" value=\"$costume_id\"> $costume_abbr - $costume_name <br>
";
	}
	
?>
<input type="submit" value="Search..."> | <input type="reset">

</form>

<!--Or <a href="rpt_costume_all.php">select all costumes</a>.-->

<?
include ('admin_footer.php');
?>