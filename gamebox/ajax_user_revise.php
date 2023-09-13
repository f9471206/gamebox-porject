
<?php
require_once 'Connections/cnn.php';

if (isset($_POST['name'])) {
    $jsonNmae = $_POST['name'];
    $jsonPassword = md5($_POST['password']);
    $jsonEmail = $_POST['email'];

    $sql = "update `member`
    set password=:password ,
    email=:email
    where username=:username ";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(":password", $jsonPassword, PDO::PARAM_STR);
    $stmt->bindParam(":email", $jsonEmail, PDO::PARAM_STR);
    $stmt->bindParam(":username", $jsonNmae, PDO::PARAM_STR);
    $stmt->execute();
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['userId']);
    unset($_SESSION['userlevel']);

    $jsonResult = true;
    echo json_encode($jsonResult);

}

?>
