@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Mais SEMATRON')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <!--SLK NUM COMPENSA FAZER DNV-->
    <section class="Palavra-Atividades_Traco-Laranja Palavra-Programacao">
        <h1 class="Palavra-MAISSSS">Mais SEMATRON</h1>
        <div class="traco-laranja"></div>
    </section>

    <section class="texto-pra-porra imagem-de-fundo tamanho-min">
        <h1 class="textao">
            A Semana Acadêmica de Engenharia Mecatrônica ou Sematron é um evento sem fins lucrativos planejado, organizado e gerenciado pelo Grupo Sematron, com apoio da coordenação do curso de Engenharia Mecatrônica e da Escola de Engenharia de São Carlos da USP. Atualmente, destaca-se como a maior semana acadêmica de Engenharia Mecatrônica da América Latina, com planejamento realizado integralmente por alunos e reunindo principalmente estudantes de engenharia de diferentes regiões do Brasil, além de participantes vindos de países vizinhos. O evento também atrai alunos do ensino médio e entusiastas de tecnologia, interessados em conhecer de perto o universo da mecatrônica e suas aplicações.
        </h1>
        <h1 class="Sub-Mais-Sematron">Acompanhe as redes sociais e confira a programação.</h1>



        <div class="links">
            <a href="" class="borda-Mais-Sematron diretcha">
                <div class="Circulo-mais">
                    <img class="Mini-Logo-Preto-mais" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                </div>
                <h1 class="link-mais-semat">Instagram</h1>
            </a>

            <a href="" class="borda-Mais-Sematron">
                <div class="Circulo-mais">
                    <img class="Mini-Logo-Preto-mais" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                </div>
                <h1 class="link-mais-semat">YouTube</h1>
            </a>
        </div>

    </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->