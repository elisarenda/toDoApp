<?php
    require './headersettings.php';
    require './pdo.php';

    $stmt = $pdo->prepare("UPDATE todo SET completed=:completed WHERE id=:id"); 
    $idToDo = $_GET['id'];
    $updateToDo = $_GET['completed'];
    $stmt->execute([
        'id' => $idToDo,
        'completed' => $updateToDo,
    ]);
    print json_encode($_GET);
?>