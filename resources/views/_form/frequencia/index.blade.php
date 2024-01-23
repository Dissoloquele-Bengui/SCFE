
 <div class="row mr-4">
      <div class="form-group mr-3 col-4">
        <label for="it_id_usuario" class="mr-2 mt-4">Usuário</label>
        <select id="it_id_usuario" name="it_id_usuario" class="form-control ">
            @foreach ($users as $user)
                 <option value="{{$user->id}}">{{$user->vc_nome}}</option>
             @endforeach
        </select>
        </select>
      </div>
      <div class="form-group mr-3 col-4">
        <label class="mr-2 mt-4" for="tm_hora_entrada">Entrada</label>
        <input type="time" id="tm_hora_entrada" name="tm_hora_entrada" class="form-control" value="{{isset($frequencia) ?$frequencia->tm_hora_entrada: old('tm_hora_entrada') }}">
     </div>

     <div class="form-group mr-3 col-4">
        <label class="mr-2 mt-4" for="tm_hora_saida">Termino</label>
        <input type="time" id="tm_hora_saida" name="tm_hora_saida" class="form-control" value="{{isset($frequencia) ?$frequencia->tm_hora_saida: old('tm_hora_saida') }}">
    </div>
        <div class="form-group mr-3 col-4">
            <label class="mr-2 mt-4" for="dt_data">Data</label>
          <input type="date" id="dt_data"  class="form-control" name="dt_data" value="{{isset($frequencia) ?$frequencia->dt_data: old('dt_data')}}">
        </div>

    
      <div class="form-group mr-3 col-4">
        <label for="vc_tipo" class="mr-2 mt-4">Tipo</label>
        <select id="vc_tipo" name="vc_tipo" class="form-control ">
            <option value=""></option>
            <option value="Absoluta" {{isset($frequencia)?$frequencia->vc_tipo =="Absoluta"?'selected':'':''}} >Absoluta</option>
            <option value="Relativa" {{isset($frequencia)?$frequencia->vc_tipo =="Relativa"?'selected':'':''}} >Relativa</option>
        </select>
     </div>
 </div>






