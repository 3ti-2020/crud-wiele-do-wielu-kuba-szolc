const cart = document.querySelector(".cart");
const buy = document.querySelector(".buyBefore");
const black = document.querySelector(".black");
const colors = document.querySelector(".colors");
const selectColor = document.querySelector(".selectColorBefore");
const colorRed = document.querySelector(".colorRed");
const colorYel = document.querySelector(".colorYel");
const colorGre = document.querySelector(".colorGre");
const image = document.querySelector(".image");
const addBtn = document.querySelector(".addToCart");
// const fa1 = document.querySelector(".fa1");
// const fa2 = document.querySelector(".fa2");
// const fa3 = document.querySelector(".fa3");

console.log(cart);

cart.addEventListener("click", function(){
    buy.className = "buyAfter"
    black.style.opacity = "0.5";
})
buy.addEventListener("mouseleave", function(){
    black.style.opacity = "0";
    buy.className = "buyBefore";
})

addBtn.addEventListener("click", function(){
    black.style.opacity = "0";
    buy.className = "buyBefore";
})


colors.addEventListener("click", function(){
    selectColor.className = "selectColorAfter"
    black.style.opacity = "0.5";
})
selectColor.addEventListener("mouseleave", function(){
    black.style.opacity = "0";
    selectColor.className = "selectColorBefore";
})

colorYel.addEventListener("click", function(){
    image.src = "chair-yellow.jpg";
    selectColor.className = "selectColorBefore";
})
colorRed.addEventListener("click", function(){
    image.src = "chair-red.jpg";
    selectColor.className = "selectColorBefore";
})
colorGre.addEventListener("click", function(){
    image.src = "chair-green.jpg";
    selectColor.className = "selectColorBefore";
})
