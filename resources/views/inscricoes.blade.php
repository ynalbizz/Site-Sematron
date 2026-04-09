@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')

@section('title', 'Inscrições')

@section('content')
    @livewire(config('general.inscricoes_abertas') ? 'insc-form' : 'insc-fechada')
@endsection
