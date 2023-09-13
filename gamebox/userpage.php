<?php
require_once 'Connections/cnn.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>location.href ='login.php';</script>";

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>會員專區 | GAMES BOX</title>
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
        <h2><?php echo $_SESSION['username']; ?> 歡迎</h2>
        <div class="userpage_main">
          <div class="div_card ">
            <a class="card_a" href="userdetails.php">
              <div class="card_color ut1">
                <i class="fa-regular fa-user"></i>
              </div>
              <h5>個人資料</h5>
              <p>
                查看個人資料
                <br />
              <br />
            </p>
          </a>
        </div>
        <div class="div_card">
          <a class="card_a" href="order_details.php">
            <div class="card_color ut2">
              <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <h5>你的訂單</h5>
            <p>
              查看訂單明細、評分購買的商品
              <br />
              <br />
            </p>
          </a>
        </div>
        <div id="userOut" class="div_card">
          <a class="card_a"  href="#">
            <div class="card_color ">
            <i class="fa-solid fa-arrow-right-from-bracket"></i></div>
            <h5>登出</h5>
            <p>
            登出帳號
            <br />
              <br />
            </p>
          </a>
        </div>
      </div>

<?php

if (isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == 99) {
    echo '
      <h2>管理者專區</h2>
      <div class="userpage_main">
        <div class="div_card">
          <a class="card_a" href="management_users_details.php">
            <div class="card_color ut3">
              <i class="fa-regular fa-user"></i>
            </div>
            <h5>管理個人資料</h5>
            <p>
              查看所有個人資料
              <br />
              <br />
            </p>
          </a>
        </div>
        <div class="div_card">
          <a class="card_a" href="manager_order_derails.php">
            <div class="card_color ut4">
              <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <h5>訂單</h5>
            <p>
              查看所有訂單明細
              <br />
              <br />
            </p>
          </a>
        </div>
        <div class="div_card">
          <a class="card_a" href="product_management.php">
            <div class="card_color ut5">
              <i class="fa-solid fa-shop"></i>
            </div>
            <h5>管理商品</h5>
            <p>
              商品管理及上架
              <br />
              <br />
            </p>
          </a>
        </div>
        <div class="div_card">
          <a class="card_a" href="news_management.php">
            <div class="card_color ut6">
              <i class="fa-regular fa-newspaper"></i>
            </div>
            <h5>管理新聞</h5>
            <p>
              新聞管理及發布
              <br />
              <br />
            </p>
          </a>
        </div>
        <div class="div_card">
          <a class="card_a" href="banner.php">
            <div class="card_color ut7">
              <i class="fa-solid fa-images"></i>
            </div>
            <h5>管理banner</h5>
            <p>
              管理banner
              <br />
              <br />
            </p>
          </a>
        </div>
        <div class="div_card">
          <a class="card_a" href="cus_form_management.php">
            <div class="card_color ut8">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <h5>客務服務</h5>
            <p>
              管理客服
              <br />
              <br />
            </p>
          </a>
        </div>
      </div>
      ';}
?>
    </main>

    <?php
include "./footer.php"
?>
  </body>
</html>

<!-- <script src="js/shoppcart.js"></script> -->
<script src="js/redNumber.js"></script>


<script>

let userOut = document.querySelector("#userOut");

userOut.addEventListener("click" ,e=>{
  e.preventDefault();
  swal({//https://w3c.hexschool.com/blog/13ef5369
    title: "確定要登出嗎?",
    icon: "info",
    buttons: true,
    dangerMode: true
    }).then((value)=>{
      if(value==true){

        let userOut ={
          out:false
        }

        $.ajax({
          url:'user_out.php',
          type:'post',
          dataType:'json',
          cache:false,
          async:true,
          data:userOut,

          error:function(resp){
            alert('失敗' ,resp)
          },
          success:function(resp){
            if(resp ==true){
              location.href="index.php";
              sessionStorage.removeItem("login");
            }
          }
        })
      }
    })
})
</script>
<script src="js/login_index.js"></script>