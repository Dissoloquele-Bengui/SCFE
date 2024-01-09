{{-- @extends('layouts._includes.admin.body') --}}
{{-- @section('titulo','Cadastrar categoriaTituloHabitantes') --}}

{{-- @section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Cadastrar Categoria Titulo Habitantes</strong>
        </div> --}}
        <form action="{{route('admin.projecto.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.projecto.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('projecto.create.success'))
    <script>
        Swal.fire(
            'Projecto cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('projecto.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar projecto!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}
