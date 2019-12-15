<?php
include ('admin_header.php');

$add_trooper_id=$_POST['trooper_id'];
$add_totm_month=$_POST['totm_month'];
$add_totm_year=$_POST['totm_year'];
$add_totm_desc=$_POST['totm_desc'];
$add_is_tied=$_POST['is_tied'];

$unix_event_date = mktime(0,0,0,$add_totm_month,1,$add_totm_year);
$totm_date=date("Y-m-j" , $unix_event_date);

$insert_totm="INSERT INTO roster_totm (trooper_id, totm_date, totm_desc, is_tied)
VALUES ('$add_trooper_id', '$totm_date', '$add_totm_desc', '$add_is_tied')";

mysql_query($insert_totm);

echo "<h2>Trooper of the Month</h2>";
echo"Record added.<P>
";


include ('admin_footer.php');
?>
