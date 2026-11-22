<?php
if (!function_exists('getAllAssistes')) {
    require_once __DIR__ . '/fonctions_assiste.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    if ($id) {
        try { deleteAssiste($id); } catch (Exception $e) {}
    }
}

$standalone = basename($_SERVER['SCRIPT_NAME']) === 'test_assiste.php';
$prefix = $standalone ? '' : 'assiste/';

if ($standalone): ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Table ASSISTE</title>
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
    <h2>Table ASSISTE — Vice-Présidents</h2>
<?php endif; ?>
<?php
$assistes = getAllAssistes();
echo "<p class='count'>" . count($assistes) . " enregistrement(s)</p>";
echo "<table>";
echo "<thead><tr>
    <th>ID</th><th>ID mandat</th><th>ID dirigeant</th>
    <th>Date début VP</th><th>Date fin VP</th><th>Motif fin</th>
    <th>Actions</th>
</tr></thead><tbody>";
foreach ($assistes as $a) {
    $id = (int)$a['id_assiste'];
    echo "<tr>
        <td>" . htmlspecialchars($a['id_assiste']) . "</td>
        <td>" . htmlspecialchars($a['id_mandat']) . "</td>
        <td>" . htmlspecialchars($a['id_dirigeant']) . "</td>
        <td>" . htmlspecialchars($a['date_debut_vp'] ?? '—') . "</td>
        <td>" . htmlspecialchars($a['date_fin_vp'] ?? '—') . "</td>
        <td>" . htmlspecialchars($a['motif_fin'] ?? '—') . "</td>
        <td class='actions'>
            <form method='GET' action='{$prefix}detail_assiste.php' style='display:inline'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit'>Détailler</button>
            </form>
            <form method='GET' action='{$prefix}modifier_assiste.php' style='display:inline'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit'>Modifier</button>
            </form>
            <form method='POST' action='{$prefix}test_assiste.php' style='display:inline'
                  onsubmit=\"return confirm('Supprimer cette assistance ?')\">
                <input type='hidden' name='id' value='$id'>
                <button type='submit'>Supprimer</button>
            </form>
        </td>
    </tr>";
}
echo "</tbody></table>";
?>
<?php if ($standalone): ?>
    <p style="margin-top:20px;">
        <a href="insertion_assiste.php" style="font-family:monospace;font-size:13px;color:#222;">+ Ajouter une assistance</a>
    </p>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
<?php endif; ?>
