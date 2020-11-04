const newAccount = document.querySelector(".newAccount");
const zarejestruj = document.querySelector(".zarejestruj");
const zarejestrujForm = document.querySelector(".zarejestrujForm");
const zaloguj = document.querySelector(".zaloguj");

console.log(newAccount)


newAccount.addEventListener("click", function(){
    zarejestruj.style.display = "block";
    zarejestrujForm.style.display = "flex";
    zaloguj.style.display = "none";
})

