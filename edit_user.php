<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

$id = $_GET['id'];
$user = $pdo->query("SELECT * FROM users WHERE id = $id")->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE users SET first_name=?, last_name=?, email=?, phone=?, address=?, city=?, date_of_birth=? WHERE id=?");
    $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['city'],
        $_POST['date_of_birth'],
        $id
    ]);
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Modifier l'utilisateur</h2>
    <form method="POST">
        <input name="first_name" value="<?= $user['first_name'] ?>" class="form-control mb-2" required>
        <input name="last_name" value="<?= $user['last_name'] ?>" class="form-control mb-2" required>
        <input name="email" value="<?= $user['email'] ?>" class="form-control mb-2" required>
        <input name="phone" value="<?= $user['phone'] ?>" class="form-control mb-2">
        <input name="address" value="<?= $user['address'] ?>" class="form-control mb-2">
        <input name="city" value="<?= $user['city'] ?>" class="form-control mb-2">
        <input type="date" name="date_of_birth" value="<?= $user['date_of_birth'] ?>" class="form-control mb-3">
        <button class="btn btn-warning">Mettre à jour</button>
    </form>
</body>
</html>
