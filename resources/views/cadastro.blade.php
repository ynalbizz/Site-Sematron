@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')          @section('title', 'Cadastro')               @section('content')                         <section class="bagulho-principal">
            <div class="Parte-da-Esquerda">
                <h1 class="Cadastro-grande">CADASTRO</h1>
                <h1 class="Sub-Cadastro">Faça o cadastro para SEMATRON XXII</h1>
            </div>

            <div class="borda-cadastro-celular">
            <form action="{{ route('cadastro.store') }}" method="POST" class="duas-colunas-cadastro">
                @csrf
                <div class="borda-cadastro">

                    <h1 class="Champions-do-Forms">Dados de Acesso</h1>

                    <div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" required placeholder="ex: aluno@usp.br" maxlength="255">
                        </div>
                        <div class="input-group">
                            <label>Usuário</label>
                            <input type="text" name="usuario" required minlength="3" maxlength="50" pattern="^[a-zA-Z0-9_.-]*$" title="Apenas letras, números, pontos, traços ou sublinhados.">
                        </div>
                        <div class="input-group">
                            <label>Senha</label>
                            <input type="password" name="senha" id="senha" required minlength="8" maxlength="255">
                            <i class="fas fa-eye" id="olhinho"></i>
                        </div>
                    </div>

                    <h1 class="Champions-do-Forms" style="margin-top: 30px;">Dados Pessoais</h1>

                    <div>
                        <div class="input-group full-width">
                            <label>Nome Completo</label>
                            <input type="text" name="nome" required minlength="5" maxlength="255" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$" title="O nome deve conter apenas letras.">
                        </div>

                        <div class="input-group">
                            <label>CPF</label>
                            <input type="text" name="cpf" placeholder="000.000.000-00" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" maxlength="14" title="Formato exigido: 000.000.000-00">
                        </div>
                        <div class="input-group">
                            <label>RG</label>
                            <input type="text" name="rg" required minlength="5" maxlength="20">
                        </div>

                        <div class="input-group">
                            <label>Data de Nascimento</label>
                            <input type="date" name="nascimento" required max="{{ date('Y-m-d') }}" style="color-scheme: dark;"> 
                        </div>
                        <div class="input-group">
                            <label>Telefone / WhatsApp</label>
                            <input type="tel" name="telefone" placeholder="(00) 00000-0000" required pattern="\(\d{2}\)\s\d{4,5}-\d{4}" maxlength="15" title="Formato exigido: (00) 00000-0000">
                        </div>
                    </div>
                </div>

                <div class="borda-cadastro">

                    <h1 class="Champions-do-Forms">Endereço</h1>

                    <div>
                        <div class="input-group">
                            <label>CEP</label>
                            <input type="text" name="cep" required pattern="\d{5}-\d{3}" maxlength="9" title="Formato exigido: 00000-000">
                        </div>
                        <div class="input-group">
                            <label>Cidade</label>
                                <input type="text" name="cidade" required minlength="2" maxlength="100">
                            </div>
                            <div class="input-group">
                                <label>Endereço Completo</label>
                                <input type="text" name="endereco" placeholder="Rua, Número, Bairro" required minlength="5" maxlength="255">
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
                                <input type="text" name="num_usp" placeholder="Se outra inst., use a matrícula" maxlength="30">
                            </div>

                            <div class="input-group">
                                <label>Instituição de Ensino</label>
                                <input type="text" name="instituicao" placeholder="Ex: EESC - USP" required maxlength="150">
                            </div>

                            <div class="input-group">
                                <label>Curso</label>
                                <input type="text" name="curso" placeholder="Ex: Eng. Mecatrônica..." required maxlength="150">
                            </div>
                        </div>

                    <button type="submit" class="submit-btn">FINALIZAR CADASTRO</button>
                </div>
            </form>
            </div>
        </section>
@endsection