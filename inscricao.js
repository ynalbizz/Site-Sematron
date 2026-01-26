const select = document.getElementById("PACOTAO");
const boxes = document.querySelectorAll(".box");

select.addEventListener("change", () => {
    const value = select.value;

    boxes.forEach(box => {
        if (!box.dataset.show) return;

        const options = box.dataset.show.split(" ");
        const selects = box.querySelectorAll("select");

        if (options.includes(value)) {
            box.classList.add("is-visible");

            selects.forEach(s => {
                s.required = true;
                s.disabled = false;
            });

        } else {
            box.classList.remove("is-visible");

            selects.forEach(s => {
                s.required = false;
                s.disabled = true;
                s.value = ""; // limpa seleção escondida
            });
        }
    });
});
