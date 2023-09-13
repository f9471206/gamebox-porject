<?php
require_once 'Connections/cnn.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>搜尋 | GAMES BOX</title>
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

  <!-- icon -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <!-- icon -->

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
        <form method="POST" action="">
          <input
          class="input1"
          type="search"
          name="search"
          id="search"
          placeholder="搜尋"
            />
          </form>
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
if (isset($_POST['search']) && $_POST['search'] != "") {
    echo '<script>location.href ="product_search.php?search=' . $_POST['search'] . '"</script>';
} else {
    @$search = trim($_GET['search']);
}
?>
      <!-- 搜尋 -->
      <div class="store_card">
        <h2 class="store_h2">搜尋 <?php echo '<span class="bg-success badge fs-5 fw-normal">' . @$_GET['search'] . '</span>' ?> 後的結果</h2>
        <div id="search_div" class="row row-cols-1 row-cols-md-3 g-4">
          <?php
$game_type = array
    ('sto' => '實體商品', 'fre' => '免費遊戲', 'adv' => '冒險遊戲', 'act' => '動作遊戲', 'sim' => '模擬遊戲', 'spo' => '競技遊戲', 'onl' => '多人遊戲');
$type_gb = array
    ('sto' => 'primary', 'fre' => 'secondary', 'adv' => 'success', 'act' => 'info', 'sim' => 'danger', 'spo' => 'warning', 'onl' => 'pink-400');

$shelves = '1';
// $sql = "SELECT *FROM `product` WHERE `product`.pro_type =:pro_type and shelves=:shelves";
$sql = "SELECT *FROM product WHERE product.shelves=:shelves and product.pro_name LIKE :search ;";
$stmt = $link->prepare($sql);
$stmt->bindParam(":shelves", $shelves, PDO::PARAM_STR);
$stmt->bindValue(":search", '%' . $search . '%', PDO::PARAM_STR);
$stmt->execute();
while ($st = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '
          <div class="col">
            <div class="card h-100">
              <img
                src="' . $st['image_path'] . '"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h4 class="card-title">' . $st['pro_name'] . '</h4>';
    if ($st['discount'] != 0) {
        echo '<p class="card-text">' . $st['unitprice'] * (1 - ($st['discount'] * 0.1)) . '</p>';
    } else {
        echo '<p class="card-text">' . $st['unitprice'] . '</p>';
    }
    // <p class="card-text">' . $st['unitprice'] . '</p>
    echo ' <p class="hidden">' . $st['id'] . '</p>';

    if ($st['discount'] != 0) {
        echo '<del>' . $st['unitprice'] . ' $</del>' . ' <span class="justify-content-center badge bg-danger fs-5 fw-normal"> -' . (10 * $st['discount']) . '%</span><br/><br/>';
    }

    echo ' <span class="bg-' . $type_gb[$st['pro_type']] . ' badge fs-6 fw-normal">' . $game_type[$st['pro_type']] . '</span>';

    if ($st['evaluate_time'] != 0) {
        echo '<div class="stars">';
        $evaluate = round($st['evaluate'] / $st['evaluate_time'], 1);
        if ($evaluate >= 4.7) { //5
            echo '
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    ';
        } elseif ($evaluate < 4.7 && $evaluate >= 4.5) { //4.5
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
    ';
        } elseif ($evaluate < 4.5 && $evaluate >= 4) { //4
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
        } elseif ($evaluate < 4 && $evaluate >= 3.5) { //3.5
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
        } elseif ($evaluate < 3.5 && $evaluate >= 3) { //3
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
        } elseif ($evaluate < 3 && $evaluate >= 2.5) { //2.5
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
        } elseif ($evaluate < 2.5 && $evaluate >= 2) { //2
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
        } elseif ($evaluate < 2 && $evaluate >= 1.5) { //1.5
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
        } elseif ($evaluate < 1.5 && $evaluate >= 1) { //1
            echo '
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
        } elseif ($evaluate < 1 && $evaluate >= 0.1) { //0.5
            echo '
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
        } else {
            echo '
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
        ';
        }
        echo '(' . $evaluate . ')</div>';
    }

    echo '</div>
              <div class="card-footer store_buy flex-column">
                <a class="btn btn-outline-light shoppCartClick" href="#"
                  >加入購物車</a
                >
                <a
                  class="btn btn-outline-light"
                  href="store_product_details.php?id=' . $st['id'] . '"
                  >前往購買</a
                >
              </div>
            </div>
          </div>
          ';}
$link = null;?>
        </div>
      </div>
    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>

<script src="js/storeapp.js"></script>
<!-- <script src="js/checkRank.js"></script> -->
<script>
  let search_div = document.querySelector("#search_div");
  if (search_div.children.length == 0) {
    let text = document.createElement("h3");
    text.innerText = "請重新搜尋";
    search_div.appendChild(text);
  }
</script>
<script src="js/login_index.js"></script>