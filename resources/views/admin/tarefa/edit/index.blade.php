{{-- @extends('layouts._includes.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar Categoria Titulo Habitante</strong>
        </div> --}}
        <form action="{{ route('admin.tarefa.update', ['id' => $tarefa->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.tarefaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('tarefa.update.success'))
    <script>
        Swal.fire(
            'tarefa actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('tarefa.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar tarefa!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
