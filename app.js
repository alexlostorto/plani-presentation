function addAnimation(source, parent) {
  const section = document.createElement("section");
  const video = document.createElement("video");
  video.width = 1920;
  video.height = 1080;
  video.playsinline = true;
  video.autoplay = true;
  video.loop = true;
  video.muted = true;
  video.src = source;
  section.appendChild(video);
  parent.appendChild(section);
}

function addSlide(source, parent) {
  const section = document.createElement("section");
  const image = document.createElement("img");
  image.src = source;
  section.appendChild(image);
  parent.appendChild(section);
}

function loadSlides() {
  addAnimation("assets/slides/Plani Intro.mp4", document.body);
  addSlide("assets/slides/Plani Intro.mp4", document.body);
}

let activeSlide = 1;
let slides = document.querySelectorAll("section");
let radios = document.querySelectorAll("input[type='radio']");

function moveSlideUp() {
  slides[activeSlide].style.top = 0;
  slides[activeSlide].style.transition = "top 0.5s ease-in-out";
  activeSlide++;

  radios.forEach((radio) => {
    radio.checked = false;
  });

  radios[activeSlide - 1].checked = true;
}

function moveSlideDown() {
  activeSlide--;
  slides[activeSlide].style.top = 0;
  slides[activeSlide].style.transition = "top 0.5s ease-in-out";

  radios.forEach((radio) => {
    radio.checked = false;
  });

  radios[activeSlide - 1].checked = true;
}

document.addEventListener("keypress", (event) => {
  if (event.key == "Enter") {
    moveSlideUp();
  }
});

document.addEventListener("keydown", (event) => {
  if (event.key == "ArrowDown") {
    moveSlideUp();
  } else if (event.key == "ArrowUp") {
    moveSlideDown();
  }
});

slides.forEach((slide) => slide.addEventListener("click", moveSlideUp));
