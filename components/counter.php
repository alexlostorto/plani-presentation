<style>
    #counter {
        position: absolute;
        z-index: 1000000;
        border-top-left-radius: 10px;
        bottom: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.8);
        overflow: hidden;
    }

    #counter span {
        color: white;
    }

    #counter:hover {
        background-color: white;
    }

    #counter:hover span {
        color: black;
        font-weight: bold;
    }
</style>

<script>

function changeCounterValue(value) {
    let counter = document.querySelector('#counter span');
    let count = parseInt(counter.textContent.split(',')[0]);
    count += value;
    counter.textContent = count + '/' + document.querySelectorAll('section').length;
}

</script>

<div class="d-flex justify-content-center align-items-center px-3 py-2" id="counter">
    <span><?= $count ?></span>
</div>