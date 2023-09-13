<?php
// require_once 'Connections/cnn.php';
// require_once 'Connections/cnn_login.php';
session_start();
if (!isset($_SESSION['forgetPassword'])) {
    echo '<script>location.href ="login.php";</script>';
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>忘記密碼 | GAMES BOX</title>
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

  <script src="js/bootstrap.js"></script>

  <script src="js/jquery-3.7.0.min.js"></script>


  <body>
    <!-- 內容 -->
    <main>
      <form name='edit' action="">
        <h3>忘記密碼</h3>
        <div class="inputBox">
        <!-- required="required" -->
        <label class="label_name">帳號</label>
          <input id="nameValue" class="check_input"  name="username" type="text"
          value="<?php echo $_SESSION['forgetPassword']; ?> " readonly  />
        </div>
        <div class="inputBox">
          <label class="label_email">Email</label>
          <input name="email" type="text"   value=""/>
        </div>

        <div class="button_sub">

          <button class="buttondefcolor"id="check_sub" name="submit" value="Submit">核對您的  Email</button>

          <a href="login.php">我想起來了</a>
        </div>
      </form>
    </main>
  </body>
</html>


<script type="application/javascript">

let label_email = document.querySelector(".label_email");
$(document).ready(function() {
  $('form[name=edit]').submit(function(e){
  //here
    e.preventDefault();
    label_email.innerText = "Email";
    label_email.style.animation = '';
    let postDate = $(this).serializeArray();
    // console.log(typeof postDate , postDate);
    if(postDate.find(item=>item.name==='email').value===''){
        label_email.innerText = "* 請輸入您註冊的Email";
        label_email.style.animation = "checkword 0.5s forwards";
    }else{
        $.ajax({
            url:'ajax_forgetpassword_checkemail.php',
            type:'post',
            dataType:'json',
            cache:false,
            async:true,
            data:postDate,

            error:function(resp){
                alert('失敗', resp);

            },
            success:function(resp){
              if(resp == false){
                // console.log('錯誤');
                label_email.innerText = "* 核對錯誤 - 請確認您註冊的Email";
                label_email.style.animation = "checkword 0.5s forwards";
              }else{
                location.href="resetpassword.php";
              }
            }

        })
    }
  });
});


</script>
