<?php
include ("admin_header.php");
//include ("../dbaccess.php");
//include ("../dbconnect.php");

$sort_key = $_GET[sort_key];

if (!$sort_key) {
	$sort_key = "e";
}

switch ($sort_key) {
	case "a":
		$sort_order = "tkid asc";
		break;
	case "b":
		$sort_order = "tkid desc";
		break;
	case "c":
		$sort_order = "last_name asc";
		break;
	case "d":
		$sort_order = "last_name desc";
		break;
	default:
		$sort_order = "tkid asc";
		break;
}

$active_rpt_sql = $conn->query("
	select *
	from roster_members
	where status_id = 1
	order by $sort_order
	");

$active_count = mysql_num_rows($active_rpt_sql);

echo "<b>Active Troopers:</b> $active_count<br>
";
echo "<table cellpadding=5 cellspacing=0 border=1>
	<tr>
		<th>
			TKID
";

switch ($sort_key) {
	case "a":
		echo "<a href=\"rpt_active_members.php?sort_key=b\"><img src=\"sort_up.png\" border=0></a>";
		break;		
	case "b":
		echo "<a href=\"rpt_active_members.php?sort_key=a\"><img src=\"sort_down.png\" border=0></a>";
		break;
	default:
		echo "<a href=\"rpt_active_members.php?sort_key=a\"><img src=\"sort_updown.png\" border=0></a>";
		break;
}		

echo"
		</th>
		<th>
			First Name
		</th>
		<th>
			Last Name
";
switch ($sort_key) {
	case "c":
		echo "<a href=\"rpt_active_members.php?sort_key=d\"><img src=\"sort_up.png\" border=0></a>";
		break;		
	case "d":
		echo "<a href=\"rpt_active_members.php?sort_key=c\"><img src=\"sort_down.png\" border=0></a>";
		break;
	default:
		echo "<a href=\"rpt_active_members.php?sort_key=c\"><img src=\"sort_updown.png\" border=0></a>";
		break;
}	
echo"
		</th>
		<th>
			E-Mail Address
		</th>
	</tr>
";

while ($row = $active_rpt_sql->fetch_assoc()) {
	include ("../z_dbvars.php");
	echo "
	<tr>
		<td>
			$tkid
		</td>
		<td>
			$first_name
		</td>
		<td>
			$last_name
		</td>
		<td>
			$e_mail
		</td>
	</tr>
";
}

echo "</table>
";

include ("admin_footer.php");
?>