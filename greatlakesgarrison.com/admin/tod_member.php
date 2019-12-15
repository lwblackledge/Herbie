<?
//MEMBER TOD
$nf = $_GET[nf];

if ($nf == 1) {
	echo "<b>Not found</b>";
}

$lookup_function = "tod_member_find.php";
include ('search_member.php');

?>