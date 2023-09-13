<?php
require_once 'Connections/cnn.php';
if (!isset($_GET['id'])) {
    echo "<script>location.href ='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>產品 | GAMES BOX</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/store_earphone.css" />
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
$proId = $_GET['id'];
$sql = "select *from product where id=:id";
$stmt = $link->prepare($sql);
$stmt->bindParam(":id", $proId, PDO::PARAM_STR);
$stmt->execute();
$st = $stmt->fetch();

?>

      <div class="breadcrumb">
        <ul>
          <li><a href="index.php">首頁</a></li>
          <li>></li>
          <li><a href="store.php">
            <?php
$pro_type = array('sto' => '實體商品', 'fre' => '免費遊戲', 'adv' => '冒險遊戲', 'act' => '動作遊戲', 'sim' => '模擬遊戲', 'spo' => '競技遊戲', 'onl' => '多人遊戲');
foreach ($pro_type as $key => $value) {
    if ($key == $st['pro_type']) {
        echo '<li><a href="store.php?pro_type=' . $st['pro_type'] . '">' . $pro_type[$st['pro_type']] . '<li>';
    }
}

?>
</a></li>
          <li>></li>
          <li><?php echo $st['pro_name'] ?></li>
        </ul>
      </div>

      <!-- 商店 -->
      <div class="main_earphone">
        <div class="earphone_left">
          <img src="<?php echo $st['image_path'] ?>" alt="" />
        </div>
        <div class="earphone_rigth">
          <!-- 商品名稱 -->
          <h1><?php echo $st['pro_name'] ?></h1>
          <p class="store_pro_details"><?php echo $st['content'] ?></p>
          <div style="display: flex">
            <!-- 商品價格 -->

<?php
if ($st['discount'] != 0) {
    echo '<h3>' . $st['unitprice'] * (1 - ($st['discount'] * 0.1)) . '</h3>';
} else {
    echo '<h3>' . $st['unitprice'] . '</h3>';
}
?>
            <!-- 商品資料庫的ID -->
            <p class="hidden"><?php echo $st['id'] ?></p>
            <h3>$</h3>
          </div>
          <div style="display: flex ">

            <?php
if ($st['discount'] != 0) {
    echo '<del>' . $st['unitprice'] . ' $</del>' . ' <span class="justify-content-center badge bg-danger fs-5 fw-normal"> -' . (10 * $st['discount']) . '%</span>';
}
?>
          </div>
          <div class="earphone_butten">
            <a class="btn btn-outline-light" href="#">購買</a>
            <a class="btn btn-outline-light" href="#"
              >加入購物車</a
            >
          </div>
        </div>
      </div>
      <div class="evaluate_stars">
<?php
if ($st['evaluate_time'] != 0) {
    echo '<div class="stars">';
    $evaluate = round($st['evaluate'] / $st['evaluate_time'], 1);
    if ($evaluate >= 4.7) {
        echo '
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    ';
    } elseif ($evaluate < 4.7 && $evaluate >= 4.5) {
        echo '
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
    ';
    } elseif ($evaluate < 4.5 && $evaluate >= 4) {
        echo '<i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
    } elseif ($evaluate < 4 && $evaluate >= 3.5) {
        echo '<i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
    } elseif ($evaluate < 3.5 && $evaluate >= 3) {
        echo '<i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
    } elseif ($evaluate < 3 && $evaluate >= 2.5) {
        echo '<i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star" style="color: #ffd700;"></i>
      <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
    } elseif ($evaluate < 2.5 && $evaluate >= 2) {
        echo '<i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
    } elseif ($evaluate < 2 && $evaluate >= 1.5) {
        echo '<i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
    } elseif ($evaluate < 1.5 && $evaluate >= 1) {
        echo '<i class="fa-solid fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
    } elseif ($evaluate < 1 && $evaluate >= 0.5) {
        echo '<i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
    } else {
        echo '<i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    <i class="fa-regular fa-star" style="color: #ffd700;"></i>
    ';
    }
    echo '(' . $st['evaluate_time'] . ')</div>';
}
?>
      </div>
      <!-- <div class="earphone_content">
        <h3>商品簡介</h3>
        <table class="table table-dark table-borderless fs-5 text">
          <tr>
            <td>品牌</td>
            <td>Shin Sei Development Corporation</td>
          </tr>
          <tr class="table-active">
            <td>型號</td>
            <td>XVX-016</td>
          </tr>
          <tr>
            <td>顏色</td>
            <td>白色</td>
          </tr>
          <tr class="table-active">
            <td>重量</td>
            <td>439g</td>
          </tr>
        </table>
        <div class="video_div video_padding">
          <iframe src="https://www.youtube.com/embed/r5xSgCb4g4c"></iframe>
        </div>
        <img src="img/store/earphone01.jpg" alt="" />
        <img src="img/store/earphone02.jpg" alt="" />
        <img src="img/store/earphone03.jpg" alt="" />
      </div> -->
    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>
<script src="js/redNumber.js"></script>
<script src="js/store_product_details.js"></script>
<script src="js/login_index.js"></script>
