<?
include ('admin_header.php');

$flag_id = $_GET['id'];

$role_query = $conn->query("
	select *
	from roster_roles
	where role_id = $flag_id
	");
	
echo "Edit role values:<P>
";
echo "<form action=\"role_edit_process.php\" method=\"post\">
";

while ($row = $role_query->fetch_assoc()) {
	$role_id = $row['role_id'];
	$role_name = $row['role_name'];
	$role_abbr = $row['role_abbr'];
	
	echo "<input type=\"hidden\" name=\"form_role_id\" value=\"$role_id\">
<input type=\"text\" size=30 name=\"form_role_name\" value=\"$role_name\">
<input type=\"text\" size=5 name=\"form_role_abbr\" value=\"$role_abbr\">
";
	}
?>
<P>
<input type="submit" value="Submit"> || <input type="reset">
</form>

<?
include ('admin_footer.php');	
?>
