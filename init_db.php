<?php
require "bootstrap.php";

$pdo = require "config/db-connection.php";

try {
    // Read and execute the SQL file
    $sql = file_get_contents(__DIR__ . '/sql/db.sql');
    
    // Split by semicolon and execute each statement
    $statements = explode(';', $sql);
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement)) {
            $pdo->exec($statement);
        }
    }
    
    echo "Database initialized successfully!\n";
} catch (Exception $e) {
    echo "Database initialization failed: " . $e->getMessage() . "\n";
}