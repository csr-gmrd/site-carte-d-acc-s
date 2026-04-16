<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une carte d'accès</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <h1>Administrateur</h1>
        <p class="sidebar-subtitle">Créer une nouvelle carte</p>

        <a href="site_carte_acces.php">Cartes d'accès</a>
        <a href="site_employes.php">Employés</a>
        <a href="site_rapports.php">Rapports</a>
        <a href="ajouter_carte_acces.php">Ajouter une carte d'accès</a>
    </div>

    <div class="form-page">
        <div class="form-card">
            <h2>Ajouter une carte d'accès</h2>
            <p>Le formulaire reprend exactement les champs décrits dans tes commentaires.</p>

            <form method="post" action="">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="prenom">Prénom de l'employé</label>
                        <input type="text" id="prenom" name="prenom" required>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom de l'employé</label>
                        <input type="text" id="nom" name="nom" required>
                    </div>

                    <div class="form-group">
                        <label for="numero_carte">Numéro de la carte d'accès</label>
                        <input type="text" id="numero_carte" name="numero_carte" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Rôle dans l'entreprise</label>
                        <select id="role" name="role" required>
                            <option value="">Choisir un rôle</option>
                            <option value="employe">Employé</option>
                            <option value="manager">Manager</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn" type="submit">Soumettre le formulaire</button>
                    <a class="btn" href="site_carte_acces.php" style="margin-left: 10px;">Retour au tableau de bord</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>