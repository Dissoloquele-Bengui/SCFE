{{-- @extends('layouts._includes.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar Categoria de Serviço</strong>
        </div> --}}
        <form action="{{ route('admin.categoria_servico.update', ['id' => $categoria_servico->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.categoriaServicoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('categoria_servico.update.success'))
    <script>
        Swal.fire(
            'Categoria de Serviço Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_servico.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Categoria de Servico!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
