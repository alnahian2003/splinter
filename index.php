<?php

/**
 * Project Name: Splinter
 * Project Type: TODO List Web App
 * Project Author: Al Nahian
 * Date Created: 7:48 PM, 21 Jun 2022
 * GitHub: https://github.com/alnahian2003/splinter

 * Author Portfolio: https://alnahian2003.github.io
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Toastr Stylesheet CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- INTER Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600&display=swap" rel="stylesheet">

    <title>Splinter — TODO List Web App</title>
</head>

<body>
    <!-- Header Section: Intro Part, TODO Form Inputs -->
    <header>
        <div id="intro">
            <h1>SPLINTER</h1>
            <h2>TODO List Web App</h2>
        </div>

        <div id="todoForm">
            <form action="index.php" method="POST" id="splinterForm">
                <input type="text" name="title" id="todo_title" placeholder="start writing your todo task" required maxlength="65">

                <input type="text" name="details" id="todo_details" placeholder="don't miss out to write the details, please!" maxlength="130">

                <button id="submitBtn" type="submit">+</button>
            </form>
        </div>
    </header>


    <!-- Main Section: TODO Cards -->
    <main>
        <h2>TASKS</h2>

        <!-- Todo Cards Grid -->
        <div id="todo">
        </div>
    </main>

    <!-- JQuery 3.6.0 Minified -->
    <script src="assets/js/jquery.js"></script>
    <!-- Toastr Minified -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Main JavaScript -->
    <script src="assets/js/app.js"></script>
</body>

</html>