const olhinho = document.querySelector("#olhinho");
const senha = document.querySelector("#senha");

// Verifica se os elementos existem na página atual
if (olhinho && senha) {
    olhinho.addEventListener("click", function() {
        const type = senha.type === "password" ? "text" : "password";
        senha.type = type;

        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
}