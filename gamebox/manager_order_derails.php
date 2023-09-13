<?php
require_once 'Connections/cnn.php';
session_start();
if ($_SESSION['userlevel'] != 99) {
    echo "<script>location.href ='index.php';</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>訂單明細 | GAMES BOX</title>
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
  <link rel="stylesheet" href="css/userpage.css" />
  <link rel="stylesheet" href="css/manager_order_details.css" />

<!-- alert() -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

  <!--外部icon  -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <!--icon END -->
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
        <button class="back_1p">
          <a href="userpage.php">
            <i class="fa-solid fa-angles-left"></i>
            <p>上一頁</p>
          </a>
      </button>
      <h1>歡迎，<?php echo $_SESSION['username'] ?> 管理員</h1>
      <h3>訂單總覽<br/><br/></h3>

<?php
$sql = "SELECT
`member`.username ,
`order`.order_date,
`order`.order_id
FROM `member`,`order`
WHERE `member`.id=`order`.user_id ";
$stmt = $link->prepare($sql);
$stmt->execute();
while ($st = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="order_list">
          <div class="title">
            <h4> 訂單編號: ' . $st['order_id'] . '<h2>
            <h4>訂單日期: ' . $st['order_date'] . '</h4>
            <h4> 購買人: ' . $st['username'] . ' </h4>
            <button class="butt_display">
              <i class="fa-solid fa-sort-down fa-2xl but_i" style="color: #ffffff;"></i>
            </button>

          </div>';
    $orderid = $st['order_id'];
    $sqldetails = "SELECT
    `product`.image_path,
    `product`.pro_name,
    `order_details`.quantity,
    `order_details`.unitprice,
    `order_details`.evaluate
    FROM `product`,`order_details`
    WHERE `product`.id=`order_details`.pro_id AND
    `order_details`.order_id=:order_id";
    $stmtdetails = $link->prepare($sqldetails);
    $stmtdetails->bindParam(":order_id", $orderid, PDO::PARAM_INT);
    $stmtdetails->execute();
    echo '<table class="table table-dark table-striped order_display_none">
            <tr >
              <td>圖片</td>
              <td>商品</td>
              <td>數量</td>
              <td>單價</td>
              <td>評分</td>
            </tr>';

    while ($stdetails = $stmtdetails->fetch(PDO::FETCH_ASSOC)) {
        echo '
            <tr>
              <td><img class="order_img" src=' . $stdetails['image_path'] . ' /></td>
              <td>' . $stdetails['pro_name'] . '</td>
              <td>' . $stdetails['quantity'] . '</td>
              <td>' . $stdetails['unitprice'] . '$</td>
              <td>' . $stdetails['evaluate'] . '</td>
            </tr>

        ';

    }
    echo '</table>';
    $sql3 =
        "SELECT `order_details`.quantity,`order_details`.unitprice
          FROM  `order_details`
          WHERE `order_details`.order_id=:order_id";
    $stmt3 = $link->prepare($sql3);
    $stmt3->bindParam(":order_id", $orderid, PDO::PARAM_INT);
    $stmt3->execute();
    $total = 0;
    while ($stin3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        $quantity = $stin3['quantity'];
        $unitprice = $stin3['unitprice'];
        $total += $quantity * $unitprice;
    }
    echo '<div class="end"><h4>總價: ' . $total . '</h4></div>
        </div>';
    echo '<hr />';
}

?>

    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>

<!-- <script src="js/shoppcart.js"></script> -->
<script src="js/order.js"></script>
<script src="js/redNumber.js"></script>
<script src="js/order_details_btn.js"></script>
<script src="js/login_index.js"></script>