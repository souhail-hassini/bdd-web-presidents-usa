<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un dirigeant</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <h1><a href="../index.php">Présidents des États-Unis</a></h1>
</header>
<nav class="main-nav">
    <a href="../index.php">Accueil</a>
    <a href="test_dirigeant.php">Dirigeants</a>
    <a href="../mandat/test_mandat.php">Mandats</a>
    <a href="../assiste/test_assiste.php">Assistances VP</a>
</nav>
<main>
    <h2>Ajouter un dirigeant</h2>
    <form method="POST" action="inserer_dirigeant.php">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" required>
        </div>
        <div class="form-group">
            <label for="date_deces">Date de décès <em style="text-transform:none;font-size:11px;">(optionnel)</em></label>
            <input type="date" id="date_deces" name="date_deces">
        </div>
        <div class="form-group">
            <label for="parti">Parti</label>
            <input type="text" id="parti" name="parti">
        </div>
        <div class="form-group">
            <label for="etat_origine">État d'origine</label>
            <input type="text" id="etat_origine" name="etat_origine">
        </div>
        <button type="submit">Insérer</button>
    </form>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
