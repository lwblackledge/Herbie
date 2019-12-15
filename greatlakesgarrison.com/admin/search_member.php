<?
// SEARCH MEMBER
include ('admin_header.php');

$lookup_function = $_GET['lookup'];

echo" <form method=\"post\" action=\"search_member_process.php\">";

?>

<span style="font-size:7pt;">Search for</span>
<br>
<input type="text" name="member_search" size=20>
<table cellpadding=0 cellspacing=5 border=0>
	<tr>
		<td valign=middle><input type="radio" name="search_criterion" value="tkid" checked></td>
		<td valign=middle>TKID <b>(default)</b></td>
	</tr>
	<tr>
		<td valign=middle><input type="radio" name="search_criterion" value="lastname"></td>
		<td valign=middle>Last name</td>
	</tr>
	<tr>
		<td valign=middle><input type="radio" name="search_criterion" value="email"></td>
		<td valign=middle>E-Mail Address</td>
	</tr>
</table> 
<P>

<?
echo "<input type=\"hidden\" name=\"lookup\" value=\"$lookup_function\">
";
?>

<input type="submit" value="Find..."> <input type="reset" value="Clear">
</form>
<P>
<? include ('admin_footer.php'); ?>