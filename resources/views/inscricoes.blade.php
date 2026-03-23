@extends(auth()->check() ? 'layouts.layout-logado' : 'layouts.layout-basico')

@section('title', 'Inscrições')

@section('content')
    @livewire('insc-form') 
@endsection