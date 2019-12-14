<?php
// FTOTM EDIT PROCESSING
include ("admin_header.php");

$select_text = addslashes($_POST[select_text]);
$id = $_POST[id];

$edit_ftotm = mysql_query("
	update ftotm
	set ftotm_text = '$select_text'
	where ftotm_id = $id
	") or die ("Error: " . mysql_error());
	
if ($edit_ftotm) {
	echo "Edit successful:";
}
?>