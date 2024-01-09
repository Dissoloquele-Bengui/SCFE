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
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_classe">Classe</label>
            <input type="number" id="vc_classe" name="vc_classe" class="form-control" value="{{isset($user) ?$user->vc_classe: old('vc_classe') }}">
        </div>
    </div> <!-- /.col -->
</div>
 <!-- /.col -->
</div>
<div class="form-group mr-3 col-4">
    <label for="vc_tipo" class="mr-2 mt-2">Tipo</label>
    <select id="vc_tipo" name="vc_tipo" class="form-control ">
        <option value="Coordenador" {{isset($user)?$user->vc_tipo =="Coordenador"?'selected':'':''}}>Coordenador</option>
        <option value="Supervisor"  {{isset($user)?$user->vc_tipo =="Supervisor"?'selected':'':''}}>Supervisor</option>
        <option value="Estagiário"  {{isset($user)?$user->vc_tipo =="Estagiário"?'selected':'':''}}>Estagiário</option>
    </select>
  </div>
