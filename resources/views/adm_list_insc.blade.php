@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Lista de Participantes - SEMATRON')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Participantes - SEMATRON</title>
        <link rel="stylesheet" href="{{asset('/reset.css')}}">
        <link rel="stylesheet" href="{{asset('/sematron.css')}}">
        <!--Aqui em baixo importa a fonte. POR QUE CARALHOS INTER???????????? AQUI É GRÊMIO PORRA!!!!!!-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    </head>
<body>

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
    
    <main class="main-container">
        
        <div class="page-header">
            <h1 class="page-title">Inscritos</h1>
            <div class="page-subtitle">Visualização de dados do banco</div>
        </div>

        <div class="table-card">
            <table class="cyber-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($participantes) > 0)
                        @foreach($participantes as $p)
                        <tr>
                            <td>#{{ $p->uid ?? $p->id_usuario }}</td>
                            <td>{{ $p->name ?? $p->nome_usuario ?? $p->nome }}</td> 
                            <td>{{ $p->email ?? $p->email_usuario }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="empty-state">
                                Nenhum registro encontrado no banco de dados.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <a href="/" class="btn-back">VOLTAR PARA HOME</a>

    </main>
    
@endsection                                 <!--AQUI ACABA O CONTEÚDO ESPECÍFICO DA PÁGINA-->

    
    
