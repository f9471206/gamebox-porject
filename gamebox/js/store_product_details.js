let earphone_butten = document.querySelector(".earphone_butten");
// 購買按鈕
let buy_btn = earphone_butten.children[0];

// 購物車按鈕
let shoppcart_btn = earphone_butten.children[1];

//購買
buy_btn.addEventListener("click", (e) => {
  e.preventDefault();

  let main_from = e.target.parentElement.parentElement.parentElement;

  //取得圖片位址
  let proImg = main_from.children[0].children[0].getAttribute("src");

  //取得商品名稱
  let proName = main_from.children[1].children[0].innerText;

  //取得商品價格
  let proMoney = main_from.children[1].children[2].children[0].innerText;

  //取得商品ID
  let proid = main_from.children[1].children[2].children[1].innerText;

  let myshoppCart = {
    proImg: proImg,
    proName: proName,
    proMoney: proMoney,
    proquan: 1,
    proid: proid,
  };
  let myList = localStorage.getItem("list");
  if (myList == null) {
    localStorage.setItem("list", JSON.stringify([myshoppCart]));
    location.href = "shoppingcart.php";
  } else {
    let myListAarray = JSON.parse(myList);
    if (myListAarray.length == 0) {
      myListAarray.push(myshoppCart);
      localStorage.setItem("list", JSON.stringify(myListAarray));
      location.href = "shoppingcart.php";
    } else {
      myListAarray.forEach((item) => {
        if (item.proid == myshoppCart.proid) {
          location.href = "shoppingcart.php";
        } else {
          myListAarray.push(myshoppCart);
          localStorage.setItem("list", JSON.stringify(myListAarray));
          location.href = "shoppingcart.php";
        }
      });
    }

    // location.href = "shoppingcart.html";
  }

  redNew();
});

//加入購物車
shoppcart_btn.addEventListener("click", (e) => {
  e.preventDefault();
  let main_from = e.target.parentElement.parentElement.parentElement;

  //取得圖片位址
  let proImg = main_from.children[0].children[0].getAttribute("src");

  //取得商品名稱
  let proName = main_from.children[1].children[0].innerText;

  //取得商品價格
  let proMoney = main_from.children[1].children[2].children[0].innerText;

  //取得商品ID
  let proid = main_from.children[1].children[2].children[1].innerText;

  let myshoppCart = {
    proImg: proImg,
    proName: proName,
    proMoney: proMoney,
    proquan: 1,
    proid: proid,
  };
  let myList = localStorage.getItem("list");
  if (myList == null) {
    localStorage.setItem("list", JSON.stringify([myshoppCart]));
  } else {
    let myListAarray = JSON.parse(myList);
    myListAarray.push(myshoppCart);
    localStorage.setItem("list", JSON.stringify(myListAarray));
  }
  shoppcart_btn.classList.add("already_add");
  shoppcart_btn.innerText = "已經加入購物車囉!";
  redNew();
});

//購物車紅色數字
// redNew();
// function redNew() {
//   if (JSON.parse(localStorage.getItem("list")) != null) {
//     let redNumber = JSON.parse(localStorage.getItem("list")).length;
//     // console.log(redNumber);
//     if (redNumber != 0) {
//       buy_number.innerText = redNumber;
//       buy_number.classList.add("buy_numberCss");
//     }
//   }
// }

if (JSON.parse(localStorage.getItem("list")) != null) {
  let con_sess = JSON.parse(localStorage.getItem("list"));
  let nametext = document.querySelector(".earphone_rigth");
  con_sess.forEach((item) => {
    if (item.proName == nametext.children[0].innerText) {
      shoppcart_btn.classList.add("already_add");
      shoppcart_btn.innerText = "已經加入購物車囉!";
    }
  });
}
