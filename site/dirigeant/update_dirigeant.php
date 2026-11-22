<?php
require_once __DIR__ . '/fonctions_dirigeant.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$data = [
    'id_dirigeant'   => (int)$_POST['id_dirigeant'],
    'nom'            => trim($_POST['nom']),
    'prenom'         => trim($_POST['prenom']),
    'date_naissance' => $_POST['date_naissance'],
    'date_deces'     => $_POST['date_deces'] ?: null,
    'parti'          => trim($_POST['parti']),
    'etat_origine'   => trim($_POST['etat_origine']),
];

updateDirigeant($data);

header('Location: ../index.php');
exit;
