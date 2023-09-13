window.onpageshow = function (event) {
  if (event.persisted) {
    redNew();
  }
};

//購物車紅色數字
let buy_red_number = document.querySelector(".buy_number");
redNew();
function redNew() {
  if (JSON.parse(localStorage.getItem("list")) != null) {
    let redNumber = JSON.parse(localStorage.getItem("list")).length;
    // console.log(redNumber);
    if (redNumber != 0) {
      buy_red_number.innerText = redNumber;
      buy_red_number.classList.add("buy_numberCss");
    }
  } else {
    buy_red_number.innerText = "";
    buy_red_number.classList.remove("buy_numberCss");
  }
}
