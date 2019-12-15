<?php

$mysqli = null;
try {
    $mysqli = new mysqli($host, $uname, $keycard, $db_name);
} catch (Error $e) {
    print($e);
    die("Can't  find the database.  Sorry.");
}

?>
