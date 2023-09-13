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
    <title>新增產品 | GAMES BOX</title>
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
            <a href="product_management.php">
            <i class="fa-solid fa-angles-left"></i>
            <p>上一頁</p>
          </a>
        </button>

      <!-- 新增商品-->
      <h2>新增商品</h2>
      <form method="post" action="" enctype="multipart/form-data">
        <!-- 商品名稱 -->
        <label class="label_name">商品名稱</label>
        <input class="input_pro" type="text" name="pro_name"  required="required"/>
        <label class="label_name">商品單價</label>
        <input
        class="input_pro"
        type="number"
        name="quantity"
        min="1"
        required="required"
        />
        <label class="label_name">折扣</label>
        <select class="input_pro" name="discount" id="">
          <option value="0">0%</option>
          <option value="1">10%</option>
          <option value="2">20%</option>
          <option value="3">30%</option>
          <option value="4">40%</option>
          <option value="5">50%</option>
          <option value="6">60%</option>
          <option value="7">70%</option>
          <option value="8">80%</option>
          <option value="9">90%</option>
          <option value="10">100%</option>
        </select>
        <label class="label_name">商品類型</label>
        <div>
          <input type="radio" id="fre" name="type" value="fre" />
          <label for="fre">免費遊戲</label>
        </div>
        <div>
          <input type="radio" id="adv" name="type" value="adv" required/>
          <label for="adv">冒險遊戲</label>
        </div>
        <div>
          <input type="radio" id="act" name="type" value="act" />
          <label for="act">動作遊戲</label>
        </div>
        <div>
          <input type="radio" id="sim" name="type" value="sim" />
          <label for="sim">模擬遊戲</label>
        </div>
        <div>
          <input type="radio" id="spo" name="type" value="spo" />
          <label for="spo">競技遊戲</label>
        </div>
        <div>
          <input type="radio" id="onl" name="type" value="onl" />
          <label for="onl">多人遊戲</label>
        </div>
        <div>
          <input type="radio" id="sto" name="type" value="sto" />
          <label for="sto">實體商品</label>
        </div>
        <label for=""><br />商品圖片</label>
        <input type="file" name="fileToUpload" accept="image/jpeg,image/png" required/>
        <label for="content">商品簡介</label>
        <textarea class="pro_content" name="content" id="content" cols="30" rows="10"></textarea>
        <hr/>
        <input class="btn btn-outline-light" type="submit"name="Submit" value="送出" />
      </form>
    </main>
<?php

if (isset($_POST['Submit']) && ($_POST['Submit'] == '送出')) {
    $img_name = $_FILES['fileToUpload']['name']; //圖片名稱
    $pro_type = $_POST['type']; //商品類型
    $imgPath = "img/store/" . $img_name;
    $shelves = '0';
    $discount = $_POST['discount'];
    $date = date("Y-m-d");
    if (file_exists($imgPath)) {
        echo '<script>swal("上傳圖片重覆", "請更換圖片或更改圖片名稱", "warning", {button: "OK !"})</script>';
    } else {
        //新增商品
        $pro_name = $_POST['pro_name']; //商品名稱
        $quantity = $_POST['quantity']; //商品單價
        $content = $_POST['content']; //商品內容
        $sql = "alter table `product` auto_increment=1;
      insert into product(pro_name, unitprice,image_path,pro_type,shelves ,`update`,`discount`,`content`)
      values(:pro_name, :unitprice, :image_path, :pro_type ,:shelves ,:update,:discount,:content)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(":pro_name", $pro_name, PDO::PARAM_STR);
        $stmt->bindParam(":unitprice", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":image_path", $imgPath, PDO::PARAM_STR);
        $stmt->bindParam(":pro_type", $pro_type, PDO::PARAM_STR);
        $stmt->bindParam(":shelves", $shelves, PDO::PARAM_STR);
        $stmt->bindParam(":update", $date, PDO::PARAM_STR);
        $stmt->bindParam(":discount", $discount, PDO::PARAM_STR);
        $stmt->bindParam(":content", $content, PDO::PARAM_STR);
        $stmt->execute();
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imgPath); //存到哪一個資料夾
        echo '<script>
        swal("新增成功", "", "success", {button: "OK !"})
        .then((value) => {
            location.href = "product_management.php";
        });
            </script>';

    }
    // echo '<p>' . $_FILES['fileToUpload']['name'] . '</p>'; //檔案名稱
    // echo '<p>' . $_FILES['fileToUpload']['tmp_name'] . '</p>'; //暫存 {
    // $image_path = $_FILES['fileToUpload']['name'];
}

?>
 <?php
include "./footer.php"
?>
  </body>
</html>

<!-- <script src="js/shoppcart.js"></script> -->
<script src="js/redNumber.js"></script>
<script src="js/login_index.js"></script>