<?php
require_once __DIR__ . '/../bd_connexion.php';

// get dirigeants 
function getAllDirigeants(): array { 
    
    $pdo = getDB();
    $stmt = $pdo->query('SELECT * FROM DIRIGEANT ORDER BY nom ASC');
    return $stmt->fetchAll();
}
// Recherche par id 
function getDirigeantById(int $id): array|FALSE {

    $pdo = getDB();
    $stmt = $pdo->prepare('SELECT * FROM DIRIGEANT WHERE id_dirigeant = :id');
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}
// insertion 

function insertDirigeant(array $data): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('
        INSERT INTO DIRIGEANT (nom, prenom, date_naissance, date_deces, parti, etat_origine)
        VALUES (:nom, :prenom, :date_naissance, :date_deces, :parti, :etat_origine)
    ');
    $stmt->execute([
        ':nom'            => $data['nom'],
        ':prenom'         => $data['prenom'],
        ':date_naissance' => $data['date_naissance'],
        ':date_deces'     => $data['date_deces'] ?: null,
        ':parti'          => $data['parti'],
        ':etat_origine'   => $data['etat_origine'],
    ]);
}
// mise à jour 
function updateDirigeant(array $data): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('
        UPDATE DIRIGEANT 
        SET nom = :nom,
            prenom = :prenom,
            date_naissance = :date_naissance,
            date_deces = :date_deces,
            parti = :parti,
            etat_origine = :etat_origine
        WHERE id_dirigeant = :id
    ');
    $stmt->execute([
        ':id'             => $data['id_dirigeant'],
        ':nom'            => $data['nom'],
        ':prenom'         => $data['prenom'],
        ':date_naissance' => $data['date_naissance'],
        ':date_deces'     => $data['date_deces'] ?: null,
        ':parti'          => $data['parti'],
        ':etat_origine'   => $data['etat_origine'],
    ]);
}
//suppression 
function deleteDirigeant(int $id): void {
    $pdo = getDB();
    $stmt = $pdo->prepare('DELETE FROM DIRIGEANT WHERE id_dirigeant = :id');
    $stmt->execute([':id' => $id]);
}
?>