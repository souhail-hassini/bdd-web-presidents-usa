<?php
/**
 * Connexion PDO à la base PostgreSQL.
 * Les identifiants sont lus dans config.php (non versionné).
 * Copier config.example.php en config.php puis le compléter.
 */
function getDB(): PDO {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $configFile = __DIR__ . '/config.php';
    if (!file_exists($configFile)) {
        die('Fichier config.php manquant : copiez config.example.php en config.php et renseignez vos identifiants.');
    }
    $config = require $configFile;

    try {
        $dsn = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
        $pdo = new PDO($dsn, $config['user'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }
}
