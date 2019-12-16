<?php
// FTOTM EDIT PROCESSING
include ("admin_header.php");

$select_text = addslashes($_POST[select_text]);
$id = $_POST[id];

$edit_ftotm = $conn->query("
	update ftotm
	set ftotm_text = '$select_text'
	where ftotm_id = $id
	");
	
if ($edit_ftotm) {
	echo "Edit successful:";
} else {
	throw new Exception("SQL Query failed: (" . $conn->errno . ") " . $conn->error);
}
?>