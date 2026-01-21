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
        <input type="radio" name="tipo" value="X" required>
        X
    </label>

    <label>
        <input type="radio" name="tipo" value="Y">
        Y
    </label>
    </div>

    <div>
        <label>Max Participantes</label>
        <input type="number" name="max_participantes" required>
    </div>

    <div>
        <label>Event Data</label>
        <input type="date" name="data" required>
    </div>

    <div>
        <label>Event Tempo</label>
        <input type="time" name="horario" required>
    </div>

    <div>
        <label>Duração</label>
        <input type="number" name="duracao" required>
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
            <th>Max</th>
            <th>Data</th>
            <th>Tempo</th>
            <th>Duração</th>
            <th>Descrição</th>
            <th>Observação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->nome }}</td>
                <td>{{ $evento->tipo }}</td>
                <td>{{ $evento->max_participantes }}</td>
                <td>{{ $evento->evento_data }}</td>
                <td>{{ $evento->evento_tempo }}</td>
                <td>{{ $evento->duracao }}</td>
                <td>{{ $evento->descricao }}</td>
                <td>{{ $evento->observacao ?? '—' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
