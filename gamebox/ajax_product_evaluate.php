<?php
require_once 'Connections/cnn.php';

if (isset($_GET['stars'])) {
    $evaluate = $_GET['stars'];
    $pro_id = $_GET['id'];
    $hit_time = 1;
    $sql = "UPDATE `order_details` , product set
    `order_details`.evaluate=:evaluate ,
    `product`.evaluate=`product`.evaluate + :pro_evaluate ,
    `product`.evaluate_time = `product`.evaluate_time + :evaluate_time
    WHERE `order_details`.pro_id=:pro_id AND `product`.id=:id";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(":evaluate", $evaluate, PDO::PARAM_INT);
    $stmt->bindParam(":pro_evaluate", $evaluate, PDO::PARAM_INT);
    $stmt->bindParam(":evaluate_time", $hit_time, PDO::PARAM_INT);
    $stmt->bindParam(":pro_id", $pro_id, PDO::PARAM_INT);
    $stmt->bindParam(":id", $pro_id, PDO::PARAM_INT);
    $stmt->execute();
    echo json_encode($evaluate);
}
