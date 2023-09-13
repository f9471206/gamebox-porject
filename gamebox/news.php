<?php
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
          <div class="login_index"></div>';
}
?>
          <!-- login -->

          </div>
        </div>
        <main class="main">
        <?php

$sql = "SELECT *FROM `news` order BY `news`.date desc LIMIT 2";
$stmt = $link->prepare($sql);
$stmt->execute();

// 新聞
echo '<div class="news_banner">';
$title = 1;
while ($st = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $time = strtotime($st['date']); //strtotime()
    //echo date("Y-m-d H:i", $time);
    if ($title = 1) {
        echo '
    <div class="news_left">';
    } else {
        echo '<div class="news_left">';
    }

    echo '<a href="news_details.php?newsId=' . $st['id'] . '">
  <img src="' . $st['image_path'] . '" alt="news" />
  </a>
  <h6>';
    if (date("Y-m-d", $time) == $today) {
        echo '今天 ' . date("h:i", $time);
    } elseif (date("Y-m-d", $time) == $yestoday) {
        echo '昨天 ' . date("h:i", $time);
    } elseif (date("Y-m-d", $time) == $twoyestoday) {
        echo '前天' . date("h:i", $time);
    } else {
        echo date("Y-m-d ", $time);
    }
    echo '</h6>
      <a class="a_text-decoration" href="news_details.php?newsId=' . $st['id'] . '">
      <h4>
      ' . $st['title'] . '
      </h4>
      </a>
      </div>
      ';
    $title++;
}

?>
<div class="news_main">
<?php
$sqlmain = "SELECT *FROM `news` order BY `news`.date desc LIMIT 2,10";
$stmtmain = $link->prepare($sqlmain);
$stmtmain->execute();
while ($stmain = $stmtmain->fetch(PDO::FETCH_ASSOC)) {
    $time_main = strtotime($stmain['date']);
    echo '
        <div class="news_content">
          <div class="news_main_img">
            <a href="news_details.php?newsId=' . $stmain['id'] . '"
              ><img src="' . $stmain['image_path'] . '" alt=""
            /></a>
          </div>
          <div class="news_p"><h6>';
    if (date("Y-m-d", $time_main) == $today) {
        echo '今天' . date("H:i", $time_main);
    } elseif (date("Y-m-d", $time_main) == $yestoday) {
        echo '昨天' . date("H:i", $time_main);
    } elseif (date("Y-m-d", $time_main) == $twoyestoday) {
        echo '前天' . date("H:i", $time_main);
    } else {
        echo date("Y-m-d", $time_main);
    }
    echo '      </h6>
              <a class="a_text-decoration" href="news_details.php?newsId=' . $stmain['id'] . '"
              >' . $stmain['title'] . '</a
              >
            </>
            <p>
            ' . $stmain['content'] . '
            </p>
          </div>
        </div>
  ';

}

?>

      </div>
      <!-- news -->
    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>
<script src="js/redNumber.js"></script>
<script src="js/login_index.js"></script>