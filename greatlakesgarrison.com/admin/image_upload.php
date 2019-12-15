<?
include ('admin_header.php');

echo "File upload results:<P>";
//set where you want to store files
//in this example we keep file in folder upload
//$HTTP_POST_FILES['ufile']['name']; = upload file name
//for example upload file name cartoon.gif . $path will be upload/cartoon.gif
$path1= "../rosterimg/".$HTTP_POST_FILES['ufile']['name'][0];
$path2= "../rosterimg/".$HTTP_POST_FILES['ufile']['name'][1];
$path3= "../rosterimg/".$HTTP_POST_FILES['ufile']['name'][2];

//copy file to where you want to store file
copy($HTTP_POST_FILES['ufile']['tmp_name'][0], $path1);
copy($HTTP_POST_FILES['ufile']['tmp_name'][1], $path2);
copy($HTTP_POST_FILES['ufile']['tmp_name'][2], $path3);

$filename1 = $HTTP_POST_FILES['ufile']['name'][0];
$filename2 = $HTTP_POST_FILES['ufile']['name'][1];
$filename3 = $HTTP_POST_FILES['ufile']['name'][2];

$filesize1 = $HTTP_POST_FILES['ufile']['size'][0];
$filesize2 = $HTTP_POST_FILES['ufile']['size'][1];
$filesize3 = $HTTP_POST_FILES['ufile']['size'][2];

$filetype1 = $HTTP_POST_FILES['ufile']['type'][0];
$filetype2 = $HTTP_POST_FILES['ufile']['type'][1];
$filetype3 = $HTTP_POST_FILES['ufile']['type'][2];

echo "File Name: " . $filename1 . "<BR/>";
echo "File Size: " . $filesize1 . "<BR/>";
echo "File Type: " . $filetype2 . "<BR/>";
echo "<img src=\"$path1\">";
echo "<P>";

if ($filename2 != null) {
	echo "File Name: ".$HTTP_POST_FILES['ufile']['name'][1]."<BR/>";
	echo "File Size: ".$HTTP_POST_FILES['ufile']['size'][1]."<BR/>";
	echo "File Type: ".$HTTP_POST_FILES['ufile']['type'][1]."<BR/>";
	echo "<img src=\"$path2\">";
	echo "<P>";
}

if ($filename3 != null) {
	echo "File Name: ".$HTTP_POST_FILES['ufile']['name'][2]."<BR/>";
	echo "File Size: ".$HTTP_POST_FILES['ufile']['size'][2]."<BR/>";
	echo "File Type: ".$HTTP_POST_FILES['ufile']['type'][2]."<BR/>";
	echo "<img src=\"$path3\">";
}

include ('admin_footer.php');
?>