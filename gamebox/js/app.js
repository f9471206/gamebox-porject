// let section = document.querySelector("#shoppCartSection");
// let shoppCart = document.querySelectorAll(".shoppCartClick");

// for (let i = 0; i < shoppCart.length; i++) {
//   shoppCart[i].addEventListener("click", (e) => {
//     e.preventDefault();
//     // console.log(e);

//     //取得圖片
//     let form = e.target.parentElement.parentElement.children[1];
//     let proImg =
//       e.target.parentElement.parentElement.children[0].getAttribute("src");
//     // console.log(testImg);

//     //取得商品名稱
//     let proName = form.children[0].innerText;

//     //取得商品價格
//     let proMoney = form.children[1].innerText;

//     // section中的div
//     let todo = document.createElement("div");
//     todo.classList.add("todoclass");

//     //加商品名稱
//     let text_name = document.createElement("p");
//     text_name.classList.add("todo_p");
//     text_name.innerText = proName;

//     //價格
//     let text_money = document.createElement("p");
//     text_money.classList.add("todo_p2");
//     text_money.innerText = proMoney;

//     //垃圾桶
//     let text_trash = document.createElement("button");
//     text_trash.classList.add("todotrash");
//     text_trash.innerHTML = '<i class="fa-solid fa-trash"></i>';
//     text_trash.addEventListener("click", (e) => {
//       let trash_button = e.target.parentElement;
//       if (confirm("確定刪除") == true) {
//         //下面是結束動畫才進行remove()

//         trash_button.addEventListener("animationend", () => {
//           let text = trash_button.children[1].innerText;
//           let myListArray = JSON.parse(localStorage.getItem("list"));
//           myListArray.forEach((item, index) => {
//             if (item.proName == text) {
//               myListArray.splice(index, 1);
//               localStorage.setItem("list", JSON.stringify(myListArray));
//             }
//           });

//           trash_button.remove();
//         });
//         trash_button.style.animation = "scaledown 0.3s forwards";
//       }
//     });

//     //圖片
//     let text_img = document.createElement("img");
//     text_img.classList.add("todo_img");
//     text_img.setAttribute("src", proImg);

//     todo.appendChild(text_img);
//     todo.appendChild(text_name);
//     todo.appendChild(text_money);
//     todo.appendChild(text_trash);
//     section.appendChild(todo);

//     // alert("以加入購物車");
//     //session
//     let myshoppCart = {
//       proName: proName,
//       proMoney: proMoney,
//       proImg: proImg,
//     };

//     let myList = localStorage.getItem("list");
//     if (myList == null) {
//       localStorage.setItem("list", JSON.stringify([myshoppCart]));
//     } else {
//       myListArray = JSON.parse(myList);
//       myListArray.push(myshoppCart);
//       localStorage.setItem("list", JSON.stringify(myListArray));
//     }
//     let buyNumber_header = document.querySelector(".buy_number");
//     let text = JSON.parse(localStorage.getItem("list")).length;
//     console.log(buyNumber_header);
//     console.log(text);
//     if (text == 0) {
//       buyNumber_header.style.display = "none";
//     } else {
//       buyNumber_header.innerText = text;
//     }
//   });
// }

// let myList = localStorage.getItem("list");

// if (myList !== null) {
//   let myListArray = JSON.parse(myList);

//   myListArray.forEach((item) => {
//     let todo = document.createElement("div");
//     todo.classList.add("todoclass");

//     let text_img = document.createElement("img");
//     text_img.classList.add("todo_img");
//     text_img.setAttribute("src", item.proImg);

//     let text_name = document.createElement("p");
//     text_name.classList.add("todo_p");
//     text_name.innerText = item.proName;

//     let text_money = document.createElement("p");
//     text_money.classList.add("todo_p2");
//     text_money.innerText = item.proMoney;

//     let text_trash = document.createElement("button");
//     text_trash.classList.add("todotrash");
//     text_trash.innerHTML = '<i class="fa-solid fa-trash"></i>';
//     text_trash.addEventListener("click", (e) => {
//       let trash_button = e.target.parentElement;

//       trash_button.addEventListener("animationend", () => {
//         //remove from localStorage
//         let text = trash_button.children[1].innerText;
//         let myListArray = JSON.parse(localStorage.getItem("list"));
//         myListArray.forEach((item, index) => {
//           if (item.proName == text) {
//             myListArray.splice(index, 1);
//             localStorage.setItem("list", JSON.stringify(myListArray));
//           }
//         });
//         trash_button.remove();
//         //更新商品的總價
//         let proSum = 0;
//         for (i = 0; i < myListArray.length; i++) {
//           proSum += parseInt(myListArray[i].proMoney);
//         }
//         let sum = document.querySelector(".sumnumber");
//         let sunNumber = document.createElement("p");
//         sunNumber.innerText = proSum;
//         sum.appendChild(sunNumber);
//         sum.children[0].remove();
//       });

//       trash_button.style.animation = "scaledown 0.3s forwards";
//     });

//     todo.appendChild(text_img);
//     todo.appendChild(text_name);
//     todo.appendChild(text_money);
//     todo.appendChild(text_trash);
//     section.appendChild(todo);
//   });
//   // 商品總價

//   let proSum = 0;
//   for (i = 0; i < myListArray.length; i++) {
//     proSum += parseInt(myListArray[i].proMoney);
//   }
//   let sum = document.querySelector(".sumnumber");
//   let sunNumber = document.createElement("p");
//   sunNumber.innerText = proSum;
//   sum.appendChild(sunNumber);
// }

// //顯示紅區的商品數量
// // buyRenew();
// function buyRenew() {
//   let buyNumber = document.querySelector(".buy_number");
//   let buy_number = JSON.parse(localStorage.getItem("list")).length;
//   console.log(buyNumber);
//   console.log(buy_number);
//   if (buy_number == 0) {
//     buyNumber.style.display = "none";
//   } else {
//     buyNumber.innerText = buy_number;
//   }
// }
