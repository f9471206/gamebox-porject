// order_display_none  css.class

let btn_display = document.querySelectorAll(".butt_display");
btn_display.forEach((item) => {
  item.addEventListener("click", (e) => {
    let order_list = e.target.closest(".order_list").children[1];
    let table_bool = order_list.classList.contains("order_display_none"); //確認 table 是否有display none

    if (table_bool == true) {
      order_list.classList.remove("order_display_none");
      console.log(item);
      item.style.animation = "rotate 0.25s forwards";
    } else {
      order_list.classList.add("order_display_none");
      item.style.animation = "rotateoff 0.25s forwards";
    }
  });
});
