<?php
// Get the form data
$json = file_get_contents("todo.json");
$jsonData = json_decode($json, true);

$id = $_POST["todo_id"];
$todo_title = $_POST["new_title"] ?? "";
$todo_title = trim($todo_title);

$todo_details = $_POST["new_details"] ?? "";
$todo_details = trim($todo_details);

$todo_status = $_POST["finished"] ?? false;


$title = $jsonData[$id]["todo_title"];
$details = $jsonData[$id]["todo_details"];
$time = $jsonData[$id]["time"];
$date = $jsonData[$id]["date"];

echo $id;
print_r($jsonData[$id]);

if (isset($_POST["submit"])) {
    $jsonData[$id] = [
        "todo_title" => $todo_title,
        "todo_details" => $todo_details,
        "finished" => $todo_status,
        "time" => $time,
        "date" => $date,
    ];

    file_put_contents("todo.json", json_encode($jsonData, JSON_PRETTY_PRINT));
    header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>

<body>
    <form action="edit.php" method="post">
        <input type="text" name="new_title" value="<?= $title ?>" placeholder="name">
        <br>
        <input type="text" name="new_details" value="<?= $details ?>" placeholder="details">
        <br>
        <label for="finish"> Completed?
            <input type="checkbox" name="finished" id="finish" value="true">
        </label>
        <br>
        <input type="submit" name="submit" value="Edit Todo">
    </form>
</body>

</html>