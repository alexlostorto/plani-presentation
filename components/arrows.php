<style>
    #arrows {
        position: absolute;
        display: flex;
        flex-direction: row;
        z-index: 1000000;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.8);
        overflow: hidden;
    }

    #arrows svg {
        fill: white;
    }

    #arrows div:hover {
        background-color: white;
        cursor: pointer;
        
    }

    #arrows div:hover svg {
        fill: black;
    }

    #down-angle {
        padding-left: 0.8rem;
        padding-right: 0.4rem;
    }

    #up-angle {
        padding-left: 0.4rem;
        padding-right: 0.8rem;
    }
</style>

<script>

document.addEventListener("keydown", function(event) {
    if (event.key === "ArrowUp") { // Press 'down' arrow key to activate hover effect
        document.querySelector("#up-angle").classList.add("hover");
        document.querySelector("#up-angle svg").style.fill = "black";
    } else if (event.key === "ArrowDown") { // Press 'down arrow' key to activate hover effect
        document.querySelector("#down-angle").classList.add("hover");
        document.querySelector("#down-angle svg").style.fill = "black";
    }
});

document.addEventListener("keyup", function(event) {
    if (event.key === "ArrowUp") { // Release 'down' arrow key to deactivate hover effect
        document.querySelector("#up-angle").classList.remove("hover");
        document.querySelector("#up-angle svg").style.fill = "white";
    } else if (event.key === "ArrowDown") { // Release 'down arrow' key to deactivate hover effect
        document.querySelector("#down-angle").classList.remove("hover");
        document.querySelector("#down-angle svg").style.fill = "white";
    }
});

</script>

<div class="d-flex justify-content-center align-items-center" id="arrows">
    <div class="py-2" id="down-angle">
        <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" viewBox="0 0 448 512">
            <path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
        </svg>
    </div>
    <div class="py-2" id="up-angle">
        <svg xmlns="http://www.w3.org/2000/svg" height="1.2rem" viewBox="0 0 448 512">
            <path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/>
        </svg>
    </div>
</div>

<script>

document.querySelector("#down-angle").addEventListener("click", function() {
    event.stopPropagation();
    if (activeSlide < slides.length - 1) {
        moveSlideUp();
        zIndex ++;
    }
})

document.querySelector("#up-angle").addEventListener("click", function() {
    event.stopPropagation();
    if (activeSlide > 0) {
        moveSlideDown();
        zIndex ++;
    }
})

</script>