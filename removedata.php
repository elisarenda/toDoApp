<?php
    require './headersettings.php';
    require './pdo.php';

    $stmt = $pdo->prepare("DELETE FROM `todo` WHERE id=:id"); 
    $removeid = $_GET['id'];
    $stmt->execute([
        'id' => $removeid,
    ]);
    //print json_encode($_GET);

?>