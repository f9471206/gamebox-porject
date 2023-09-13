<?php
require_once 'Connections/cnn.php';
require_once 'Connections/cnn_chechout.php';
if (!isset($userid)) {
    echo "<script>alert('請先登入在結帳')</script>";
    echo "<script>location.href ='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>訂單確認 | GAMES BOX</title>
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
  <link rel="stylesheet" href="css/appstyle.css" />

  <!-- alert() -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

  <!-- owl.carousel -->
  <!-- <link rel="stylesheet" href="owl.carousel/owl.carousel.css" />
  <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/appstyle.css" /> -->

  <!-- 垃圾桶 -->
  <!-- <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  /> -->
  <!-- 垃圾桶END -->
<!--
  <script src="owl.carousel/jquery.min.js"></script>
  <script src="owl.carousel/owl.carousel.js"></script> -->
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
// session_start();
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
      <!-- 購物車結帳 -->
      <button id="toback" class="btn btn-outline-light" style="width:250px">上一頁</button>
      <h1><br>確認訂單明細</h1>
      <hr />
      <form action="" method="POST">
      <div class="checkout_title">
        <p class="checkout_input">品名</p>
        <p class="checkout_input">數量</p>
        <p class="checkout_input">單價</p>
        <p class="checkout_input">總價</p>
      </div>
      <section id="shoppCartSection">

      </section>
      <div class="checkdiv sumnumber">

      </div>
      <hr />
      <div class="checkdiv">

        <input class="checkinput" type="submit" name="submit" value="確定結帳">
      </div>

</form>




    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>

<script src="js/checkout.js"></script>
<script>
  let out_btn = document.querySelector("#toback");
  out_btn.addEventListener("click" ,()=>{
    window.history.back();
  } )
</script>
<script src="js/login_index.js"></script>