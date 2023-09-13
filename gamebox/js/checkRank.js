let checkRank = document.querySelector(".row");
let checkRankChilden = checkRank.children.length;

if (checkRankChilden == 0) {
  let text = document.createElement("h3");
  text.innerText = "目前沒有銷售量";
  checkRank.appendChild(text);
}
