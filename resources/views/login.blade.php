@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@extends('layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Login')                  <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <!--Muito dos css estão no cadastro.css, pq fiquei com preguiça de copiar tudo dnv-->
    <section class="trem-principal">
        
        <div class="teste Parte-da-Esquerda">
            <h1 class="Login-grande">Login</h1>
            <h1 class="Sub-Login">Acesse sua conta para XXXX e XXXX.</h1>
        </div>
        <div class="teste borda-cadastro">
            <h1 class="Champions-do-Forms">LOGIN</h1>

                <form action={{ route('login.autenticar') }} method="POST">
                    @csrf
                    <div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" required placeholder="ex: aluno@usp.br">
                        </div>
                        <div class="input-group">
                            <label>Senha</label>
                            <input type="password" name="senha" id="senha" required>
                            <i class="fas fa-eye" id="olhinho"></i>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn cima-espacamento">ENTRAR</button>
                </form>
            <div class="display-flex"><a href="/esqueceu-a-senha" class="Esqueceu-Senha">Esqueceu a senha?</a></div>
        </div>

    </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
        