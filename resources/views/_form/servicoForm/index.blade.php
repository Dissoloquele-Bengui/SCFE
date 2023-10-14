<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="vc_servico">Serviço</label>
            <input type="text" name="vc_servico" class="form-control" value="{{isset($item) ?$item->vc_servico: old('vc_servico') }}" required>
        </div>
    </div>
</div> <!-- /.col -->

