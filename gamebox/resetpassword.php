<?php
// require_once 'Connections/cnn.php';
// require_once 'Connections/cnn_login.php';
session_start();
if (!isset($_SESSION['forgetPassword'])) {
    echo '<script>location.href="userpage.php"</script>';
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>重設密碼 | GAMES BOX</title>
  </head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/add_member.css">
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

  <!-- alert() -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- alert() -->

  <script src="js/bootstrap.js"></script>

  <script src="js/jquery-3.7.0.min.js"></script>


  <body>
    <!-- 內容 -->
    <main>
      <form name='edit' action="">
        <h3>重設密碼</h3>
        <div class="inputBox">
        <!-- required="required" -->
        <label class="label_name">帳號</label>
          <input id="nameValue" class="check_input"  name="username" type="text"
          value="<?php echo $_SESSION['forgetPassword']; ?> " readonly  />
        </div>
        <div class="inputBox">
          <label class="label_password">密碼</label>
          <input class="password" name="password" type="password"   value=""/>
        </div>
        <div class="inputBox">
          <label class="label_check_password">確認密碼</label>
          <input class="check_password" name="check_password" type="password"   value=""/>
        </div>

        <div class="button_sub">

          <button class="buttondefcolor"id="check_sub" name="submit" value="Submit">重設</button>

          <a href="login.php">我想起來了</a>
        </div>
      </form>
    </main>
  </body>
</html>


<script type="application/javascript">
let label_check_password = document.querySelector(".label_check_password");
let check_sub = document.querySelector("#check_sub");
check_sub.addEventListener("click" , e =>{
  label_check_password.style.animation = '';
  label_check_password.innerText= "確認密碼";
  e.preventDefault();
  let password = document.querySelector(".password").value;
  let check_password = document.querySelector(".check_password").value;
  let postData = {
    password:password,
    check_password:check_password,
    submit:'submit'
  }
// console.log(postData);


  $.ajax({
    url:'ajax_resetpassword.php',
    type:'post',
    dataType:'json',
    cache:false,
    async:true,
    data:postData,

    error:function(resp){
      alert('連線錯誤' ,resp);
    },
    success:function(resp){
      if(resp == false){
        label_check_password.style.animation = "checkword 0.5s forwards";
        label_check_password.innerText= "* 二次密碼不一致";
      }else{
        swal("重設成功", "請重新登入", "success", {button: "Click Me!"})
        .then((value) => {
            location.href = "login.php";
        });
      }
    }
  })

})





</script>
