<?php
require "bootstrap.php";

$pdo = require "config/db-connection.php";

try {
    // Update Mace_Windu's joined date
    $pdo->exec("UPDATE user SET joined = '2024-12-19 10:30:00' WHERE id = 'Mace_Windu'");
    
    // Insert new tweet
    $pdo->exec("INSERT INTO tweet (user_id, ts, message) VALUES ('Mace_Windu', '2024-12-19 15:00:00', 'I defeated Darth Sidious and brought balance to the Force!')");
    
    echo "Migration completed successfully!\n";
} catch (Exception $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
}