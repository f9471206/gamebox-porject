<?php
require_once 'cnn.php';

//login
if (isset($_POST['op']) && $_POST['op'] == 'edit') {
    $respa = array('success' => false, 'name' => false, 'password' => false);
    $formUsername = $_POST['username'];
    $formUserpassword = md5($_POST['password']);
    // ---------------------------------------------
    $sql = "SELECT `member`.id, `member`.username,`member`.password,
    `member`.level FROM `member` WHERE `member`.username =:username";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(":username", $formUsername, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount(); //確定有一
    $st = $stmt->fetch();
    if ($count == 0) {
        echo json_encode($respa);
        exit;
    }
    if ($count == 1 && $st['password'] != $formUserpassword) {
        $respa['name'] = true;
        echo json_encode($respa);
        exit;
    }
    if ($count == 1 && $st['password'] == $formUserpassword) {
        // echo $st['level'];
        session_start();
        $_SESSION['username'] = $st['username']; //帳號名稱
        $_SESSION['userId'] = $st['id']; //帳號的流水號ID
        $_SESSION['userlevel'] = $st['level']; //帳號權限
        $respa['name'] = true;
        $respa['password'] = true;
        $respa['success'] = true;
        echo json_encode($respa);
        exit;
    }
}

//forget_password
if (isset($_POST['checkName'])) {
    $checkName = $_POST['checkName'];
    $slqCheck = "select *from member where username=:username";
    $stmtCheck = $link->prepare($slqCheck);
    $stmtCheck->bindParam(":username", $checkName, PDO::PARAM_STR);
    $stmtCheck->execute();
    $countCheck = $stmtCheck->rowCount();
    if ($countCheck == 0) {
        $checkResult = false;
        echo json_encode($checkResult);
    } else {
        $checkResult = true;
        session_start();
        $_SESSION['forgetPassword'] = $checkName;
        echo json_encode($checkResult);
    }

}
