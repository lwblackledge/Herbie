<?php
include ("admin_header.php");
$chcomm_name = $_POST[chcomm_name];
$chcomm_address1 = $_POST[chcomm_address1];
$chcomm_address2 = $_POST[chcomm_address2];
$chcomm_city = $_POST[chcomm_city];
$chcomm_state = $_POST[chcomm_state];
$chcomm_postcode = $_POST[chcomm_postcode];
$chcomm_phone1 = $_POST[chcomm_phone1];
$chcomm_phone2 = $_POST[chcomm_phone2];
$chcomm_fname = $_POST[chcomm_fname];
$chcomm_lname = $_POST[chcomm_lname];
$chcomm_email = $_POST[chcomm_email];
$chcomm_lastedit = $_POST[chcomm_lastedit];

if (!$conn->query("
	insert into charity_community_list(chcomm_name, chcomm_address1, chcomm_address2, chcomm_city, chcomm_state, chcomm_postcode, chcomm_phone1, chcomm_phone2, chcomm_fname, chcomm_lname, chcomm_email, chcomm_lastedit)
	values ('$chcomm_name', '$chcomm_address1', '$chcomm_address2', '$chcomm_city', '$chcomm_state', '$chcomm_postcode', '$chcomm_phone1', '$chcomm_phone2', '$chcomm_fname', '$chcomm_lname', '$chcomm_email', '$chcomm_lastedit')
")) {
	throw new Exception("SQL Query failed: (" . $conn->errno . ") " . $conn->error);
}
echo "Added:<br>
";	

$demographics = array(
	"chcomm_name" => $chcomm_name,
	"chcomm_address1" => $chcomm_address1,
	"chcomm_address2" => $chcomm_address2,
	"chcomm_city" => $chcomm_city,
	"chcomm_state" => $chcomm_state,
	"chcomm_postcode" => $chcomm_postcode,
	"chcomm_phone1" => $chcomm_phone1,
	"chcomm_phone2" => $chcomm_phone2,
	"chcomm_fname" => $chcomm_fname,
	"chcomm_lname" => $chcomm_lname,
	"chcomm_email" => $chcomm_email,
	"chcomm_lastedit" => $chcomm_lastedit
	);

foreach ($demographics as $data_field) {
	if ($data_field != null) {
		echo "$data_field<br>";
	}
}

include ("admin_footer.php");
?>
