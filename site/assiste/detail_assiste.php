<?php
session_start();
require_once __DIR__ . '/fonctions_assiste.php';
require_once __DIR__ . '/../mandat/fonctions_mandat.php';
require_once __DIR__ . '/../dirigeant/fonctions_dirigeant.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$assiste = getAssisteById($id);

if (!$assiste) {
    die('Assistance introuvable.');
}

$mandat = getMandatById((int)$assiste['id_mandat']);
$dirigeant = getDirigeantById((int)$assiste['id_dirigeant']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail — Assistance <?= htmlspecialchars($assiste['id_assiste']) ?></title>
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
    <h2>Détail — Assistance <?= htmlspecialchars($assiste['id_assiste']) ?></h2>
    <a href="../index.php">← Retour</a>

    <div style="margin-top: 20px;">
        <ul>
            <li><strong>ID :</strong> <?= htmlspecialchars($assiste['id_assiste']) ?></li>
            <li><strong>ID mandat :</strong> <?= htmlspecialchars($assiste['id_mandat']) ?></li>
            <li><strong>Mandat :</strong> <?= $mandat ? htmlspecialchars('Mandat n°' . $mandat['numero_mandat']) : '—' ?></li>
            <li><strong>ID dirigeant VP :</strong> <?= htmlspecialchars($assiste['id_dirigeant']) ?></li>
            <li><strong>Dirigeant VP :</strong> <?= $dirigeant ? htmlspecialchars($dirigeant['prenom'] . ' ' . $dirigeant['nom']) : '—' ?></li>
            <li><strong>Date début VP :</strong> <?= htmlspecialchars($assiste['date_debut_vp'] ?? '—') ?></li>
            <li><strong>Date fin VP :</strong> <?= htmlspecialchars($assiste['date_fin_vp'] ?? '—') ?></li>
            <li><strong>Motif fin :</strong> <?= htmlspecialchars($assiste['motif_fin'] ?? '—') ?></li>
        </ul>
    </div>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
