<?php
require_once 'Connections/cnn.php';

if (isset($_GET['del'])) {
    $delId = $_GET['del'];
    $sqldel = "delete from `cus_form` where `id`=:id";
    $stmtdel = $link->prepare($sqldel);
    $stmtdel->bindParam(":id", $delId, PDO::PARAM_INT);
    $stmtdel->execute();

    $delResut = true;
    echo json_encode($delResut);
}
