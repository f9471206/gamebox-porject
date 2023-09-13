<?php
require_once 'Connections/cnn.php';
session_start();
if ($_SESSION['userlevel'] != 99 || !isset($_GET['id'])) {
    echo "<script>location.href ='index.php';</script>";
}

$pro_id = $_GET['id'];
$sql = "select *from `product` where id=:id";
$stmt = $link->prepare($sql);
$stmt->bindParam(":id", $pro_id, PDO::PARAM_INT);
$stmt->execute();
$st = $stmt->fetch();
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
      <!-- 編輯 -->
    <main class="main">
      <button class="out_btn">
        <a href="product_management.php">
          <i class="fa-solid fa-angles-left"></i>
          <p>上一頁</p>
        </a>
      </button>
      <h2>商品編輯頁面<br / ><br / ></h2>
      <h4>商品圖片</h4>
      <img class="pro_img" src="<?php echo $st['image_path'] ?>" alt="">



      <form method="post" action="" enctype="multipart/form-data">
        <label class="label_name" >商品流水號</label>
        <input class="input_pro"  name="pro_id" type="text" readonly value="<?php echo $st['id']; ?>" />
        <label class="label_name">商品名稱</label>
        <input class="input_pro"  name="pro_name" type="text" value="<?php echo $st['pro_name']; ?>" />
        <label class="label_name">單價</label>
        <input class="input_pro"  name="pro_unitprice" type="text" value="<?php echo $st['unitprice']; ?>" />

        <label class="label_name">折扣</label>
        <select class="input_pro" name="discount" id="">
          <?php
for ($i = 0; $i <= 10; $i++) {
    if ($i == $st['discount']) {
        echo '<option selected value="' . $i . '">' . $i . '0%</option>';
    } else {
        echo '<option value="' . $i . '">' . $i . '0%</option>';
    }
}
?>
        </select>

        <label class="label_name">商品類型</label>
        <div>
          <input type="radio" id="fre" name="type" required value="fre"
          <?php
if ($st['pro_type'] == 'fre') {
    echo 'checked';
}
?>
/>
<label for="fre">免費遊戲</label>
</div>
<div>
  <input type="radio" id="adv" name="type" value="adv"
<?php
if ($st['pro_type'] == 'adv') {
    echo 'checked';
}
?>
  />
  <label for="adv">冒險遊戲</label>
</div>
<div>
  <input type="radio" id="act" name="type" value="act"
  <?php
if ($st['pro_type'] == 'act') {
    echo 'checked';
}
?>
 />
 <label for="act">動作遊戲</label>
</div>
<div>
  <input type="radio" id="sim" name="type" value="sim"
<?php
if ($st['pro_type'] == 'sim') {
    echo 'checked';
}
?>
/>
<label for="sim">模擬遊戲</label>
</div>
<div>
  <input type="radio" id="spo" name="type" value="spo"
  <?php
if ($st['pro_type'] == 'spo') {
    echo 'checked';
}
?>

/>
<label for="spo">競技遊戲</label>
</div>
<div>
  <input type="radio" id="onl" name="type" value="onl"
  <?php
if ($st['pro_type'] == 'onl') {
    echo 'checked';
}
?>
/>
  <label for="onl">多人遊戲</label>
</div>
<div>
  <input type="radio" id="sto" name="type" value="sto"
  <?php
if ($st['pro_type'] == 'sto') {
    echo 'checked';
}
?>
/>
  <label for="sto">實體商品</label>
</div>
<label class="label_name"><br />商品新圖片</label>
<input  type="file" name="fileToUpload" accept="image/jpeg,image/png" />
<!-- <input class="input_pro"  name="" type="text" value="" /> -->

<div style="height: 30px;"></div>
<label for="content">商品簡介</label>
<textarea class="pro_content" name="content" id="content" cols="30" rows="10"><?php echo $st['content'] ?></textarea>
<hr />
<input class="btn btn-outline-light" type="submit"name="Submit" value="送出" />
</form>
<?php
if (isset($_POST['Submit']) && ($_POST['Submit'] == "送出")) {
    if ($_FILES['fileToUpload']['name'] == "") {
        $imgPath = $st['image_path']; //如果沒有更新圖片 維持原本的值
        echo $img_path;
        $pro_type = $_POST['type']; //商品類型
        $pro_name = $_POST['pro_name'];
        $pro_unitprice = $_POST['pro_unitprice'];
        $discount = $_POST['discount'];
        $content = $_POST['content'];
        $sqlProUpdate = "UPDATE `product` SET
            `pro_name`=:pro_name ,
            `unitprice`=:unitprice ,
            `image_path`=:image_path,
            `pro_type`=:pro_type,
            `discount`=:discount,
            `content` = :content
            WHERE `id`=:id;";
        $stmtProUpdate = $link->prepare($sqlProUpdate);
        $stmtProUpdate->bindParam(":pro_name", $pro_name, PDO::PARAM_STR);
        $stmtProUpdate->bindParam(":unitprice", $pro_unitprice, PDO::PARAM_INT);
        $stmtProUpdate->bindParam(":pro_type", $pro_type, PDO::PARAM_STR);
        $stmtProUpdate->bindParam(":image_path", $imgPath, PDO::PARAM_STR);
        $stmtProUpdate->bindParam(":discount", $discount, PDO::PARAM_STR);
        $stmtProUpdate->bindParam(":content", $content, PDO::PARAM_STR);
        $stmtProUpdate->bindParam(":id", $pro_id, PDO::PARAM_STR);
        $stmtProUpdate->execute();
        echo '<script>
        swal("編輯成功", "", "success", {button: "OK !"})
        .then((value) => {
            location.href = "product_management.php";
        });
            </script>';} else {
        $imgPath = "img/store/" . $_FILES['fileToUpload']['name'];
        if (file_exists($imgPath)) {
            echo '<script>alert("上傳圖片名稱`重複`")</script>';
        }
    }

}

?>

    </main>
    <?php
include "./footer.php"
?>
  </body>
</html>

<!-- <script src="js/shoppcart.js"></> -->
<script src="js/redNumber.js"></script>
<script src="js/login_index.js"></script>
