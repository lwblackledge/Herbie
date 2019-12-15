<?
for ($b = 1; $b < 13; $b++) {
	$unix_event_date = mktime(0,0,0,$b,1,2008);
	$date_asplode=date("F" , $unix_event_date);

	echo "	<option value=\"$b\"";

	if ($select_month == $b) {
		echo " selected";
	}
	
	echo ">$date_asplode</option>
";

}
?>