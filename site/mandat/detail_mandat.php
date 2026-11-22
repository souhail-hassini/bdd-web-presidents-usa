<?php
session_start();
require_once __DIR__ . '/fonctions_mandat.php';
require_once __DIR__ . '/../dirigeant/fonctions_dirigeant.php';
require_once __DIR__ . '/../assiste/fonctions_assiste.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$mandat = getMandatById($id);

if (!$mandat) {
    die('Mandat introuvable.');
}

$dirigeant = getDirigeantById((int)$mandat['id_dirigeant']);
$tousAssistes = getAllAssistes();
$assistes = array_filter($tousAssistes, fn($a) => $a['id_mandat'] == $id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail — Mandat <?= htmlspecialchars($mandat['numero_mandat']) ?></title>
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
    <h2>Détail — Mandat <?= htmlspecialchars($mandat['numero_mandat']) ?></h2>
    <a href="../index.php">← Retour</a>

    <div style="margin-top: 20px;">
        <ul>
            <li><strong>ID :</strong> <?= htmlspecialchars($mandat['id_mandat']) ?></li>
            <li><strong>N° mandat :</strong> <?= htmlspecialchars($mandat['numero_mandat']) ?></li>
            <li><strong>Date début :</strong> <?= htmlspecialchars($mandat['date_debut'] ?? '—') ?></li>
            <li><strong>Date fin :</strong> <?= htmlspecialchars($mandat['date_fin'] ?? '—') ?></li>
            <li><strong>ID dirigeant :</strong> <?= htmlspecialchars($mandat['id_dirigeant']) ?></li>
            <li><strong>Dirigeant :</strong> <?= $dirigeant ? htmlspecialchars($dirigeant['prenom'] . ' ' . $dirigeant['nom']) : '—' ?></li>
        </ul>
    </div>

    <?php if (!empty($assistes)): ?>
        <h3>Vice-présidents associés</h3>
        <table>
            <thead><tr>
                <th>ID assistance</th><th>ID dirigeant VP</th><th>Date début VP</th><th>Date fin VP</th><th>Motif fin</th>
            </tr></thead>
            <tbody>
            <?php foreach ($assistes as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['id_assiste']) ?></td>
                    <td><?= htmlspecialchars($a['id_dirigeant']) ?></td>
                    <td><?= htmlspecialchars($a['date_debut_vp'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($a['date_fin_vp'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($a['motif_fin'] ?? '—') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
