<?php
/* This file will load when click on the task completed button */

// Require the database connection file
require_once("db.php");

$id = htmlspecialchars($_POST["id"]);
