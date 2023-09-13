<?php
require_once 'Connections/cnn.php';
session_start();
if ($_SESSION['userlevel'] != 99) {
    echo "<script>location.href ='index.php';</script>";
}

if (isset($_GET['del'])) {
    $proId = $_GET['del'];
    $sqldel = "select news.image_path from news where id=:id";
    $stmtdel = $link->prepare($sqldel);
    $stmtdel->bindParam(":id", $proId, PDO::PARAM_INT);
    $stmtdel->execute();
    $stdel = $stmtdel->fetch();

    $sqlNewsDel = "delete from `news` where `id`=:id";
    $stmtNewDel = $link->prepare($sqlNewsDel);
    $stmtNewDel->bindParam(":id", $proId, PDO::PARAM_INT);
    $stmtNewDel->execute();
    unlink($stdel['image_path']);

    $deleteResult = true;
    echo json_encode($deleteResult);
}

//刪除新聞
// if (isset($_GET['newsDel'])) {
//     echo '<script>location.href ="news_management.php";</script>';

// }
