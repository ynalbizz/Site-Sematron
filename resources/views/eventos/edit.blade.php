@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')

@section('title', 'Editar Evento')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('cssDaSematron/eventos.css') }}">

<section class="pagina-eventos">

    <h1 class="titulo-pagina text-center">
        <i class="fas fa-edit me-2"></i>
        Editar Evento
    </h1>

    <!-- Mensagens de sucesso/erro -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #111111; border: 2px solid #fb9a03; color: #fb9a03; font-family: 'BankGothic Md BT', sans-serif; padding: 15px; border-radius: 10px; margin-bottom: 30px;">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="filter: invert(1);"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" style="background-color: #111111; border: 2px solid #ef4444; color: #ef4444; font-family: 'BankGothic Md BT', sans-serif; padding: 15px; border-radius: 10px; margin-bottom: 30px;">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ============================================= -->
    <!-- FORMULÁRIO PARA EDITAR EVENTO                 -->
    <!-- ============================================= -->
    <div class="card card-formulario mb-5">
        <div class="card-header" style="background: linear-gradient(135deg, #fb9a03, #fdae33);">
            <h4 style="font-family: 'BankGothic Md BT', sans-serif; color: #000000; font-size: 1.5rem;">
                <i class="fas fa-pen me-2"></i>
                Editando: {{ $evento->nome }}
            </h4>
        </div>
        <div class="card-body" style="padding: 40px;">

            <form method="POST" action="{{ route('eventos.update', $evento->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- ========== NOME DO EVENTO ========== -->
                    <div class="col-12 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-tag me-2"></i>
                            Nome do Evento
                        </label>
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" 
                               value="{{ old('nome', $evento->nome) }}" required
                               style="font-family: 'BankGothic Md BT', sans-serif; padding: 12px 15px;">
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ========== TIPO DE EVENTO ========== -->
                    <div class="col-12 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Tipo de Evento
                        </label>
                        <div class="d-flex flex-wrap gap-3 mt-2">  <!-- gap-3 em vez de gap-4 -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" 
                                    value="minicurso" id="minicurso" 
                                    {{ old('tipo', $evento->tipo) == 'minicurso' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="minicurso">
                                    <span class="badge-tipo static" style="background: #fb9a03; color: #000000; padding: 6px 15px; font-size: 0.8rem; font-family: 'BankGothic Md BT', sans-serif; border-radius: 20px; display: inline-block;">
                                        <i class="fas fa-laptop-code me-1"></i> Minicurso
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" 
                                    value="visita" id="visita"
                                    {{ old('tipo', $evento->tipo) == 'visita' ? 'checked' : '' }}>
                                <label class="form-check-label" for="visita">
                                    <span class="badge-tipo static" style="background: #fb9a03; color: #000000; padding: 6px 15px; font-size: 0.8rem; font-family: 'BankGothic Md BT', sans-serif; border-radius: 20px; display: inline-block;">
                                        <i class="fas fa-building me-1"></i> Visita
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" 
                                    value="palestra" id="palestra"
                                    {{ old('tipo', $evento->tipo) == 'palestra' ? 'checked' : '' }}>
                                <label class="form-check-label" for="palestra">
                                    <span class="badge-tipo static" style="background: #fb9a03; color: #000000; padding: 6px 15px; font-size: 0.8rem; font-family: 'BankGothic Md BT', sans-serif; border-radius: 20px; display: inline-block;">
                                        <i class="fas fa-microphone-alt me-1"></i> Palestra
                                    </span>
                                </label>
                            </div>
                        </div>
                        @error('tipo')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ESPAÇO EXTRA ENTRE TIPO E PRÓXIMO CAMPO -->
                    <div class="col-12" style="height: 25px;"></div>

                    <!-- ========== NÚMERO MÁXIMO DE VAGAS ========== -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-users me-2"></i>
                            Número Máximo de Vagas
                        </label>
                        <input type="number" name="max_vagas" class="form-control @error('max_vagas') is-invalid @enderror" 
                               min="1" value="{{ old('max_vagas', $evento->max_vagas) }}" required
                               style="font-family: 'BankGothic Md BT', sans-serif; padding: 12px 15px;">
                        @error('max_vagas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ========== DATA ========== -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-calendar-day me-2"></i>
                            Data
                        </label>
                        <input type="date" name="data" class="form-control @error('data') is-invalid @enderror" 
                               value="{{ old('data', $evento->data ? $evento->data->format('Y-m-d') : '') }}" required
                               style="font-family: 'BankGothic Md BT', sans-serif; padding: 12px 15px;">
                        @error('data')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ========== HORÁRIO INÍCIO ========== -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-clock me-2"></i>
                            Horário de Início
                        </label>
                        <input type="time" name="horario_inicio" class="form-control @error('horario_inicio') is-invalid @enderror" 
                               value="{{ old('horario_inicio', $evento->horario_inicio) }}" required
                               style="font-family: 'BankGothic Md BT', sans-serif; padding: 12px 15px;">
                        @error('horario_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ========== HORÁRIO TÉRMINO ========== -->
                    <div class="col-md-6 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-clock me-2"></i>
                            Horário de Término
                        </label>
                        <input type="time" name="horario_fim" class="form-control @error('horario_fim') is-invalid @enderror" 
                               value="{{ old('horario_fim', $evento->horario_fim) }}" required
                               style="font-family: 'BankGothic Md BT', sans-serif; padding: 12px 15px;">
                        @error('horario_fim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ========== DESCRIÇÃO ========== -->
                    <div class="col-12 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-align-left me-2"></i>
                            Descrição
                        </label>
                        <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" 
                                  rows="6" required placeholder="Descreva o evento, seu conteúdo e objetivos..."
                                  style="font-family: 'BankGothic Md BT', sans-serif; padding: 15px; min-height: 150px;">{{ old('descricao', $evento->descricao) }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ========== OBSERVAÇÕES ========== -->
                    <div class="col-12 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-clipboard-list me-2"></i>
                            Observações (opcional)
                        </label>
                        <textarea name="observacao" class="form-control" 
                                  rows="5" placeholder="Informações adicionais, requisitos, materiais necessários..."
                                  style="font-family: 'BankGothic Md BT', sans-serif; padding: 15px; min-height: 130px;">{{ old('observacao', $evento->observacao) }}</textarea>
                    </div>

                    <!-- ========== IMAGEM ========== -->
                    <div class="col-12 mb-5">
                        <label class="form-label" style="font-size: 1.1rem; color: #fb9a03; margin-bottom: 12px;">
                            <i class="fas fa-image me-2"></i>
                            Imagem do Evento (opcional)
                        </label>
                        
                        @if($evento->foto)
                            <!-- IMAGEM AMPLIADA E MELHORADA -->
                            <div class="edit-image-container" style="margin-bottom: 30px; text-align: center; background: #1a1a1a; padding: 25px; border-radius: 15px; border: 2px solid #fb9a03;">
                                <p style="color: #fb9a03; font-family: 'BankGothic Md BT', sans-serif; font-size: 1.2rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;">
                                    <i class="fas fa-image me-2"></i>
                                    Imagem Atual
                                </p>
                                <img src="{{ asset('storage/' . $evento->foto) }}" 
                                     alt="Imagem do evento {{ $evento->nome }}" 
                                     style="max-height: 300px; width: auto; max-width: 100%; border-radius: 12px; border: 3px solid #fb9a03; box-shadow: 0 0 20px rgba(251, 154, 3, 0.3); transition: transform 0.3s ease;"
                                     onmouseover="this.style.transform='scale(1.02)'"
                                     onmouseout="this.style.transform='scale(1)'">
                                <p style="color: #999999; font-size: 0.9rem; margin-top: 15px; font-family: 'BankGothic Md BT', sans-serif;">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Faça upload de uma nova imagem se desejar substituir esta
                                </p>
                            </div>
                        @endif
                        
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" 
                               accept="image/*" style="font-family: 'BankGothic Md BT', sans-serif; padding: 12px 15px;">
                        <small style="font-family: 'BankGothic Md BT', sans-serif; color: #999999; font-size: 0.9rem; margin-top: 8px; display: block;">
                            <i class="fas fa-info-circle me-1"></i>
                            Formatos aceitos: JPG, PNG, GIF. Tamanho máximo: 2MB
                        </small>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ========== BOTÕES ========== -->
                    <div class="col-12 mt-5">
                        <div class="d-flex gap-4">
                            <!-- Botão Cancelar -->
                            <a href="{{ route('eventos.index') }}" class="btn btn-sematron w-50" 
                               style="background: transparent; border: 2px solid #fb9a03; color: #fb9a03; font-size: 1.2rem; padding: 15px; font-family: 'BankGothic Md BT', sans-serif;">
                                <i class="fas fa-times me-2"></i>
                                Cancelar
                            </a>
                            <!-- Botão Salvar -->
                            <button type="submit" class="btn btn-sematron w-50" 
                                    style="font-size: 1.2rem; padding: 15px; font-family: 'BankGothic Md BT', sans-serif;">
                                <i class="fas fa-save me-2"></i>
                                Salvar Alterações
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</section>

@endsection