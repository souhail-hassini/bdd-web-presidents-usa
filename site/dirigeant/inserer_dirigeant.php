<?php
require_once 'fonctions_dirigeant.php';
try {
    insertDirigeant([
        'nom'            => $_POST['nom'],
        'prenom'         => $_POST['prenom'],
        'date_naissance' => $_POST['date_naissance'],
        'date_deces'     => $_POST['date_deces'] ?: null,
        'parti'          => $_POST['parti'],
        'etat_origine'   => $_POST['etat_origine'],
    ]);
    $success = true;
} catch (Exception $e) {
    $success = false;
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Insertion dirigeant</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <h1><a href="../index.php">Présidents des États-Unis</a></h1>
</header>
<nav class="main-nav">
    <a href="../index.php">Accueil</a>
    <a href="test_dirigeant.php" class="active">Dirigeants</a>
    <a href="../mandat/test_mandat.php">Mandats</a>
    <a href="../assiste/test_assiste.php">Assistances VP</a>
</nav>
<main>
    <h2>Insertion — Dirigeant</h2>
    <?php if ($success): ?>
        <div class="message success">Dirigeant ajouté avec succès.</div>
    <?php else: ?>
        <div class="message error">Erreur : <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <p style="margin-top:16px;font-family:monospace;font-size:13px;">
        <a href="test_dirigeant.php" style="color:#222;">← Voir la table</a>
        &nbsp;&nbsp;
        <a href="insertion_dirigeant.php" style="color:#222;">+ Ajouter un autre</a>
    </p>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
