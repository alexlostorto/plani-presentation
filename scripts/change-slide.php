<?php include('scripts/default.php'); ?>

<script>

let activeSlide = 0;
let zIndex = 1;
let slides = null;

async function loadSlides() {
    slides = await waitUntilLoaded("section");
    slides[0].style.zIndex = 1;
    slides[0].style.top = 0;
}

loadSlides();

function moveSlideUp() {
    changeCounterValue(1);
    slides[activeSlide+1].style.top = 0;
    slides[activeSlide+1].style.zIndex = zIndex;
    slides[activeSlide+1].style.transition = "top 0.5s ease-in-out";
    slides[activeSlide].style.top = "-100%";
    slides[activeSlide].style.transition = "";
    slides[activeSlide].style.zIndex = 0;
    activeSlide++;
}

function moveSlideDown() {
    changeCounterValue(-1);
    slides[activeSlide-1].style.top = 0;
    slides[activeSlide-1].style.zIndex = zIndex;
    slides[activeSlide-1].style.transition = "top 0.5s ease-in-out";
    slides[activeSlide].style.top = "100%";
    slides[activeSlide].style.transition = "";
    slides[activeSlide].style.zIndex = 0;
    activeSlide--;
}

document.addEventListener("click", (event) => {
    if (activeSlide < slides.length - 1) {
        moveSlideUp();
        zIndex ++;
    }
});

document.addEventListener("keypress", (event) => {
    if (event.key == "Enter" && activeSlide < slides.length - 1) {
        moveSlideUp();
        zIndex ++;
    }
});

document.addEventListener("keydown", (event) => {
    if (event.key == "ArrowDown" && activeSlide < slides.length - 1) {
        moveSlideUp();
        zIndex ++;
    } else if (event.key == "ArrowUp" && activeSlide > 0) {
        moveSlideDown();
        zIndex ++;
    }
});

</script>