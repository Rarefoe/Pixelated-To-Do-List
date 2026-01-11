<?php
include "db.php";

$id = $_GET['id'];

$conn->query("UPDATE quests SET completed=1 WHERE id=$id");
$conn->query("UPDATE player SET xp = xp + 20 WHERE id=1");

$player = $conn->query("SELECT * FROM player WHERE id=1")->fetch_assoc();

if ($player['xp'] >= 100) {
    $conn->query("UPDATE player SET level = level + 1, xp = xp - 100 WHERE id=1");
}

header("Location: dashboard.php");
