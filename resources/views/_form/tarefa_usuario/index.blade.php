
 <div class="row mr-4">
      <div class="form-group mr-3 col-4">
        <label for="it_id_usuario" class="mr-2 mt-4">Usuário</label>
        <select id="it_id_usuario" name="it_id_usuario" class="form-control ">
            @foreach ($users as $user)
                 <option value="{{$user->id}}">{{$user->vc_nome}}</option>
             @endforeach
        </select>

      </div>
      <div class="form-group mr-3 col-4">
        <label for="it_id_tarefa" class="mr-2 mt-4">Tarefa</label>
        <select id="it_id_tarefa" name="it_id_tarefa" class="form-control ">
            @foreach ($tarefas as $tarefa)
                 <option value="{{$tarefa->id}}">{{$tarefa->vc_nome}}</option>
             @endforeach
        </select>

      </div><div class="form-group mr-3 col-4">
        <label class="mr-2 mt-4" for="tm_hora_saida">Termino</label>
        <input type="time" id="tm_hora_saida" name="tm_hora_saida" class="form-control" value="{{isset($frequencia) ?$frequencia->tm_hora_saida: old('tm_hora_saida') }}">
    </div>

 </div>






