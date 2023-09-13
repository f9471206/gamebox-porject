<?php
require_once 'Connections/cnn.php';
require_once 'Connections/cnn_adduser.php';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>註冊 | GAMES BOX</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/add_member.css" />
  <!-- owl.carousel -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
  />

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
  />

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- end -->

  <script src="js/bootstrap.js"></script>

  <body>
    <!-- 內容 -->
    <main>
      <form method="post" action="">
        <h3>建立新帳號</h3>
        <div class="inputBox">
        <!-- required="required" -->
        <label class="label_name">帳號</label>
          <input class="check_input"  name="username" type="text"
          required="required" value="
<?php
if (isset($membername)) {
    echo htmlspecialchars($membername);
}
?>"/>
        </div>
        <div class="inputBox">
          <label class="label_passward">密碼</label>
          <input name="password" type="password"
           required="required" value="<?php
if (isset($memberpassword)) {
    echo htmlspecialchars($memberpassword)
    ;}
?>"/>
        </div>
        <div class="inputBox">
          <label class="label_checkpassword">確認密碼</label>
        <input name="checkpassword" type="password" required="required" value="
<?php
if (isset($checkpassword)) {
    echo htmlspecialchars($checkpassword);
}?>"/>
        </div>
        <div class="inputBox">
          <label>Email</label>
          <input name="email" type="text" required="required" value="
<?php
if (isset($email)) {
    echo htmlspecialchars($email);
}
?>" />
        </div>
        <div class="button_sub">
          <button class="buttondefcolor"id="check_sub" name="submit" value="Submit">建立</button>
<?php
echo '<script> let name = document.querySelector(".label_name"); </script>';
echo '<script> let password = document.querySelector(".label_passward"); </script>';
echo '<script> let checkpassword = document.querySelector(".label_checkpassword"); </script>';
if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
    if (isset($count) && $count > 0) {
        echo '
    <script>
      name.style.animation = "checkword 0.5s forwards";
      name.innerText ="* 帳號重複" ;
    </script>';
    } elseif (md5($memberpassword) != md5($checkpassword)) {
        echo '
    <script>
      checkpassword.style.animation = "checkword 0.5s forwards";
      checkpassword.innerText ="* 二次密碼不一致" ;
    </script>';
    } else {
        $md5Password = md5($memberpassword);
        $sql2 = "alter table `member` auto_increment=1;
           insert into member(username, password,joindate,email) values(:username, :password, :joindate, :email)";
        $stmt2 = $link->prepare($sql2);
        $stmt2->bindParam(":username", $membername, PDO::PARAM_STR);
        $stmt2->bindParam(":password", $md5Password, PDO::PARAM_STR);
        $stmt2->bindParam(":joindate", $joindate, PDO::PARAM_STR);
        $stmt2->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt2->execute();
        echo '<script>alert("成功註冊")</script>';
        echo '<script>location.href ="login.php";</script>';
        $link = null;
    }
}
?>
          <a href="login.php">我已經有一個帳號了</a>
        </div>
      </form>
    </main>
  </body>
</html>
<!-- <script src="js/addmember.js"></script> -->


