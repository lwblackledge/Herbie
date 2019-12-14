<?
include ('admin_header.php');

$officer_sql = mysql_query('
	select *
	from roster_members, roster_roles
	where roster_members.role_id = roster_roles.role_id
	and roster_members.role_id <> 1
	');

?>
<table cellpadding=5 cellspacing=0 border=1>
	<tr>
		<th>
			Name
		</th>
		<th>
			TKID
		</th>
		<th>
			Role
		</th>
		<th>&nbsp;
			
		</th>
	</tr>
<?
while ($row = mysql_fetch_array($officer_sql)) {
	include ('../dbvars.php');
	
	echo "	<tr>
		<td>
			$first_name $last_name
		</td>
		<td>
			$tkid
		</td>
		<td>
			$role_name
		</td>
		<td>
			[<a href=\"member_edit_form.php?id=$trooper_id\">EDIT</a>]
		</td>
	</tr>
";
	}
	
?>
	
	