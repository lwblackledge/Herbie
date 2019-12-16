<?php

$conn = new mysqli($db_host, $uname, $keycard, $db_name);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

?>
