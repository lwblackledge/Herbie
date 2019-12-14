<?php
// *************************************************
// *************** NEWEST RECRUITS *****************
$limit = 3;
$new_members_rows = 1;
$new_member_query = "
	select *, date_format(member_since, '%M, %Y') as joined_date
	from roster_members
	order by member_since desc, trooper_id desc
	limit 0," . $limit;

$new_member_sql = mysql_query($new_member_query);
?>

<table cellpadding=5 cellspacing=0 border=0>

<?
while ($newest = mysql_fetch_array($new_member_sql)) {
	$trooper_id = $newest['trooper_id'];

	// APRIL FOOLS 2015
	$april_fools == 1 ? $first_name = "Mike" : $first_name = $newest['first_name'];
	// END APRIL FOOLS 2015

	$last_name = $newest['last_name'];
	$tkid = $newest['tkid'];
	$joined_date = $newest['joined_date'];
	$classified = $newest['classified'];
	
	$padded_tk = tk_pad($tkid);
	include ('roster_check_classified.php');
	$photofile = $padded_tk."_tn.gif";

	echo "
	<tr>
		<td width=125";
	
	if ($new_member_rows < $limit-1) {
		echo " style=\"border-bottom: 1px #ccc dashed;\"";
	}
	echo "
	>";
	
	if (file_exists("rosterimg/$photofile")) {
		echo "		<img src=\"rosterimg/$photofile\">";
	} else {
		echo "		<img src=\"rosterimg/placeholder.gif\">";
	}

	echo "
		</td>
		<td valign=top width=175";
	if ($new_member_rows < $limit-1) {
		echo " style=\"border-bottom: 1px #ccc dashed;\"";
	}
	echo ">
			<b>$first_name $last_name</b><br>
			Legion ID: $tkid<br>
			Joined $joined_date<br>
			<br>
			<a href=\"rosterx.php?id=$trooper_id\">Profile</a>
		</td>
	</tr>
";
	$new_member_rows++;
	}

echo "</table>
";
// *********** END NEWEST RECRUITS *****************
// *************************************************
?>