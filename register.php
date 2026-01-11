<?php
include "db.php";
if ($_POST) {
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users(username,password) VALUES('$u','$p')");
    header("Location: login.php");
}
?>
<form method="POST">
<input name="username" placeholder="Hero Name">
<input type="password" name="password">
<button>Register</button>
</form>
