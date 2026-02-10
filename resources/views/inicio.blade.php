@extends('layouts.layout-logado')

@section('title', 'Página Inicial')

@section('content')
    <section class="container-centro">
        <!--Versão para Desktop-->
            <!--Parte da Esquerda-->
            <div class="tamanhos tres-linhas">
                <div class="informacoes topo">
                    <h1 class="Numero-centro">X+</h1>
                    <h1 class="Texto-centro">Palestras</h1>
                </div>
                <div class="informacoes">
                    <h1 class="Numero-centro">X+</h1>
                    <h1 class="Texto-centro">Minicursos</h1>
                </div>
                <div class="informacoes baixo">
                    <h1 class="Numero-centro">X+</h1>
                    <h1 class="Texto-centro">Visitas</h1>
                </div>
            </div>



            <!--Parte do Meio-->
            <div class="tamanhos texto-foto-texto">
                <div>
                    <h1 class="Texto-EmCima-Logo">SEMATRON XXII</h1>
                </div>
                <div>
                    <img class="logo-central" src="{{asset('/Imagens/logo-Photoroom.png')}}" alt="Logo da Sematron">
                </div>
                <div>
                    <h1 class="Texto-EmBaixo-Logo">Há mais de 20 anos reunindo estudantes</h1>
                    <h1 class="Texto-EmBaixo-Logo">de engenharia para o intercâmbio de</h1>
                    <h1 class="Texto-EmBaixo-Logo">conhecimento</h1>

                </div>
            </div>



            <!--Parte da Direita-->
            <div class="tamanhos duas-linhas">
                <div class="top">
                    <a class="Inscrições-Bloco" href="/inscricao">Inscrições</a>
                </div>
                <a class="Ver-Atividade-Bloco" href="#activity">Ver Atividades</a>
            </div>

        </section>





        <section class="Palavra-Atividades_Traco-Laranja" id="activity">
            <h1 class="Palavra-Atividades">Atividades</h1>
            <div class="traco-laranja"></div>
        </section>





        <section class="Atividades">
            <!--Cada uma das div com class: "Colunas" é uma das colunas-->
            <div class="Colunas">
                <div class="Borda-Atividades Esquerdinha">

                    <div class="Circulo-atividades">
                        <img class="Mini-Logo-Preto-Atividades" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                    </div>

                    <div class="Titulo-Libertadores">
                        Minicursos
                    </div>

                    <div class="Resumo">
                        Aulas Práticas e trilhas técnicas.
                    </div>

                    <a class="Saiba-Mais-Botao" href="">Saiba mais</a>
                    
                </div>
            </div>



            <div class="Colunas">
                <div class="Borda-Atividades">

                    <div class="Circulo-atividades">
                        <img class="Mini-Logo-Preto-Atividades" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                    </div>

                    <div class="Titulo-Libertadores">
                        Visitas
                    </div>

                    <div class="Resumo">
                        Visitas técnicas em empresas.
                    </div>

                    <a class="Saiba-Mais-Botao" href="">Saiba mais</a>
                    
                </div>
            </div>



            <div class="Colunas">
                <div class="Borda-Atividades">

                    <div class="Circulo-atividades">
                        <img class="Mini-Logo-Preto-Atividades" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                    </div>

                    <div class="Titulo-Libertadores">
                        Palestras
                    </div>

                    <div class="Resumo">
                        Convidados e temas atuais.    
                    </div>

                    <a class="Saiba-Mais-Botao" href="">Saiba mais</a>
                    
                </div>
            </div>



            <div class="Colunas">
                <div class="Borda-Atividades">

                    <div class="Circulo-atividades">
                        <img class="Mini-Logo-Preto-Atividades" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                    </div>

                    <div class="Titulo-Libertadores">
                        Equipe
                    </div>

                    <div class="Resumo">
                        Conheça quem organiza o evento.
                    </div>

                    <a class="Saiba-Mais-Botao" href="">Saiba mais</a>
                    
                </div>
            </div>
        </section>





        <section class="Palavra-Atividades_Traco-Laranja Palavra-Programacao">
            <h1 class="Palavra-Atividades">Programação</h1>
            <div class="traco-laranja"></div>
        </section>





        <section class="Programacao">
            <!--Cada uma dessas div com class: "Borda-Programacao" é a borda de um 1 dia-->
            <div class="Borda-Programacao">

                <div class="Circulo-programacao">
                        <img class="Mini-Logo-Preto-Programacao" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                </div>

                <h1 class="Dia-Programacao">Dia 1 • Credenciamento + Abertura</h1>

                <a class="Borda-Detalhes-Programacao" href="">Detalhes</a>

            </div>



            <div class="Borda-Programacao">

                <div class="Circulo-programacao">
                        <img class="Mini-Logo-Preto-Programacao" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                </div>

                <h1 class="Dia-Programacao">Dia 2 • Palestras +  Minicursos</h1>

                <a class="Borda-Detalhes-Programacao" href="">Detalhes</a>

            </div>



            <div class="Borda-Programacao">

                <div class="Circulo-programacao">
                        <img class="Mini-Logo-Preto-Programacao" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                </div>

                <h1 class="Dia-Programacao">Dia 3 • Visitas técnicas </h1>

                <a class="Borda-Detalhes-Programacao" href="">Detalhes</a>

            </div>



            <div class="Borda-Programacao">

                <div class="Circulo-programacao">
                        <img class="Mini-Logo-Preto-Programacao" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                </div>

                <h1 class="Dia-Programacao">Dia 4 • xxxxx </h1>

                <a class="Borda-Detalhes-Programacao" href="">Detalhes</a>

            </div>



            <div class="Borda-Programacao">

                <div class="Circulo-programacao">
                        <img class="Mini-Logo-Preto-Programacao" src="{{asset('/Imagens/LogoPreta.png')}}" alt="Logo da Sematron">
                </div>

                <h1 class="Dia-Programacao">Dia 5 • Encerramento</h1>

                <a class="Borda-Detalhes-Programacao" href="">Detalhes</a>

            </div>
        </section>
@endsection