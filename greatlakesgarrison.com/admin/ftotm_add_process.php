<?php
// FTOTM ADD PROCESSING
include ("admin_header.php");

$select_month = $_POST[select_month];
$select_year = $_POST[select_year];
$select_tkid = $_POST[select_tkid];
$select_text = addslashes($_POST[select_text]);
$select_show = $_POST[select_show];

$add_ftotm = $conn->query("
	insert into ftotm(ftotm_tkid, ftotm_month, ftotm_year, ftotm_text, ftotm_show)
	values (
		$select_tkid,
		$select_month,
		$select_year,
		'$select_text',
		$select_show
		)
	") or die ("Error: " . mysql_error());
	
if ($add_ftotm) {
	echo "Successfully added trooper $select_tkid for $select_month/$select_year.";
	header("Location: index.php", 3);
}
?>