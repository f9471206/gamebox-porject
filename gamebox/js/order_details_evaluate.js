const pro_id = document.querySelectorAll("#evaluate_id");
pro_id.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.preventDefault();
    let url = new URL(e.currentTarget.href); //商品ID
    let pro_url = url.searchParams.get("pro_id");
    // console.log(pro_url);
    let stars = e.target.parentElement.children[0].value; //評價值
    if (stars != "---") {
      if (confirm(`你評價 ${stars} 星 確定嗎?  (送出後不能再修改)`)) {
        let data = {
          id: pro_url,
          stars: stars,
        };
        $.ajax({
          url: "ajax_product_evaluate.php",
          type: "get",
          dataType: "json",
          cache: false,
          async: true,
          data: data,

          error: function (res) {
            alert("失敗" + res);
            console.log(res);
          },
          success: function (res) {
            let sureStar = res;
            // console.log(sureStar);
            let firstTd = e.target.parentElement;
            firstTd.innerHTML = "";

            for (i = 0; i < res; i++) {
              let stars_i = document.createElement("i");
              stars_i.classList.add("fa-solid");
              stars_i.classList.add("fa-star");
              stars_i.style = "color: #ffd700;";
              firstTd.appendChild(stars_i);
              if (i != res - 1) {
                firstTd.innerHTML += "&nbsp";
              }
            }
          },
        });
      } else {
        // console.log("取消");
      }
    }
  });
});
