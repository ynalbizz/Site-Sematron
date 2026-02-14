@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')          <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Minicursos')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <!--SLK NUM COMPENSA FAZER DNV-->
    <section class="Palavra-Atividades_Traco-Laranja Palavra-Programacao">
        <h1 class="Palavra-Atividades">Minicursos</h1>
        <div class="traco-laranja"></div>
    </section>





    <section class="espaco-no-topo margem-esquerda">
        <div class="imagem-de-fundo">
                
            <div class="borda-minicursos">

                <div class="texto-na-esquerda">
                    <h1 class="nome-do-minicurso">NOME DO MINICURSO</h1>
                    <h1 class="horarios-minicursos">C.H.: 3h • Início: 30/11 • Horário: 19:00 • Vagas: 25</h1>
                </div>
                    
                <a href="/inscricoes" class="botao-inscrever">Inscrever</a>

            </div>

        </div>
    </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->