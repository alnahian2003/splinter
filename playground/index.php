<?php

date_default_timezone_set("Asia/Dhaka");

// Get the form data
if (isset($_POST["submit"])) {
    $todo_title = $_POST["todo_title"] ?? "";
    $todo_title = trim($todo_title);

    $todo_details = $_POST["todo_details"] ?? "";
    $todo_details = trim($todo_details);

    // Save it to a json
    if (($todo_title && $todo_details) || $todo_title) {

        if (file_exists("todo.json")) {
            $json = file_get_contents("todo.json");
            $jsonData = json_decode($json, true);
        } else {
            $jsonData[] = "";
        }

        $jsonData[] = [
            "todo_title" => $todo_title,
            "todo_details" => $todo_details,
            "finished" => false,
            "time" => date("h:i A", time()),
            "date" => date("d M, Y"),
        ];

        file_put_contents("todo.json", json_encode($jsonData, JSON_PRETTY_PRINT));
    }
}

function deleteTODO($id)
{
    if (file_exists("todo.json")) {
        $json = file_get_contents("todo.json");
        $jsonData = json_decode($json, true);

        unset($jsonData[$id]);

        file_put_contents("todo.json", json_encode($jsonData, JSON_PRETTY_PRINT));
        header("Location:index.php");
    }
}


// Deleting an item
if (isset($_POST["delete"])) {
    $id = $_POST["todo_id"];
    deleteTODO($id);
    echo "Deleted Successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splinter Playground</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="todo_title" placeholder="Enter your TODO">
        <input type="text" name="todo_details" placeholder="Enter your TODO description">
        <input name="submit" value="New Todo" type="submit">
    </form>

    <?php

    if (file_exists("todo.json")) {
        $json = file_get_contents("todo.json");
        $jsonData = json_decode($json, true);
    }

    foreach ($jsonData as $id => $arr) {
        echo $id . "<br>";
        $todoId = $id;
        $title = $arr["todo_title"];
        $details = $arr["todo_details"];
    ?>
        <h3>Todo Title: <?= $title; ?></h3>
        <p>Todo Details: <?= $details; ?></p>
        <form action="edit.php" method="post">
            <input type="hidden" name="todo_id" value="<?= $todoId; ?>">
            <input type="submit" name="edit" value="Edit">
        </form>
        <form action="" method="post">
            <input type="hidden" name="todo_id" value="<?= $todoId; ?>">
            <input type="submit" name="delete" value="Delete">
        </form>

    <?php }; ?>
</body>

</html>