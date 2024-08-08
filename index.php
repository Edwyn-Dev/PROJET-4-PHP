<?php
include 'ASSETS/PHP/INCLUDE/header.php';
if (isset($_SESSION['utilisateur_id'])) {
    header('Location: espaces_randonnees.php');
    exit();
}
?>
<a href="connexion.php" class="button-login">
    Se connecter
</a>
<?php
include 'ASSETS/PHP/INCLUDE/footer.php';
?>