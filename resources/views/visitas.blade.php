@extends('layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Visitas')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <!--SLK NUM COMPENSA FAZER DNV-->
        <section class="Palavra-Atividades_Traco-Laranja Palavra-Programacao">
            <h1 class="Palavra-Atividades">Visitas</h1>
            <div class="traco-laranja"></div>
        </section>





        <section class="espaco-no-topo margem-esquerda">
            <div class="imagem-de-fundo">
                
                <div class="borda-visitas">

                    <div class="texto-na-esquerda">
                        <h1 class="nome-da-visita">Visita Técnica — XXXXXXX</h1>
                        <h1 class="horarios-visitas">Saída: 14:00 • Retorno: 18:00 • Vagas: 30</h1>
                    </div>
                    
                    <a href="/inscricoes" class="botao-inscrever">Inscrever</a>

                </div>

            </div>
        </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->