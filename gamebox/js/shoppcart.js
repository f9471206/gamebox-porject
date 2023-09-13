let section = document.querySelector("#shoppCartSection");
let myList = localStorage.getItem("list");
let buy_number = document.querySelector(".buy_number");
let sunNumber = document.querySelector(".sumnumber");
let check_btn = document.querySelector(".check_btn");

let shoppsum_p = document.querySelector(".shoppsum");

if (myList !== null) {
  let myListArray = JSON.parse(myList);

  myListArray.forEach((item) => {
    let todo = document.createElement("div");
    todo.classList.add("todoclass");

    let text_img = document.createElement("img");
    text_img.classList.add("todo_img");
    text_img.setAttribute("src", item.proImg);

    //產品名稱
    let text_name = document.createElement("p");
    text_name.classList.add("todo_p");
    text_name.innerText = item.proName;

    //+的按鈕
    let text_plus = document.createElement("button");
    text_plus.classList.add("puls_botton");
    text_plus.innerHTML = '<i class="fa-solid fa-plus"></i>';
    text_plus.addEventListener("click", (e) => {
      let quantity_p = e.target.parentElement.children[3];
      let quantity = e.target.parentElement.children[3].innerText;
      quantity++;
      quantity = Math.max(quantity, 1); //不小於1
      quantity_p.innerText = quantity;

      //拿到單價
      // let unitprice = JSON.parse(localStorage.getItem("list"));
      let checkname = e.target.parentElement.children[1].innerText;
      let sum_p = e.target.parentElement.children[5];

      let myListArray = JSON.parse(localStorage.getItem("list"));
      myListArray.forEach((item, index) => {
        if (item.proName == checkname) {
          let newMyList = { ...item }; //更新後的object
          newMyList.proquan = quantity; //商品數量
          let sum = newMyList.proMoney * quantity;
          sum_p.innerHTML = sum;
          sunNumber.innerHTML = sumRenew();
          myListArray.splice(index, 1, newMyList);
          localStorage.setItem("list", JSON.stringify(myListArray));
          // console.log(myListArray);
        }
      });
    });
    //數量
    let text_quantity = document.createElement("p");
    text_quantity.classList.add("quantity");
    text_quantity.innerText = item.proquan;

    //-的按鈕
    let text_minus = document.createElement("button");
    text_minus.classList.add("puls_botton");
    text_minus.innerHTML = '<i class="fa-solid fa-minus"></i>';
    text_minus.addEventListener("click", (e) => {
      let quantity_p = e.target.parentElement.children[3];
      let quantity = e.target.parentElement.children[3].innerText;
      quantity--;
      quantity = Math.max(quantity, 1); //不小於1
      quantity_p.innerText = quantity;

      // let unitprice = JSON.parse(localStorage.getItem("list"));
      let checkname = e.target.parentElement.children[1].innerText; //指定的名字
      let sum_p = e.target.parentElement.children[5]; //總價
      let myListArray = JSON.parse(localStorage.getItem("list"));
      myListArray.forEach((item, index) => {
        if (item.proName == checkname) {
          let newMyList = { ...item }; //更新後的object
          newMyList.proquan = quantity; //商品數量
          let sum = newMyList.proMoney * quantity;
          sum_p.innerHTML = sum;
          sunNumber.innerHTML = sumRenew();
          myListArray.splice(index, 1, newMyList);
          localStorage.setItem("list", JSON.stringify(myListArray));
          // console.log(myListArray);
        }
      });
      // 測試用
      // let foundObject = unitprice.find(function (currentObject) {
      //   return currentObject.proName === checkname;
      // });
      // if (foundObject) {
      //   let proMoney = Number(foundObject.proMoney);
      //   let sum = proMoney * quantity;
      //   sum_p.innerText = sum;
      // } else {
      //   // 没有找到
      // }測試用end
    });

    //產品總價
    let text_money = document.createElement("p");
    text_money.classList.add("todo_p2");
    text_money.innerText = item.proMoney;

    //圾垃統
    let text_trash = document.createElement("button");
    text_trash.classList.add("todotrash");
    text_trash.innerHTML = '<i class="fa-solid fa-trash"></i>';

    //刪除指定的資料
    text_trash.addEventListener("click", (e) => {
      let trash_button = e.target.parentElement;

      trash_button.addEventListener("animationend", () => {
        //remove from localStorage
        let text = trash_button.children[1].innerText;
        let myListArray = JSON.parse(localStorage.getItem("list"));
        myListArray.forEach((item, index) => {
          if (item.proName == text) {
            myListArray.splice(index, 1);
            localStorage.setItem("list", JSON.stringify(myListArray));
          }
        });
        trash_button.remove();
        //購物車紅色數字
        //更新商品的總價
        sunNumber.innerHTML = sumRenew();
        //若沒有商品按鈕消失並加文字
        redNumber();
        buyBtn();
        // console.log(myListArray.length);
        if (myListArray.length == 0) {
          localStorage.removeItem("list");
        }
      });
      trash_button.style.animation = "scaledown 0.3s forwards";
    });

    todo.appendChild(text_img);
    todo.appendChild(text_name);
    todo.appendChild(text_minus);
    todo.appendChild(text_quantity);
    todo.appendChild(text_plus);
    todo.appendChild(text_money);

    todo.appendChild(text_trash);
    section.appendChild(todo);
  });
} else {
}

sunNumber.innerHTML = sumRenew();

//購物車紅色數字
redNumber();
function redNumber() {
  let che_red = section.children.length;
  buy_number.innerText = che_red;
  buy_number.classList.add("buy_numberCss");
  if (che_red == 0) {
    buy_number.innerHTML = "";
    buy_number.style.display = "none";
  }
}

function sumRenew() {
  let sumMoney = 0;
  for (i = 0; i < section.children.length; i++) {
    sumMoney += parseInt(section.children[i].children[5].innerText);
  }
  return sumMoney;
}

buyBtn();
function buyBtn() {
  let che_length = section.children.length;
  if (che_length == 0) {
    shoppsum_p.style.display = "none";
    check_btn.style.display = "none";
  }
}
