{{-- @extends('layouts._includes.admin.body') --}}
{{-- @section('titulo','Cadastrar categoriaTarefa') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Cadastrar Categoria Tarefa</strong>
        </div> --}}
        <form action="{{route('admin.categoriaTarefa.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.categoriaTarefaForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('categoriaTarefa.create.success'))
    <script>
        Swal.fire(
            'Categoria Tarefa cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoriaTarefa.create.error'))
    <script>
        Swal.fire(
            'Erro ao cadastrar Categoria Tarefa!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
