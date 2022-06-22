<?php

/* All Core Functions Will be Written Here */

// Require the database connection file
require_once("db.php");


// Create a TODO Item
function create()
{
}


// Get all TODO Items
function read()
{
}


// Update a TODO Item
function update()
{
}

// Delete a TODO Item
function delete()
{
}


/* Reference

// Named Parameters
// $sql = "SELECT * FROM posts WHERE author = :author && :is_published = is_published";
// $author = "Kevin Malone";
// $statement = $pdo->prepare($sql);
// $statement->execute(["author" => $author, "is_published" => $is_published]);
// $posts = $statement->fetchAll();

// // Show all data using a foreach loop
// foreach ($posts as $post) {
//     echo "ID:{$post->id} {$post->title} [{$post->is_published}] <br>";
// }


// Fetch Single Post
// $sql = "SELECT * FROM posts WHERE id = :id";
// $statement = $pdo->prepare($sql);
// $statement->execute(["id" => $id]);
// $post = $statement->fetch();


*/