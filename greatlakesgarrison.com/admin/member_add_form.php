<?php

include ('admin_header.php');

// ADD NEW MEMBER

// Parse costume types to generate an initial costume for the sake of data entry
$costume_query=$conn->query("select * from roster_costumes");

// Query member status code for initial entry
$status_query=$conn->query("select * from roster_status");

// State listings
$state_sql = $conn->query("
	select state_id, state_abbr
	from roster_state_id
	order by state_abbr
");
?>


<form method="post" action="member_add_process.php">
<table cellpadding=0 cellspacing=10 border=0>
	<tr>
		<td>
			TKID:
		</td>
		<td>
			<input type="text" name="tkid" maxlength=5 size=10>
		</td>
	</tr>
	<tr>
		<td>
			First Name:
		</td>
		<td>
			<input type="text" name="first_name" size=20>
		</td>
	</tr>
	<tr>
		<td>
			Last Name:
		</td>
		<td>
			<input type="text" name="last_name" size=20>
		</td>
	</tr>
	<tr>
		<td>
			E-Mail Address:
		</td>
		<td>
			<input type="text" name="e_mail" size="20">
		</td>
	</tr>
	<tr>
		<td>
			City:
		</td>
		<td>
			<input type="text" name="city" size="20">
		</td>
	</tr>
	<tr>
		<td>
			State:
		</td>
		<td>
			<select name="state">
			<?php
			while ($row = $state_sql->fetch_assoc()) {
				echo "
				<option value=\"" . $row['state_id'] . "\"";
				if ($row['state_id'] == 1) {
					echo " selected";
				}
				echo "
				>" . $row['state_abbr'] . "</option>";
			}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Initial Costume Type:
		</td>
		<td>
			<select name="costume">
<?php
while($row=$costume_query->fetch_assoc()) {
	include ('../z_dbvars.php');
	
	echo"	<option value=$costume_id>$costume_name</option>
	";
}
?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Initial status:<br>
			
<?php
while ($row=$status_query->fetch_assoc()) {
	include ('../z_dbvars.php');

	echo "			<input type=\"radio\" name=\"status\" value=\"$status_id\"";
	if ($status_id==1) { echo " checked";}
	echo "> $status<br>
";
}
?>
		</td>
		<td>
			Member Since:<br>
			<select name="member_month">
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
			<select name="member_year">
			<?php
				$select_year = date("Y");
				include ("event_year_list.php");
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Mark record as classified?<br>
			<input type="radio" value="1" name="classified"> Yes<br>
			<input type="radio" value="0" name="classified" checked> No

</table>
<input type="submit" value="Add..."> <input type="reset" value="Clear">
</form>

<?php include ('admin_footer.php'); ?>