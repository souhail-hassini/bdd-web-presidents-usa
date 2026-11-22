<?php
if (!function_exists('getAllDirigeants')) {
    require_once __DIR__ . '/fonctions_dirigeant.php';
}

// Suppression avec cascade
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    if ($id) {
        try {
            require_once __DIR__ . '/../bd_connexion.php';
            $pdo = getDB();
            // Supprimer les assistes liés au dirigeant (en tant que VP)
            $pdo->prepare('DELETE FROM ASSISTE WHERE id_dirigeant = :id')->execute([':id' => $id]);
            // Récupérer les mandats du dirigeant
            $s = $pdo->prepare('SELECT id_mandat FROM MANDAT WHERE id_dirigeant = :id');
            $s->execute([':id' => $id]);
            $mandats = $s->fetchAll(PDO::FETCH_COLUMN);
            // Supprimer les assistes liés à ces mandats
            if (!empty($mandats)) {
                $pl = implode(',', array_fill(0, count($mandats), '?'));
                $pdo->prepare("DELETE FROM ASSISTE WHERE id_mandat IN ($pl)")->execute($mandats);
            }
            // Supprimer les mandats
            $pdo->prepare('DELETE FROM MANDAT WHERE id_dirigeant = :id')->execute([':id' => $id]);
            // Supprimer le dirigeant
            deleteDirigeant($id);
        } catch (Exception $e) {}
    }
}

$standalone = basename($_SERVER['SCRIPT_NAME']) === 'test_dirigeant.php';
$prefix = $standalone ? '' : 'dirigeant/';

if ($standalone): ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Table DIRIGEANT</title>
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
    <h2>Table DIRIGEANT</h2>
<?php endif; ?>
<?php
$dirigeants = getAllDirigeants();
echo "<p class='count'>" . count($dirigeants) . " enregistrement(s)</p>";
echo "<table>";
echo "<thead><tr>
    <th>ID</th><th>Nom</th><th>Prénom</th>
    <th>Date naissance</th><th>Date décès</th>
    <th>Parti</th><th>État d'origine</th>
    <th>Actions</th>
</tr></thead><tbody>";

foreach ($dirigeants as $d) {
    $id = $d['id_dirigeant'];
    echo "<tr>
        <td>" . htmlspecialchars($d['id_dirigeant']) . "</td>
        <td>" . htmlspecialchars($d['nom']) . "</td>
        <td>" . htmlspecialchars($d['prenom']) . "</td>
        <td>" . htmlspecialchars($d['date_naissance'] ?? '—') . "</td>
        <td>" . htmlspecialchars($d['date_deces'] ?? '—') . "</td>
        <td>" . htmlspecialchars($d['parti'] ?? '—') . "</td>
        <td>" . htmlspecialchars($d['etat_origine'] ?? '—') . "</td>
        <td class='actions'>
            <form method='GET' action='{$prefix}detail_dirigeant.php' style='display:inline'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit'>Détailler</button>
            </form>
            <form method='GET' action='{$prefix}modifier_dirigeant.php' style='display:inline'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit'>Modifier</button>
            </form>
            <form method='POST' action='{$prefix}test_dirigeant.php' style='display:inline'
                  onsubmit=\"return confirm('Supprimer ce dirigeant ?')\">
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
        <a href="insertion_dirigeant.php" style="font-family:monospace;font-size:13px;color:#222;">+ Ajouter un dirigeant</a>
    </p>
</main>
<footer>Souhail Hassini — Base de données Présidents des États-Unis</footer>
</body>
</html>
<?php endif; ?>
