<?php
require_once __DIR__ . '/fonctions_mandat.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$data = [
    'id_mandat'      => (int)$_POST['id_mandat'],
    'numero_mandat'  => (int)$_POST['numero_mandat'],
    'date_debut'     => $_POST['date_debut'],
    'date_fin'       => $_POST['date_fin'] ?: null,
    'id_dirigeant'   => (int)$_POST['id_dirigeant'],
];

updateMandat($data);

header('Location: ../index.php');
exit;
