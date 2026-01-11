<?php
include "db.php";

$quests = $conn->query("SELECT * FROM quests");
$player = $conn->query("SELECT * FROM player WHERE id=1")->fetch_assoc();
$xp = $player['xp'];
$level = $player['level'];
$xpPercent = min(($xp % 100), 100);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quest Log</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="main-header">
    <h2 class="pixe">QUEST LOG</h2>

    <div class="xp-hud">
        <span>LVL <?= $level ?></span>
        <div class="xp-bar">
            <div class="xp-fill" style="width: <?= $xpPercent ?>%"></div>
        </div>
    </div>
</header>

<section class="quest-scroll">
    <h2>📜 Active Quests</h2>

    <form action="addQuest.php" method="POST">
        <input type="text" name="title" placeholder="New Quest..." required>
        <button>Add Quest</button>
    </form>

    <ul class="quest-list">
        <?php while($q = $quests->fetch_assoc()): ?>
            <li>
                <?= $q['completed'] ? "✔" : "☐" ?>
                <?= $q['title'] ?>

                <?php if(!$q['completed']): ?>
                    <a href="completeQuest.php?id=<?= $q['id'] ?>">[Complete]</a>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</section>

<audio id="achievementSound" src="sounds/achievement.wav"></audio>

<?php if($xp >= 100): ?>
<script>
    document.getElementById("achievementSound").play();
    alert("🏆 Achievement Unlocked: Level Up!");
</script>
<?php endif; ?>

</body>
</html>
