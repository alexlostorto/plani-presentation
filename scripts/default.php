<script>

const sleep = (ms) => {
    return new Promise((resolve) => setTimeout(resolve, ms));
};

async function waitUntilLoaded(selector) {
    let trials = 0;
    while (document.querySelectorAll(selector).length == 0 && trials <= 10) {
        await sleep(250);
        trials++;
    }
    return document.querySelectorAll(selector);
}

</script>
