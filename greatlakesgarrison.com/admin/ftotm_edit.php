<?php
include ("admin_header.php");
$id = $_POST['ftotm_select'];

$choose_record = $conn->query("
	select ftotm_tkid, ftotm_month, ftotm_year, ftotm_text, first_name, last_name, ftotm_id
	from ftotm, roster_members
	where ftotm_tkid = roster_members.tkid
	and ftotm.ftotm_id = $id
");
if (!$choose_record) {
	throw new Exception("SQL Query failed: (" . $conn->errno . ") " . $conn->error);
}

$ftotm_record = $choose_record->fetch_row;
	$tkid = $ftotm_record[0];
	$month = $ftotm_record[1];
	$year = $ftotm_record[2];
	$ftotm_text = stripslashes($ftotm_record[3]);
	$first_name = $ftotm_record[4];
	$last_name = $ftotm_record[5];
	$id = $ftotm_record[6];
	
?>

<form method="post" action="ftotm_edit_process.php">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellpadding=0 cellspacing=10 border=0>
	<tr>
		<td width=200>
			Featured Month:
		</td>
		<td valign="top">
			<?php echo $month . "/" . $year; ?>
		</td>
	</tr>
	<tr>
		<td width=200>
			Trooper:
		</td>
		<td valign="top">
			<?php echo $tkid . " ($first_name $last_name)"; ?>
		</td>
	</tr>
	<tr>
		<td width=200 valign=top>
			Text:
			<div style="font-size: 9px;">Remember to replace all SmartQuotes with straight quotes.</div>
		</td>
		<td>
			<textarea rows=10 cols=30  name="select_text"><?php echo $ftotm_text; ?></textarea>
		</td>
	</tr>
</table>
<input type="submit" value="Edit"> || <input type="reset">
</form>
<?php
include ("admin_footer.php");
?>