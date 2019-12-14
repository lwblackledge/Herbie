<?php
//**** FEATURED MEMBER ****
$t_id_sql = mysql_query("
	select feat_id, featured_member.tkid as feat_tkid, variant, photog_f_name, photog_l_name, featured_photog.photog_url, trooper_id
	from featured_member, roster_members, featured_photog
	where featured_member.tkid = roster_members.tkid
	and featured_member.photog_id = featured_photog.photog_id
	and display = '1'
	order by rand()
	limit 1
	");

while ($feat_row = mysql_fetch_array($t_id_sql)) {
	$trooper_id = $feat_row['trooper_id'];
	$tkid = tk_pad($feat_row['feat_tkid']);
	
	// APRIL FOOLS 2015
	$april_fools == 1 ? $photog_f_name = "Mike" : $photog_f_name = $feat_row['photog_f_name'];
	// END APRIL FOOLS 2015
	
	$photog_l_name = $feat_row['photog_l_name'];
	$photog_url = $feat_row['photog_url'];
	$variant = $feat_row['variant'];

	echo "
	<a href=\"rosterx.php?id=$trooper_id\">
		<img src=\"img/feat_" . $tkid . $variant . ".png\" width=400 height=400 border=0 style=\"border: 3px double #1f5883; background-color: #5e88b0;\">
	</a>
	<br>
	<div style=\"font-size: 7pt; color: #000088;text-align: right; padding-right: 10px;\">
";

	if ($photog_url == null) {
			echo "	Photo by " . $photog_f_name . " " . $photog_l_name;
	} else {
		echo "	Photo by <a href=\"http://" . $photog_url . "\" target=\"_new\">" . $photog_f_name . " " . $photog_l_name . "</a>";
	}

	echo "
			</div>
";

}
//** END FEATURED MEMBER **
?>
