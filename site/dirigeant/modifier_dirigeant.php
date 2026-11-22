<?php
session_start();
require_once 'fonctions_dirigeant.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$dirigeant = getDirigeantById($id);

if (!$dirigeant) {
    die("Dirigeant introuvable.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier — <?= htmlspecialchars($dirigeant['prenom'] . ' ' . $dirigeant['nom']) ?></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <h1><a href="../index.php">Présidents des États-Unis</a></h1>
</header>
<nav class="main-nav">
    <a href="../index.php">Accueil</a>
</nav>
<main>
    <h2>Modifier — <?= htmlspecialchars($dirigeant['prenom'] . ' ' . $dirigeant['nom']) ?></h2>
    <a href="../index.php">← Retour</a>

    <form method="POST" action="update_dirigeant.php" style="margin-top: 20px;">
        <input type="hidden" name="id_dirigeant" value="<?= $dirigeant['id_dirigeant'] ?>">

        <div class="form-group">
            <label>ID (non modifiable)</label>
            <input type="text" value="<?= htmlspecialchars($dirigeant['id_dirigeant']) ?>" disabled>
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required
                   value="<?= htmlspecialchars($dirigeant['nom']) ?>">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required
                   value="<?= htmlspecialchars($dirigeant['prenom']) ?>">
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" required
                   value="<?= htmlspecialchars($dirigeant['date_naissance'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="date_deces">Date de décès <em style="font-size:11px;">(optionnel)</em></label>
            <input type="date" id="date_deces" name="date_deces"
                   value="<?= htmlspecialchars($dirigeant['date_deces'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="parti">Parti</label>
            <input type="text" id="parti" name="parti"
                   value="<?= htmlspecialchars($dirigeant['parti'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="etat_origine">État d'origine</label>
            <input type="text" id="etat_origine" name="etat_origine"
                   value="<?= htmlspecialchars($dirigeant['etat_origine'] ?? '') ?>">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>