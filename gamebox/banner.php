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
    <title>banner | GAMES BOX</title>
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

   <!-- alert() -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

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
    max-width: 350px;
  }
  .a_width{
    width: 70px;
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
          <div class="login_index"></div>';}
?>
          <!-- login -->

          </div>
        </div>
      <main class="main" >

        <h3>歡迎，<?php echo $_SESSION['username'] ?> 管理員</h3>
        <!-- 商品總覽 -->
        <button class="out_btn">
          <a href="userpage.php">
            <i class="fa-solid fa-angles-left"></i>
            <p>上一頁</p>
          </a>
        </button>
        <button class="out_btn">
        <a href="add_banner.php">
        <i class="fa-regular fa-square-plus"></i>
          <p>新增banner</p>
        </a>
      </button>


      <h3>banner總覽</h3>
      <table class="table table-dark table-striped">
      <tr>
        <td class="text-center">編號</td>
        <td class="text-center">圖片</td>
        <td class="text-center">類型</td>
        <td class="text-center">名稱</td>
        <td class="text-center"></td>
        <td class="text-center"></td>
      </tr>
<?php
$slq = "select *from `banner_img` order by `banner_img`.img_type desc ";
$stmt = $link->prepare($slq);
$stmt->execute();
$game_type = array
    ('sto' => '實體商品', 'fre' => '免費遊戲', 'adv' => '冒險遊戲', 'act' => '動作遊戲', 'sim' => '模擬遊戲', 'spo' => '競技遊戲', 'onl' => '多人遊戲');
$type_gb = array
    ('sto' => 'primary', 'fre' => 'secondary', 'adv' => 'success', 'act' => 'info', 'sim' => 'danger', 'spo' => 'warning', 'onl' => 'pink-400');

while ($st = $stmt->fetch()) {
    echo '
    <tr class="moveUp">
        <td class="text-center">' . $st['id'] . '</td>
        <td class="text-center"><img src="' . $st['image_path'] . '"></td>
        <td class="text-center">
        <span class="bg-' . $type_gb[$st['img_type']] . ' badge fs-4 fw-normal">' . $game_type[$st['img_type']] . '</span>
        </td>
        <td class="text-center">' . $st['img_name'] . '</td>
        <td class="text-center a_width"><a href="banner_edit.php?edit=' . $st['id'] . '">編輯</a></td>
        <td class="text-center a_width"><a id="del_banner"  href="banner.php?bannerDel=' . $st['id'] . '">刪除</a></td>
    </tr>';
}

// if (isset($_GET['newsDel']) && $_GET['newsDel'] != "") {
//     $slq = "";
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
let del_banner = document.querySelectorAll("#del_banner");

del_banner.forEach((item )=>{
  item.addEventListener("click" ,(e) =>{
    e.preventDefault();

    //刪除的tr
    let del_div = e.target.parentElement.parentElement;


    let url = new URL(e.currentTarget.href);

    swal({
    title: "確定要刪除嗎?",
    icon: "warning",
    buttons: true,
    dangerMode: true
    }).then((value) => {
      if(value == true){
      //取得get_bannerDel 的ID值
      let bannerDel = url.searchParams.get('bannerDel');

      //ajax object
      let datedel ={
        del:bannerDel
      }

      $.ajax({
        url:'ajax_delbanner.php',
        type:'get',
        dataType:'json',
        cache:false,
        async:true,
        data:datedel,

        error:function(resp){
          alert("失敗"+resp);
          console.log(resp)
        },
        success:function(resp){
          if(resp == true){
            del_div.style.animation = "scaledown 0.5s forwards";
            del_div.addEventListener("animationend" ,()=>{
              del_div.remove();
            })
          }else{
            console.log('noooo');
          }
        }
      })
    }
    });




  })
 })

</script>
<script src="js/login_index.js"></script>