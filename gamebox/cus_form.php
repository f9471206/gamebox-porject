<?php
require_once 'Connections/cnn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>客服 | GAMES BOX</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/store.css" />
  <link rel="stylesheet" href="css/cus_form.css" />
  <!-- owl.carousel -->
  <link rel="stylesheet" href="owl.carousel/owl.carousel.css" />
  <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/appstyle.css" />
  <script src="owl.carousel/jquery.min.js"></script>
  <script src="owl.carousel/owl.carousel.js"></script>
  <!-- end -->

  <!-- alert() -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

  <script src="js/bootstrap.js"></script>

  <body>
    <!-- header -->
    <header class="header">
      <div class="logo">
        <a href="index.php"><img src="img/logo.svg" alt="" /> </a>
      </div>

      <div class="navigation">
        <input type="checkbox" class="toggle-menu" />
        <div class="hamburger"></div>
        <ul class="menu">
          <li><a href="store.php?pro_type=fre">免費</a></li>
          <li><a href="store.php?pro_type=adv">冒險</a></li>
          <li><a href="store.php?pro_type=act">動作</a></li>
          <li><a href="store.php?pro_type=sim">模擬</a></li>
          <li><a href="store.php?pro_type=spo">競技</a></li>
          <li><a href="store.php?pro_type=onl">多人</a></li>
          <li><a href="user_collect.php">收藏</a></li>
          <li><a href="news.php">新聞</a></li>
          <li><a href="store.php?pro_type=sto">周邊</a></li>
          <li><a href="cus_form.php">客服</a></li>
          <li><a href="about.php">關於</a></li>
        </ul>
      </div>
    </header>

    <!-- 內容 -->
    <!-- 搜尋 -->
    <div class="div_search">
      <!-- <div class="search">
        <img src="img/search.svg" alt="" />
        <input
        class="input1"
        type="search"
        name="search"
        id="search"
        placeholder="搜尋"
          />
        </div> -->
        <div class="login">
          <a class="a_buy" href="shoppingcart.php">
            <span class="buy_number"></span>
            <img src="img/buy.svg" alt=""
            /></a>

                     <!-- login -->
          <?php
session_start();
if (!isset($_SESSION['username'])) {
    echo '<a href="userpage.php">
            <img src="img/LOGIN.svg" alt="" />
          </a>';
} else {
    // substr($_SESSION['username'], 0, 1)

    echo '<div class="login_outside">
            <a class="login_opacity" href="userpage.php">
              <div class="login_bgcolor"></div>
              <div class="lognn_insidename">' . substr($_SESSION['username'], 0, 1) . '</div>
            </a>
          </div>
          <div class="login_index"></div>';}
?>
          <!-- login -->

          </div>
        </div>

      <main class="main">
      <!-- img -->
      <div class="cus_img">
        <div class="cus_img_left">
          <img src="img/email.svg" alt="email" />
          <h4>google@gmail.com</h4>
        </div>
        <div class="cus_img_center">
          <img src="img/address.svg" alt="address" />
          <h4>No. 100, Guantian District, Tainan City</h4>
        </div>
        <div class="cus_img_rigth">
          <img src="img/phone_icon.svg" alt="phone" />
          <h4>(09)12-345678</h4>
        </div>
      </div>
      <h2>填寫表單</h2>
      <form method="post" class="form_main">
        <div class="form_left">
          <div class="inputBox">
            <input name="user_name" type="text" required="required" />
            <span>姓名</span>
          </div>
          <div class="inputBox">
            <input name="email" type="text" required="required" />
            <span>信箱</span>
          </div>
          <div class="inputBox">
            <input name="phone" type="text" required="required" />
            <span>電話</span>
          </div>
        </div>
        <div class="form_rigth">
          <div class="inputBox">
            <textarea
              name="content"
              id=""
              required="required"
              style="resize: none; height: 100%"
            ></textarea>
            <span>您的需求</span>
          </div>
        </div>

        <div class="cus_submit">
          <input
          class="btn btn-primary"
          type="Submit"
          name="Submit"
          id="sumib"
          value="送出"
          />
        </div>
      </form>
<?php
if (isset($_POST['Submit']) && ($_POST['Submit'] == "送出")) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $content = $_POST['content'];
    $slq = "alter table `cus_form` auto_increment=1;
    insert into cus_form(user_name,email,phone,content) values(:user_name, :email, :phone, :content)";
    $stmt = $link->prepare($slq);
    $stmt->bindParam(":user_name", $user_name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
    $stmt->bindParam(":content", $content, PDO::PARAM_STR);
    $stmt->execute();
    echo '<script>alert("表單已送出")</script>';

}
?>
    </main>

    <!-- 頁尾 -->
    <?php
include "./footer.php"
?>
  </body>
</html>
<script src="js/redNumber.js"></script>
<script src="js/login_index.js"></script>