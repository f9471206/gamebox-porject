<?php
require_once 'Connections/cnn.php';
// require_once 'Connections/cnn_adduser.php';
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>location.href ='index.php';</script>";
}

if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
    $membername = trim($_POST['username']);
    $memberpassword = trim($_POST['password']);
    $checkpassword = trim($_POST['checkpassword']);
}
$userid = $_SESSION['userId'];
$sql = "SELECT *FROM `member` WHERE `member`.id=:id";
$stm = $link->prepare($sql);
$stm->bindParam(":id", $userid, PDO::PARAM_STR);
$stm->execute();
$st = $stm->fetch();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>編輯個人資料 | GAMES BOX</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/add_member.css" />

    <!-- alert() -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

  <!-- owl.carousel -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
  />

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
  />

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- end -->

  <script src="js/bootstrap.js"></script>

  <body>
    <!-- 內容 -->
    <main>
      <form method="post" action="">
        <h3>編輯個人資料</h3>
        <div class="inputBox">
          <!-- required="required" -->
          <label  class="label_name">帳號</label>
          <input
            id="user_name_value"
            class="check_input"
            name="username"
            type="text"
            readonly="readonly"
            required="required"
            value="
<?php
if (isset($membername)) {
    echo htmlspecialchars($membername);
} else {
    echo $_SESSION['username'];
}
?>
"/>
        </div>
        <div class="inputBox">
          <label id="password_label" class="label_passward">密碼</label>
          <input id="password_value" name="password" type="password" required="required"
          value="" />
        </div>
        <div class="inputBox">
          <label id="check_password_label" class="label_checkpassword">確認密碼</label>
          <input
            id="check_password_value"
            name="checkpassword"
            type="password"
            required="required"
            value=""
          />
        </div>
        <div class="inputBox">
          <label id="email_label">信箱</label>
          <input id="email_value" type="text" required="required" value="<?php echo $st['email']; ?>"/>
        </div>
        <div class="button_sub">
          <button
            class="buttondefcolor"
            id="check_sub"
            name="submit"
            value="Submit"

          >
            更新
          </button>
          <button class="reback" onclick="goBack()">
            取消編輯
          </button>
        </div>
      </form>
    </main>
  </body>
</html>
<script>
function goBack() {
    window.history.back();
}

let check_sub = document.querySelector("#check_sub");
check_sub.addEventListener("click" , e=>{
  e.preventDefault();
  //帳號
  let user_name_value = document.querySelector("#user_name_value").value;

  //密碼值
  let password_value = document.querySelector("#password_value").value;
  let password_label = document.querySelector("#password_label");
  password_label.innerText = "密碼";
  password_label.style.animation = '';

  //2次密碼
  let check_password_value = document.querySelector("#check_password_value").value;
  let check_password_label = document.querySelector("#check_password_label");
  check_password_label.innerText = "確認密碼";
  check_password_label.style.animation = '';

  //email
  let email_value = document.querySelector("#email_value").value;
  let email_label = document.querySelector("#email_label");
  email_label.innerText = "信箱";
  email_label.style.animation = '';

  if(password_value != check_password_value){
    password_label.innerText = "* 密碼不一致";
    password_label.style.animation = "checkword 0.5s forwards";
    check_password_label.innerText = "* 密碼不一致";
    check_password_label.style.animation = "checkword 0.5s forwards";


  }else if(password_value =="" || check_password_value ==""){
   password_label.innerText = "* 請輸入密碼";
   password_label.style.animation = "checkword 0.5s forwards";
   check_password_label.innerText = "* 請輸入確認密碼";
   check_password_label.style.animation = "checkword 0.5s forwards";

    }else if(email_value==""){
      email_label.innerText = "* 請輸入信箱"
      email_label.style.animation = "checkword 0.5s forwards";
  }else{
    let datapost ={
      name:user_name_value,
      password:check_password_value,
      email:email_value
    }

    $.ajax({
      url:'ajax_user_revise.php',
      type:'post',
      dataType:'json',
      cache:false,
      async:true,
      data:datapost,

      error:function(resp){
        alert("失敗");
      },
      success:function(resp){
        if(resp == true){
          swal("編輯完成", "請重新登入", "success", {
            button: "Click Me!"}).then((value) => {
            location.href = "login.php";
        });
        }
      }
    })
  }
})
</script>
