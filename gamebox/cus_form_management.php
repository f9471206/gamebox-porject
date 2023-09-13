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
    max-width: 250px;
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

    <main class="main">
        <h3>歡迎，<?php echo $_SESSION['username'] ?> 管理員</h3>
        <!-- 商品總覽 -->
      <button class="out_btn">
        <a href="userpage.php">
          <i class="fa-solid fa-angles-left"></i>
          <p>上一頁</p>
        </a>
      </button>

      <h3>表單總覽</h3>
      <table class="table table-dark table-striped">
      <tr>
        <td class="text-center">編號</td>
        <td class="text-center">姓名</td>
        <td class="text-center">信箱</td>
        <td class="text-center">電話</td>
        <td class="text-center">填寫內容</td>
        <td class="text-center"></td>
      </tr>
<?php
$slq = "select *from `cus_form`";
$stmt = $link->prepare($slq);
$stmt->execute();
while ($st = $stmt->fetch()) {
    echo '
    <tr>
        <td class="text-center">' . $st['id'] . '</td>
        <td class="text-center">' . $st['user_name'] . '</td>
        <td class="text-center">' . $st['email'] . '</td>
        <td class="text-center">' . $st['phone'] . '</td>
        <td class="text-center">' . $st['content'] . '</td>
        <td class="text-center a_width"><a id="delCus" href="cus_form_management.php?cusDel=' . $st['id'] . '">刪除</a></td>
    </tr>';
}

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
let delCus = document.querySelectorAll("#delCus");
delCus.forEach(item=>{
  item.addEventListener("click", e=>{
    e.preventDefault();

    //ajax需要的值
    let url = new URL(e.currentTarget.href);
    let cusdel = url.searchParams.get('cusDel');

    //要刪除的<tr>
    let del_div = e.target.parentElement.parentElement;

    swal({
    title: "確定要刪除嗎?",
    icon: "warning",
    buttons: true,
    dangerMode: true
    }).then((value)=>{
      if(value==true){

        let datadel= {
          del:cusdel
        }

        $.ajax({
          url:'ajax_del_cus_form.php',
          type:'get',
          dataType:'json',
          cache:false,
          async:true,
          data:datadel,

          error:function(resp){
            alert('失敗');
          },
          success:function(resp){
            // console.log(resp);
            if(resp==true){
              del_div.style.animation = "scaledown 0.5s forwards";
              del_div.addEventListener("animationend" ,()=>{
                del_div.remove();
              })
            }else{
              // console.log('noRemove')
            }
          }
        })
      }else{
        // console.log('no');
      }
    })

  })
})


</script>
<script src="js/login_index.js"></script>