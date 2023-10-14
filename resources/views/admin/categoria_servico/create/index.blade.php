{{-- @extends('layouts._includes.admin.body') --}}
{{-- @section('titulo','Cadastrar categoriaTituloHabitantes') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Cadastrar Categoria de Serviço</strong>
        </div> --}}
        <form action="{{route('admin.categoria_servico.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.categoriaServicoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('categoria_servico.create.success'))
    <script>
        Swal.fire(
            'Categoria de Serviço Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_servico.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Categoria de Serviço!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
