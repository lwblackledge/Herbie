<?
include ("z_header.php");

// Default roster display of all members
$roster_sql = $conn->query("
	select *
	from roster_members, roster_roles
	where status_id=1
	and roster_members.role_id = roster_roles.role_id
	order by tkid
");

$gml_sql = $conn->query("
	select concat(first_name,' ',last_name) as gml_name, e_mail
	from roster_members
	where role_id = 4
	");

$num_records=mysql_num_rows($roster_sql);

$max_cols = 6;
$cell_count = 1;

?>
<h1><?php echo $unit_name; ?> Members</h1>
<b><? echo $num_records; ?> active members</b>
<br />
<a name="top"></a>
<?
while ($gml_row=$gml_sql->fetch_assoc()) {
	$gml_name=$gml_row['gml_name'];
	$e_mail = $gml_row['e_mail'];

	echo "<br><b>Members:</b> If you find a discrepancy in your listing here, please contact GML <a href=\"mailto:$e_mail\">$gml_name</a>.
		Please note that this listing is <b>not</b> automatically tied into the 501st.com database
		and is updated separately.  The 501st.com member listing will always be the true indicator of membership status.";
	}
?>
<P>
<center>
<table cellpadding=5 cellspacing=20 border=0>
	<tr>
<?
while ($row=$roster_sql->fetch_assoc()) {
    include ('z_dbvars.php');

    $img_thumb = "rosterimg/" . tk_pad($tkid) . "_tn.gif";
    
    if ($classified != 1) {
        $full_name = $first_name . " " . $last_name;
    } else {
        $full_name = "[CLASSIFIED]";
    }

    if ($role_id != 1) {
        $cell_class = "rostertable_officer";
    } else {
        $cell_class = "rostertable_trooper";
    }

    echo "		<td class=\"" . $cell_class . "\" valign=top width=100>";
	if (file_exists($img_thumb)) {
		echo "<a href=\"rosterx.php?id=$trooper_id\"><img src=\"$img_thumb\" border=0></a>";
	} else {
		echo "<a href=\"rosterx.php?id=$trooper_id\"><img src=\"rosterimg/placeholder.gif\" border=0></a>";
	}
	echo "<br>" . tk_pad($tkid) . "
		<br>
        <a href=\"rosterx.php?id=$trooper_id\">$full_name</a>
";
    if ($role_id != 1) {
        echo "<br><b><i>$role_name</i></b>";
    }

	echo "<br>Joined "  . date("M 'y", strtotime($member_since));
    echo "		</td>";
	if ($cell_count == $max_cols) {
		echo "
	</tr>
	<tr>
";
		$cell_count = 0;
	}
	$cell_count++;
}

echo "
	</tr>
</table>
</center>
";	

include ("z_footer.php");
	
?>