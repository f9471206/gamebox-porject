<?php
require_once 'Connections/cnn.php';

if (isset($_POST['username'])) {
    $checkName = $_POST['username'];
    $checkmail = $_POST['email'];
    $sql = "select * from `member` where username=:username";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(":username", $checkName, PDO::PARAM_STR);
    $stmt->execute();
    $st = $stmt->fetch();
    if ($st['email'] != $checkmail) {
        $emailResult = false;
        echo json_encode($emailResult);
    } else {
        $emailResult = true;
        echo json_encode($emailResult);
    }
}
