<?
// SITE VARS
if (date("Y-m-d") == "2019-04-01" || date("Y-m-d") == "2019-04-02") {
	$april_fools = 1;
	$unit_name = "Great Mikes Garrison";
	$unit_abbrev = "GMG";
} else {
	$april_fools = 0;
	$unit_name = "Great Lakes Garrison";
	$unit_abbrev = "GLG";
}


// FUNCTIONS

function tk_pad($tk_number) {
	$number_length = strlen($tk_number);
	
	switch ($number_length) {
		case 3:
			$padded_tk="0" . $tk_number;
			break;
		case 2:
			$padded_tk="00" . $tk_number;
			break;
		case 1:
			$padded_tk="000" . $tk_number;
			break;
		default:
			$padded_tk = $tk_number;
			break;
	}
	
	return $padded_tk;
}


?>
