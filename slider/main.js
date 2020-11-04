const nextBtn = document.querySelector(".nextBtn");
const prevBtn = document.querySelector(".prevBtn");
const container = document.querySelector(".images");

let counter = 1;

nextBtn.addEventListener('click', nextSlide);
prevBtn.addEventListener('click', prevSlide);

function nextSlide(){
    if(counter === 5){
        counter = 0;
    }

    counter++;

    container.style.backgroundImage = `url(img${counter}.jpg)`
}

function prevSlide(){
    if(counter === 1){
        counter = 5;
    }

    counter--;

    container.style.backgroundImage = `url(img${counter}.jpg)`
}