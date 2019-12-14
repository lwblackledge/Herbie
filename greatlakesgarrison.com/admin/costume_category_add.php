<?php include_once ("admin_header.php"); ?>

<h1>Add Costume Category</h1>

<form action="costume_category_add_process.php" method="post">
<table cellpadding=10 cellspacing=0 border=0>
	<tr>
		<td>
			Category Abbreviation:
		</td>
		<td>
			<input type="text" size=10 maxlength="2" name="costcat">
		</td>
	</tr>
	<tr>
		<td>
			Category Name:
		</td>
		<td>
			<input type="text" size=20 name="costname">
		</td>
	</tr>
</table>
<input type="submit" value="Add"> || <input type="reset">
</form>

<?php include_once ("admin_footer.php"); ?>