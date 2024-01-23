
 <div class="row mr-4">
      <div class="form-group mr-3 col-4">
        <label for="it_id_frequencia" class="mr-2 mt-4">Frequencia</label>
        <select id="it_id_frequencia" name="it_id_frequencia" class="form-control ">
            @foreach ($frequencias as $frequencia)
                 <option value="{{$frequencia->id}}">{{$frequencia->id}}</option>
             @endforeach
        </select>
        </select>
      </div>
      <div class="form-group mr-3 col-4">
        <label class="mr-2 mt-4" for="vc_descricao">Descricão</label>
        <input type="text" id="vc_descricao" name="vc_descricao" class="form-control h-10" value="{{isset($justificativa) ?$justificativa->vc_descricao: old('vc_descricao') }}">
     </div>
 </div>
