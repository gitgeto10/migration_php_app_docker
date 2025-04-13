<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, address, city, date_of_birth) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['city'],
        $_POST['date_of_birth']
    ]);
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Ajouter un utilisateur</h2>
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Prénom</label><input name="first_name" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label>Nom</label><input name="last_name" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label>Email</label><input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Téléphone</label><input name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Adresse</label><input name="address" class="form-control">
        </div>
        <div class="form-group">
            <label>Ville</label><input name="city" class="form-control">
        </div>
        <div class="form-group">
            <label>Date de naissance</label><input type="date" name="date_of_birth" class="form-control">
        </div>
        <button class="btn btn-primary">Ajouter</button>
    </form>
</body>
</html>
