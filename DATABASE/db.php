<?php
$dsn = 'mysql:host=localhost;dbname=reunion_island;charset=utf8';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    ?>
    <script>alert('Erreur de connexion : ' + <?php echo json_encode($e->getMessage()); ?>);</script>
    <?php
    exit();
}
?>
