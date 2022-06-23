<?php
// Require the database connection file
require_once(dirname(__DIR__) . "/db.php");

$title = htmlspecialchars(trim($_POST["title"]));
$details = htmlspecialchars(trim($_POST["details"]));


// Create the db query
$stmt = $db->prepare("INSERT INTO todo(title, details) VALUES(:title, :details)");



if ($stmt->execute(["title" => $title, "details" => $details])) {
    echo 1;
} else {
    echo 0;
}
