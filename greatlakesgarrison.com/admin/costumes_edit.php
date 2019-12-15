<?
include ('admin_header.php');

$id = $_GET['id'];

// GET TROOPER INFORMATION
$trooper_sql = mysql_query ("
	select first_name, last_name, tkid
	from roster_members
	where trooper_id = $id
	");
	
// GET OWNED COSTUME INFORMATION
$outfit_sql = mysql_query ("
	select *
	from roster_outfit, roster_costumes
	where trooper_id = $id
	and roster_outfit.costume_id = roster_costumes.costume_id
	");
	
// GET COSTUMES NOT OWNED
$outfit_not_sql = mysql_query ("
	SELECT costume_id, costume_name, costume_abbr
	FROM roster_costumes
	WHERE NOT EXISTS (
		SELECT *
		FROM roster_outfit
		WHERE trooper_id=$id
		AND roster_outfit.costume_id = roster_costumes.costume_id
		)
	");
	
while ($trooper_info = mysql_fetch_array ($trooper_sql)) {
	$t_first_name = $trooper_info['first_name'];
	$t_last_name = $trooper_info['last_name'];
	$t_tkid = $trooper_info['tkid'];
	
	echo "<B>$t_first_name $t_last_name ($t_tkid)</b><P>
";
	echo "Costumes owned:<p>
";
?>
<form method="post" action="costume_edit_active.php">
<table cellpadding=5 cellspacing=0 border=0>
<?	
	while ($owned_info = mysql_fetch_array ($outfit_sql)) {
		$outfit_id = $owned_info['outfit_id'];
		$costume_name = $owned_info['costume_name'];
		$costume_abbr = $owned_info['costume_abbr'];
		$active_flag = $owned_info['active_flag'];
		
		echo "	<tr>
		<td>$costume_name ($costume_abbr)</td>
";
	switch ($active_flag)	{
		case 1:
			echo "		<td>
		(<font color=\"#00c000\">Active</font>) (<a href=\"costumes_edit_active.php?set=0&o_id=$outfit_id\">deactivate</a>)
	</td>";
			break;
		case 0:
			echo "		<td>
		(<font color=\"#ff0000\">Inactive</font>) (<a href=\"costumes_edit_active.php?set=1&o_id=$outfit_id\">activate</a>)
	</td>";
			break;
	}
	echo "	</tr>
";
	}
}
?>
</table>
</form>
<?
echo "<hr size=1>
<form method=\"post\" action=\"costumes_edit_process.php\">
";

while ($costume_info = mysql_fetch_array ($outfit_not_sql)) {
	$n_costume_id = $costume_info['costume_id'];
	$n_costume_name = $costume_info['costume_name'];
	$n_costume_abbr = $costume_info['costume_abbr'];
	
	echo "	<input type=\"checkbox\" name=\"costume_select[]\" value=\"$n_costume_id\"> $n_costume_name ($n_costume_abbr)<br>
";
	}
?>
	<P>
	<input type="hidden" name="trooperid" value="<? echo $id; ?>">
	<input type="Submit" value="Add to Database"> * <input type="Reset">
</form>
