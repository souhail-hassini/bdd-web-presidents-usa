<?php
require_once __DIR__ . '/../bd_connexion.php';

function getAllAssistes(): array {
    $pdo = getDB();
    $stmt = $pdo->query('SELECT * FROM ASSISTE ORDER BY id_assiste ASC');
    return $stmt->fetchAll();
}

function getAssisteById(int $id): array|false {
    $pdo = getDB();
    $stmt = $pdo->prepare('SELECT * FROM ASSISTE WHERE id_assiste = :id');
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

function insertAssiste(array $data): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('
        INSERT INTO ASSISTE (id_mandat, id_dirigeant, date_debut_vp, date_fin_vp, motif_fin)
        VALUES (:id_mandat, :id_dirigeant, :date_debut_vp, :date_fin_vp, :motif_fin)
    ');
    $stmt->execute([
        ':id_mandat'     => $data['id_mandat'],
        ':id_dirigeant'  => $data['id_dirigeant'],
        ':date_debut_vp' => $data['date_debut_vp'],
        ':date_fin_vp'   => $data['date_fin_vp'],
        ':motif_fin'     => $data['motif_fin'],
    ]);
}

function updateAssiste(array $data): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('
        UPDATE ASSISTE
        SET id_mandat     = :id_mandat,
            id_dirigeant  = :id_dirigeant,
            date_debut_vp = :date_debut_vp,
            date_fin_vp   = :date_fin_vp,
            motif_fin     = :motif_fin
        WHERE id_assiste = :id
    ');
    $stmt->execute([
        ':id'            => $data['id_assiste'],
        ':id_mandat'     => $data['id_mandat'],
        ':id_dirigeant'  => $data['id_dirigeant'],
        ':date_debut_vp' => $data['date_debut_vp'],
        ':date_fin_vp'   => $data['date_fin_vp'],
        ':motif_fin'     => $data['motif_fin'],
    ]);
}

function deleteAssiste(int $id): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('DELETE FROM ASSISTE WHERE id_assiste = :id');
    $stmt->execute([':id' => $id]);
}
?>