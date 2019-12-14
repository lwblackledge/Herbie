<?php 
include_once ("z_dbaccess.php");
include_once ("z_dbconnect.php");
include_once ("scripts/functions.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/01.css?<?php echo filectime('css/01.css'); ?>" type="text/css">
<link rel="icon" type="image/png" href="img/favicon.png">
<style media="all" type="text/css">@import "menu/menu_style.css?<?php echo filectime('menu/menu_style.css'); ?>";</style>
<title>Michigan 501st</title>
</head>

<body background="img/starfield.jpg" bgcolor="#000000">
<center>
	<div class="superoutside">
		<div id="header">

<?php
	if ($april_fools == 1) {
		echo "		<img src=\"img/header_logo.png\" border=0 /> <img src=\"img/subtitle_401.png\" border=0/>";
	} else {
		echo "		<img src=\"img/header_logo.png\" border=0 /> <img src=\"img/subtitle.png\" border=0/>";
	}
?>

			<div style="float: right; width: 147px; height: 200px; margin-top: 10px;">
				<!--img src="img/glgx5_180.png" width=147 height=180-->
			</div>
		</div>
    <a href="https://www.facebook.com/pages/Great-Lakes-Garrison/209654639056514"><img src="img/icon_fb.png" border=0/></a></li>
    <a href="http://www.twitter.com/mi501st"><img src="img/icon_tw.png" border=0 /></a></li>
		<?php include ("menu.php"); ?>

		<div class="content">