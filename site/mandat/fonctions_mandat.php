<?php
require_once __DIR__ . '/../bd_connexion.php';

// get all mandats
function getAllMandats(): array {
    $pdo = getDB();
    $stmt = $pdo->query('SELECT * FROM MANDAT ORDER BY numero_mandat ASC');
    return $stmt->fetchAll();
}

// Recherche par id
function getMandatById(int $id): array|false {
    $pdo = getDB();
    $stmt = $pdo->prepare('SELECT * FROM MANDAT WHERE id_mandat = :id');
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

// insertion
function insertMandat(array $data): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('
        INSERT INTO MANDAT (numero_mandat, date_debut, date_fin, id_dirigeant)
        VALUES (:numero_mandat, :date_debut, :date_fin, :id_dirigeant)
    ');
    $stmt->execute([
        ':numero_mandat' => $data['numero_mandat'],
        ':date_debut'    => $data['date_debut'],
        ':date_fin'      => $data['date_fin'],
        ':id_dirigeant'  => $data['id_dirigeant'],
    ]);
}

// mise à jour
function updateMandat(array $data): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('
        UPDATE MANDAT
        SET numero_mandat = :numero_mandat,
            date_debut    = :date_debut,
            date_fin      = :date_fin,
            id_dirigeant  = :id_dirigeant
        WHERE id_mandat = :id
    ');
    $stmt->execute([
        ':id'            => $data['id_mandat'],
        ':numero_mandat' => $data['numero_mandat'],
        ':date_debut'    => $data['date_debut'],
        ':date_fin'      => $data['date_fin'],
        ':id_dirigeant'  => $data['id_dirigeant'],
    ]);
}

// suppression
function deleteMandat(int $id): void {
    $pdo = getDB();
    $pdo->beginTransaction();
    // les vice-présidences rattachées au mandat sont supprimées d'abord (clé étrangère)
    $pdo->prepare('DELETE FROM ASSISTE WHERE id_mandat = :id')->execute([':id' => $id]);
    $pdo->prepare('DELETE FROM MANDAT WHERE id_mandat = :id')->execute([':id' => $id]);
    $pdo->commit();
}
?>
