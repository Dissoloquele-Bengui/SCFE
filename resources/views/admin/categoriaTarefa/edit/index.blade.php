{{-- @extends('layouts._includes.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar Categoria Tarefa</strong>
        </div> --}}
        <form action="{{ route('admin.categoriaTarefa.update', ['id' => $categoriaTarefa->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.categoriaTarefaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('categoriaTarefa.update.success'))
    <script>
        Swal.fire(
            'Categoria Tarefa actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoriaTarefa.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Categoria Tarefa!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
