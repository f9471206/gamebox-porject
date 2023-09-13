<?php
require_once 'Connections/cnn.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>location.href ='index.php';</script>";
}

$userid = $_SESSION['userId'];
$sql = "SELECT *FROM `member` WHERE `member`.id=:id";
$stm = $link->prepare($sql);
$stm->bindParam(":id", $userid, PDO::PARAM_STR);
$stm->execute();
$st = $stm->fetch();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>個人資料 | GAMES BOX</title>
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
  <!-- owl.carousel -->
  <link rel="stylesheet" href="owl.carousel/owl.carousel.css" />
  <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/appstyle.css" />
  <link rel="stylesheet" href="css/userdetails.css" />
  <!-- 外部icon -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <!-- 外部icon END -->

  <!-- alert() -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

  <script src="owl.carousel/jquery.min.js"></script>
  <script src="owl.carousel/owl.carousel.js"></script>
  <!-- end -->

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
        <button class="out_btn">
          <a href="userpage.php">
          <i class="fa-solid fa-angles-left"></i>
          <p>上一頁</p>
        </a>
      </button>
      <h1>個人資料</h1>

      <div class="userdetails_main">
        <div class="details">
          <h4>使用者編號</h4>
          <h4><?php echo $st['id']; ?></h4>
        </div>
        <div class="details">
          <h4>帳號</h4>
          <h4><?php echo $_SESSION['username']; ?></h4>
        </div>
        <div class="details">
          <h4>密碼</h4>
          <h4>********</h4>
        </div>
        <div class="details">
          <h4>使用者權限</h4>
          <h4><?php
if ($st['level'] == 99) {
    echo '系統管理員';} else {
    echo '一般會員';
}
;?></h4>
        </div>
        <div class="details">
          <h4>信箱</h4>
          <h4><?php echo $st['email']; ?></h4>
        </div>
        <div class="details">
          <h4>加入日期</h4>
          <h4><?php echo $st['joindate']; ?></h4>
        </div>
      </div>
      <button class="Revise_btn"><a href="userdetails_revise.php">修改資料</a></button>
    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>

<script src="js/redNumber.js"></script>
<!-- <script src="js/shoppcart.js"></script> -->
<script src="js/login_index.js"></script>