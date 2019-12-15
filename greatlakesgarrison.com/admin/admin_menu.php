<?
$link[] = "index.php";
$name[] = "Front page";

$link[] = "roster.php";
$name[] = "Roster";

$link[] = "forum";
$name[] = "Forum";

echo "<div style=\"background-color: #0000cc; padding: 10px; color: #ffffff;\">";
echo "<b>External Links:</b> || ";

for ($a = 0; $a < sizeof($link); $a++) {
	echo "<a href=\"" . $root_url . $link[$a] . "\" target=\"Other\" style=\"color: #ffffff\">$name[$a]</a> || ";
	}

echo "<a href=\"http://www.starwarsmichigan.com/forum\" target=\"Other\" style=\"color: #ffffff\">Event Forum</a>";
echo "</div>";
	
?>