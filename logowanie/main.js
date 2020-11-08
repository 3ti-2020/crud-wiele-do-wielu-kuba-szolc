const newAccount = document.querySelector(".newAccount");
const oldAccount = document.querySelector(".oldAccount");
const zarejestruj = document.querySelector(".zarejestruj");
const zarejestrujForm = document.querySelector(".zarejestrujForm");
const zaloguj = document.querySelector(".zaloguj");

console.log(newAccount)

newAccount.addEventListener("click", function(){
    zarejestruj.style.display = "block";
    zarejestrujForm.style.display = "flex";
    zaloguj.style.display = "none";
    newAccount.style.display = "none";
    oldAccount.style.display = "block";
})

oldAccount.addEventListener("click", function(){
    zarejestruj.style.display = "none";
    zarejestrujForm.style.display = "none";
    zaloguj.style.display = "flex";
    newAccount.style.display = "block";
    oldAccount.style.display = "none";
})

