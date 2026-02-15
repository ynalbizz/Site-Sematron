@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')

@section('title', 'Gestão de Eventos')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('cssDaSematron/eventos.css') }}">

<section class="pagina-eventos">

    <h1 class="titulo-pagina text-center">
        <i class="fas fa-calendar-alt me-2"></i>
        Gestão de Eventos
    </h1>

    <!-- ============================================= -->
    <!-- FORMULÁRIO PARA CRIAR NOVO EVENTO            -->
    <!-- ============================================= -->
    <div class="card card-formulario mb-5">
        <div class="card-header">
            <h4>
                <i class="fas fa-plus-circle me-2"></i>
                Adicionar Novo Evento
            </h4>
        </div>
        <div class="card-body">

            <form method="POST" action="/eventos" enctype="multipart/form-data">
                @csrf <!-- Proteção contra ataques CSRF -->

                <div class="row">
                    <!-- ========== NOME DO EVENTO ========== -->
                    <!-- mb-5 cria um espaçamento grande entre este campo e o próximo -->
                    <div class="col-12 mb-5">
                        <label class="form-label">
                            <i class="fas fa-tag me-1"></i>
                            Nome do Evento
                        </label>
                        <input type="text" name="nome" class="form-control" 
                               placeholder="Ex: Introdução à Programação" required>
                    </div>

                    <!-- ========== TIPO DE EVENTO ========== -->
                    <!-- mb-5 cria espaço entre este campo e o próximo -->
                    <div class="col-12 mb-5">
                        <label class="form-label">
                            <i class="fas fa-calendar-alt me-1"></i>
                            Tipo de Evento
                        </label>
                        <div class="d-flex flex-wrap gap-3 mt-2">
                            <!-- Radio buttons para escolher o tipo -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" 
                                       value="minicurso" id="minicurso" required>
                                <label class="form-check-label" for="minicurso">
                                    <span class="badge-tipo minicurso" style="position: static; display: inline-block; background: #fb9a03; color: #000000;">
                                        <i class="fas fa-laptop-code me-1"></i> Minicurso
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" 
                                       value="visita" id="visita">
                                <label class="form-check-label" for="visita">
                                    <span class="badge-tipo visita" style="position: static; display: inline-block; background: #fb9a03; color: #000000;">
                                        <i class="fas fa-building me-1"></i> Visita
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" 
                                       value="palestra" id="palestra">
                                <label class="form-check-label" for="palestra">
                                    <span class="badge-tipo palestra" style="position: static; display: inline-block; background: #fb9a03; color: #000000;">
                                        <i class="fas fa-microphone-alt me-1"></i> Palestra
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" style="height: 25px;"></div>

                    <!-- NÚMERO MÁXIMO DE VAGAS -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label">
                            <i class="fas fa-users me-1"></i>
                            Número Máximo de Vagas
                        </label>
                        <input type="number" name="max_vagas" class="form-control" 
                               min="1" placeholder="Ex: 50" required>
                    </div>

                    <!-- DATA -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label">
                            <i class="fas fa-calendar-day me-1"></i>
                            Data
                        </label>
                        <input type="date" name="data" class="form-control" required>
                    </div>

                    <!-- HORÁRIO INÍCIO -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label">
                            <i class="fas fa-clock me-1"></i>
                            Horário de Início
                        </label>
                        <input type="time" name="horario_inicio" class="form-control" required>
                    </div>

                    <!-- HORÁRIO TÉRMINO -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label">
                            <i class="fas fa-clock me-1"></i>
                            Horário de Término
                        </label>
                        <input type="time" name="horario_fim" class="form-control" required>
                    </div>

                    <!-- ========== DESCRIÇÃO ========== -->
                    <!-- Campo ocupa largura total (col-12) com altura maior (rows="5") -->
                    <div class="col-12 mb-5">
                        <label class="form-label">
                            <i class="fas fa-align-left me-1"></i>
                            Descrição
                        </label>
                        <textarea name="descricao" class="form-control" rows="5" 
                                placeholder="Descreva o evento, seu conteúdo e objetivos..." required></textarea>
                    </div>

                    <!-- ========== OBSERVAÇÕES ========== -->
                    <!-- Campo ocupa largura total (col-12) com altura média (rows="4") -->
                    <div class="col-12 mb-5">
                        <label class="form-label">
                            <i class="fas fa-clipboard-list me-1"></i>
                            Observações (opcional)
                        </label>
                        <textarea name="observacao" class="form-control" rows="4" 
                                placeholder="Informações adicionais, requisitos, materiais necessários..."></textarea>
                    </div>

                    <!-- ========== IMAGEM ========== -->
                    <div class="col-12 mb-5">
                        <label class="form-label">
                            <i class="fas fa-image me-1"></i>
                            Imagem do Evento (opcional)
                        </label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <small class="text-muted">Formatos aceitos: JPG, PNG, GIF. Tamanho máximo: 2MB</small>
                    </div>

                    <!-- ========== BOTÃO DE ENVIO ========== -->
                    <!-- mt-4 cria espaço extra acima do botão -->
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-sematron w-100">
                            <i class="fas fa-plus-circle me-2"></i>
                            Criar Evento
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- ============================================= -->
    <!-- LISTAGEM DE EVENTOS CADASTRADOS               -->
    <!-- ============================================= -->
    <h3 class="section-title text-center mb-4">
        <i class="fas fa-calendar-check me-2"></i>
        Eventos Cadastrados
    </h3>

    @if($eventos->count() > 0)

        <!-- Grid com 2 cards por linha (configurado no CSS) -->
        <div class="eventos-grid">
            @foreach($eventos as $evento)

                <!-- ========== CARD DE CADA EVENTO ========== -->
                <div class="card-evento">

                    <!-- Imagem do evento (ou ícone padrão) -->
                    @if($evento->foto)
                        <div class="event-image-container">
                            <img src="{{ asset('storage/' . $evento->foto) }}"
                                 class="event-image"
                                 alt="{{ $evento->nome }}">
                            <div class="event-overlay"></div>
                        </div>
                    @else
                        <div class="event-image-container" style="background: linear-gradient(135deg, #333333, #111111);">
                            <div class="event-image d-flex align-items-center justify-content-center" style="color: #fb9a03;">
                                <i class="fas fa-calendar-alt fa-4x"></i>
                            </div>
                            <div class="event-overlay"></div>
                        </div>
                    @endif

                    <!-- Badge com o tipo do evento -->
                    <span class="badge-tipo {{ $evento->tipo }}">
                        @if($evento->tipo == 'minicurso')
                            <i class="fas fa-laptop-code me-1"></i>
                        @elseif($evento->tipo == 'visita')
                            <i class="fas fa-building me-1"></i>
                        @else
                            <i class="fas fa-microphone-alt me-1"></i>
                        @endif
                        {{ ucfirst($evento->tipo) }}
                    </span>

                    <div class="card-body">

                        <h5 class="event-title">{{ $evento->nome }}</h5>

                        <!-- Metadados do evento (data, horário, vagas) -->
                        <div class="event-meta">
                            <span class="event-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                {{ date('d/m/Y', strtotime($evento->data)) }}
                            </span>
                            <span class="event-meta-item">
                                <i class="fas fa-clock"></i>
                                {{ substr($evento->horario_inicio, 0, 5) }} - {{ substr($evento->horario_fim, 0, 5) }}
                            </span>
                            <span class="event-meta-item">
                                <i class="fas fa-users"></i>
                                {{ $evento->max_vagas }} vagas
                            </span>
                        </div>

                        <p class="event-description">{{ $evento->descricao }}</p>

                        <!-- Observações (se existirem) -->
                        @if($evento->observacao)
                            <div class="alert alert-info py-2 px-3 mb-3" style="font-size: 0.9rem; background-color: #222222; border-color: #fb9a03; color: #cccccc;">
                                <i class="fas fa-info-circle me-1" style="color: #fb9a03;"></i>
                                {{ $evento->observacao }}
                            </div>
                        @endif

                        <!-- Botões de ação (Editar e Excluir) -->
                        <div class="event-actions">
                            <a href="{{ route('eventos.edit', $evento->id) }}" 
                               class="btn-action btn-edit">
                                <i class="fas fa-edit me-1"></i>
                                Editar
                            </a>
                            <form method="POST" 
                                  action="{{ route('eventos.destroy', $evento->id) }}" 
                                  style="flex: 1;"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este evento? Esta ação não pode ser desfeita.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete w-100">
                                    <i class="fas fa-trash-alt me-1"></i>
                                    Excluir
                                </button>
                            </form>
                        </div>

                    </div>

                </div>

            @endforeach
        </div>

        <!-- Paginação -->
        <div class="d-flex justify-content-center mt-5">
            {{ $eventos->links() }}
        </div>

    @else
        <!-- Mensagem quando não há eventos -->
        <div class="alert-modern">
            <i class="fas fa-calendar-times"></i>
            <h4 class="mt-3">Nenhum evento cadastrado</h4>
            <p class="mb-0">Comece criando seu primeiro evento utilizando o formulário acima!</p>
        </div>
    @endif

</section>

@endsection