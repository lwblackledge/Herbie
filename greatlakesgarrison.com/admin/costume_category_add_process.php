<?php
include_once ("admin_header.php");

$form_costcat = strtoupper($_POST[costcat]);
$form_costname = addslashes($_POST[costname]);

// First look for duplicates
$dupe_search = mysql_query("
	select costume_abbr
	from roster_costumes
	where costume_abbr = '$form_costcat'
	");
	
if (mysql_num_rows($dupe_search) != 0) {
	echo "Duplicate record found for $form_costcat.";
	include ("costume_category_add.php");
	include_once("admin_footer.php");
	exit();
}

// No duplicate found; continue processing.

mysql_query ("
	insert into roster_costumes(costume_abbr, costume_name)
	values ('$form_costcat', '$form_costname')
	") or die("Insertion error: " . mysql_error());

echo "Added <b>$form_costcat</b>: <i>$form_costname</i>";
?>