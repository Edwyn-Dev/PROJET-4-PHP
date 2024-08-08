<?php
include 'ASSETS/PHP/INCLUDE/header.php';
?>
<h1>Connexion</h1>
<?php
if (isset($_SESSION['error'])) {
    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}
if (isset($_SESSION['utilisateur_id'])){
    header('Location: espaces_randonnees.php');
    exit();
}
?>
<form action="ASSETS/PHP/CONNECTION/exec_connection.php" method="post">
    <label for="identifiant">Nom ou Email</label>
    <input type="text" id="identifiant" name="identifiant" placeholder="Nom d'utilisateur ou Email" required><br>
    <label for="identifiant">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required><br>
    <input type="submit" value="Se connecter">
</form>

<?php
include 'ASSETS/PHP/INCLUDE/footer.php';
?>