<?php
session_start();

require_once 'Connections/cnn.php';
$today = date("Y-m-d"); //今天時間
$yestoday = date("Y-m-d", strtotime("-1 day")); //昨天時間
$twoyestoday = date("Y-m-d", strtotime("-2 day")); //前天時間
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>新聞 | GAMES BOX</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/news.css" />
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
      <div class="search">
        <img src="img/search.svg" alt="" />
        <form action="" method="POST">
          <input
          class="input1"
          type="search"
          name="search"
          id="search"
          placeholder="搜尋"
          />
        </form>
        <?php
if (isset($_POST['search']) && $_POST['search'] != "") {
    echo '<script>location.href="product_search.php?search=' . $_POST['search'] . '";</script>';
}
?>
        </div>
        <div class="login">
          <a class="a_buy" href="shoppingcart.php">
            <span class="buy_number"></span>
            <img src="img/buy.svg" alt=""
            /></a>

                     <!-- login -->
          <?php
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
          <div class="login_index"></div>';
}
?>
          <!-- login -->

          </div>
        </div>

    <main class="main">
        <!-- 新聞 -->
        <?php
$id = $_GET['newsId'];
$sql = "select *from `news` where id=:id";
$stmt = $link->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_STR);
$stmt->execute();
$st = $stmt->fetch();
$time = strtotime($st['date']); //strtotime()
echo '
<div class="news_1_img">
    <img src="' . $st['image_path'] . '" alt="" />
  </div>
  <hr />
  <h1>' . $st['title'] . '</h1>
  <h6>';
if (date("Y-m-d", $time) == $today) {
    echo '今天 ' . date("h:i", $time);
} elseif (date("Y-m-d", $time) == $yestoday) {
    echo '昨天 ' . date("h:i", $time);
} elseif (date("Y-m-d", $time) == $twoyestoday) {
    echo '前天' . date("h:i", $time);
} else {
    echo date("Y-m-d H:i", $time);
}

echo '
  </h6>
  <p>' . $st['content'] . '
  </p>';
?>
           <!-- news -->
    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>

<script src="js/redNumber.js"></script>
<script src="js/login_index.js"></script>