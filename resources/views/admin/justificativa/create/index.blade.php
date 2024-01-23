{{-- @extends('layouts._includes.admin.body') --}}
{{-- @section('titulo','Cadastrar categoriaTituloHabitantes') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Cadastrar Categoria Titulo Habitantes</strong>
        </div> --}}
        <form action="{{route('admin.justificativa.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.justificativa.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('justificativa.create.success'))
    <script>
        Swal.fire(
            'Frequência criada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('justificativa.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar estagiário!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
