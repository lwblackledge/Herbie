<?php
include ('admin_header.php');

$search_criterion=$_POST['search_criterion'];
$search_term=$_POST['member_search'];

//echo "a) " . $search_criterion . "<P>";
//echo "b) " . $search_term;

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
}

$member_query = $conn->query($member_query_sql);
$num_records = $member_query->num_rows;

//echo $num_records;

switch ($num_records) {
	case 0:
		echo "No records found.  Please click \"Back\" and search again.";
		break;
	case 1:
		while ($selected_trooper = $member_query->fetch_assoc()) {
			$trooper_id = $selected_trooper['trooper_id'];
			header ("Location: member_edit_form.php?id=$trooper_id");
		}
		break;
	default:
		echo"
	<table cellpadding=5 cellspacing=1 border=1>
		<tr>
			<th>TKID</th>
			<th>Name</th>
			<th>&nbsp;</th>
		</tr>
";
		while ($row=$member_query->fetch_assoc()) {
			include ('../dbvars.php');
			echo "
		<tr>
			<td>$tkid</td>
			<td>$first_name $last_name</td>
			<td><a href=\"member_edit_form.php?id=$trooper_id\">[Edit]</a></td>
		</tr>
";
		}
		echo"	</table>";
		break;
	}
		


/*if ($num_records = 0) {
	echo "No records found.  Please click \"Back\" and search again.";
} elseif ($num_records > 1) {
	?>
	<table cellpadding=5 cellspacing=1 border=0>
	<tr>
		<th>TKID</th>
		<th>Name</th>
		<th>Status</th>
		<th>&nbsp;</th>
	</tr>
	<?php
	while ($row=$member_query->fetch_assoc()) {
		include ('../dbvars.php');
		echo "
		<tr>
			<td>$tkid</td>
			<td>$first_name $last_name</td>
			<td>$status_name</td>
			<td><a href=\"member_edit_form.php?id=$trooper_id\">[Edit]</a></td>
		</tr>
		";
	}
	?>
	</table>
	<?php
	} else {
		while ($selected_trooper = $member_query->fetch_assoc()) {
			$trooper_id = $selected_trooper['trooper_id'];
			header ("Location: member_edit_form.php?id=$trooper_id");
		}
	}
*/

include ('admin_footer.php');
?>
	
	