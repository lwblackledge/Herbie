<?php
// ADD NEW Featured Trooper of the Month

include ("admin_header.php");

// Get TKIDs of all currently active GLG members who haven't been featured already.  Yes, I know they're not technically called "TKIDs" anymore, but it's still shorter to write out.
	$tkid_list = mysql_query ("
		select tkid, first_name, last_name
		from roster_members
		where status_id = 1
		and tkid not in (select ftotm_tkid from ftotm)
		order by tkid
	");
	
	$troopers_left = mysql_num_rows($tkid_list);

// Break out the current month and year from the current date to act as the default values to select.
	$current_month = date("m");
	$current_year = date("Y");

	$next_year = $current_year + 1; //assuming that FTOTMs are written monthly, the only different year needed would be for the following year if the entry for January 20xx was written in December.

// ERROR CHECKING: Check if an entry for this month exists already
	$existing_entry_check = $conn->query("
		select *
		from ftotm
		where ftotm_month = '$current month'
		and ftotm_year = '$current_year'
	");

	if ($existing_entry_check) {
		// if an entry for this month DOES exist, increment the default month by one to allow selection of next month instead
		// and if the current month is December, roll the month back to January and increment the year by 1.
		if ($current_month != 12) {
			$current_month++;
		} else {
			$current_month = 1;
			$current_year++;
		}
	}
	
?>

<form method="post" action="ftotm_add_process.php">
<table cellpadding=0 cellspacing=10 border=0>
	<tr>
		<td width=200>
			Featured Month:
		</td>
		<td valign="top">
			<select name="select_month">
<?php
	// Assemble the dropdown list for months
	$a = 1;
	while ($a <= 12) {
		echo "<option value=$a";
		if ($a == $current_month) {
			echo " selected";
		}
		
		echo ">$a</option>
";
		$a++;
	}
		
?>			
			</select>
			<select name="select_year">
<?php
	// Assemble the dropdown list for this year and next year
	echo "	<option value=\"$current_year\">$current_year</option>
	<option value=\"$next_year\">$next_year</option>";

?>
			</select>
		</td>
	</tr>
	<tr>
		<td width=200>
			Trooper (<?php echo $troopers_left; ?> still available):
		</td>
		<td valign="top">
			<select name="select_tkid">
<?php
	while ($row = $tkid_list->fetch_assoc()) {
		$tkid = $row['tkid'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		echo "	<option value=\"$tkid\">$tkid ($first_name $last_name)</option>
		";
	}
		
?>
			</select>
		</td>
	</tr>
	<tr>
		<td width=200 valign=top>
			Text:
			<div style="font-size: 9px;">Remember to replace all SmartQuotes with straight quotes.</div>
		</td>
		<td>
			<textarea rows=10 cols=30  name="select_text"></textarea>
		</td>
	</tr>
	<tr>
		<td width=200 valign=top>
			Show on site immediately upon submit?
		</td>
		<td>
			<input type="radio" name="select_show" value=1 checked>Yes ::
			<input type="radio" name="select_show" value=0>No
		</td>
	</tr>
</table>
<input type="submit"> || <input type="reset">
</form>
<?php
include ("admin_footer.php");
?>