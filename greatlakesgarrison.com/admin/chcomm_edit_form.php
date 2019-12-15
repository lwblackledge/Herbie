<?
include ("admin_header.php");
$chcomm_id = $_POST[chcomm_id];

$get_org = mysql_query ("
	select *
	from charity_community_list
	where chcomm_id = '$chcomm_id'
	");

while ($row = mysql_fetch_array($get_org)) {
	include ("../dbvars.php");
	?>	
<table cellpadding=5 cellspacing=0 border=0
	<tr>
		<td>Organization name:</td>
		<td><input type="text" size="20" maxlength="50" name="chcomm_name" value="<? echo $chcomm_name; ?>"></td>
	</tr>
	<tr>
		<td>Address:</td>
		<td><input type="text" size="20" maxlength="50" name="chcomm_address1" value="<? echo $chcomm_address1; ?>"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="text" size="20" maxlength="50" name="chcomm_address2" value="<? echo $chcomm_address2; ?>"></td>
	</tr>
	<tr>
		<td>City/State/Post Code:</td>
		<td>
			<input type="text" size="10" maxlength="50" name="chcomm_city" value="<? echo $chcomm_city; ?>">
			<select name="chcomm_state">
			<? $state_list = array(
				"AL",
				"AK",
				"AR",
				"AZ",
				"CA",
				"CO",
				"CT",
				"DE",
				"DC",
				"FL",
				"GA",
				"HI",
				"ID",
				"IL",
				"IN",
				"IA",
				"KS",
				"KY",
				"LA",
				"ME",
				"MD",
				"MA",
				"MI",
				"MN",
				"MS",
				"MO",
				"MT",
				"NE",
				"NV",
				"NH",
				"NJ",
				"NM",
				"NY",
				"NC",
				"ND",
				"OH",
				"OK",
				"OR",
				"PA",
				"RI",
				"SC",
				"SD",
				"TN",
				"TX",
				"UT",
				"VT",
				"WA",
				"WI",
				"WY"
				);
				
				foreach ($state_list as $s) {
					echo "			<option value=\"$s\"";
					if ($s == $chcomm_state) {
						echo " selected";
					}
					echo ">$s</option>
";
				}
				?>
			</select>
			<input type="text" size="10" maxlength="8" name="chcomm_postcode" value="<? echo $chcomm_postcode; ?>">
		</td>
	</tr>
	<tr>
		<td>Contact Person:</td>
		<td>
			<input type="text" size="10" maxlength="50" name="chcomm_fname" value="<? echo $chcomm_fname; ?>">
			<input type="text" size="10" maxlength="50" name="chcomm_lname" value="<? echo $chcomm_lname; ?>">
		</td>
	</tr>
	<tr>
		<td>Phone 1:</td>
		<td><input type="text" size="10" maxlength="50" name="chcomm_phone1" value="<? echo $chcomm_phone1; ?>"></td>
	</tr>
	<tr>
		<td>Phone 2:</td>
		<td><input type="text" size="10" maxlength="50" name="chcomm_phone2" value="<? echo $chcomm_phone2; ?>"></td>
	</tr>
	<tr>
		<td>E-Mail:</td>
		<td><input type="text" size="15" maxlength="50" name="chcomm_email" value="<? echo $chcomm_email; ?>"></td>
	</tr>
</table>
<input type="hidden" name="chcomm_lastedit" value="<? echo date("Y-m-d"); ?>">
<P>
<input type="submit" value="Enter"> * <input type="reset">
<?
	}
	
include ("admin_footer.php");
?>