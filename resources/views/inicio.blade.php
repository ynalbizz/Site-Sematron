<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
        <link rel="stylesheet" href="{{asset('/sematron.css')}}">
        <link rel="stylesheet" href="{{asset('/reset.css')}}">
        <!--Aqui em baixo importa a fonte. POR QUE CARALHOS INTER???????????? AQUI É GRÊMIO PORRA!!!!!!-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    </head>

    <body class="Corpo">
        <header>
            <!--É literal só a listra laranja-->
            <div class="listra-laranja"></div>

            <!--Aqui estão os links, na versão desktop-->

            <div class="Parte-De-Cima">

                <div class="Centraliza"><img class="Logo-Inicio" src="{{asset('/Imagens/logo-Photoroom.png')}}" alt="Logo da Sematron"></div>
                <div class="Centraliza"><h1 class="Sematron-Inicio">SEMATRON XXII</h1></div>
                
                <div class="Links">
                    <a class="Link-Do-Topo" href="/inicio">Página Inicial</a>
                    <a class="Link-Do-Topo" href="/inscricoes">Inscrições</a>
                    <a class="Link-Do-Topo" href="/minicursos">Minicursos</a>
                    <a class="Link-Do-Topo" href="/visitas">Visitas</a>
                    <a class="Link-Do-Topo" href="/login">Login</a>
                    <a class="Link-Do-Topo" href="/cadastro/create">Cadastro</a>
                    <a class="Link-Do-Topo" href="/maisSematron">Mais Sematron</a>
                    <a class="Link-Do-Topo Direita" href="/contato">Contato</a>
                </div>
            </div>
        </header>





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
                    <a class="Inscrições-Bloco" href="">Inscrições</a>
                </div>
                <a class="Ver-Atividade-Bloco" href="">Ver Atividades</a>
            </div>

        </section>





        <section class="Palavra-Atividades_Traco-Laranja">
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





        <!--É literal só a listra laranja-->
        <div class="listra-laranja espacamento-rodape"></div>





        <footer class="Rodape">

            <h1 class="Creditos-Rodape">Créditos</h1>
            <h1 class="Copyright-Rodape">Copyright © 2014–2025 Grupo SEMATRON. Todos os direitos reservados.</h1>
            <h1 class="Av-Trabalhador">Av. Trabalhador São-Carlense, 400 • EESC/USP • São Carlos — SP</h1>
            <h1 class="Telefone">Tel: +55 (61) 98172-5281 • Email: sematron@eesc.usp.br</h1>

            <div class="Redes-Sociais-Rodape">
                <a class="Borda-Rodape" href="https://www.instagram.com/sematronusp/">Instagram</a>
                <a class="Borda-Rodape" href="https://www.youtube.com/@sematronusp">YouTube</a>
                <a class="Borda-Rodape" href="/inicio">Site</a>
                <!--Por favor não apague esse EasterEgg foi feito com muito carinho por mim ;)-->
                <a class="Borda-Rodape-Gigante" href="https://www.ubirata.pr.gov.br/">Ubiratã</a>
            </div>
        </footer>

    </body>

</html>