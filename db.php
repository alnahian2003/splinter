<?php
require_once "config.php";

// Set DSN (Data Source Name)
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

// Make the connection by creating a PDO instance
try {
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);

    // Set Attributes
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
