<?php
require_once __DIR__ . '/fonctions_assiste.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$data = [
    'id_assiste'     => (int)$_POST['id_assiste'],
    'id_mandat'      => (int)$_POST['id_mandat'],
    'id_dirigeant'   => (int)$_POST['id_dirigeant'],
    'date_debut_vp'  => $_POST['date_debut_vp'],
    'date_fin_vp'    => $_POST['date_fin_vp'] ?: null,
    'motif_fin'      => trim($_POST['motif_fin']),
];

updateAssiste($data);

header('Location: ../index.php');
exit;
