<?
include ("admin_header.php");

$find_chcomm = mysql_query ("
	select chcomm_id, chcomm_name, chcomm_city, chcomm_state
	from charity_community_list
	order by chcomm_name, chcomm_city
	");
	
?>

<form method="post" action="chcomm_edit_form.php">
<select name="chcomm_id">
<?
while ($row = mysql_fetch_array($find_chcomm)) {
	include ('../dbvars.php');
	echo "	<option value=\"$chcomm_id\">$chcomm_name ($chcomm_city, $chcomm_state)</option>
";
	}
?>
</select>
<P>
<input type="submit" value="Continue..."> * <input type="reset">

<?
include ("admin_footer.php");
?>