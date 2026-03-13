@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'palestras')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <!--SLK NUM COMPENSA FAZER DNV-->
        <section class="Palavra-Atividades_Traco-Laranja Palavra-Programacao">
            <h1 class="Palavra-Atividades">palestras</h1>
            <div class="traco-laranja"></div>
        </section>





        <section class="espaco-no-topo margem-esquerda">
            <div class="imagem-de-fundo">
                @foreach ($palestras as $palestra)
                <div class="borda-visitas">
                    <div class="texto-na-esquerda">
                        <h1 class="nome-da-visita">Palestra — {{ $palestra->name }}</h1>
                        <h1 class="horarios-visitas">Dia: {{date('d/m', strtotime($palestra->start))}} • Saída: {{date('H:i', strtotime($palestra->start))}} • Vagas: 30</h1>
                    </div>
                    <a href="/inscricoes" class="botao-inscrever">Inscrever</a>
                </div>
                @endforeach


            </div>
        </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->