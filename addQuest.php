<?php
include "db.php";

$title = $_POST['title'];
$conn->query("INSERT INTO quests (title) VALUES ('$title')");

header("Location: dashboard.php");
