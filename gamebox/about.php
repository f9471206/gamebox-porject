<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/about.css" />
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
          <li><a href="#">收藏</a></li>
          <li><a href="news.php">新聞</a></li>
          <li><a href="store.php?pro_type=sto">周邊</a></li>
          <li><a href="cus_form.php">客服</a></li>
          <li><a href="about.php">關於</a></li>
        </ul>
      </div>
    </header>

    <!-- 內容 -->
    <main class="main_dark">
      <div class="about_main">
        <div class="about_div">
          <div class="about_div_left">
            <img src="img/logo.svg" alt="logo" />

            <h4>GAMES BOX 是遊玩、購買遊戲的好選擇</h4>
          </div>
          <div class="about_div_rigth">
            <img src="img/about_pic1.jpg" alt="" />
          </div>
        </div>
        <div class="about_col_rev">
          <div class="about_col_left">
            <img class="js_move" src="img/games.png" alt="" />
          </div>
          <div class="about_col_rigth">
            <h2>遊戲庫</h2>
            <h4>這裡有超過2萬款遊戲，從3A大作到獨立完成作品等您來發現。</h4>
            <a class="btn btn-outline-light" href="index.php">去發現</a>
          </div>
        </div>
        <div class="about_col_rev_1">
          <div class="about_col_left">
            <img src="img/sto/pro3_right.jpg" alt="" />
          </div>
          <div class="about_col_rigth">
            <h2>周邊商店</h2>
            <h4>
              我們不只販賣數位遊戲，還有許多的實體周邊商品，讓遊戲外的世界也有許多樂趣。
            </h4>
            <a class="btn btn-outline-light" href="index.php">去購買</a>
          </div>
        </div>
        <div class="about_community">
          <h1>加入社群</h1>
          <h4>
            認識新朋友、加入戰對、加入群組、取得最新消息、一同分享在遊戲中取得的戰利品。
          </h4>
          <div class="about_community_svg">
            <ul>
              <li>
                <a href="#"><img src="img/twitter.svg" alt="" /></a>
              </li>
              <li>
                <a href="#"><img src="img/yt.svg" alt="" /></a>
              </li>
              <li>
                <a href="#"><img src="img/ig.svg" alt="" /></a>
              </li>
              <li>
                <a href="#"><img src="img/fb.svg" alt="" /></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- 搜尋 -->
    </main>

    <!-- 頁尾 -->
    <?php
include "./footer.php"
?>
  </body>
</html>

<script src="js/about.js"></script>
