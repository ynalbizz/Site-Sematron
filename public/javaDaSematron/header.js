const burgao = document.getElementById("hamburguer");
const menu = document.querySelector(".Menu-Celular");

burgao.addEventListener("click", function () {
    menu.classList.toggle("ativo");
});

