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
$difficulty = $_POST['difficulty'];
$nom = $_POST['nom'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];

$stmt = $pdo->prepare("INSERT INTO hiking 
(name, difficulty, distance, duration, height_difference)
VALUES
(:name, :difficulty, :distance, :duration, :height_difference)");

$stmt->execute([
    'name' => $nom,
    'difficulty' => $difficulty,
    'distance' => $distance,
    'duration' => $duration,
    'height_difference' => $height_difference,
]);

header('Location: ../../../espaces_randonnees.php');
exit();
?>