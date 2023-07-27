let activeSlide = 1;
let slides = null;
let radios = null;

const sleep = (ms) => {
  return new Promise((resolve) => setTimeout(resolve, ms));
};

async function getSlides() {
  const response = await fetch("https://api.github.com/repos/alexlostorto/plani-presentation/git/trees/main?recursive=1");
  const data = await response.json();
  const slides = [];
  data.tree.forEach((slide) => {
    if (slide.path.includes("assets/slides/")) {
      slides.push(slide.path);
    }
  });

  return sortByDigits(slides);
}

function sortByDigits(array) {
  const regex = /\D/g;
  array.sort(function (a, b) {
    return parseInt(a.replace(regex, ""), 10) - parseInt(b.replace(regex, ""), 10);
  });
  return array;
}

async function waitUntilLoaded(selector) {
  let trials = 0;
  while (document.querySelectorAll(selector).length == 0 && trials <= 10) {
    await sleep(250);
    trials++;
  }
  return document.querySelectorAll(selector);
}

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
  image.loading = "lazy";
  section.appendChild(image);
  parent.appendChild(section);
}

function createRadios(number) {
  const radio = document.createElement("input");
  radio.type = "radio";
  radio.name = "item";
  radio.checked = "checked";
  radio.id = "section1";
  document.body.appendChild(radio);

  for (let i = 2; i <= number; i++) {
    const radio = document.createElement("input");
    radio.type = "radio";
    radio.name = "item";
    radio.id = "section" + i;
    document.body.appendChild(radio);
  }

  const nav = document.createElement("nav");
  nav.classList.add("nav");
  for (let i = 1; i <= number; i++) {
    const label = document.createElement("label");
    label.classList.add("nav-item");
    label.htmlFor = "section" + i;
    nav.appendChild(label);
  }

  document.body.appendChild(nav);
}

async function loadSlides() {
  const slidePaths = await getSlides();
  createRadios(slidePaths.length);
  addAnimation("assets/animation/intro.mp4", document.body);
  slidePaths.forEach((slidePath) => {
    addSlide(slidePath, document.body);
  });
  addAnimation("assets/animation/intro.mp4", document.body);
  slides = await waitUntilLoaded("section");
  radios = await waitUntilLoaded("input[type='radio']");
  slides.forEach((slide) => slide.addEventListener("click", moveSlideUp));
}

loadSlides();

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
