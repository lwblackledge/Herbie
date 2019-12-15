<?php
include ("config.php");
?>
<html>
<head>
<title><?php echo $unit_abbrev; ?> Admin Utility</title>
</head>
<body>
<div id="heading"><div style="float: left"><img src="nofrills.png"></div><h1>The <?php echo $unit_name; ?><br>"NO FRILLS"
CONTROL PANEL</h1></div>
<br>
<hr size=1>
<P>
<h2>Member Management</h2>
	<ul>
		<li> <a href="member_add_form.php">Add new member</a> - Add a new member record to the GLG database.
		<!--li> <a href="upload.php">Upload member photos</a-->
		<li> <a href="search_member.php?lookup=member_edit_form">Edit member</a> - Edit a member record, including assigning roles and changing status.
		<li> <a href="search_member.php?lookup=costumes_edit">Edit member's costumes</a> - Add or remove costumes from a member's profile.
			<ul>
				<li> <a href="costume_category_add.php">Add Costume Category</a> - Add new categories of costumes as they become accepted in the 501st.
				<li> Add variant to member's costume - some categories allow for multiple costume types.
			</ul>
		<li> <b>Officer Roles</b>
			<ul>
				<li> <a href="role_add.php">Add new role</a> - Add new roles (ex. CO, XO, etc.) to database.
				<li> <a href="role_edit.php">Edit existing role</a> - Edit custom roles in database, beyond those required by the 501st.
			</ul>
		<li> <b>Featured Trooper of the Month</b>
			<ul>
				<li> <a href="ftotm_add.php">Add new entry</a>
				<li> <a href="ftotm_edit_select.php">Edit existing entry</a>
			</ul>

	</ul>


	
<h2>Event Management</h2>
	<ul>
		<li> <a href="event_add.php">Add event</a> - Add a new event to the list of events.
		<li> <a href="event_search.php?type=event_edit">Edit event information</a> - Edit the details of existing events, including
			any donation recipients and totals raised.
		<li> Manage TODs
			<ul>
				<li> <a href="event_search.php?type=tod_addtoevent">Add/remove member to event participation list</a>
				<li> <a href="search_member.php?lookup=tod_addtomember">Add/remove event to member's record</a>
				<li> <a href="event_search.php?type=tod_editrole">EDIT member's role at event</a>
			</ul>
	</ul>

<!--h2>Donation Organization Management (still in development; do not use)</h2>
	<ul>
		<li> <a href="chcomm_add.php">Add charity/community organization</a> -- Enter contact information for charities, community
			organizations, etc.
		<li> <a href="chcomm_edit.php">Edit charity/community organization</a>
	</ul-->

<h2>Reports</h2>
	<ul>
		<li> <b>Members</b>
			<ul>
				<li> <a href="rpt_active_members.php">All active members</a>
				<li> <a href="rpt_inactive_members.php">All <b><I>inactive</i></b> members</a>
				<li> <a href="search_member.php?lookup=rpt_demog">Demographic info (individual)</a>
				<li> <a href="activity_report.php">Borderline Activity Report</a> - Members within 30 days of inactivity and members over one year since last activity
				<li> <a href="rpt_roles.php">Officers</a>
				<li> <a href="rpt_costume_type.php">Costume distribution</a>
			</ul>
		<li> Trooping Activity
			<ul>
				<li> <a href="rpt_by_location.php">By Location</a>
			</ul>
		<li> Donation tracking
	</ul>

<? include ('admin_menu.php'); ?>

<? include ("changelog.php");
$this_day = date("n/d/Y");

echo "Admin Utility version: $curr_version<br>" . $this_day;
if ($this_day == "01/19/12") {
	echo " - It's the 19th of January";
}
?>

</body>
</html>