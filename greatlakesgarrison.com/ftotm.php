<?php
include ("z_header.php");

$get_month = $_GET[m];
$get_year = $_GET[y];
if (!isset($get_month)) {
	$get_month = date("m");
}

if (!isset($get_year)) {
	$get_year = date("Y");
}

$get_month = preg_replace('/[^0-9]/', '', $get_month); 
$get_year = preg_replace('/[^0-9]/', '', $get_year); 
$full_month_name = date("F", mktime(0,0,0,$get_month+1,0,$get_year));

$ftotm_full = mysql_query ("
	select trooper_id, first_name, last_name, roster_members.tkid, member_since, ftotm_text
	from ftotm, roster_members
	where ftotm.ftotm_tkid = roster_members.tkid
	and ftotm_month = $get_month
	and ftotm_year = $get_year
	");
	
$all_ftotm = mysql_query ("
	select first_name, last_name, roster_members.tkid, ftotm_month, ftotm_year
	from ftotm, roster_members
	where ftotm.ftotm_tkid = roster_members.tkid
	and ftotm_month <> $get_month
	and ftotm_year <> $get_year
	order by ftotm_id desc
	");
?>
<h1>Get to Know Your MI501st :: <? echo $full_month_name . ", " . $get_year; ?></h1>
<br>
<table cellpadding=10 cellspacing=0 border=0>
	<tr>
		<td valign=top width=650>
<?
while ($parse = $ftotm_full->fetch_assoc()) {
	$ftotm_fname = $parse['first_name'];
	$ftotm_lname = $parse['last_name'];
	$ftotm_tkid = $parse['tkid'];
	$ftotm_join = $parse['member_since'];
	$ftotm_text = $parse['ftotm_text'];
	$trooper_id = $parse['trooper_id'];

	$padded_tk = tk_pad($ftotm_tkid);	
	$filename = "rosterimg/" . $padded_tk . "_profile.jpg";

	if (file_exists($filename)) {
		echo "
			<img src=\"rosterimg/" . $padded_tk . "_profile.jpg\" align=left style=\"padding-right: 10px; padding-bottom: 10px\">
";
	} else {
		echo "
			<img src=\"rosterimg/zz_blanktn.jpg\" align=left style=\"padding-right: 10px; padding-bottom: 10px\">
";
	}

	$join_date = date ('F, Y', strtotime($ftotm_join));

echo "<div class=\"ftotm_name\">$ftotm_fname $ftotm_lname<br>Legion ID: $ftotm_tkid<br>Joined $join_date</div><br>";

echo nl2br($ftotm_text);
echo "<P>
<a href=\"rosterx.php?id=$trooper_id\">View $ftotm_fname's profile...</a>";
}

echo "<P>";
?>
		</td>
		<td style="border-left: 1px #1a6da2 dashed;" valign=top width=250>
<?
echo "<h2>All Featured Troopers:</h2>";
echo "<br>";
while ($list_all = mysql_fetch_array ($all_ftotm)) {
	$list_fname = $list_all['first_name'];
	$list_lname = $list_all['last_name'];
	$tkid = $list_all['tkid'];
	$list_month = $list_all['ftotm_month'];
	$list_year = $list_all['ftotm_year'];

	$padded_tk = tk_pad($tkid);	
	$profile_thumb = $padded_tk . "_profile.jpg";

	if (!file_exists("rosterimg/" . $profile_thumb)) {
		$profile_thumb = "zz_blanktn.jpg";
	}

	echo "<a href=\"ftotm.php?m=$list_month&y=$list_year\"><img src=\"rosterimg/imgresize.php/$profile_thumb?resize(20)\" align=\"absmiddle\" border=0> ";
	echo date("M \'y", mktime(0,0,0,$list_month+1,0,$list_year)) . ": $list_fname $list_lname</a><br>
";
	}
?>
		</td>
	</tr>
</table>
<?	
include ("z_footer.php");
?>