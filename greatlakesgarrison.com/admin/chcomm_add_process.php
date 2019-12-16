<?
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

// Check if this charity exists in the database already
$dupe_check = $conn->query("
	select *
	from charity_community_list
	where chcomm_name = '$chcomm_name'
	");

$records = $dupe_check->num_rows;

if ($records > 0) {
	echo "<font color=\"#ff0000\"><b>Possible duplicates found!</b></font><P>
";
	echo "You entered:<br>
";
	echo "$chcomm_name<br>
$chcomm_address1<br>
";
	if ($chcomm_address2 != null) {
		echo "$chcomm_address2<br>";
	}
	echo "$chcomm_city, $chcomm_state  $chcomm_postcode<br>
";
	echo "$chcomm_fname $chcomm_lname<br>$chcomm_email<br>$chcomm_phone1<br>$chcomm_phone2<br>
";

	echo "<P>";
	echo "The following similar records were found:<P>";
	while ($row = $dupe_check->fetch_assoc()) {
		$query_ch_name = $row['chcomm_name'];
		$query_ch_city = $row['chcomm_city'];
		$query_ch_state = $row['chcomm_state'];
		$query_ch_fname = $row['chcomm_fname'];
		$query_ch_lname = $row['chcomm_lname'];
		
		echo "$query_ch_name<br>$query_ch_city, $query_ch_state<br>
$query_ch_fname $query_ch_lname<P>
";
	}

	echo "If this is a new location, click \"Continue\" below to add to the database.
	Or you may edit the existing record above by clicking on its name.<P>
";
	echo "<form method=\"post\" action = \"chcomm_add_finish.php\">
";
	foreach ($demographics as $key => $value) {
		echo "	<input type=\"hidden\" name=\"$key\" value=\"$value\">
";
	}
	echo "<input type=\"submit\" value=\"Continue\">";
	echo "</form>";
	
} else {
// If no duplicates found
	if (!$conn->query("
		insert into charity_community_list(chcomm_name, chcomm_address1, chcomm_address2, chcomm_city, chcomm_state, chcomm_postcode, chcomm_phone1, chcomm_phone2, chcomm_fname, chcomm_lname, chcomm_email, chcomm_lastedit)
		values ('$chcomm_name', '$chcomm_address1', '$chcomm_address2', '$chcomm_city', '$chcomm_state', '$chcomm_postcode', '$chcomm_phone1', '$chcomm_phone2', '$chcomm_fname', '$chcomm_lname', '$chcomm_email', '$chcomm_lastedit')
	")) {
		throw new Exception("SQL Query failed: (" . $conn->errno . ") " . $conn->error);
	}
	echo "Added:<br>
";	
	foreach ($demographics as $data_field) {
		if ($data_field != null) {
			echo "$data_field<br>";
		}
	}
}

/*
echo $chcomm_name;
echo $chcomm_address1;
echo $chcomm_address2;
echo $chcomm_city;
echo $chcomm_state;
echo $chcomm_postcode;
echo $chcomm_phone1;
echo $chcomm_phone2;
echo $chcomm_fname;
echo $chcomm_lname;
echo $chcomm_email;
echo $chcomm_lastedit;

*/?>