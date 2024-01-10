<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_nome">Nome</label>
            <input type="name" id="vc_nome" name="vc_nome" class="form-control" value="{{isset($user) ?$user->vc_nome: old('vc_nome') }}">
        </div>
    </div> <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_email">Email</label>
            <input type="email" id="vc_email" name="vc_email" class="form-control" value="{{isset($user) ?$user->vc_email: old('vc_email') }}">
        </div>
    </div> <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_password">Senha</label>
            <input type="password" id="vc_password" name="vc_password" class="form-control" value="{{isset($user) ?$user->vc_password: old('vc_password') }}">
        </div>
    </div> <!-- /.col -->
</div>

 <!-- /.col -->
</div>
<div class="form-group mr-3 col-4">
    <label for="vc_classe" class="mr-2 ">Classe</label>
    <select id="vc_classe" name="vc_classe" class="form-control ">
        <option></option>
        <option value="10ª" {{isset($user)?$user->vc_classe =="10ª"?'selected':'':''}}>10ª</option>
        <option value="11ª" {{isset($user)?$user->vc_classe =="11ª"?'selected':'':''}}>11ª</option>
        <option value="12ª" {{isset($user)?$user->vc_classe =="12ª"?'selected':'':''}}>12ª</option>
        <option value="13ª" {{isset($user)?$user->vc_classe =="13ª"?'selected':'':''}}>13ª</option>
        <option value="Não estou no médio" {{isset($user)?$user->vc_classe =="Não estou no médio"?'selected':'':''}}>Não estou no médio</option>
  </select>
  </div>
<div class="form-group mr-3 col-4">
    <label for="vc_tipo" class="mr-2 ">Tipo</label>
    <select id="vc_tipo" name="vc_tipo" class="form-control ">
        <option value="Coordenador" {{isset($user)?$user->vc_tipo =="Coordenador"?'selected':'':''}}>Coordenador</option>
        <option value="Supervisor"  {{isset($user)?$user->vc_tipo =="Supervisor"?'selected':'':''}}>Supervisor</option>
        <option value="Estagiário"  {{isset($user)?$user->vc_tipo =="Estagiário"?'selected':'':''}}>Estagiário</option>
    </select>
  </div>
