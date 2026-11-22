<?php
session_start();
require_once __DIR__ . '/fonctions_assiste.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$assiste = getAssisteById($id);

if (!$assiste) {
    die('Assistance introuvable.');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier — Assistance <?= htmlspecialchars($assiste['id_assiste']) ?></title>
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
    <h2>Modifier — Assistance <?= htmlspecialchars($assiste['id_assiste']) ?></h2>
    <a href="../index.php">← Retour</a>

    <form method="POST" action="update_assiste.php" style="margin-top: 20px;">
        <input type="hidden" name="id_assiste" value="<?= htmlspecialchars($assiste['id_assiste']) ?>">

        <div class="form-group">
            <label>ID (non modifiable)</label>
            <input type="text" value="<?= htmlspecialchars($assiste['id_assiste']) ?>" disabled>
        </div>
        <div class="form-group">
            <label for="id_mandat">ID du mandat</label>
            <input type="number" id="id_mandat" name="id_mandat" required value="<?= htmlspecialchars($assiste['id_mandat']) ?>">
        </div>
        <div class="form-group">
            <label for="id_dirigeant">ID du dirigeant VP</label>
            <input type="number" id="id_dirigeant" name="id_dirigeant" required value="<?= htmlspecialchars($assiste['id_dirigeant']) ?>">
        </div>
        <div class="form-group">
            <label for="date_debut_vp">Date début VP</label>
            <input type="date" id="date_debut_vp" name="date_debut_vp" required value="<?= htmlspecialchars($assiste['date_debut_vp']) ?>">
        </div>
        <div class="form-group">
            <label for="date_fin_vp">Date fin VP</label>
            <input type="date" id="date_fin_vp" name="date_fin_vp" value="<?= htmlspecialchars($assiste['date_fin_vp'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="motif_fin">Motif fin</label>
            <input type="text" id="motif_fin" name="motif_fin" value="<?= htmlspecialchars($assiste['motif_fin'] ?? '') ?>">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
