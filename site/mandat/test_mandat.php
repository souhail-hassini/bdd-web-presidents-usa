<?php
if (!function_exists('getAllMandats')) {
    require_once __DIR__ . '/fonctions_mandat.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    if ($id) {
        try { deleteMandat($id); } catch (Exception $e) {}
    }
}

$standalone = basename($_SERVER['SCRIPT_NAME']) === 'test_mandat.php';
$prefix = $standalone ? '' : 'mandat/';

if ($standalone): ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Table MANDAT</title>
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
    <h2>Table MANDAT</h2>
<?php endif; ?>
<?php
$mandats = getAllMandats();
echo "<p class='count'>" . count($mandats) . " enregistrement(s)</p>";
echo "<table>";
echo "<thead><tr>
    <th>ID</th><th>N° mandat</th>
    <th>Date début</th><th>Date fin</th><th>ID dirigeant</th>
    <th>Actions</th>
</tr></thead><tbody>";
foreach ($mandats as $m) {
    $id = (int)$m['id_mandat'];
    echo "<tr>
        <td>" . htmlspecialchars($m['id_mandat']) . "</td>
        <td>" . htmlspecialchars($m['numero_mandat']) . "</td>
        <td>" . htmlspecialchars($m['date_debut'] ?? '—') . "</td>
        <td>" . htmlspecialchars($m['date_fin'] ?? '—') . "</td>
        <td>" . htmlspecialchars($m['id_dirigeant']) . "</td>
        <td class='actions'>
            <form method='GET' action='{$prefix}detail_mandat.php' style='display:inline'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit'>Détailler</button>
            </form>
            <form method='GET' action='{$prefix}modifier_mandat.php' style='display:inline'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit'>Modifier</button>
            </form>
            <form method='POST' action='{$prefix}test_mandat.php' style='display:inline'
                  onsubmit=\"return confirm('Supprimer ce mandat ?')\">
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
        <a href="insertion_mandat.php" style="font-family:monospace;font-size:13px;color:#222;">+ Ajouter un mandat</a>
    </p>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
<?php endif; ?>
