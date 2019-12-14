<?
//TOD Member Search
include ('admin_header.php');

$member_search = $_POST[member_search];
$search_criterion = $_POST[search_criterion];

$search = mysql_query("
select *
from roster_members
where $search_criterion = '$member_search'
and status_id < 3
");

$records_found = mysql_num_rows($search);

switch ($records_found) {
	case 0:
		header('location: tod_member.php?nf=1');
	case 1:
		while ($row=mysql_fetch_array($search)) {
			include ("../dbvars.php");
			header('location: tod_member_edit.php?id='.$trooper_id);
		}
		break;
	default:
		echo"
		<table cellpadding=5 cellspacing=1 border=0>
			<tr>
				<th>TKID</th>
				<th>Name</th>
				<th>&nbsp;</th>
			</tr>
";
		while ($row=mysql_fetch_array($search)) {
			include ("../dbvars.php");
			echo "
			<tr>
				<td>$tkid</td>
				<td>$first_name $last_name</td>
				<td><a href=\"tod_member_edit.php?id=$trooper_id\">[Edit]</a></td>
			</tr>
";
		}
		echo"
		</table>
";
	}
	

include ('admin_footer.php');

?>