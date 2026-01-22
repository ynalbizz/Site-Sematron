@extends('layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Esqueceu a senha')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <!--Muito dos css estão no cadastro.css, pq fiquei com preguiça de copiar tudo dnv-->
    <section class="trem-principal">
        
        <div class="teste Parte-da-Esquerda">
            <h1 class="Login-grande">Recuperar Senha</h1>
            <h1 class="Sub-Login">Recupere a senha do seu e-mail.</h1>
        </div>
        <div class="teste borda-cadastro">
            <h1 class="Champions-do-Forms">RECUPERAR SENHA</h1>

                <form action="#" method="POST">
                    <div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" required placeholder="ex: aluno@usp.br">
                        </div>
                    </div>
                    <button type="submit" class="submit-btn cima-espacamento">ENVIAR E-MAIL</button>
                </form>
        </div>

    </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->