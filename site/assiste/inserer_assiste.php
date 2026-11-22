<?php
require_once 'fonctions_assiste.php';
try {
    insertAssiste([
        'id_mandat'     => $_POST['id_mandat'],
        'id_dirigeant'  => $_POST['id_dirigeant'],
        'date_debut_vp' => $_POST['date_debut_vp'],
        'date_fin_vp'   => $_POST['date_fin_vp'],
        'motif_fin'     => $_POST['motif_fin'],
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
    <title>Insertion assistance VP</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <h1><a href="../index.php">Présidents des États-Unis</a></h1>
</header>
<nav class="main-nav">
    <a href="../index.php">Accueil</a>
    <a href="../dirigeant/test_dirigeant.php">Dirigeants</a>
    <a href="../mandat/test_mandat.php">Mandats</a>
    <a href="test_assiste.php" class="active">Assistances VP</a>
</nav>
<main>
    <h2>Insertion — Assistance VP</h2>
    <?php if ($success): ?>
        <div class="message success">Assistance VP ajoutée avec succès.</div>
    <?php else: ?>
        <div class="message error">Erreur : <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <p style="margin-top:16px;font-family:monospace;font-size:13px;">
        <a href="test_assiste.php" style="color:#222;">← Voir la table</a>
        &nbsp;&nbsp;
        <a href="insertion_assiste.php" style="color:#222;">+ Ajouter une autre</a>
    </p>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
