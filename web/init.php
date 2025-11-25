<?php
require "../bootstrap.php";

$pdo = require "../config/db-connection.php";

try {
    $sql = file_get_contents(__DIR__ . '/../sql/db.sql');
    $statements = explode(';', $sql);
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement)) {
            $pdo->exec($statement);
        }
    }
    
    echo "Database initialized successfully! Mace Windu should now appear.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>