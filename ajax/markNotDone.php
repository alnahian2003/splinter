<?php
/* This file will load when click on the task completed button */

// Require the database connection file
require_once(dirname(__DIR__) . "/db.php");

$id = htmlspecialchars($_POST["id"]);
// Create the db query
$stmt = $db->prepare("UPDATE todo SET status = 0 WHERE id = $id");

if ($stmt->execute()) {
    echo 1;
} else {
    echo 0;
}
