<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="it_id_nome">Nome da Tarefa: </label>
            <select id="it_id_nome" name="it_id_nome" class="form-control">
            @foreach ($tarefas as $tarefa)
            <option value="{{$tarefa->id}}">{{$tarefa->vc_nome}}</option>
            @endforeach
           </select>

        </div>
    </div> <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="dt_descricao">Descrição:</label>
            <input type="date" id="dt_descricao" name="dt_descricao" class="form-control" value="{{isset($categoriaTarefa) ?$categoriaTarefa->dt_descricao: old('dt_descricao') }}">
        </div>
    </div> <!-- /.col -->
</div>
<div class="row mr-5">
        <div class="form-group mb-3 col-4">
            <label for="vc_prioridade" class="mr-2 mt-4">Prioridade:</label>
            <select name="vc_prioridade" id="vc_prioridade" class="form-control">
                <option value="Sim" {{isset($categoriaTarefa) ?$categoriaTarefa->vc_prioridade == "Sim"?'selected':'':''}}>Sim</option>
                <option value="Não" {{isset($categoriaTarefa) ?$categoriaTarefa->vc_prioridade == "Não"?'selected':'':''}}>Não</option>
            </select>
        </div>
</div> <!-- /.col -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="it_tempo_estimado">Tempo Estimado:</label>
            <input type="number" id="it_tempo_estimado" name="it_tempo_estimado" class="form-control" value="{{isset($categoriaTarefa) ?$categoriaTarefa->it_tempo_estimado: old('it_tempo_estimado') }}">
            </div>
    </div> <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_tipo">Tipo</label>
            <input type="text" id="vc_tipo" name="vc_tipo" class="form-control" value="{{isset($categoriaTarefa) ?$categoriaTarefa->vc_tipo: old('vc_tipo') }}">
        </div>
    </div> <!-- /.col -->
</div>
