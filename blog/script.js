const addbtn = document.querySelector(".dodaj");
const inpcnt = document.querySelector(".inputy-cont");

addbtn.addEventListener('click', function(){
    if(inpcnt.className === "inputy-cont"){
        inpcnt.className = "inputy-content-dodawanie";
    }else{
        inpcnt.className = "inputy-cont";
    }
})