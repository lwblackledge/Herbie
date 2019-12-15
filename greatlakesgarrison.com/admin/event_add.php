<?
// ADD EVENT
include ('admin_header.php');
?>

<form method="post" action="event_add_process.php">
<table cellpadding=0 cellspacing=10 border=0>
	<tr>
		<td width=300>
			Event Name:
			<br>
			<span style="font-size: 8pt;">For private events, enter the nature of the event.  For example, "Child's Birthday Party" or "Wedding".</span>
		</td>
		<td valign="top">
			<input type="text" name="event_name" size=40>
		</td>
	</tr>
	<tr>
		<td width=300>
			Event Date:
		</td>
		<td>
			Month:
			<select name="event_date_month">
			<?
				for ($a = 1;$a < 13;$a++) {
					echo "				<option value=\"$a\">$a</option>
";
				}
			?>
			</select>
			Day:
			<input type="text" maxlength=2 size=3 name="event_date_day">
			
			Year:
			<select name="event_date_year">
<?
	$select_year = date("Y");
	include ('event_year_list.php');
?>
			</select>
		</td>
	</tr>
	<tr>
		<td width=300 valign=top>
			Event Description:<br>
			<span style="font-size: 8pt;">Enter a brief, one to three sentence summary of the event that is <u>suitable for displaying on the main page</u>.
            This is a high-level-overview field, not an explicit explanation.</span>
		</td>
		<td>
			<textarea name="event_description" cols=30 rows=10></textarea>
		</td>
	</tr>
	<tr>
		<td width=300>
			City:
		</td>
		<td>
			<input type="text" name="event_city" size=30>
		</td>
	</tr>
	<tr>
		<td width=300>
			State:
		</td>
		<td>
			<input type="text" name="event_state" size=10 value="MI">
		</td>
	</tr>
	<tr>
		<td width=300>
			Postal Code:
		</td>
		<td>
			<input type="text" name="event_postcode" size=10 />
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
			<input type="text" name="forum_topic_id" size=4>
		</td>
	</tr>
	<tr>
		<td width=300>
			Private event?:<br>
			<span style="font-size: 8pt">If set to "yes", specific details of the event will not be shown in the public areas of the Web site.  Examples include children's birthday parties and weddings, where the only displayed information will be the event name, date, and location.</span>
		</td>
		<td valign=top>
			<input type="radio" name="is_private" value="1"> Yes ||
			<input type="radio" name="is_private" value="0" checked> No
		</td>
	</tr>
</table>
<input type="submit" value="Add event">  <input type="reset">
</form>

<? include ('admin_footer.php'); ?>