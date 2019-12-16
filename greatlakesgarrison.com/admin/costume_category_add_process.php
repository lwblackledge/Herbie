<?php
include_once ("admin_header.php");

$form_costcat = strtoupper($_POST[costcat]);
$form_costname = addslashes($_POST[costname]);

// First look for duplicates
$dupe_search = $conn->query("
	select costume_abbr
	from roster_costumes
	where costume_abbr = '$form_costcat'
	");
	
if ($dupe_search->num_rows != 0) {
	echo "Duplicate record found for $form_costcat.";
	include ("costume_category_add.php");
	include_once("admin_footer.php");
	exit();
}

// No duplicate found; continue processing.

if (!$conn->query("
	insert into roster_costumes(costume_abbr, costume_name)
	values ('$form_costcat', '$form_costname')
	")) {
		throw new Exception("SQL Query failed: (" . $conn->errno . ") " . $conn->error);
	}

echo "Added <b>$form_costcat</b>: <i>$form_costname</i>";
?>