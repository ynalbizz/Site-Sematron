@extends('layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Cadastro')               <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->
    <section class="bagulho-principal">
            <div class="Parte-da-Esquerda">
                <h1 class="Cadastro-grande">CADASTRO</h1>
                <h1 class="Sub-Cadastro">Faça o cadastro para SEMATRON XXII</h1>
            </div>



<<<<<<< HEAD
            <form action="{{ route('cadastro.salvar') }}" method="POST" class="duas-colunas-cadastro">
=======
            <form action={{ route('cadastro.store') }} method="POST" class="duas-colunas-cadastro">
>>>>>>> 0fec458ca82e1e85903b69d7ef248ac850a57f8a
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
                            <input type="password" name="senha" id="senha" required>
                            <i class="fas fa-eye" id="olhinho"></i>
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
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->