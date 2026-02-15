@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Mais SEMATRON')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <!--SLK NUM COMPENSA FAZER DNV-->
    <section class="Palavra-Atividades_Traco-Laranja Palavra-Programacao">
        <h1 class="Palavra-MAISSSS">Mais SEMATRON</h1>
        <div class="traco-laranja"></div>
    </section>

    <section class="texto-pra-porra imagem-de-fundo tamanho-min">
        <h1 class="textao">A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia MecatrônicaA SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica A SEMATRON é a maior semana acadêmica na área de Engenharia Mecatrônica</h1>
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