<?php
require_once 'Connections/cnn.php';
$edit = $_GET['edit'];
session_start();
if ($_SESSION['userlevel'] != 99 || !isset($_GET['edit'])) {
    echo "<script>location.href ='index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>新聞 | GAMES BOX</title>
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
        <a href="news_management.php">
          <i class="fa-solid fa-angles-left"></i>
          <p>上一頁</p>
        </a>
      </button>
      <h2>新聞編輯頁面<br /><br /></h2>
      <h4>新聞圖片</h4>
<?php
$sql = "select *from news where id=:id";
$stmt = $link->prepare($sql);
$stmt->bindParam(":id", $edit, PDO::PARAM_STR);
$stmt->execute();
$st = $stmt->fetch();
?>
    <img class="pro_img" src="<?php echo $st['image_path'] ?>" alt="">
    <?php echo substr($st['image_path'], 9) ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <label class="label_name" >新聞標題</label>
        <input class="input_pro"  name="title" type="text"  value="<?php echo $st['title'] ?>" required />
        <label class="label_name">發布時間</label>
        <input class="input_pro"  name="date" type="text" value="<?php echo $st['date'] ?>" readonly required/>
        <label class="label_name">新聞內容</label>
        <textarea
            class="input_pro"
            type="text"
            name="content"
            style="resize: none; height: 40vh"
            required
            ><?php echo $st['content'] ?></textarea>
        <label for="">更新新聞圖片</label>
        <input type="file" name="fileToUpload" accept="image/jpeg,image/png" />
        <hr />
        <input class="btn btn-outline-light" type="submit" name="Submit" value="完成編輯" />
    </form>
<?php
if (isset($_POST['Submit']) && ($_POST['Submit'] == "完成編輯")) {
    if ($_FILES['fileToUpload']['name'] == "") {
        $imgPath = $st['image_path']; //如果沒有更新圖片 維持原本的值
        $title = $_POST['title'];
        $content = $_POST['content'];
        $sqledit = "UPDATE `news` set
        `image_path`=:image_path,
        `title`=:title,
        `content`=:content
        where `id`=:id;";
        $stmtedi = $link->prepare($sqledit);
        $stmtedi->bindParam(":image_path", $imgPath, PDO::PARAM_STR);
        $stmtedi->bindParam(":title", $title, PDO::PARAM_STR);
        $stmtedi->bindParam(":content", $content, PDO::PARAM_STR);
        $stmtedi->bindParam(":id", $edit, PDO::PARAM_INT);
        $stmtedi->execute();
        echo '<script>location.href ="news_management.php";</script>';

    } else {
        $imgPath = "img/news/" . $_FILES['fileToUpload']['name'];
        if (file_exists($imgPath)) {
            echo '<script>swal("上傳圖片重覆", "請更換圖片或更改圖片名稱", "warning", {button: "OK !"})</script>';
        } else {
            // unlink($st['image_path']);
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imgPath);
            $title = $_POST['title'];
            $content = $_POST['content'];
            $sqledit = "UPDATE `news` set
        `image_path`=:image_path,
        `title`=:title,
        `content`=:content
        where `id`=:id;";
            $stmtedi = $link->prepare($sqledit);
            $stmtedi->bindParam(":image_path", $imgPath, PDO::PARAM_STR);
            $stmtedi->bindParam(":title", $title, PDO::PARAM_STR);
            $stmtedi->bindParam(":content", $content, PDO::PARAM_STR);
            $stmtedi->bindParam(":id", $edit, PDO::PARAM_INT);
            $stmtedi->execute();
            echo '<script>swal("編輯完成", "", "success", {button: "Click Me!"})
            .then((value) => {
                location.href = "news_management.php";
            });</script>';
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