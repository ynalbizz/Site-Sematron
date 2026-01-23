const olhinho = document.querySelector("#olhinho");
const senha = document.querySelector("#senha");

olhinho.addEventListener("click", function(){

    const type = senha.type === "password" ? "text" : "password";

    senha.type = type;

    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");

});