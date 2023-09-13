<?php
require_once 'Connections/cnn.php';

// 下架商品
if (isset($_GET['off'])) {
    $proId = $_GET['off'];
    $shelves = "0";
    $sqlOffPro = "UPDATE `product` SET `shelves`=:shelves where `id`=:id";
    $stmtOffPro = $link->prepare($sqlOffPro);
    $stmtOffPro->bindParam(":shelves", $shelves, PDO::PARAM_STR);
    $stmtOffPro->bindParam(":id", $proId, PDO::PARAM_INT);
    $stmtOffPro->execute();
    echo json_encode(true);
}

//上架商品
if (isset($_GET['put'])) {
    $proId = $_GET['put'];
    $shelves = "1";

    $sqlOffPro = "UPDATE `product` SET `shelves`=:shelves where `id`=:id";
    $stmtOffPro = $link->prepare($sqlOffPro);
    $stmtOffPro->bindParam(":shelves", $shelves, PDO::PARAM_STR);
    $stmtOffPro->bindParam(":id", $proId, PDO::PARAM_INT);
    $stmtOffPro->execute();
    echo json_encode(true);
}
