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

<?php
include_once ('../z_dbaccess.php');
include_once ('../z_dbconnect.php');
include_once ('../z_functions.php');
?>
<a href="index.php">Back to Main Admin Screen</a>
<hr size=1>
<P>