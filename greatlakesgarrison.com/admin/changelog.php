<style>
<!--
.changelog	{
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	}
//-->
</style>
<?
// GLG Admin Utility
// Change Log
$version[] = "0.11";
$release_date[] = "6/2/12";
$notes[] = "Added \"Featured Trooper of the Month\" add/edit capability. <P>Updated files: ftotm_add.php, ftotm_add_process.php, ftotm_edit_select.php, ftotm_edit.php, ftotm_edit_process.php";

$version[] = "0.10";
$release_date[]= "4/18/12";
$notes[] = "Added costume category addition ability for new costume categories. <P>Updated files: index.php, costume_category_add.php, costume_category_add_process.php";

$version[] = "0.09";
$release_date[] = "12/25/10";
$notes[] = "Changed unit-specific information in admin utility to dynamic references to a config page for better portability.<P>Updated files: index.php, admin_header.php, admin_menu.php, config.php (new file)";

$version[] = "0.08";
$release_date[] = "11/8/10";
$notes[] = "Added inactive member report.  Added pass-through function to edit participation role after adding ToD members to events. Corrected variable bug in activity report.  
<P>Updated files: rpt_inactive_members.php, tod_addtoevent_process.php, activity_report.php";

$version[] = "0.07";
$release_date[] = "10/4/10";
$notes[] = "Added active member report, sortable by TKID or last name<P>Updated files: rpt_active_member.php";

$version[] = "0.06";
$release_date[] = "6/28/09";
$notes[] = "Added ability to deactivate and reactivate events as campaigns, and to indicate which events are already listed as campaigns.
Campaign report added.
<P>Updated files: event_edit.php, event_campaign_edit.php, roster_awards.php, rpt_campaigns.php";

$version[] = "NA";
$release_date[] = "12/6/08";
$notes[] = "Deactivated image upload due to unknown problem, possibly with authentication and permission";

$version[] = "0.05";
$release_date[] = "11/22/08";
$notes[] = "Completed ability to render a record classified. <P>Updated files: mem_stats.php, all applicable roster files.";

$version[] = "0.04";
$release_date[] = "7/29/08";
$notes[] = "Added ability to remove members from an event both by event and by member. Updated index menu to reflect changes.<P>Updated files: index.php, tod_addtoevent.php, tod_addtomember.php, tod_removefromevent_process.php";

$version[] = "0.03";
$release_date[] = "7/10/08";
$notes[] = "Added image upload capability.<P>Updated files: index.php, upload.php, image_upload.php";

$version[] = "0.02";
$release_date[] = "6/11/08";
$notes[] = "Created reports to split costume types, and list of members who own those costumes.
<P>Updated files: index.php, rpt_costume_type.php, rpt_costume_display.php";

$version[] = "0.01";
$release_date[] = "6/3/08";
$notes[] = "Modified costume_edit.php to include activation/deactivation of previously added costumes in roster_outfit table.
 Created costumes_edit_active.php as the processor. Built changelog.php to track updates, with include on index page. Included
 version info in index.php.
<P>Updated files: costumes_edit.php, costumes_edit_active.php, changelog.php, index.php";

$version[] = "0.00";
$release_date[] = "4/30/08";
$notes[] = "Initial dev release";

$curr_version = $version[0];
?>

<table border=1 cellpadding=5>
	<tr>
		<th width=20>Version</th>
		<th width=20>Date</th>
		<th width=300>Notes</th>
	</tr>

<?
for ($a=0; $a < sizeof($version); $a++) {
	echo "
	<tr>
		<td valign=top width=20 class=\"changelog\">
			$version[$a]
		</td>
		<td valign=top width=20 class=\"changelog\">
			$release_date[$a]
		</td>
		<td valign=top width=300 class=\"changelog\">
			$notes[$a]
		</td>
	</tr>
	";
}
?>
</table>
