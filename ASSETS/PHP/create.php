<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['utilisateur_id'])) {
    header('Location: ../../index.php');
    exit();
}
include '../../DATABASE/db.php';

$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE `id` = ?');
$stmt->execute([$_SESSION['utilisateur_id']]);
$utilisateur = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJET 4</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <header>
        <h1 id="header">
            <img src="../IMG/icone.png">
            RANDON<i>NET</i>
            <img src="../IMG/icone.png">
        </h1>
    </header>
    <div class="container">
        <h2>Bonjour, <?php echo $utilisateur['name']; ?></h2>
        <form action="CORE/exec_create.php" method="post">
            <label for="difficulty">Difficultée</label>
            <select name="difficulty" id="difficulty" required>
                <option value="très facile">Très-Facile</option>
                <option value="facile">Facile</option>
                <option value="moyen">Moyen</option>
                <option value="difficile">Difficile</option>
                <option value="très difficile">Très-Difficile</option>
            </select>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom du randonneur" required>
            <label for="distance">Distances (en Km)</label>
            <input type="number" name="distance" id="distance" placeholder="Distance en Kilométres" required>
            <label for="duration">Durées</label>
            <input type="time" name="duration" id="duration" placeholder="Durée en Heures/Minutes" required>
            <label for="height_difference">Dénivelés (en M)</label>
            <input type="number" name="height_difference" id="height_difference" placeholder="Dénivelé en Métres"
                required>
            <input type="submit" value="Valider la création">
        </form>
        <a href="../../espaces_randonnees.php"><button class="button-logout">Annuler la création</button></a>
    </div>
    <footer>
        <h3 id="footer">PROJET 4 | [By @Edwyn-Dev]</h3>
    </footer>
</body>

</html>