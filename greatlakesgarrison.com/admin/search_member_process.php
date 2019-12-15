<?
include ('../z_dbaccess.php');
include ('../z_dbconnect.php');
include ('../scripts/functions.php');
$search_criterion=$_POST['search_criterion'];
$search_term=$_POST['member_search'];
$lookup_function = $_POST['lookup'];

switch ($search_criterion) {
	case "tkid":
		$member_query_sql = "
			select *
			from roster_members
			where tkid = '$search_term'
			";
		break;
	case "lastname":
		$member_query_sql = "
			select *
			from roster_members
			where last_name = '$search_term'
			";
		break;
	case "email":
		$member_query_sql = "
			select *
			from roster_members
			where e_mail = '$search_term'
			";
		break;
}

$member_query = $conn->query($member_query_sql);
$num_records = mysql_num_rows($member_query);

//echo $num_records;

switch ($num_records) {
	case 0:
		include_once ("admin_header.php");
		echo "No records found.  Please click \"Back\" and search again.";
		break;
	case 1:
		while ($selected_trooper = $member_query->fetch_assoc()) {
			$trooper_id = $selected_trooper['trooper_id'];
			header ("Location: $lookup_function.php?id=$trooper_id");
		}
		break;
		
	default:
		include_once ("admin_header.php");
		echo"
	<table cellpadding=5 cellspacing=1 border=1>
		<tr>
			<th>TKID</th>
			<th>Name</th>
			<th>&nbsp;</th>
		</tr>
";
		while ($row=$member_query->fetch_assoc()) {
			include ('../z_dbvars.php');
			echo "
		<tr>
			<td>$tkid</td>
			<td>$first_name $last_name</td>
			<td><a href=\"$lookup_function.php?id=$trooper_id\">[Edit]</a></td>
		</tr>
";
		}
		echo"	</table>";
		break;
	}
		
include ('admin_footer.php');
?>
	
	