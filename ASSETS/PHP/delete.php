<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['utilisateur_id'])) {
    header('Location: ../../index.php');
    exit();
}
include '../../DATABASE/db.php';
$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE `id` = ?');
$stmt->execute([$_SESSION['utilisateur_id']]);
$utilisateur = $stmt->fetch();

$stmt2 = $pdo->prepare('SELECT * FROM hiking WHERE `id` = ?');
$stmt2->execute([$params['id']]);
$hikingUpdate = $stmt2->fetch();

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
        <form action="CORE/exec_delete.php" method="post">
            <input type="hidden" name="id" value="<?= $params['id'] ?>">
            <input type="submit" value="Comfirmez la suppression">
        </form>
        <a href="../../espaces_randonnees.php"><button class="button-logout">Annuler la suppression</button></a>
    </div>
    <footer>
        <h3 id="footer">PROJET 4 | [By @Edwyn-Dev]</h3>
    </footer>
</body>

</html>