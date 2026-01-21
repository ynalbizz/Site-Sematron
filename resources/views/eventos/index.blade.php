<!DOCTYPE html>
<html>
<head>
    <title>Criação de Evento</title>
</head>
<body>

<h1>Adicionar Evento</h1>

<form method="POST" action="/eventos">
    @csrf

    <div>
        <label>Nome</label>
        <input type="text" name="nome" required>
    </div>

    <div>
    <label>Tipo</label><br>
    <label>
        <input type="radio" name="tipo" value="minicurso" required>
        Minicurso
    </label>

    <label>
        <input type="radio" name="tipo" value="visita">
        Visita
    </label>

    <label>
        <input type="radio" name="tipo" value="palestra">
        Palestra
    </label>
    </div>

    <div>
        <label>Max vagas</label>
        <input type="number" name="max_vagas" required>
    </div>

    <div>
        <label>Data</label>
        <input type="date" name="data" required>
    </div>

    <div>
        <label>Horário que inicia</label>
        <input type="time" name="horario_inicio" required>
    </div>

    <div>
        <label>horario que termina</label>
        <input type="number" name="horario_fim" required>
    </div>

    <div>
        <label>Descrição</label>
        <textarea name="descricao" required></textarea>
    </div>

    <div>
        <label>Observação</label>
        <textarea name="observacao"></textarea>
    </div>

    <button type="submit">Add Evento</button>
</form>

<hr>

<h2>Eventos Salvos</h2>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Max vagas</th>
            <th>Data</th>
            <th>Horário que inicia</th>
            <th>Horário que termina</th>
            <th>Descrição</th>
            <th>Observação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->nome }}</td>
                <td>{{ $evento->tipo }}</td>
                <td>{{ $evento->max_vagas }}</td>
                <td>{{ $evento->data }}</td>
                <td>{{ $evento->horario_inicio }}</td>
                <td>{{ $evento->horario_fim }}</td>
                <td>{{ $evento->descricao }}</td>
                <td>{{ $evento->observacao ?? '—' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
