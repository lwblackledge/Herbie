<?php

$conn = new mysqli("example.com", "user", "password", "database");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

?>
