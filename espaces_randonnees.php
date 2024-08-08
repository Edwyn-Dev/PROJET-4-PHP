<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['utilisateur_id'])) {
    header('Location: index.php');
    exit();
}
include 'ASSETS/PHP/INCLUDE/header.php';
include 'DATABASE/db.php';
$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE `id` = ?');
$stmt->execute([$_SESSION['utilisateur_id']]);
$utilisateur = $stmt->fetch();

$stmt2 = $pdo->prepare('SELECT * FROM hiking');
$stmt2->execute();
$randonnees = $stmt2->fetchAll();

?>
<h2>Bonjour, <?php echo $utilisateur['name']; ?></h2>
<a href="ASSETS/PHP/CONNECTION/exec_logout.php"><button class="button-logout">SE DÉCONNECTER</button></a>
<table class="container-randos">
    <thead>
        <tr>
            <th scope="col">Difficulté</th>
            <th scope="col">Nom</th>
            <th scope="col">Distance</th>
            <th scope="col">Durée</th>
            <th scope="col">Dénivelé</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $couleur = array(
            "très facile" => '#1F7D26',
            "facile" => '#1F6C7D',
            "moyen" => '#C66223',
            "difficile" => '#C62323',
            "très difficile" => '#B919D5'
        );
        foreach ($randonnees as $randonnee): ?>
            <tr class="tableau_randos" id="<?= $randonnee['id']; ?>">
                <td style="background-color: <?= $couleur[$randonnee['difficulty']]; ?>">
                    <?php echo $randonnee['difficulty']; ?>
                </td>
                <td><?php echo $randonnee['name']; ?></td>
                <td><?php echo $randonnee['distance']; ?>Km</td>
                <td><?php echo $randonnee['duration']; ?></td>
                <td><?php echo $randonnee['height_difference']; ?>M</td>
                <td class="update">
                    <a href="ASSETS/PHP/update.php?id=<?= $randonnee['id']; ?>"><button>📇</button></a>
                </td>
                <td class="delete">
                    <a href="ASSETS/PHP/delete.php?id=<?= $randonnee['id']; ?>"><button>❌</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="ASSETS/PHP/create.php"><button class="button-create">CRÉER UNE RANDONNÉE</button></a>
<?php
include 'ASSETS/PHP/INCLUDE/footer.php';
?>