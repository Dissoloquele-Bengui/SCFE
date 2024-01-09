

 <div class="row">
    <div class="col-4">
        <label for="vc_nome">Projecto</label>
      <input type="name" id="vc_nome"  class="form-control" name="vc_nome" value="{{isset($project) ?$project->vc_nome: old('vc_nome')}}">
    </div>
    <div class="col-4">
        <label for="dt_data_inicio">Inicio</label>
        <input type="date" id="dt_data_inicio" name="dt_data_inicio" class="form-control" value="{{isset($project) ?$project->dt_data_inicio: old('dt_data_inicio') }}">
     </div>
     <div class="col-4">
        <label for="dt_data_conclusao">Termino</label>
        <input type="date" id="dt_data_conclusao" name="dt_data_conclusao" class="form-control" value="{{isset($project) ?$project->dt_data_conclusao: old('dt_data_conclusao') }}">
    </div>
 </div>

 <div class="row mr-4">

    <div class="form-group mr-3 col-4">
        <label for="vc_prioridade" class="mr-2 mt-4">Prioridade</label>
        <select id="vc_prioridade" name="vc_prioridade" class="form-control ">
            <option value="Sim" {{isset($project)?$project->vc_prioridade =="Sim"?'selected':'':''}} >Sim</option>
            <option value="Não" {{isset($project)?$project->vc_prioridade =="Não"?'selected':'':''}} >Não</option>

        </select>
      </div>

      <div class="form-group mr-3 col-4">
        <label for="it_id_usuario" class="mr-2 mt-4">Estagiário</label>
        <select id="it_id_usuario" name="it_id_usuario" class="form-control ">
            @foreach ($usuarios as $user)
                 <option value="{{$user->id}}">{{$user->vc_tipo}}</option>
             @endforeach
        </select>
        </select>
      </div>

      <div class="form-group mr-3 col-3" >
        <label for="it_estado" class="mr-2 mt-4">Estado</label>
        <select id="it_estado" name="it_estado" class="form-control ">
            <option value="0" {{isset($project)?$project->vc_prioridade =="0"?'selected':'':''}} >0</option>
            <option value="1" {{isset($project)?$project->vc_prioridade =="1"?'selected':'':''}} >1</option>
        </select>
      </div>

  </div>






