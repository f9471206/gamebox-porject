
<?php
//確認帳號是否有重複
if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
    $membername = trim($_POST['username']);
    $sql = "SELECT `member`.username FROM `member` WHERE `member`.username =:username";
    $stmt = $link->prepare($sql);
    $stmt->bindParam(":username", $membername, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    $memberpassword = trim($_POST['password']);
    $checkpassword = trim($_POST['checkpassword']);
    $joindate = date('Y-m-d H:i:s');
    $email = trim($_POST['email']);
}
// if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
//     $membername = $_POST['username'];
//     $password = md5($_POST['password']);
//     $checkpassword = md5($_POST['checkpassword']);
//     $joindate = date('Y-m-d H:i:s');
//     // if ($password != $checkpassword) {
//     //     echo "<script>alert('請確認密碼一致')</script>";
//     // } elseif ($password == "" || $checkpassword == "") {
//     //     echo "<script>alert('密碼不能是空值')</script>";
//     // } else {
//     //     $sql2 = "alter table `member` auto_increment=1;
//     //     insert into member(username, password,joindate) values(:username, :password, :joindate)";
//     //     $stmt2 = $link->prepare($sql2);
//     //     $stmt2->bindParam(":username", $membername, PDO::PARAM_STR);
//     //     $stmt2->bindParam(":password", $password, PDO::PARAM_STR);
//     //     $stmt2->bindParam(":joindate", $joindate, PDO::PARAM_STR);
//     //     // $stmt2->bindParam(":level", 1, PDO::PARAM_INT);
//     //     $stmt2->execute();
//     // }
// }
