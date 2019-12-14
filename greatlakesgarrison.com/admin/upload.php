<?
include ('admin_header.php');
?>

<form action="image_upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
Files will be uploaded to the "rosterimg" directory and any file with identical names will be automatically overwritten.
<P>
Select files: <br>
<input name="ufile[]" type="file" id="ufile[]" size="50" />
<P>
<input name="ufile[]" type="file" id="ufile[]" size="50" />
<P>
<input name="ufile[]" type="file" id="ufile[]" size="50" />
<P>

<input type="submit" name="Submit" value="Upload" /> <input type="reset" value="Clear">

</form>

<? include ('admin_footer.php'); ?>