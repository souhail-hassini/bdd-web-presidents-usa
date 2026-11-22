<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une assistance VP</title>
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
    <a href="test_assiste.php">Assistances VP</a>
</nav>
<main>
    <h2>Ajouter une assistance VP</h2>
    <form method="POST" action="inserer_assiste.php">
        <div class="form-group">
            <label for="id_mandat">ID du mandat</label>
            <input type="number" id="id_mandat" name="id_mandat" required>
        </div>
        <div class="form-group">
            <label for="id_dirigeant">ID du dirigeant (VP)</label>
            <input type="number" id="id_dirigeant" name="id_dirigeant" required>
        </div>
        <div class="form-group">
            <label for="date_debut_vp">Date de début VP</label>
            <input type="date" id="date_debut_vp" name="date_debut_vp" required>
        </div>
        <div class="form-group">
            <label for="date_fin_vp">Date de fin VP</label>
            <input type="date" id="date_fin_vp" name="date_fin_vp" required>
        </div>
        <div class="form-group">
            <label for="motif_fin">Motif de fin</label>
            <select id="motif_fin" name="motif_fin">
                <option value="Fin normale">Fin normale</option>
                <option value="Deces">Décès</option>
                <option value="Demission">Démission</option>
                <option value="Succession">Succession</option>
                <option value="En cours">En cours</option>
            </select>
        </div>
        <button type="submit">Insérer</button>
    </form>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
