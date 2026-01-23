const select = document.getElementById("PACOTAO");
const boxes = document.querySelectorAll(".box");

select.addEventListener("change", () => {
    const value = select.value;

    boxes.forEach(box => {
        const options = box.dataset.show.split(" ");
        const selectInsideBox = box.querySelector("select");

        if (options.includes(value)) {
            box.classList.add("is-visible");

            if (selectInsideBox) selectInsideBox.required = true;
        } else {
            box.classList.remove("is-visible");

            if (selectInsideBox) selectInsideBox.required = false;
        }
    });
});
