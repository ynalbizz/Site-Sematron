@extends('layouts.layout-basico')           <!--IMPORTANDO LAYOUT DA PASTA LAYOUT-->

@section('title', 'Lista de Participantes - SEMATRON')        <!--AQUI TU BOTA O NEGOCIO QUE APARECE NA ABA LÁ EM CIMA-->

@section('content')                         <!--AQUI COMEÇA O CONTEÚDO ESPECÍFICO DA PÁGINA-->

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

    
    
