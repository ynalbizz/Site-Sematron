@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')          <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Perfil')                 <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <section class="separa-em-tres">
        <div class="Parte-da-Esquerda">
            <h1 class="Login-grande">Perfil</h1>
            <h1 class="Sub-Login">Veja aqui suas informações.</h1>
        </div>
@if($usuario)
        <div class="borda-perfil">
            <div class="texto-perfil">
                <h1 class="nome-bendito">{{$usuario->name}}</h1>
                <h1 class="email-do-ser">{{$usuario->email}}</h1>
                <h1 class="curso-que-faz">{{$usuario->curso}}</h1>
                <h1 class="situacao-do-pix">Pagamento Confirmado!</h1>
                <a href="" class="infos-pessoas">Informações Pessoais</a>
            </div>
        </div>
@endif


        <div class="borda-perfil">
            <div class="texto-perfil">
                <h1 class="segue-o-lider">Acompanhe seus dados</h1>
                <h1 class="palavras-bonitas">Selecione qual das Sematrons que você deseja ver seus dados:</h1>
                <div class="perfil-bagulho">
                    <div class="input-group">
                        <select id="semattt" name="pacote-dos-guri" required>
                            <option value="" disabled selected>Selecione...</option>
                            <option value="Sematron-XXII">SEMATRON XXII</option>
                            <option value="Sematron-XXI">SEMATRON XXI</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vaiSumir" data-show="Sematron-XXII">
        <div class="Parte-da-Esquerda">
            <h1 class="Login-grande">SEMATRON XXII</h1>
        </div>


@if($usuario)
        <div class="textos-perfil">
            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Categoria:</h1>
                <h2 class="SubTit-Perfil">Participante</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Kit:</h1>
                <h2 class="SubTit-Perfil">{{$pack_id}}</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Minicursos:</h1>
                <h2 class="SubTit-Perfil">{{$minicurso}}</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Visita:</h1>
                <h2 class="SubTit-Perfil">{{$viagem}}</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Camiseta:</h1>
                <h2 class="SubTit-Perfil">{{$camiseta}}</h2>
            </div>
        </div>





        <div class="textos-perfil">
            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Presença em Palestras:</h1>
                <h2 class="SubTit-Perfil">{{ceil($totalPresenca/$n_palestras*100)}}%</h2>
            </div>
@endif
            <div class="borda-certificado">
                <div class="certificados">
                    <h1 class="palavra-certificado">Certificados</h1>
                </div>

                <div class="espacamento-boto">
                    <a href="" class="botoes-perfil">Presença</a>
                    <a href="" class="botoes-perfil">Minicurso</a>
                    <a href="" class="botoes-perfil">Visita</a>
                </div>
            </div>
        </div>
    </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->