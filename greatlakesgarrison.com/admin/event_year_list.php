<?
#$start_year = date('Y') - 10;
$start_year = date('Y') - 20;
$end_year = date('Y') + 1;

for ($a = $start_year; $a <= $end_year; $a++) {
	echo "	<option value=\"$a\"";

	if ($select_year == $a) {
		echo " selected";
	}
	
	echo ">$a</option>
";
}

?>
