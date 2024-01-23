{{-- @extends('layouts._includes.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar usuário</strong>
        </div> --}}
        <form action="{{ route('admin.justificativa.update', ['id' => $justificativa->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.justificativa.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('justificativa.update.success'))
    <script>
        Swal.fire(
            'Dados Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('justificativa.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar dados!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
