<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
include 'db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);
header("Location: users.php");
