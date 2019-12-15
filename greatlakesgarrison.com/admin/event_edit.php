<?
// EDIT EVENT
include ('admin_header.php');

$event_id_selected = $_POST['event_list'];
echo $event_id_selected . "<P>";
$event_query = mysql_query("
	select event_id, event_name, event_description, event_date, event_city, event_state, event_postcode, forum_topic_id, is_private, is_active,
		month(event_date) as event_month, day(event_date) as event_day, year(event_date) as event_year
	from events
	where event_id = $event_id_selected
");

$check_campaign = mysql_query("
	select *
	from event_awards
	where event_id = $event_id_selected
	");
	
$is_campaign = mysql_num_rows($check_campaign);

while ($row = mysql_fetch_array($event_query)) {
	include ('../z_dbvars.php');
	$event_month = $row['event_month'];
	$event_day = $row['event_day'];
	$event_year = $row['event_year'];

	if ($forum_topic_id == 0) {
		$forum_topic_id = null;
	}
	
	echo '
<form method="post" action="event_edit_process.php">
<table cellpadding=0 cellspacing=10 border=0>
	<tr>
		<td width=300>
			Event Name:
			<br>
			<span style="font-size: 8pt;">For private events, enter the nature of the event.  For example, "Child\'s Birthday Party" or "Wedding".</span>
		</td>
		<td valign="top">
			<input type="text" name="event_name" size=40 value="'.$event_name.'">
		</td>
	</tr>
	<tr>
		<td width=300>
			Event Date:
		</td>
		<td>
			Month:
			<select name="event_date_month">
';

				for ($a = 1;$a < 13;$a++) {
					echo "				<option value=\"$a\"";
					
					if ($a == $event_month) {
						echo " selected";
					}
					echo ">$a</option>
";
				}

	echo '
			</select>
			Day:
			<input type="text" maxlength=2 size=3 name="event_date_day" value="'.$event_day.'">
			
			Year:
			<select name="event_date_year">
';
	$select_year = $event_year;
	include ("event_year_list.php");
	
	echo '
			</select>
		</td>
	</tr>
	<tr>
		<td width=300 valign=top>
			Event Description:<br>
			<span style="font-size: 8pt;">Enter a brief, one to three sentence summary of the event.  This is a high-level-overview field, not an explicit explanation.</span>
		</td>
		<td>
			<textarea name="event_description" cols=30 rows=10>'.$event_description.'</textarea>
		</td>
	</tr>
	<tr>
		<td width=300>
			City:
		</td>
		<td>
			<input type="text" name="event_city" size=30 value="'.$event_city.'">
		</td>
	</tr>
	<tr>
		<td width=300>
			State:
		</td>
		<td>
			<input type="text" name="event_state" size=10 value="'.$event_state.'">
		</td>
	</tr>
	<tr>
		<td width=300>
			Postal Code:
		</td>
		<td>
			<input type="text" name="event_postcode" size=10 value="'.$event_postcode.'">
		</td>
	</tr>
	<tr>
		<td width=300>
			Forum topic ID (<i>optional</i>):<br>
			<span style="font-size: 8pt">http://www.greatlakesgarrison.com/forum/viewtopic.php?f=4&<span style="font-weight: bold; text-decoration: underline; color: #ff0000">t=21</span>
			<br><br>
			Entering an ID here will enable an automatic link to the specific forum topic wherever the tour of duty is displayed.  Click
			<a href="http://www.greatlakesgarrison.com/forum" target="_new">here</a> to check the forum for the topic ID (opens in new window).
			</span>
		</td>
		<td valign=top>
			<input type="text" name="forum_topic_id" size=4 value="'.$forum_topic_id.'">
		</td>
	</tr>
	<tr>
		<td width=300>
			Private event?:<br>
			<span style="font-size: 8pt">If set to "yes", specific details of the event will not be shown in the public areas of the Web site.  Examples include children\'s birthday parties and weddings, where the only displayed information will be the event name, date, and location.</span>
		</td>
		<td valign=top>
';
		switch ($is_private) {
			case 1:
				echo '			<input type="radio" name="is_private" value="1" checked> Yes ||
			<input type="radio" name="is_private" value="0"> No
';
				break;
			case 0:
				echo '			<input type="radio" name="is_private" value="1"> Yes ||
			<input type="radio" name="is_private" value="0" checked> No
';
				break;
		}			
echo "
		</td>
	</tr>
	<tr>
		<td width=300>
			Event is active?:<br>
			<span style=\"font-size: 8pt\">Select \"yes\" is the event is still a go.  Select \"no\" if the event is cancelled.</span>
		</td>
		<td valign=top>
			<input type=\"radio\" name=\"is_active\" value=\"1\" checked> Yes ||
			<input type=\"radio\" name=\"is_active\" value=\"0\"> No
		</td>
	</tr>
</table>
<input type=\"hidden\" value=\"".$event_id_selected."\" name=\"event_id\">
<input type=\"submit\" value=\"Edit event\">  <input type=\"reset\">
||
";

if ($is_campaign != 0) {
	while ($camp = mysql_fetch_array($check_campaign)) {
		$event_file = $camp['event_file'];
		$campaign_active = $camp['campaign_active'];
		
		if ($campaign_active == 1) {
			echo "<img src=\"/img/$event_file\"> (<a href=\"event_campaign_edit.php?id=$event_id_selected&mode=subtract\">Deactivate campaign</a>)";
		} else {
			echo "<img src=\"/img/$event_file\"> <span style=\"color: #ff0000; font-weight: bold\">Deactivated campaign.</span> <a href=\"event_campaign_edit.php?id=$event_id_selected&mode=reactivate\">Click to reactivate as campaign</a>
	";
		}
	}
} else {
	echo "
		<a href=\"event_campaign_edit.php?id=$event_id_selected&mode=add\">Add as a campaign</a>
	";
}

echo"
</form>
";
}
include ('admin_footer.php');

?>