<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des employés</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$host = "localhost";
$dbname = "ma_base";
$user = "root";
$password = "";

$employes = [];
$messageErreur = null;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT prenom, nom, numero_carte, role FROM employes ORDER BY nom, prenom");
    $employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $messageErreur = "Impossible de charger la liste depuis la base de données. Vérifie la table employes et ses colonnes prenom, nom, numero_carte et role.";
    $employes = [
        [
            'prenom' => 'Marie',
            'nom' => 'Dupont',
            'numero_carte' => 'AC-1001',
            'role' => 'Manager'
        ],
        [
            'prenom' => 'Lucas',
            'nom' => 'Martin',
            'numero_carte' => 'AC-1002',
            'role' => 'Employé'
        ],
        [
            'prenom' => 'Sofia',
            'nom' => 'Bernard',
            'numero_carte' => 'AC-1003',
            'role' => 'Administrateur'
        ]
    ];
}
?>
<body>
    <div class="sidebar">
        <h1>Administrateur</h1>
        <p class="sidebar-subtitle">Liste des employés</p>

        <a href="site_carte_acces.php">Cartes d'accès</a>
        <a href="site_employes.php">Employés</a>
        <a href="site_rapports.php">Rapports</a>
        <a href="ajouter_carte_acces.php">Ajouter une carte d'accès</a>
    </div>

    <div class="main">
        <h2>Employés de l'entreprise</h2>
        <p>Cette page affiche le prénom, le nom, le numéro de carte et le rôle de chaque employé.</p>

        <?php if ($messageErreur !== null): ?>
            <div class="alert alert-warning"><?php echo htmlspecialchars($messageErreur); ?></div>
        <?php endif; ?>

        <div class="panel table-card">
            <div class="table-header">
                <h3>Liste des employés</h3>
                <span><?php echo count($employes); ?> employé(s)</span>
            </div>

            <?php if (!empty($employes)): ?>
                <div class="table-responsive">
                    <table class="employee-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Numéro de carte</th>
                                <th>Rôle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employes as $employe): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($employe['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($employe['prenom']); ?></td>
                                    <td><?php echo htmlspecialchars($employe['numero_carte']); ?></td>
                                    <td><?php echo htmlspecialchars($employe['role']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    Aucun employé n'est enregistré pour le moment.
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
