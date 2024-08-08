<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['utilisateur_id'])) {
    header('Location: ../../../index.php');
    exit();
}
include '../../../DATABASE/db.php';

// Récupère les données du formulaire
$id = $_POST['id'];
$stmt = $pdo->prepare("DELETE FROM hiking WHERE id=:id");
$stmt->execute(['id' => $id]);

header('Location: ../../../espaces_randonnees.php');
exit();
?>