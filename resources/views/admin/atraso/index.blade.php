@extends('layouts._includes.admin.body')
@section('titulo','Atraso')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12 my-4">

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="toolbar">
                                <form class="form">
                                    <div class="form-row">
                                        <div class="form-group col-auto mr-auto">
                                            <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1">
                                                <option value="">...</option>
                                                <option value="1">12</option>
                                                <option value="2" selected>32</option>
                                                <option value="3">64</option>
                                                <option value="3">128</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Search</label>
                                            <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                                        </div>

                                        <div class="col-auto">

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- table -->
                            <table class="table table-borderless table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOME</th>
                                        <th>Tempo de Atraso</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>

                                @foreach ($atrasos as $atraso)
                                <tr>
                                    <td>{{ $atraso->id }}</td>
                                    <td>{{ $atraso->nome_usuario }}</td>
                                    <td>
                                        {{ $atraso->tempo_atraso['dias'] }} dias,
                                        {{ $atraso->tempo_atraso['horas'] }} horas,
                                        {{ $atraso->tempo_atraso['minutos'] }} minutos
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Opções
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('justificar-atraso', ['id' => $atraso->id]) }}">Justificar Atraso</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                            <nav aria-label="Table Paging" class="mb-0 text-muted">
                                <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection