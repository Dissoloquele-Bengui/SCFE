{{-- @extends('layouts._includes.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar usuário</strong>
        </div> --}}
        <form action="{{ route('admin.usuario.update', ['id' => $user->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.usuario.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('usuario.update.success'))
    <script>
        Swal.fire(
            'dados Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('usuario.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar dados!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
