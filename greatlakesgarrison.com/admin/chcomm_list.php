<?
include ('../dbaccess.php');
include ('../dbconnect.php');

$chcomm_list = mysql_query("
	select *
	from charity_community_list
	order by chcomm_name, chcomm_city
	");
	
while ($row = mysql_fetch_array($chcomm_list)) {
	include ('../dbvars.php');
	
	echo "<b>$chcomm_name</b><br>
$chcomm_address1<br>
";

	if ($chcomm_address2 != null) {
		echo "$chcomm_address2<br>
";
	}
	echo "$chcomm_city, $chcomm_state  $chcomm_postcode<P>";
}

?>