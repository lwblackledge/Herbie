<?
include ('admin_header.php');

$costume_id_selected = $_POST[costume_select];

$costume_dtl = $conn->query("
	select costume_name, costume_abbr
	from roster_costumes
	where costume_id = $costume_id_selected
");

$costume_rpt = $conn->query("	
	select *
	from roster_members, roster_outfit, roster_costumes
	where roster_members.trooper_id = roster_outfit.trooper_id
	and roster_outfit.costume_id = $costume_id_selected
	and roster_costumes.costume_id = roster_outfit.costume_id
	and status_id = 1
	and active_flag = 1
	order by last_name
");

$costume_num = $costume_rpt->num_rows;

while ($dtl = $costume_dtl->fetch_assoc()) {
	$costume_name = $dtl[costume_name];
	$costume_abbr = $dtl[costume_abbr];
	
	echo "<h2>$costume_name - $costume_abbr ($costume_num)</h2>
<i>Note: some members may appear multiple times due to multiple variations of costumes within the same costume category.</i>";
}

echo "<ol>
";

while ($row = $costume_rpt->fetch_assoc()) {
	include ('../dbvars.php');
		
	echo "	<li> ($costume_abbr-$tkid) <a href=\"../rosterx.php?id=$trooper_id\" target=\"_new\">$first_name $last_name</a>
";
}

echo "</ol>
<p>
<a href=\"rpt_costume_type.php\">Check another costume type</a>
";

include ('admin_footer.php');

?>