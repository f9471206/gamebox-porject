<?php
require_once 'Connections/cnn.php';
require_once 'product_shelves.php';
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
  .main{
    width: 90%;
    max-width: 2000px;
  }
  td img{
    max-width: 200px;
  }
  td {
    text-align: center;
    vertical-align: middle;
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
    <div class="div_search" style="width:100%">
      <div class="search" style="margin-left: 8px;">
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
        <!-- 商品總覽 -->
      <main class="main" >
        <h3>歡迎，<?php echo $_SESSION['username'] ?> 管理員</h3>
        <button class="out_btn">
          <a href="userpage.php">
            <i class="fa-solid fa-angles-left"></i>
            <p>上一頁</p>
          </a>
        </button>
        <button class="out_btn">
          <a href="add_product.php">
            <i class="fa-regular fa-square-plus"></i>
            <p>上架商品</p>
          </a>
        </button>


        <h2>商品總覽</h2>
        <form method="post" action="">
          <select name="gameType">
            <option value="no">請選擇</option>
            <option value="all">全部商品</option>
            <option value="fre">免費遊戲</option>
            <option value="adv">冒險遊戲</option>
            <option value="act">動作遊戲</option>
            <option value="sim">模擬遊戲</option>
            <option value="spo">競技遊戲</option>
          <option value="onl">多人遊戲</option>
          <option value="sto">實體商品</option>
        </select>
        <input class="input_submit" type="submit" name="Submit" value="篩選">
      </form>
<?php

?>
      <h3>商品類型：
<?php
if (isset($_POST['Submit'])) {
    switch ($_POST['gameType']) {
        case ($_POST['gameType'] == 'sto');
            echo '實體商品';
            break;
        case ($_POST['gameType'] == 'fre');
            echo '免費遊戲';
            break;
        case ($_POST['gameType'] == 'adv');
            echo '冒險遊戲';
            break;
        case ($_POST['gameType'] == 'act');
            echo '動作遊戲';
            break;
        case ($_POST['gameType'] == 'sim');
            echo '模擬遊戲';
            break;
        case ($_POST['gameType'] == 'spo');
            echo '競技遊戲';
            break;
        case ($_POST['gameType'] == 'onl');
            echo '多人遊戲';
            break;
        case ($_POST['gameType'] == 'all');
            echo '全部商品';
            break;
        case ($_POST['gameType'] == 'no');
            echo "";
            break;
    }
}
?></h3>
      <table class="table table-dark table-striped">
      <tr>
        <td class="text-center">編號</td>
        <td class="text-center" >圖片</td>
        <td class="text-center">品名</td>
        <td class="text-center">原價</td>
        <td class="text-center">打折</td>
        <td class="text-center">商品類型</td>
        <td class="text-center">銷量</td>
        <td class="text-center">狀態</td>
        <td colspan="3"></td>
      </tr>
<?php

// if (isset($_POST['Submit'])) {
//     $type = $_POST['gameType'];

// if (
// ) {
if (@$_POST['gameType'] == null || $_POST['gameType'] == 'no' || $_POST['gameType'] == 'all') {
    // echo $_POST['gameType'];
    $sql = "select *from `product` order by id desc";
    $stm = $link->prepare($sql);
    $stm->execute();
} elseif ($type = @$_POST['gameType']) {
    // echo $type;
    $sql = "select *from `product` where `pro_type`=:pro_type";
    $stm = $link->prepare($sql);
    $stm->bindParam(":pro_type", $type, PDO::PARAM_STR);
    $stm->execute();
}

// }
while ($st = $stm->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td class='text-center'>" . $st['id'] . "</td>";
    echo '<td class="text-center"><img src="' . $st["image_path"] . '"></td>';
    echo "<td class='text-center'>" . $st['pro_name'] . "</td>";
    // echo "<td class='text-center'>";
    if ($st['discount'] != 0) {
        echo '<td class="text-center">' . $st['unitprice'] * (1 - ($st['discount'] * 0.1)) . '$<br/><del class="fs-5">' . $st['unitprice'] . '$</del></td>';
    } else {
        echo '<td class="text-center">' . $st['unitprice'] . '$</td>';
    }

    // 折扣欄
    if ($st['discount'] != 0) {
        echo "<td class='text-center'><span class='d-flex justify-content-center badge bg-danger fs-5 fw-normal'>-" . ($st['discount'] * 10) . "%</span></td>";
    } else {
        echo "<td class='text-center'>0</td>";
    }

    echo "<td class='text-center'>";
    switch ($st['pro_type']) {
        case ('sto');
            echo '<span class="d-flex justify-content-center badge bg-primary fs-5 fw-normal">實體商品</span>';
            break;
        case ('fre');
            echo '<span class="d-flex justify-content-center badge bg-secondary fs-5 fw-normal">免費遊戲</span>';
            break;
        case ('adv');
            echo '<span class="d-flex justify-content-center badge bg-danger fs-5 fw-normal">冒險遊戲</span>';
            break;
        case ('act');
            echo '<span class="d-flex justify-content-center badge bg-info fs-5 fw-normal">動作遊戲</span>';
            break;
        case ('sim');
            echo '<span class="d-flex justify-content-center badge bg-primary fs-5 fw-normal">模擬遊戲</span>';
            break;
        case ('spo');
            echo '<span class="d-flex justify-content-center badge bg-secondary fs-5 fw-normal">競技遊戲</span>';
            break;
        case ('onl');
            echo '<span class="d-flex justify-content-center badge bg-danger fs-5 fw-normal">多人遊戲</span>';
            break;
    }
    echo "</td>";
    echo "<td class='text-center'>";
    //商品總銷售量
    $sum_proid = $st['id'];
    $sqlSum = "SELECT  sum(quantity)
    FROM `order_details`
    WHERE pro_id=:pro_id
    GROUP BY pro_id";
    $stmtSum = $link->prepare($sqlSum);
    $stmtSum->bindParam(":pro_id", $sum_proid, PDO::PARAM_INT);
    $stmtSum->execute();
    $stSum = $stmtSum->fetch();
    $results = $stSum;

    if ($results == false) { //總銷量如果 fales echo 0
        echo '0 件';
    } else {
        echo $results['sum(quantity)'] . ' 件';
    }
    echo "</td>";
    echo "<td>";
    switch ($st['shelves']) {
        case ('1');
            echo '<span class="d-flex justify-content-center badge bg-success fs-5 fw-normal ">販賣中</span>';
            break;
        case ('0');
            echo '<span class="d-flex justify-content-center badge bg-danger fs-5 fw-normal">下架中</span>';
            break;
    }
    echo "</td>";
    echo "<td class='text-center'>" . "<a href=product_revise.php?id=" . $st['id'] . ">編輯</a>" . "</td>";
    echo "<td class='text-center'>" . "<a class='event_put' name='" . $st['id'] . "' href=product_management.php?put=" . $st['id'] . ">上架</a>" . "</td>";
    echo "<td class='text-center'>" . "<a class='event_off' href=product_management.php?off=" . $st['id'] . ">下架</a>" . "</td>";
    echo "</td>";
}
// }
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
<script>
  //上架按鈕event
  let put = document.querySelectorAll(".event_put");
  put.forEach((text)=>{
  text.addEventListener("click",(e)=>{
    e.preventDefault();
    let success_btn = e.target.parentElement.parentElement.children[7].children[0];//顏色標籤位子
    let url = new URL(e.currentTarget.href);
    let params = new URLSearchParams(url.search);
    let putValue = params.get('put');
    let dateGet = {
      put:putValue
    }
    // console.log(putValue);

    $.ajax({
      url:'product_shelves.php',
      type:'get',
      dataType:'json',
      cache:false,
      async:true,
      data:dateGet,

      error:function(resp){
        alert('失敗'+ resp);
      },
      success: function(resp){
        success_btn.classList.remove("bg-danger");
        success_btn.classList.add("bg-success");
        success_btn.innerText = "販賣中";
      }
    })
  })
})


//下架event
let off = document.querySelectorAll(".event_off");
off.forEach((text)=>{
  text.addEventListener("click" , (e) =>{
    let danger_btn = e.target.parentElement.parentElement.children[7].children[0];//顏色標籤位子
    e.preventDefault();


    let url = new URL(e.currentTarget.href);
    let params = new URLSearchParams(url.search);
    let putValue = params.get('off');
    let dateOff = {
    off:putValue
    }
    $.ajax({
      url:'product_shelves.php',
      type:'get',
      dataType:'json',
      cache:false,
      async:true,
      data:dateOff,

      error:function(resp){
        alert("失敗"+resp);
      },
      success:function(resp){
        danger_btn.classList.remove("danger");
        danger_btn.classList.add("bg-danger");
        danger_btn.innerText="下架中";
      }
    })
  })
})


</script>
<script src="js/login_index.js"></script>