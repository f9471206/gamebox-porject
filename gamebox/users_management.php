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
    <title>管理員 | GAMES BOX</title>
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
  <link rel="stylesheet" href="css/userpage.css" />
  <!-- owl.carousel -->
  <link rel="stylesheet" href="owl.carousel/owl.carousel.css" />
  <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css" />
  <!-- 垃圾桶 -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <!-- 垃圾桶END -->

  <script src="owl.carousel/jquery.min.js"></script>
  <script src="owl.carousel/owl.carousel.js"></script>
  <!-- end -->

  <script src="js/bootstrap.js"></script>
<style>
  form{
    display: flex;
    flex-direction: row;
  }
  select{
    flex: 70%;
    color: while;
    background-color: black;
    border: 1px white solid;
    border-radius:5px;
    text-align: center;
    padding: 5px 0;

  }
  .input_submit{
    background-color: black;
    border: 1px white solid;
    border-radius:5px;
    text-align: center;
    padding: 5px 0;
    margin-left:2rem ;
    flex: 30%;
  }
</style>
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
        <!-- 帳號總覽 -->
      <main class="main">
        <button class="out_btn">
          <a href="userpage.php">
            <i class="fa-solid fa-angles-left"></i>
            <p>上一頁</p>
          </a>
        </button>
        <button class="out_btn">
          <a href="">
            <i class="fa-regular fa-square-plus"></i>
            <p>增加帳號</p>
          </a>
        </button>


      <h2>會員總覽</h2>
 </h3>
      <table class="table table-dark table-striped">
      <tr>
        <td class="text-center">編號</td>
        <td class="text-center">帳號</td>
        <td class="text-center">等級</td>
        <td class="text-center">加入日期</td>
        <td class="text-center">email</td>
      </tr>
<?php
$sql = "select *from `member`";
$stm = $link->prepare($sql);
$stm->execute();
while ($st = $stm->fetch(PDO::FETCH_ASSOC)) {
    echo '
      <tr>
        <td class="text-center">' . $st['id'] . '</td>
        <td class="text-center">' . $st['username'] . '</td>
        <td class="text-center">'
    ;?>
<?php
if ($st['level'] == 99) {
        echo '管理員';
    } else {
        echo '一般會員';
    }
    ;
    ?>
  <?php echo '
      </td>
        <td class="text-center">' . $st['joindate'] . '</td>
        <td class="text-center">' . $st['email'] . '</td>
      </tr>';
}
;
?>
</table>
    </main>

    <?php
include "./footer.php"
?>
  </body>
</html>

<!-- <script src="js/shoppcart.js"></script> -->
<script src="js/redNumber.js"></script>
<script src="js/login_index.js"></script>