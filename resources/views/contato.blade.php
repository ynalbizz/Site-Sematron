@extends('layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Contato')                <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <section class="Parte-De-Cima-Contato">
            <div class="texto-contato">
                <h1 class="Tit-Cont">Contato</h1>
                <h1 class="Sub-Cont">Fale com a equipe SEMATRON.</h1>
            </div>



            <div class="Imagem-Contato"></div>



            <div class="informacoes-contato">
                <h1 class="titulo-contato">Informações</h1>
                <div>
                    <h1 class="textinho-foda-contato">Grupo SEMATRON</h1>
                    <h1 class="textinho-foda-contato">Av. Trabalhador São-Carlense, 400</h1>
                    <h1 class="textinho-foda-contato">Pq. Arnold Schimidt — São Carlos</h1>
                    <h1 class="textinho-foda-contato">CEP: 13566-590</h1>
                    <h1 class="textinho-foda-contato">Tel: +55 (61) 98172-5281</h1>
                    <h1 class="textinho-foda-contato">Email: sematron@eesc.usp.br</h1>
                </div>
            </div>

        </section>





        <section class="mapinha">
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14796.531268159022!2d-47.92248263347448!3d-22.00622138395092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b8772c61b4ad21%3A0xbdd43248d1f6dbae!2sEESC-USP%20%7C%20Escola%20de%20Engenharia%20de%20S%C3%A3o%20Carlos!5e0!3m2!1spt-BR!2sbr!4v1769019620377!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->