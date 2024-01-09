{{-- @extends('layouts._includes.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar usuário</strong>
        </div> --}}
        <form action="{{ route('admin.projecto.update', ['id' => $project->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.projecto.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('projecto.update.success'))
    <script>
        Swal.fire(
            'Projecto Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('projecto.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar projecto!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
