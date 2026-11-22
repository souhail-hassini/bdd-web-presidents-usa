<?php
session_start();
require_once 'fonctions_dirigeant.php';
require_once '../mandat/fonctions_mandat.php';
require_once '../assiste/fonctions_assiste.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$dirigeant = getDirigeantById($id);

if (!$dirigeant) {
    die("Dirigeant introuvable.");
}

// Récupérer les mandats de ce dirigeant
$tousMandats = getAllMandats();
$mandats = array_filter($tousMandats, fn($m) => $m['id_dirigeant'] == $id);

// Récupérer les rôles VP de ce dirigeant
$tousAssistes = getAllAssistes();
$assistes = array_filter($tousAssistes, fn($a) => $a['id_dirigeant'] == $id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail — <?= htmlspecialchars($dirigeant['prenom'] . ' ' . $dirigeant['nom']) ?></title>
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
    <h2>Détail — <?= htmlspecialchars($dirigeant['prenom'] . ' ' . $dirigeant['nom']) ?></h2>
    <a href="../index.php">← Retour</a>

    <div style="margin-top: 20px;">
        <ul>
            <li><strong>ID :</strong> <?= htmlspecialchars($dirigeant['id_dirigeant']) ?></li>
            <li><strong>Nom :</strong> <?= htmlspecialchars($dirigeant['nom']) ?></li>
            <li><strong>Prénom :</strong> <?= htmlspecialchars($dirigeant['prenom']) ?></li>
            <li><strong>Date de naissance :</strong> <?= htmlspecialchars($dirigeant['date_naissance'] ?? '—') ?></li>
            <li><strong>Date de décès :</strong> <?= htmlspecialchars($dirigeant['date_deces'] ?? '—') ?></li>
            <li><strong>Parti :</strong> <?= htmlspecialchars($dirigeant['parti'] ?? '—') ?></li>
            <li><strong>État d'origine :</strong> <?= htmlspecialchars($dirigeant['etat_origine'] ?? '—') ?></li>
        </ul>
    </div>

    <?php if (!empty($mandats)): ?>
        <h3>Mandats</h3>
        <table>
            <thead><tr>
                <th>N° mandat</th><th>Date début</th><th>Date fin</th>
            </tr></thead>
            <tbody>
            <?php foreach ($mandats as $m): ?>
                <tr>
                    <td><?= htmlspecialchars($m['numero_mandat']) ?></td>
                    <td><?= htmlspecialchars($m['date_debut'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($m['date_fin'] ?? '—') ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if (!empty($assistes)): ?>
        <h3>Rôles de Vice-Président</h3>
        <table>
            <thead><tr>
                <th>Date début VP</th><th>Date fin VP</th><th>Motif fin</th>
            </tr></thead>
            <tbody>
            <?php foreach ($assistes as $a): ?>
                <tr>
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
