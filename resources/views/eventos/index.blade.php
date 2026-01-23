<!DOCTYPE html>
<html>
<head>
    <title>Criação de Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
        body { padding: 20px; }
        .evento-tipo {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .minicurso { background-color: #d1ecf1; color: #0c5460; }
        .visita { background-color: #d4edda; color: #155724; }
        .palestra { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">Adicionar Evento</h1>

    <form method="POST" action="/eventos" class="mb-5">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nome do Evento</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tipo de Evento</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" value="minicurso" id="minicurso" required>
                    <label class="form-check-label" for="minicurso">Minicurso</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" value="visita" id="visita">
                    <label class="form-check-label" for="visita">Visita</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" value="palestra" id="palestra">
                    <label class="form-check-label" for="palestra">Palestra</label>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Máximo de Vagas</label>
                <input type="number" name="max_vagas" class="form-control" min="1" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Data do Evento</label>
                <input type="date" name="data" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Horário de Início</label>
                <input type="time" name="horario_inicio" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Horário de Término</label>
                <input type="time" name="horario_fim" class="form-control" required>
            </div>

            <div class="col-12">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3" required></textarea>
            </div>

            <div class="col-12">
                <label class="form-label">Observação (Opcional)</label>
                <textarea name="observacao" class="form-control" rows="2"></textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Adicionar Evento</button>
            </div>
        </div>
    </form>

    <hr class="my-5">

    <h2 class="mb-4">Eventos Salvos</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Show pagination info -->
    <div class="alert alert-info">
        Mostrando <strong>{{ $eventos->firstItem() ?: 0 }}</strong> a 
        <strong>{{ $eventos->lastItem() ?: 0 }}</strong> de 
        <strong>{{ $eventos->total() }}</strong> eventos
        @if(request()->has('page'))
            (Página {{ $eventos->currentPage() }})
        @endif
    </div>

    @if($eventos->count() > 0)
        <div class="row">
            @foreach($eventos as $evento)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <span class="evento-tipo {{ $evento->tipo }}">
                                {{ ucfirst($evento->tipo) }}
                            </span>
                            
                            <h5 class="card-title">{{ $evento->nome }}</h5>
                            
                            <p class="card-text">
                                <strong>📅 Data:</strong> {{ date('d/m/Y', strtotime($evento->data)) }}<br>
                                <strong>⏰ Horário:</strong> {{ $evento->horario_inicio }} - {{ $evento->horario_fim }}<br>
                                <strong>👥 Vagas:</strong> {{ $evento->max_vagas }}
                            </p>
                            
                            <p class="card-text">
                                <strong>Descrição:</strong><br>
                                {{ $evento->descricao }}
                            </p>
                            
                            @if($evento->observacao)
                                <p class="card-text text-muted">
                                    <strong>Observação:</strong><br>
                                    {{ $evento->observacao }}
                                </p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                Criado em: {{ $evento->created_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- BOOTSTRAP PAGINATION -->
@if($eventos->hasPages())
<div class="d-flex justify-content-center mt-4">
    <nav>
        <ul class="pagination">
            {{-- Página anterior --}}
            @if($eventos->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&laquo; Anterior</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $eventos->previousPageUrl() }}">&laquo; Anterior</a>
                </li>
            @endif

            {{-- Número de páginas --}}
            @for($i = 1; $i <= $eventos->lastPage(); $i++)
                @if($i == $eventos->currentPage())
                    <li class="page-item active">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $eventos->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Próxima pagina --}}
            @if($eventos->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $eventos->nextPageUrl() }}">Próxima &raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Próxima &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>
@endif
        
    @else
        <div class="alert alert-warning">
            Nenhum evento cadastrado ainda. Adicione seu primeiro evento acima!
        </div>
    @endif
</div>

</body>
</html>