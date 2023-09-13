<?php
require_once 'Connections/cnn.php';

$pro_type = array('sto' => '實體商品', 'fre' => '免費遊戲', 'adv' => '冒險遊戲', 'act' => '動作遊戲', 'sim' => '模擬遊戲', 'spo' => '競技遊戲', 'onl' => '多人遊戲');
$type_gb = array
    ('sto' => 'primary', 'fre' => 'secondary', 'adv' => 'orange-400', 'act' => 'info', 'sim' => 'danger', 'spo' => 'warning', 'onl' => 'pink-400');

session_start();
if (isset($_SESSION['username'])) {
    $u_name = $_SESSION['username'];
    $u_id = $_SESSION['userId'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>收藏庫 | GAMES BOX</title>
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
  <!-- icon -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <!-- icon -->


  <!-- owl.carousel -->
  <link rel="stylesheet" href="owl.carousel/owl.carousel.css" />
  <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/appstyle.css" />
  <link rel="stylesheet" href="css/user_collect.css" />

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
        <h2 class="store_h2">您的收藏庫</h2>
        <div id="userCollect" class="row row-cols-1 row-cols-md-4 g-4">
          <?php
$sql = "SELECT product.pro_name, product.image_path, product.pro_type, product.shelves,
        MAX(`order`.order_date) AS max_order_date
        FROM product, order_details, `order`
        WHERE product.id = order_details.pro_id
        AND order_details.order_id = `order`.order_id
        AND `order`.user_id =:user_id
        GROUP BY product.id
        order BY MAX(`order`.order_date) desc";
$stmt = $link->prepare($sql);
$stmt->bindParam(":user_id", $u_id, PDO::PARAM_STR);
$stmt->execute();
while ($st = $stmt->fetch()) {
    $time_main = strtotime($st['max_order_date']);
    echo '
  <div class="col">
  <div class="card h-100">
  <img src="' . $st['image_path'] . '" class="card-img-top" alt="..." />
  <div class="card-body">
  <h4 class="card-title">名稱: ' . $st['pro_name'] . '</h4>
  <p class="card-text card_end"><span class="bg-' . $type_gb[$st['pro_type']] . ' d-flex justify-content-center badge">' . $pro_type[$st['pro_type']] . '</span></p>
  <p class="card-text ">';
    if ($st['shelves'] == '1') {
        echo '<span class="d-flex justify-content-center badge bg-success fs-5 fw-normal ">販賣中</span>';
    } else {
        echo '<span class="d-flex justify-content-center badge bg-danger fs-5 fw-normal">已下架</span>';
    }
    echo '</p>
  <p class="card-text fs-6">購買日期: ' . date("Y-m-d H:i", $time_main) . '</p>
  </div>
  </div>
  </div>
    ';

}

?>
      <!-- 內容 -->
      </div>
      <!-- 內容 END -->
    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>

<script>
  $(".owl-carousel").owlCarousel({
    loop: false, // 循環播放
    margin: 10, // 外距 10px
    nav: false, // 顯示點點
    responsive: {
      0: {
        items: 3, // 螢幕大小為 0~600 顯示 1 個項目
      },
      600: {
        items: 5, // 螢幕大小為 600~1000 顯示 3 個項目
      },
      1500: {
        items: 7, // 螢幕大小為 1000 以上 顯示 5 個項目
      },
    },
  });
</script>
<!-- <script src="js/redNumber.js"></script> -->
<!-- <script src="js/checkRank.js"></script> -->
<script src="js/storeapp.js"></script>
 <!-- alert() -->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

  <script>
    let userCollect=  document.querySelector("#userCollect")
    if(userCollect.children.length==0){
      userCollect.innerHTML="<h3 style='width:100%'>你還沒買任何東西喔!</h3>";
    }

</script>
<script src="js/login_index.js"></script>

