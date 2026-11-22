<?php
session_start();
require_once __DIR__ . '/fonctions_mandat.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$mandat = getMandatById($id);

if (!$mandat) {
    die('Mandat introuvable.');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier — Mandat <?= htmlspecialchars($mandat['numero_mandat']) ?></title>
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
    <h2>Modifier — Mandat <?= htmlspecialchars($mandat['numero_mandat']) ?></h2>
    <a href="../index.php">← Retour</a>

    <form method="POST" action="update_mandat.php" style="margin-top: 20px;">
        <input type="hidden" name="id_mandat" value="<?= htmlspecialchars($mandat['id_mandat']) ?>">

        <div class="form-group">
            <label>ID (non modifiable)</label>
            <input type="text" value="<?= htmlspecialchars($mandat['id_mandat']) ?>" disabled>
        </div>
        <div class="form-group">
            <label for="numero_mandat">Numéro du mandat</label>
            <input type="number" id="numero_mandat" name="numero_mandat" required value="<?= htmlspecialchars($mandat['numero_mandat']) ?>">
        </div>
        <div class="form-group">
            <label for="date_debut">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" required value="<?= htmlspecialchars($mandat['date_debut']) ?>">
        </div>
        <div class="form-group">
            <label for="date_fin">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" value="<?= htmlspecialchars($mandat['date_fin'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="id_dirigeant">ID du dirigeant</label>
            <input type="number" id="id_dirigeant" name="id_dirigeant" required value="<?= htmlspecialchars($mandat['id_dirigeant']) ?>">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
