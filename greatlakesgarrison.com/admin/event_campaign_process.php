<?php
include ("admin_header.php");

$event_id_form = $_POST['event_id'];
$file_name_form = $_POST['file_name'];

$conn->query("
	insert into event_awards(event_id, event_file)
	values ('$event_id_form', '$file_name_form')
	");
echo "Added campaign medal:";
echo "<img src=\"/img/$file_name_form\">";

include ("admin_footer.php");
?>