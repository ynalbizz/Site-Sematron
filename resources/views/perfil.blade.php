@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')

@section('title', 'Perfil')

@section('content')
    <section class="separa-em-tres">
        <div class="Parte-da-Esquerda">
            <h1 class="Login-grande">Perfil</h1>
            <h1 class="Sub-Login">Veja aqui suas informações.</h1>
        </div>
        
        @if($usuario)
        <div class="borda-perfil">
            <div class="texto-perfil">
                <h1 class="nome-bendito">{{ $usuario->name }}</h1>
                <h1 class="email-do-ser">{{ $usuario->email }}</h1>
                <h1 class="curso-que-faz">{{ $usuario->curso }}</h1>
                <h1 class="situacao-do-pix">Pagamento Confirmado!</h1>
                <a href="" class="infos-pessoas">Informações Pessoais</a>
            </div>
        </div>
        @endif

        <div class="borda-perfil">
            <div class="texto-perfil">
                <h1 class="segue-o-lider">Acompanhe seus dados</h1>
                <h1 class="palavras-bonitas">Selecione a edição:</h1>
                <div class="perfil-bagulho">
                    <div class="input-group">
                        <select id="seletor-sematron" name="seletor-sematron" onchange="location = this.value;" required>
                            <option value="" disabled {{ !$sidSelecionada ? 'selected' : '' }}>Selecione...</option>
                            @foreach($users as $user)
                                <option value="{{ url()->current() }}?sid={{ $user->sid }}" 
                                        {{ $user->sid == $sidSelecionada ? 'selected' : '' }}>
                                    SEMATRON {{ $user->romano}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($user_atual)
    <section >
        <div class="Parte-da-Esquerda">
            <h1 class="Login-grande">SEMATRON {{ $user_atual->romano }}</h1>
        </div>

        <div class="textos-perfil">
            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Categoria:</h1>
                <h2 class="SubTit-Perfil">Participante</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Kit:</h1>
                <h2 class="SubTit-Perfil">{{ $user_atual->pack_id_n }}</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Minicursos:</h1>
                <h2 class="SubTit-Perfil">{{ $user_atual->minicurso_n }}</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Visita:</h1>
                <h2 class="SubTit-Perfil">{{ $user_atual->viagem_n }}</h2>
            </div>

            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Camiseta:</h1>
                <h2 class="SubTit-Perfil">{{ $user_atual->camiseta_n }}</h2>
            </div>
        </div>

        <div class="textos-perfil">
            <div class="div-Perfil">
                <h1 class="Tit-Perfil">Presença em Palestras:</h1>
                <h2 class="SubTit-Perfil">{{ $user_atual->presenca }}%</h2>
            </div>

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
    @else
    <section>
        <div class="textos-perfil">
            <p>Nenhum dado encontrado para esta edição.</p>
        </div>
    </section>
    @endif
@endsection