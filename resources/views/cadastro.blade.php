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





        <section class="bagulho-principal">
            <div class="Parte-da-Esquerda">
                <h1 class="Cadastro-grande">CADASTRO</h1>
                <h1 class="Sub-Cadastro">Faça o cadastro para SEMATRON XXII</h1>
            </div>



            <form action={{ route('cadastro.store') }} method="POST" class="duas-colunas-cadastro">
                @csrf
                <div class="borda-cadastro">

                    <h1 class="Champions-do-Forms">Dados de Acesso</h1>

                    <div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" required placeholder="ex: aluno@usp.br">
                        </div>
                        <div class="input-group">
                            <label>Usuário</label>
                            <input type="text" name="usuario" required>
                        </div>
                        <div class="input-group">
                            <label>Senha</label>
                            <input type="password" name="senha" required>
                        </div>
                    </div>

                    <h1 class="Champions-do-Forms" style="margin-top: 30px;">Dados Pessoais</h1>

                    <div>
                        <div class="input-group full-width">
                            <label>Nome Completo</label>
                            <input type="text" name="nome" required>
                        </div>

                        <div class="input-group">
                            <label>CPF</label>
                            <input type="text" name="cpf" placeholder="000.000.000-00" required>
                        </div>
                        <div class="input-group">
                            <label>RG</label>
                            <input type="text" name="rg" required>
                        </div>

                        <div class="input-group">
                            <label>Data de Nascimento</label>
                            <input type="date" name="nascimento" required style="color-scheme: dark;"> 
                        </div>
                        <div class="input-group">
                            <label>Telefone / WhatsApp</label>
                            <input type="tel" name="telefone" placeholder="(00) 00000-0000" required>
                        </div>
                    </div>
                </div>



                <div class="borda-cadastro">

                    <h1 class="Champions-do-Forms">Endereço</h1>

                    <div>
                        <div class="input-group">
                            <label>CEP</label>
                            <input type="text" name="cep" required>
                        </div>
                        <div class="input-group">
                            <label>Cidade</label>
                                <input type="text" name="cidade" required>
                            </div>
                            <div class="input-group">
                                <label>Endereço Completo</label>
                                <input type="text" name="endereco" placeholder="Rua, Número, Bairro" required>
                            </div>
                        </div>

                        <h1 class="Champions-do-Forms" style="margin-top: 30px;">Escolaridade</h1>
                        <div class="form-grid">
                            <div class="input-group">
                                <label>Grau de Escolaridade</label>
                                <select name="escolaridade" required>
                                    <option value="" disabled selected>Selecione...</option>
                                    <option value="medio">Ensino Médio</option>
                                    <option value="tecnico">Ensino Técnico</option>
                                    <option value="graduacao">Graduação (Superior)</option>
                                    <option value="pos">Pós-Graduação</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Nº USP / Matrícula</label>
                                <input type="text" name="num_usp" placeholder="Se outra inst., use a matrícula">
                            </div>

                            <div class="input-group">
                                <label>Instituição de Ensino</label>
                                <input type="text" name="instituicao" placeholder="Ex: EESC - USP" required>
                            </div>

                            <div class="input-group">
                                <label>Curso</label>
                                <input type="text" name="curso" placeholder="Ex: Eng. Mecatrônica, Técnico em Eletrotécnica..." required>
                            </div>
                        </div>

                    <button type="submit" class="submit-btn">FINALIZAR CADASTRO</button>
                </div>
            </form>
        </section>


        <!--É literal só a listra laranja-->
        <div class="listra-laranja espacamento-rodape-Cadastro"></div>

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