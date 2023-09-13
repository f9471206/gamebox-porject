<?php
require_once 'Connections/cnn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>首頁 | GAMES BOX</title>
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

    <!-- alert() -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->


  <!-- owl.carousel -->
  <link rel="stylesheet" href="owl.carousel/owl.carousel.css" />
  <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/appstyle.css" />
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
session_start();
// header("Cache-control:private");
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

        <!-- banner -->
      <main class="main">
        <div class="banner">
        <div
          id="carouselExampleCaptions"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="img/banner/AlbionOnline_banner.jpg"
                class="d-block w-100"
                alt="..."
              />
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>
                  Some representative placeholder content for the first slide.
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <img
                src="img/banner/apex_banner.jpg"
                class="d-block w-100"
                alt="..."
              />
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>
                  Some representative placeholder content for the second slide.
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <img
                src="img/banner/ARK_banner.jpg"
                class="d-block w-100"
                alt="..."
              />
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>
                  Some representative placeholder content for the third slide.
                </p>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!-- 分類  -->
      <div class="Classification">
        <h2 class="mark_h2">瀏覽遊戲分類</h2>
        <div class="owl-carousel owl-theme">
          <div class="item">
            <a href="store.php?pro_type=fre">
              <div class="div_h4">免費</div>
              <div class="img_scale">
                <img src="img/free_game.jpg" alt="" />
              </div>
            </a>
          </div>
          <div class="item">
            <a href="store.php?pro_type=adv">
              <div class="div_h4">冒險</div>
              <div class="img_scale">
                <img src="img/adventure_game.jpg" alt="" />
              </div>
            </a>
          </div>
          <div class="item">
            <a href="store.php?pro_type=act">
              <div class="div_h4">動作</div>
              <div class="img_scale">
                <img src="img/action_game.jpg" alt="" />
              </div>
            </a>
          </div>
          <div class="item">
            <a href="store.php?pro_type=sim">
              <div class="div_h4">模擬</div>
              <div class="img_scale">
                <img src="img/simulation_game.jpg" alt="" />
              </div>
            </a>
          </div>
          <div class="item">
            <a href="store.php?pro_type=spo">
              <div class="div_h4">競技</div>
              <div class="img_scale">
                <img src="img/sport_game.jpg" alt="" />
              </div>
            </a>
          </div>
          <div class="item">
            <a href="store.php?pro_type=onl">
              <div class="div_h4">多人</div>
              <div class="img_scale">
                <img src="img/on_game.jpg" alt="" />
              </div>
            </a>
          </div>
          <div class="item">
            <a href="store.php?pro_type=sto">
              <div class="div_h4">商品</div>
              <div class="img_scale">
                <img src="img/store_index.jpg" alt="" />
              </div>
            </a>
          </div>
        </div>
      </div>



      <!-- 最新發售 -->
      <div class="store_card">
         <h2 class="store_h2">最新發售</h2>
          <div class="row row-cols-1 row-cols-md-4 g-4 card_bg">
<?php
$shelves = '1';
$sql = "SELECT *FROM product
where product.shelves=:shelves
order BY `update`
DESC LIMIT 4 ";
$stmt = $link->prepare($sql);
$stmt->bindParam(":shelves", $shelves, PDO::PARAM_STR);
$stmt->execute();

while ($st = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '
          <div class="col">
            <div class="rank_icon">';

    echo '</div>
            <div class="card h_100 ">
              <img
                src="' . $st['image_path'] . '"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body text_end_div">
                <h4 class="card-title">' . $st['pro_name'] . '</h4>
                <p class="card_text myclass">';
    if ($st['discount'] != 0) {
        echo $st['unitprice'] * (1 - ($st['discount'] * 0.1));
    } else {
        echo $st['unitprice'];
    }
    echo '</p>
                <p class="hidden">' . $st['id'] . '</p>
                <p class="card_text myclass"> $ </p><p>';
    if ($st['discount'] != 0) {
        echo '<del>' . $st['unitprice'] . '$ </del><span class="justify-content-center badge bg-danger fs-5 fw-normal">-' . (10 * $st['discount']) . '%</span>';
    }

    echo '</p><p class="card_text text_end">上架日期: ' . $st['update'] . '</p>';

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
                <a class="btn btn-outline-light" href="store_product_details.php?id=' . $st['id'] . '"
                  >前往購買</a
                >
              </div>
            </div>
          </div>';

}

?>

        </div>
      </div>

      <!-- 銷售排行 -->
           <!-- 最新發售 -->

      <div class="store_card">
        <h2 class="store_h2">銷售排行</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
<?php
$shelvesRank = '1';
$sqlRank = "SELECT  `product`.pro_name ,`product`.unitprice , `product`.image_path,`product`.id, `product`.discount, `product`.evaluate ,`product`.evaluate_time ,sum(order_details.quantity)
            from	`order_details`,`product`
            WHERE `order_details`.`pro_id`=`product`.`id`
            and `shelves`=:shelves
            group BY `order_details`.`pro_id`
            order by sum(order_details.quantity)  DESC
            LIMIT 3;";
$stmtRank = $link->prepare($sqlRank);
$stmtRank->bindParam(":shelves", $shelvesRank, PDO::PARAM_STR);
$stmtRank->execute();
$rankNumber = 0; //皇冠的顏色迴圈
while ($stRank = $stmtRank->fetch(PDO::FETCH_ASSOC)) {
    echo '
          <div class="col ">
            <div class="rank_icon">';
    if ($rankNumber == 0) {
        echo '<span>1#<i class="fa-solid fa-crown" style="color: #ffd700;"></i></span>';
    } elseif ($rankNumber == 1) {
        echo '<span>2#<i class="fa-solid fa-crown" style="color: #c0c0c0;"></i></span>';
    } else {
        echo '<span>3#<i class="fa-solid fa-crown" style="color: #b87333;"></i></span>';
    }
    echo '</div>
            <div class="card h_100 ">
              <img
                src="' . $stRank['image_path'] . '"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h4 class="card-title">' . $stRank['pro_name'] . '</h4>
                <p class="card_text myclass">';
    if ($stRank['discount'] != 0) {
        echo $stRank['unitprice'] * (1 - ($stRank['discount'] * 0.1));
    } else {
        echo $stRank['unitprice'];
    }
    echo '</p>
                <p class="hidden">' . $stRank['id'] . '</p>
                <p class="card_text myclass"> $ </p><p>';
    if ($stRank['discount'] != 0) {
        echo '<del>' . $stRank['unitprice'] . '$ </del><span class="justify-content-center badge bg-danger fs-5 fw-normal">-' . (10 * $stRank['discount']) . '%</span>';
    }
    echo '</p><p class="card_text">銷售量:' . $stRank['sum(order_details.quantity)'] . '</p>';

    if ($stRank['evaluate_time'] != 0) {
        echo '<div class="stars">';
        $evaluate = round($stRank['evaluate'] / $stRank['evaluate_time'], 1);
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
        } elseif ($evaluate < 0 && $evaluate >= 0.5) { //0.5
            echo '
          <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
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
                <a class="btn btn-outline-light" href="store_product_details.php?id=' . $stRank['id'] . '"
                  >前往購買</a
                >
              </div>
            </div>
          </div>
        ';
    $rankNumber++;
}
?>


        </div>
      </div>

      <!-- 折扣 -->
      <div class="store_card">
        <br>
        <br>
        <h2 class="store_h2">優惠折扣</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4 card_bg">
<?php
$shelvesDiscount = '1';
$sqlDiscount = "select *from `product` where discount > 0 and shelves=:shelves ";
$stmtDiscount = $link->prepare($sqlDiscount);
$stmtDiscount->bindParam(":shelves", $shelvesDiscount, PDO::PARAM_STR);
$stmtDiscount->execute();
while ($stDiscount = $stmtDiscount->fetch(PDO::FETCH_ASSOC)) {
    echo '
      <div class="col">
        <div class="card h_100 ">
          <img
            src="' . $stDiscount['image_path'] . '"
            class="card-img-top"
            alt=""
          />
          <div class="card-body text_end_div">
            <h4 class="card-title">' . $stDiscount['pro_name'] . '</h4>
            <p class="card_text myclass">';
    echo $stDiscount['unitprice'] * (1 - ($stDiscount['discount'] * 0.1));

    echo '</p>
            <p class="hidden">' . $stDiscount['id'] . '</p>
            <p class="card_text myclass"> $ </p>
            <p class="card_text text_end"><del>' . $stDiscount['unitprice'] . '$</del>
            <span class="justify-content-center badge bg-danger fs-5 fw-normal">-' . (10 * $stDiscount['discount']) . '%</span></p>
          ';

    if ($stDiscount['evaluate_time'] != 0) {
        echo '<div class="stars">';
        $evaluate = round($stDiscount['evaluate'] / $stDiscount['evaluate_time'], 1);
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
        } elseif ($evaluate < 0 && $evaluate >= 0.5) { //0.5
            echo '
        <i class="fa-solid fa-star-half-stroke"style="color: #ffd700;"></i>
        <i class="fa-regular fa-star" style="color: #ffd700;"></i>
        <i class="fa-regular fa-star" style="color: #ffd700;"></i>
        <i class="fa-regular fa-star" style="color: #ffd700;"></i>
        <i class="fa-regular fa-star" style="color: #ffd700;"></i>
      ';
        }
        echo '(' . $evaluate . ')</div>';
    }

    echo '</div><div class="card-footer store_buy flex-column">
            <a class="btn btn-outline-light shoppCartClick" href="#"
              >加入購物車</a
            >
            <a class="btn btn-outline-light" href="store_product_details.php?id=' . $stDiscount['id'] . '"
              >前往購買</a
            >
          </div>
        </div>
      </div>
    ';

}

?>


        </div>
      </div>


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

<script src="js/storeapp.js"></script>
<script src="js/redNumber.js"></script>
<script src="js/login_index.js"></script>