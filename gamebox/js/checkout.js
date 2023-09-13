let section = document.querySelector("#shoppCartSection");
let myList = localStorage.getItem("list");
// let buy_number = document.querySelector(".buy_number");
let sunNumber = document.querySelector(".sumnumber");
let buy_number = document.querySelector(".buy_number"); //購物車紅字
if (myList !== null) {
  let myListArray = JSON.parse(myList);

  myListArray.forEach((item) => {
    let divInline = document.createElement("div");
    divInline.classList.add("inline");

    //商品名稱
    let text_name = document.createElement("input");
    text_name.classList.add("checkout_input");
    text_name.value = item.proName;
    text_name.setAttribute("readonly", true);
    text_name.type = "text";

    //商品數量
    let text_quan = document.createElement("input");
    text_quan.classList.add("checkout_input");
    text_quan.value = item.proquan;
    text_quan.setAttribute("readonly", true);
    text_quan.type = "text";
    text_quan.name = "proquan[]";

    //商品單價
    let text_money = document.createElement("input");
    text_money.classList.add("checkout_input");
    text_money.value = item.proMoney;
    text_money.setAttribute("readonly", true);
    text_money.type = "text";
    text_money.name = "promoney[]";

    //商品ID
    let text_proid = document.createElement("input");
    text_proid.classList.add("hidden");
    text_proid.value = item.proid;
    text_proid.setAttribute("readonly", true);
    text_proid.type = "text";
    text_proid.name = "proid[]";

    //總價
    let text_sum = document.createElement("input");
    text_sum.classList.add("checkout_input");
    text_sum.value = item.proMoney * item.proquan;
    text_sum.setAttribute("readonly", true);
    text_sum.type = "text";

    // todo.appendChild(text_name);
    // todo.appendChild(text_money);
    divInline.appendChild(text_name);
    divInline.appendChild(text_quan);
    divInline.appendChild(text_money);
    divInline.appendChild(text_proid);
    divInline.appendChild(text_sum);
    section.appendChild(divInline);
  });
} else {
  location.href = "index.php";
}
//全部商品總價
let sum = document.createElement("p"); //總價
sum.innerText = " 訂單總價 " + sumRenew() + " 元 ";
sunNumber.appendChild(sum);

function sumRenew() {
  let sumMoney = 0;
  for (i = 0; i < section.children.length; i++) {
    sumMoney += parseInt(section.children[i].children[4].value);
  }
  return sumMoney;
}

redNumber();
function redNumber() {
  let shoppCartRedNumber = JSON.parse(localStorage.getItem("list")).length;

  if (shoppCartRedNumber != 0) {
    buy_number.innerText = shoppCartRedNumber;
    buy_number.classList.add("buy_numberCss");
  } else {
    buy_number.innerHTML = "";
    buy_number.style.display = "none";
  }
}
