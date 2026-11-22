<?php
require_once 'fonctions_mandat.php';
try {
    insertMandat([
        'numero_mandat' => $_POST['numero_mandat'],
        'date_debut'    => $_POST['date_debut'],
        'date_fin'      => $_POST['date_fin'],
        'id_dirigeant'  => $_POST['id_dirigeant'],
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
    <title>Insertion mandat</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <h1><a href="../index.php">Présidents des États-Unis</a></h1>
</header>
<nav class="main-nav">
    <a href="../index.php">Accueil</a>
    <a href="../dirigeant/test_dirigeant.php">Dirigeants</a>
    <a href="test_mandat.php" class="active">Mandats</a>
    <a href="../assiste/test_assiste.php">Assistances VP</a>
</nav>
<main>
    <h2>Insertion — Mandat</h2>
    <?php if ($success): ?>
        <div class="message success">Mandat ajouté avec succès.</div>
    <?php else: ?>
        <div class="message error">Erreur : <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <p style="margin-top:16px;font-family:monospace;font-size:13px;">
        <a href="test_mandat.php" style="color:#222;">← Voir la table</a>
        &nbsp;&nbsp;
        <a href="insertion_mandat.php" style="color:#222;">+ Ajouter un autre</a>
    </p>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
