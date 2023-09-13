<?php
require_once 'Connections/cnn.php';
$delsuc = false;
if (isset($_GET['del'])) {
    $delID = $_GET['del'];
    $sql = "delete from banner_img where `id`=:id";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(":id", $delID, PDO::PARAM_INT);
    $stmt->execute();
    $delsuc = true;
    echo json_encode($delsuc);
}
