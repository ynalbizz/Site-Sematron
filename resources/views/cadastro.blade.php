<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
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
                    <a class="Link-Do-Topo" href="/cadastro">Cadastro</a>
                    <a class="Link-Do-Topo" href="/maisSematron">Mais Sematron</a>
                    <a class="Link-Do-Topo" href="/contato">Contato</a>
                </div>
            </div>
        </header>
        

        <main class="main-container">
        
        <section class="intro-section">
            <div class="intro-title">Cadastro</div>
            <div class="intro-subtitle">Faça o cadastro para SEMATRON XXII</div>
            <img class="logo-central" src="{{asset('/Imagens/logo-Photoroom.png')}}" alt="Logo da Sematron">
        </section>

        <section class="form-card">
            <div class="form-header">Dados Pessoais</div>
            
            <form action="#" method="POST">
                <div class="input-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="input-group">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <button type="submit" class="submit-btn">ENVIAR</button>
            </form>
        </section>

    </main>





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
                <a class="Borda-Rodape" href="{{asset('/htmlDaSematron/inicio.blade.php')}}">Site</a>
                <!--Por favor não apague esse EasterEgg foi feito com muito carinho por mim ;)-->
                <a class="Borda-Rodape-Gigante" href="https://www.ubirata.pr.gov.br/">Ubiratã</a>
            </div>
        </footer>
        
    </body>

</html>