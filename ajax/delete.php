<?php

// Require the database connection file
require_once(dirname(__DIR__) . "/db.php");

$id = htmlspecialchars($_POST["id"]);

// Create the db query
$stmt = $db->prepare("DELETE from todo WHERE id = :id");

if ($stmt->execute(["id" => $id])) {
    echo 1;
} else {
    echo 0;
}
