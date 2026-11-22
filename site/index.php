<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['table'])) {
    $_SESSION['table'] = $_POST['table'];
}

$table = $_SESSION['table'] ?? null;

$tables = [
        'dirigeant' => ['label' => 'DIRIGEANT', 'test' => 'dirigeant/test_dirigeant.php', 'insertion' => 'dirigeant/insertion_dirigeant.php'],
        'mandat'    => ['label' => 'MANDAT',    'test' => 'mandat/test_mandat.php',         'insertion' => 'mandat/insertion_mandat.php'],
        'assiste'   => ['label' => 'ASSISTE',   'test' => 'assiste/test_assiste.php',        'insertion' => 'assiste/insertion_assiste.php'],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Présidents des États-Unis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1><a href="index.php">Présidents des États-Unis</a></h1>
</header>
<nav class="main-nav">
    <a href="index.php" class="active">Accueil</a>
</nav>
<main>
    <h2>Choisir une table</h2>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="table">Table</label>
            <select name="table" id="table">
                <?php foreach ($tables as $key => $t): ?>
                    <option value="<?= $key ?>" <?= ($table === $key) ? 'selected' : '' ?>>
                        <?= $t['label'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Afficher</button>
    </form>

    <hr style="margin: 30px 0;">
    <div style="margin-bottom: 16px;">
        <?php foreach ($tables as $key => $t): ?>
            <a href="<?= $t['insertion'] ?>" style="margin-right: 20px;">+ Insérer un <?= strtolower($t['label']) ?></a>
        <?php endforeach; ?>
    </div>

    <?php if ($table && isset($tables[$table])): ?>
        <hr style="margin: 20px 0;">
        <?php include $tables[$table]['test']; ?>
    <?php endif; ?>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
