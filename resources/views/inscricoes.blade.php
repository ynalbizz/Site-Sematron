@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Inscrições')             <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
<section class="Parte-De-Cima-Insc">
        <div class="texto-Insc">
            <h1 class="Tit-Insc">Inscrição</h1>
            <h1 class="Sub-Insc">Faça a sua inscrição.</h1>
        </div>



        <div class="Imagem-Insc"></div>



        
        <div class="borda-cadastro deu-toque">
            <h1 class="Champions-do-Forms">Escolha o Pacote</h1>
    <form action={{ route('inscricao.store')}} method="POST">
        @csrf
                <div class="input-group">
                    <label>Pacote</label>
                        <select id="PACOTAO" name="pack_id" required>
                            <option value="" disabled selected>Selecione...</option>
                            <option value=137>Básico R$</option>
                            <option value=138>Completo R$</option>
                        </select>
                </div>
        </div>
</section>
<section class="tres-colunas-insc box" data-show="137 138">



        <div class="borda-insc box" data-show="138">                                                        <!--BOX-->
            <h1 class="Champions-do-Forms">Escolha a Visita</h1>
                <div class="input-group">
                    <label>Visita</label>
                        <select name="visita[]">
                            <option value="" disabled selected>Selecione...</option>
                            <option value=0>Básico R$</option>
                            <option value=1>Completo R$</option>
                            
                        </select>
                </div>
        </div>



        <div class="borda-insc box" data-show="137 138">
            <h1 class="Champions-do-Forms">Escolha o Minicurso</h1>
                <div class="input-group">
                    <label>Minicurso</label>
                        <select name="minicurso[]">
                            <option value="" disabled selected>Selecione...</option>
                            <option value=0>Básico R$</option>
                            <option value=1>Completo R$</option>
                        </select>
                </div>
        </div>



        <div class="borda-insc box" data-show="138">
            <h1 class="Champions-do-Forms">Escolha o Tamanho</h1>
                <div class="input-group">
                    <label>Tamanho da Camiseta</label>
                        <select name="camiseta">
                            <option value="" disabled selected>Selecione...</option>
                            <option value='p'>P</option>
                            <option value='m'>M</option>
                        </select>
                </div>
        </div>
</section>

<section class="campo-botao box" data-show="137 138">
    <button type="submit" class="submit-btn-insc">IR PARA PAGAMENTO</button>
</section>
    </form>

@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
