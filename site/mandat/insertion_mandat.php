<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un mandat</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <h1><a href="../index.php">Présidents des États-Unis</a></h1>
</header>
<nav class="main-nav">
    <a href="../index.php">Accueil</a>
    <a href="../dirigeant/test_dirigeant.php">Dirigeants</a>
    <a href="test_mandat.php">Mandats</a>
    <a href="../assiste/test_assiste.php">Assistances VP</a>
</nav>
<main>
    <h2>Ajouter un mandat</h2>
    <form method="POST" action="inserer_mandat.php">
        <div class="form-group">
            <label for="numero_mandat">Numéro du mandat</label>
            <input type="number" id="numero_mandat" name="numero_mandat" required>
        </div>
        <div class="form-group">
            <label for="date_debut">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" required>
        </div>
        <div class="form-group">
            <label for="date_fin">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" required>
        </div>
        <div class="form-group">
            <label for="id_dirigeant">ID du dirigeant</label>
            <input type="number" id="id_dirigeant" name="id_dirigeant" required>
        </div>
        <button type="submit">Insérer</button>
    </form>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
