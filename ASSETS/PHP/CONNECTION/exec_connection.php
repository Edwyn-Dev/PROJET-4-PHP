<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../../../DATABASE/db.php';

// Récupére les données du formulaire
$identifiant = $_POST['identifiant'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérifie les informations d'identification
$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE `name` = ? OR `email` = ?');
$stmt->execute([$identifiant, $identifiant]);
$utilisateur = $stmt->fetch();

if ($utilisateur && $utilisateur['password'] === $mot_de_passe) {
    $_SESSION['utilisateur_id'] = $utilisateur['id'];
    header('Location: ../../../espaces_randonnees.php');
    exit();
} else {
    $_SESSION['error'] = 'Identifiants incorrects.';
    header('Location: ../../../connexion.php');
    exit();
}
?>