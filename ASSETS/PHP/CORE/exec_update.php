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
$difficulty = $_POST['difficulty'];
$nom = $_POST['nom'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];

$stmt = $pdo->prepare("UPDATE hiking SET 
difficulty=:difficulty,
name=:nom,
distance=:distance,
duration=:duration,
height_difference=:height_difference
WHERE id=:id");

$stmt->execute([
    'difficulty' => $difficulty,
    'nom' => $nom,
    'distance' => $distance,
    'duration' => $duration,
    'height_difference' => $height_difference,
    'id' => $id
]);

header('Location: ../../../espaces_randonnees.php');
exit();
?>