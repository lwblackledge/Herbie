<?
include ("admin_header.php");
// add new charity/community recipient to directory
?>
<form method="post" action="chcomm_add_process.php">
<table border=0>
	<tr>
		<td width=400 valign=top>
<table cellpadding=5 cellspacing=0 border=0>
	<tr>
		<td>Organization name:</td>
		<td><input type="text" size="20" maxlength="50" name="chcomm_name"></td>
	</tr>
	<tr>
		<td>Address:</td>
		<td><input type="text" size="20" maxlength="50" name="chcomm_address1"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="text" size="20" maxlength="50" name="chcomm_address2"></td>
	</tr>
	<tr>
		<td>City/State/Post Code:</td>
		<td>
			<input type="text" size="10" maxlength="50" name="chcomm_city">
			<select name="chcomm_state">
				<option value="AL">AL</option>
				<option value="AK">AK</option>
				<option value="AZ">AZ</option>
				<option value="AR">AR</option>
				<option value="CA">CA</option>
				<option value="CO">CO</option>
				<option value="CT">CT</option>
				<option value="DE">DE</option>
				<option value="DC">DC</option>
				<option value="FL">FL</option>
				<option value="GA">GA</option>
				<option value="HI">HI</option>
				<option value="ID">ID</option>
				<option value="IL">IL</option>
				<option value="IN">IN</option>
				<option value="IA">IA</option>
				<option value="KS">KS</option>
				<option value="KY">KY</option>
				<option value="LA">LA</option>
				<option value="ME">ME</option>
				<option value="MD">MD</option>
				<option value="MA">MA</option>
				<option value="MI" selected>MI</option>
				<option value="MN">MN</option>
				<option value="MS">MS</option>
				<option value="MO">MO</option>
				<option value="MT">MT</option>
				<option value="NE">NE</option>
				<option value="NV">NV</option>
				<option value="NH">NH</option>
				<option value="NJ">NJ</option>
				<option value="NM">NM</option>
				<option value="NY">NY</option>
				<option value="NC">NC</option>
				<option value="ND">ND</option>
				<option value="OH">OH</option>
				<option value="OK">OK</option>
				<option value="OR">OR</option>
				<option value="PA">PA</option>
				<option value="RI">RI</option>
				<option value="SC">SC</option>
				<option value="SD">SD</option>
				<option value="TN">TN</option>
				<option value="TX">TX</option>
				<option value="UT">UT</option>
				<option value="VT">VT</option>
				<option value="VA">VA</option>
				<option value="WA">WA</option>
				<option value="WV">WV</option>
				<option value="WI">WI</option>
				<option value="WY">WY</option>
			</select>
			<input type="text" size="10" maxlength="8" name="chcomm_postcode">
		</td>
	</tr>
	<tr>
		<td>Contact Person:</td>
		<td>
			<input type="text" size="10" maxlength="50" name="chcomm_fname">
			<input type="text" size="10" maxlength="50" name="chcomm_lname">
		</td>
	</tr>
	<tr>
		<td>Phone 1:</td>
		<td><input type="text" size="10" maxlength="50" name="chcomm_phone1"></td>
	</tr>
	<tr>
		<td>Phone 2:</td>
		<td><input type="text" size="10" maxlength="50" name="chcomm_phone2"></td>
	</tr>
	<tr>
		<td>E-Mail:</td>
		<td><input type="text" size="15" maxlength="50" name="chcomm_email"></td>
	</tr>
</table>
<input type="hidden" name="chcomm_lastedit" value="<? echo date("Y-m-d"); ?>">
<P>
<input type="submit" value="Enter"> * <input type="reset">
		</td>
		<td valign=top>
			<b><u>Organizations in the database</u></b><P>
			<iframe width=400 height=300 src="chcomm_list.php" name="chcomm_frame" frameborder="0">
			</iframe>
		</td>
	</tr>
</table>
<?
include ("admin_footer.php");
?>