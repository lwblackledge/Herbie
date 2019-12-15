<?php
include ("z_header.php");
//*** PARTICIPATION COLOR KEY ***
$part_501st = "#fff";
$part_non501st = "#0d0";
$part_ncs = "#f66";
//* END PARTICIPATION COLOR KEY *

$trooper_id = preg_replace('/[^0-9]/', '', $_GET['id']);
$trooper_info=$conn->query("
	select *, date_format(member_since, '%M, %Y') as joined_date, datediff(curdate(), member_since) as membership_days
	from roster_members, roster_state_id, roster_roles
	where roster_members.state_id = roster_state_id.state_id
	and trooper_id = $trooper_id
	and roster_members.role_id = roster_roles.role_id
") or die ("Trooper info not loaded.");

$trooper_costumes=$conn->query("
	select roster_members.trooper_id, tkid, lower(costume_abbr) as costume_abbr, costume_name, outfit_variant, active_flag
	from roster_members, roster_costumes, roster_outfit
	where roster_members.trooper_id = roster_outfit.trooper_id
	and roster_outfit.costume_id = roster_costumes.costume_id
	and roster_members.trooper_id = $trooper_id
	and active_flag=1
	order by roster_costumes.costume_id, outfit_variant
") or die ("Costumes not loaded.");

$costume_qty = mysql_num_rows ($trooper_costumes);

$events_sql = $conn->query("
	select date_format(event_date, '%c / %e / %y') as formatted_date, event_date, year(event_date) as event_year, event_name, event_city, event_state, participation_role_id
	from events, event_participation
	where events.event_id = event_participation.event_id
	and trooper_id = $trooper_id
	and is_active = 1
	order by event_year desc, event_date desc
	") or die ("Events not loaded.");
	
$num_events = mysql_query ("
	select event_participation_id
	from event_participation, events
	where trooper_id = $trooper_id
	and event_participation.event_id = events.event_id
	and is_active = 1
	");
	
$total_events = mysql_num_rows($num_events);

// **** ERROR HANDLING: Invalid Trooper ID ****
if (mysql_num_rows($trooper_info) == 0) {
	echo "
	<h1>Unknown Trooper</h1>
	<div style=\"float: left; width: 50%\">
		<img src=\"img/7759_vader.png\">
	</div>
	<div style=\"float: right; width: 50%\">
		<div style=\"font-size: 14px; font-weight: bold;\">You may dispense with the pleasantries, Commander.  I am here to put you back on schedule.</div>
		The trooper you seek is not found in this Garrison.  Search again.
		<P>
		<a href=\"roster.php\">Return to Member Roster</a>
	</div>
	<div style=\"clear: both\"></div>
";
	exit;
}
// ** END ERROR HANDLING: Invalid Trooper ID **

while ($row=$trooper_info->fetch_assoc()) {
	include("z_dbvars.php");
	$padded_tk = tk_pad($tkid);
	$photofile = $padded_tk."_profile.jpg";

	if ($classified == 1) {
		$first_name = "[CLASSIFIED]";
		$full_name = "[CLASSIFIED]";
		$photofile = "zz_blanktn.jpg";
	}

	$joined_date = $row['joined_date'];
	$membership_days = $row['membership_days'];
	$membership_years = floor($membership_days/365);
	
	echo "<h1>$first_name's Profile</h1>

<table cellpadding=10 cellspacing=0 border=0>
	<tr>
	";
	if (file_exists("rosterimg/$photofile")) {
		echo "		<td rowspan=2 valign=top width=180><img src=\"rosterimg/$photofile\" style=\"border: 3px double #1f5883;\"></td>";
	} else {
		echo "		<td rowspan=2 valign=top width=180><img src=\"rosterimg/zz_blanktn.jpg\"></td>";
	}

	echo "		<td valign=top width=\"100%\">
				<b>Operating #:</b> $tkid<br>
				<b>Name:</b> $full_name<br>
				<b>Location:</b> $city, $state_name<br>
				<b>Member Since:</b> $joined_date<br>
	";

	if ($role_id != 1) {
		echo "			<br><b><i>$role_name</i></b>
";
	}
	echo "
	<br><br>
			<b>Years of Service<b><br>
";

// ****************** YEARS OF SERVICE SUBROUTINE ******************

	switch ($membership_years) {
		default:
			for ($a = 1; $a <= $membership_years; $a++) {
				echo "<img src=\"img/year_1.png\" style=\"vertical-align: middle\">";
			}
			break;
		case 0:
			echo  "<img src=\"img/year_0.png\" style=\"vertical-align: middle\">";
			break;
		case ($membership_years > 10):
			$membership_remainder = $membership_years - 10;
			echo "<img src=\"img/year_10.png\" style=\"vertical-align: middle\">";
			for ($a = 1; $a <= $membership_remainder; $a++) {
				echo "<img src=\"img/year_1.png\" style=\"vertical-align: middle\">";
			}
			break;
		case ($membership_years > 5 && $membership_years < 10):
			$membership_remainder = $membership_years - 5;
			echo "<img src=\"img/year_5.png\" style=\"vertical-align: middle\">";
			for ($a = 1; $a <= $membership_remainder; $a++) {
				echo "<img src=\"img/year_1.png\" style=\"vertical-align: middle\">";
			}
			break;
		case 10:
			echo "<img src=\"img/year_10.png\" style=\"vertical-align: middle\">";
			break;
	}

// **************** END YEARS OF SERVICE SUBROUTINE ****************
echo "
		</td>
	</tr>
	<tr>
		<td colspan=2>
";

        echo "
        <br><br>
                        <b>Tours of Duty<b><br>
";

// ****************** NUMBER OF EVENTS SUBROUTINE ******************
	$num_events_query = $conn->query("
		select event_participation_id, is_active
		from event_participation, events
		where trooper_id = '$trooper_id'
		and event_participation.event_id = events.event_id
		and is_active = 1
		");
	
	$num_events = mysql_num_rows($num_events_query);

	switch ($num_events) {
		case $num_events > 24 && $num_events < 50:
			$num_event_cat = 25;
			break;

                case $num_events > 49 && $num_events < 75:
                        $num_event_cat = 50;
                        break;

                case $num_events > 74 && $num_events < 100:
                        $num_event_cat = 75;
                        break;

		case $num_events > 99 && $num_events < 150:
			$num_event_cat = 100;
			break;

		case $num_events > 149 && $num_events < 200:
			$num_event_cat = 150;
			break;

		case $num_events > 199 && $num_events < 300:
			$num_event_cat = 200;
			break;

                case $num_events >299 && $num_events < 400:
                        $num_event_cat = 300;
                        break;

                case $num_events > 399 && $num_events < 500:
                        $num_event_cat = 400;
                        break;

                case $num_events > 499 && $num_events < 600:
                        $num_event_cat = 500;
                        break;

                case $num_events > 599 && $num_events < 700:
                        $num_event_cat = 600;
                        break;

                case $num_events > 699 && $num_events < 800:
                        $num_event_cat = 700;
                        break;

                case $num_events > 799 && $num_events < 900:
                        $num_event_cat = 800;
                        break;

                case $num_events > 899 && $num_events < 1000:
                        $num_event_cat = 900;
                        break;

                case $num_events > 999 && $num_events < 1100:
                        $num_event_cat = 1000;
                        break;
	}
	
	if ($num_events > 24) {
		echo "<img src=\"img/svc_" . $num_event_cat . ".png\" width=100 height=100 alt=\"" . $num_event_cat . " events completed\">";
	}
// **************** END NUMBER OF EVENTS SUBROUTINE ****************


echo "		</td>
	</tr>
</table>
";

}
echo "<P>
";

?>
<P>
<center>
<table cellpadding=0 cellspacing=10 border=0 width="100%">
	<tr>
		<td valign=top width="50%" align=center><h1> <? echo $first_name . "'s costume";
		if ($costume_qty > 1) {
			echo "s";
		}
		echo ":";
		?> </h1>
<?
while ($row=$trooper_costumes->fetch_assoc()) {
	include ("z_dbvars.php");
		$filename = $padded_tk . $costume_abbr . "_" . $outfit_variant . ".jpg";
		if (file_exists("rosterimg/$filename")) {
			echo "<img src=\"rosterimg/imgresize.php/$filename?resize(210)\" style=\"border: 1px #000 solid\"><br>$costume_name<br><br>";
		} else {
			echo"<img src=\"rosterimg/zz_blankcostume.jpg\" width=210><br>$costume_name<br>";
		}
}
?>
		</td>

		<td valign=top width="50%">
			<div style="text-align: center;">
			<h1>Tours of Duty</h1>
			<?
				echo "($total_events";
				if ($total_events == 1) {
					echo " event";
				} else {
					echo " events";
				}
				echo " completed on record)";
			?>
			</div>
			<b>Color Key:</b><br />
			<div style="color: <?php echo $part_501st; ?>">501st-Approved Costume</div>
			<div style="color: <?php echo $part_non501st; ?>;">Non-501st-Approved Costume</div>
			<div style="color: <?php echo $part_ncs; ?>;">Non-costumed Support</div>


			<table cellpadding=0 cellspacing=5>
<?
$year_check = 0;
while ($row2 = $events_sql->fetch_assoc()) {
	$event_date = $row2['event_date'];
	$event_year = $row2['event_year'];
	$event_name = $row2['event_name'];
	$event_city = $row2['event_city'];
	$event_state = $row2['event_state'];
	$formatted_date = $row2['formatted_date'];
	$participation_role_id = $row2['participation_role_id'];
	
	if ($event_year != $year_check) {
		echo "				<tr><td colspan=3><h3>$event_year</h3></td></tr>";
	}
	
	// *** DETERMINE EVENT ROLE COLOR ***
	// Identify by color whether the member participated in this event in
	// a 501st-approved costume, a non-501st costume (Rebel Legion,
	// superhero, etc.), or served as NCS
	
	switch ($participation_role_id) {
		case 1:
			$participation_role_color = $part_501st;
			break;
		case 2:
			$participation_role_color = $part_non501st;
			break;
		case 3:
			$participation_role_color = $part_ncs;
			break;
	}
	
	echo "				<tr>
					<td width=75 valign=top style=\"border-bottom: 1px dashed #7ba3bd; color: $participation_role_color;\">$formatted_date</td>
					<td width=230 valign=top style=\"border-bottom: 1px dashed #7ba3bd; color: $participation_role_color;\">$event_name</td>
					<td width=125 valign=top style=\"border-bottom: 1px dashed #7ba3bd; color: $participation_role_color;\">$event_city, $event_state</td>
				</tr>
";
	$year_check = $event_year;

	}
?>
			</table>
		</td>
	</tr>
</table>
</center>
<p align=right><a href="roster.php"><img src="img/back_arrow.png"border=0> Back</a></p>

