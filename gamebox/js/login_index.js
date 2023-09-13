let login_true = sessionStorage.getItem("login");
if (login_true != null) {
  const loginClick = document.querySelector(".login_outside");

  loginClick.addEventListener("click", (e) => {
    let login_index = document.querySelector(".login_index");
    e.preventDefault();

    if (login_index.children.length == 0) {
      let login_a = document.createElement("a");
      login_a.setAttribute("href", "userpage.php");
      login_a.innerText = "會員中心";
      login_a.classList.add("login_jsa");

      let login_out = document.createElement("a");
      login_out.setAttribute("href", "javascript:;");
      login_out.innerText = "登出";
      login_out.classList.add("login_jsa");

      login_index.appendChild(login_a);
      let hr = document.createElement("hr");
      hr.classList.add("login_jsa_hr");
      login_index.appendChild(hr);
      login_index.appendChild(login_out);

      login_out.addEventListener("click", (e) => {
        e.preventDefault();
        swal({
          //https://w3c.hexschool.com/blog/13ef5369
          title: "確定要登出嗎?",
          icon: "info",
          buttons: true,
          dangerMode: true,
        }).then((value) => {
          if (value == true) {
            let userOut = {
              out: false,
            };

            $.ajax({
              url: "user_out.php",
              type: "post",
              dataType: "json",
              cache: false,
              async: true,
              data: userOut,

              error: function (resp) {
                alert("失敗", resp);
              },
              success: function (resp) {
                if (resp == true) {
                  sessionStorage.removeItem("login");
                  location.href = "index.php";
                }
              },
            });
          }
        });
      });
    } else {
      login_index.innerHTML = "";
    }
  });
}
