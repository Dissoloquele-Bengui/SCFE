@extends('layouts._includes.admin.body')
@section('titulo', 'Justificar Atraso')

@section('conteudo')
<div class="container">
    <h1>Justificar Atraso - ID: {{ $atraso->id }}</h1>

    <p>Nome do Usuário: {{ optional($atraso->usuario)->nome }}</p>

    <p>Tempo de Atraso:
        {{ optional($atraso->tempo_atraso)['dias'] ?? 'N/A' }} dias,
        {{ optional($atraso->tempo_atraso)['horas'] ?? 'N/A' }} horas,
        {{ optional($atraso->tempo_atraso)['semanas'] ?? 'N/A' }} semanas
    </p>

</div>
@endsection