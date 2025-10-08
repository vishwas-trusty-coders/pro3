<?php
session_start();
include "config/db.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: src/auth/login.php");
    exit;
}
?>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<a href="src/auth/logout.php">Logout</a>