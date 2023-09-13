<?php
require_once 'Connections/cnn.php';
// require_once 'Connections/cnn_login.php';
session_start();
if (isset($_SESSION['username'])) {
    echo '<script>location.href ="userpage.php"</script>';
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>登入 | GAMES BOX</title>
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
 
  <script src="js/bootstrap.js"></script>

  <script src="js/jquery-3.7.0.min.js"></script>


  <body>
    <!-- 內容 -->
    <main>
      <form name='edit' action="">
        <h3>登入</h3>
        <div class="inputBox">
        <!-- required="required" -->
        <label class="label_name">帳號</label>
          <input id="nameValue" class="check_input"  name="username" type="text"
          value="
<?php
// if (isset($formUsername)) {
//     echo htmlspecialchars($formUsername);
// }
?>"
/>
        </div>
        <div class="inputBox">
          <label class="label_passward">密碼</label>
          <input name="password" type="password"   value=""/>
          <a id="forget_password" href="#">您忘記密碼了?</a>
        </div>

        <div class="button_sub">
        <input type='hidden' name='op'  value="edit" />
          <button class="buttondefcolor"id="check_sub" name="submit" value="Submit">登入</button>
<?php

// echo '<script> let name = document.querySelector(".label_name"); </script>';
// echo '<script> let password = document.querySelector(".label_passward"); </script>';

?>

          <a href="add_member.php">註冊新帳號</a>
        </div>
      </form>
    </main>
  </body>
</html>


<script type="application/javascript">
//login_ajax
let name = document.querySelector(".label_name");
let password = document.querySelector(".label_passward");

$(document).ready(function() {
  $('form[name=edit]').submit(function(e){
  //here
      name.innerText = "帳號";
      name.style.animation = '';
      password.innerText = "密碼";
      password.style.animation = '';
      e.preventDefault();
      let postDate = $(this).serializeArray();
      name.style.color= 'white';
      password.style.color = 'white';
      // console.log(postDate);
      $.ajax({
          url:'Connections/cnn_login.php',
          type:'post',
          dataType:'json',
          cache:false,
          async:true,
          data:postDate,

          error:function(resp){
            alert(resp);

          },
          success:function(resp){
            if (!resp.name && !resp.password && !resp.success){
              name.style.animation = "checkword 0.5s forwards";
              name.innerText ="* 查無帳號"

            }else if(resp.name && !resp.password && !resp.success){
              name.style.color = 'white';
              password.style.animation = "checkword 0.5s forwards";
              password.innerText ="* 密碼錯誤" ;

            }else{
              sessionStorage.setItem("login" , true)
              location.href="userpage.php";
            }
          }

      })
  });
});



//forget_password
let forget_password =document.querySelector("#forget_password");
forget_password.addEventListener("click" ,(e)=>{
  e.preventDefault();
  name.innerText = "帳號";
  name.style.animation = '';
  let nameValue = document.querySelector("#nameValue").value;
  // console.log(nameValue);
  if(nameValue == ''){
    name.style.animation = "checkword 0.5s forwards";
    name.innerText = "* 請輸入帳號";
  }else{
    let nameDate = {
      checkName:nameValue
    }

    $.ajax({
      url:'Connections/cnn_login.php',
      type:'post',
      dataType:'json',
      cache:false,
      async:true,
      data:nameDate,

      error:function(resp){
              alert('失敗');

      },
      success:function(resp){
        if(resp == true){
          location.href="forgetpassword_checkemail.php";
        }else{
          // console.log('noooooo');
          name.style.animation = "checkword 0.5s forwards";
          name.innerText ="* 查無帳號"
        }
      }
    })
  }
});



</script>
