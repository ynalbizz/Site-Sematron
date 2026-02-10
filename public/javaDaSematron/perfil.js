const selects = document.getElementById("semattt");
const sumidos = document.querySelectorAll(".vaiSumir");

selects.addEventListener("change", () => {
    const value = selects.value;

    sumidos.forEach(vaiSumir => {
        const options = vaiSumir.dataset.show.split(" ");
        const selectInsideBox = vaiSumir.querySelector("selects");

        if (options.includes(value)) {
            vaiSumir.classList.add("is-visible");

            if (selectInsideBox) selectInsideBox.required = true;
        } else {
            vaiSumir.classList.remove("is-visible");

            if (selectInsideBox) selectInsideBox.required = false;
        }
    });
});