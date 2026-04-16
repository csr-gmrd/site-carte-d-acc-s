<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$host = "localhost";
$dbname = "ma_base";
$user = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}
?>

<body>
    <div class="sidebar">
        <h1>Administrateur</h1>
        <p class="sidebar-subtitle">Espace de gestion des accès</p>

        <a href="site_carte_acces.php">Cartes d'accès</a>
        <a href="site_employes.php">Employés</a>
        <a href="site_rapports.php">Rapports</a>
        <a href="ajouter_carte_acces.php">Ajouter une carte d'accès</a>
    </div>

    <div class="main">
        <h2>Tableau de bord</h2>
        <p>Cette page rassemble les actions principales de l'administration.</p>

        <div class="cards">
            <div class="card">
                <h3>Cartes d'accès</h3>
                <p>24</p>
            </div>
            <div class="card">
                <h3>Employés</h3>
                <p>12</p>
            </div>
            <div class="card">
                <h3>Rapports</h3>
                <p>5</p>
            </div>
        </div>

        <div class="panel">
            <h3>Ce que tes commentaires décrivaient</h3>
            <ul>
                <li>Un titre pour indiquer que la page est réservée aux administrateurs.</li>
                <li>Un dashboard pour naviguer entre les sections.</li>
                <li>Un bouton pour créer une nouvelle carte d'accès.</li>
                <li>Une page dédiée avec un formulaire pour saisir prénom, nom, numéro de carte et rôle.</li>
            </ul>
        </div>
    </div>


</body>
</html>