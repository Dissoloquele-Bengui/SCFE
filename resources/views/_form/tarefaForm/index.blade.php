
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_nome">Nome da Tarefa </label>
            <input type="text" id="vc_nome" name="vc_nome" class="form-control" value="{{isset($tarefa) ?$tarefa->vc_nome: old('vc_nome') }}">
        </div>
    </div> <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="it_id_projecto">Data de entrega</label>
            <select id="it_id_projecto" name="it_id_projecto" class="form-control">
             @foreach ($projectos as $project)
             <option value="{{$project->id}}">{{$project->dt_data_conclusao}}</option>
             @endforeach
            </select>

        </div>
    </div> <!-- /.col -->
</div>

