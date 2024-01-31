{{-- @extends('layouts._includes.admin.body') --}}
{{-- @section('titulo','Cadastrar categoriaTituloHabitantes') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Cadastrar Categoria Titulo Habitantes</strong>
        </div> --}}
        <form action="{{route('admin.tarefa.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.tarefaForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('tarefa.create.success'))
    <script>
        Swal.fire(
            'tarefa cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('tarefa.create.error'))
    <script>
        Swal.fire(
            'Erro ao cadastrar tarefa!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
