<style>
/* Garante que o corpo ocupe a altura toda */
body.Corpo {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
}

/* Faz o main crescer e virar um container flexível centralizado */
main {
    flex: 1; /* Ocupa o espaço entre o header e o footer */
    display: flex;
    justify-content: center; /* Centraliza horizontalmente */
    align-items: center;     /* Centraliza verticalmente */
    text-align: center;
}

/* Estilização do texto */
.texto-fechado {
    font-family: 'Inter', sans-serif;
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
}

</style>
<main>
    <div class="texto-fechado" 
         wire:key="lw-2595669341-0" 
         wire:id="w4SrrTiYvOeN20uYByyB">
        Inscrições Fechadas
    </div>
</main>