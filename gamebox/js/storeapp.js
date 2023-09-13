let shoppCart = document.querySelectorAll(".shoppCartClick");
let buy_number = document.querySelector(".buy_number");

shoppCart.forEach((text) => {
  text.addEventListener("click", (e) => {
    e.preventDefault();
    let form = e.target.parentElement.parentElement.children[1];
    //取得圖片
    let proImg =
      e.target.parentElement.parentElement.children[0].getAttribute("src");
    // console.log(proImg);

    //取得商品名稱
    let proName = form.children[0].innerText;
    // console.log(proName);

    //取得商品價格
    let proMoney = form.children[1].innerText;
    // console.log(proMoney);

    let proid = form.children[2].innerText;

    let myshoppCart = {
      proName: proName,
      proMoney: proMoney,
      proImg: proImg,
      proquan: 1,
      proid: proid,
    };
    let myList = localStorage.getItem("list");
    if (myList == null) {
      localStorage.setItem("list", JSON.stringify([myshoppCart]));
    } else {
      let myListArray = JSON.parse(myList);
      // let chechName = myshoppCart.proName;
      myListArray.push(myshoppCart);
      localStorage.setItem("list", JSON.stringify(myListArray));
    }
    //event後再更新一次紅色數字
    redNew();
    //btn若已經加入購物車按鈕變更
    alreadyAdd();
  });
});

//購物車紅色數字
redNew();
function redNew() {
  if (localStorage.getItem("list") != null) {
    let redNumber = JSON.parse(localStorage.getItem("list")).length;
    // console.log(redNumber);
    if (redNumber != 0) {
      buy_number.innerText = redNumber;
      buy_number.classList.add("buy_numberCss");
    }
  }
}

// 跑迴圈創造出所有商品 跟session的array比對
alreadyAdd();
function alreadyAdd() {
  if (localStorage.getItem("list") != null) {
    let con_sess = JSON.parse(localStorage.getItem("list"));
    // session目前有的商品
    let con_sess_array = [];
    //拿出session的商品名稱
    con_sess.forEach((item) => {
      con_sess_array.push(item.proName);
    });
    for (let i = 0; i < shoppCart.length; i++) {
      let con_name =
        shoppCart[i].parentElement.parentElement.children[1].children[0]
          .innerText;
      if (con_sess_array.includes(con_name)) {
        shoppCart[i].classList.add("already_add");
        shoppCart[i].innerText = "已經加入購物車囉!";
      }
    }
  }
}

window.onbeforeunload = function () {
  // alreadyAdd();
};
