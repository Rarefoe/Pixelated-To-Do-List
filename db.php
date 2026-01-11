<?php
$conn = new mysqli("localhost", "root", "", "questlog");
if ($conn->connect_error) {
    die("Connection failed");
}
?>
