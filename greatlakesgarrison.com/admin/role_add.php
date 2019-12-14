<? include ('admin_header.php'); ?>

<form action="role_process.php" method="post">

<table cellpadding=0 cellspacing=0 border=0>
	<tr>
		<td valign=top>
			Role name:
		</td>
		<td>
			<input type="text" size=30 name="role_name">
		</td>
	</tr>
	<tr>
		<td valign=top>
			Role Abbreviation:
		</td>
		<td>
			<input type="text" size=10 name="role_abbr">
		</td>
	</tr>
</table>

<input type="Submit" value="Add..."> * <input type="reset">

</form>

<? include ("admin_footer.php"); ?>