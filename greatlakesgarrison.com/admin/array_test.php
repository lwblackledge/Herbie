<?
$i = array (10, 12, 13, 25);
foreach ($i as $v) {
print "Present value of \$i: $v <br> ";
} 

$chcomm_name = "name";
$chcomm_address1 = "address1";
$chcomm_address2 = "address2";
$chcomm_city = "city";
$chcomm_state = "state";
$chcomm_postcode = "postcode";
$chcomm_phone1 = "phone1";
$chcomm_phone2 = "phone2";

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

	foreach ($demographics as $keys => $field_name) {
		echo $keys . " = " . $field_name . "<br>";
	}
?>