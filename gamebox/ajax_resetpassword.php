<?php
require_once 'Connections/cnn.php';

if (isset($_POST['submit'])) {
    $resetpasswoed = $_POST['password'];
    $reset_check_password = $_POST['check_password'];
    if ($resetpasswoed != $reset_check_password) {
        $resp = false;
        echo json_encode($resp);
    } else {
        session_start();
        $resetname = $_SESSION['forgetPassword'];
        $sql = "update `member` set password=:password where username=:username";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(":password", $reset_check_password, PDO::PARAM_STR);
        $stmt->bindParam(":username", $resetname, PDO::PARAM_STR);
        $stmt->execute();
        $resp = true;
        echo json_encode($resp);
        unset($_SESSION['forgetPassword']);
    }
}
;
