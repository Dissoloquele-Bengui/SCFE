@extends('layouts._includes.admin.body')
@section('titulo','Listar Serviço Licenciado')

@section('conteudo')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <!-- Small table -->
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
                                            {{-- @can('user-create') --}}
                                            <a href="#" class="btn botao" data-toggle="modal" data-target="#ModalCreate" style="color:white">
                                                <span style="color:white"></span> {{ __('Adicionar') }}
                                            </a>
                                            {{-- @endcan --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- table -->
                            <table class="table table-borderless table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="90%">Serviço Licenciado</th>
                                        <th width="5%">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servico_licenciados as $key => $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{{$item->vc_servico}}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$item->id}}">{{ __('Editar') }}</a>
                                                    {{-- <a class="dropdown-item" href="{{route('admin.operador.edit',['id'=>$operador->id])}}">Editar</a> --}}
                                                    <a class="dropdown-item" href="{{route('admin.servico_licenciado.destroy',['id'=>$item->id])}}">Remover</a>
                                                    <a class="dropdown-item" href="{{route('admin.servico_licenciado.purge',['id'=>$item->id])}}">Purgar</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    {{-- ModalUpdate --}}
                                    <div class="modal fade text-left" id="ModalEdit{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{ __('Editar Email') }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.servico_licenciado.update',$item->id)}}" method="post">
                                                        @csrf
                                                        @include('_form.servicoForm.index')
                                                        <button type="submit" class="btn btn-primary w-md">Editar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ModalUpdate --}}
                                    @endforeach
                                    @if(isset($item))
                                    @php
                                    $item->vc_servico = null;
                                    @endphp
                                    @endif
                                </tbody>
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
                </div> <!-- customized table -->
            </div> <!-- end section -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->



{{-- ModalCreateTelefone --}}

<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Adicionar Serviço') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.servico_licenciado.store')}}" method="post">
                    @csrf
                    @include('_form.servicoForm.index')
                    <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
{{-- ModalCreate --}}

@endsection
