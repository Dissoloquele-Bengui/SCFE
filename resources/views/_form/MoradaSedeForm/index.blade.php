<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_provincia">Província</label>
            <input type="text" name="vc_provincia" class="form-control" value="{{isset($item) ?$item->vc_provincia: old('vc_provincia') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_municipio">Município</label>
            <input type="text" name="vc_municipio" class="form-control" value="{{isset($item) ?$item->vc_municipio: old('vc_municipio') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_bairro">Bairro</label>
            <input type="text" name="vc_bairro" class="form-control" value="{{isset($item) ?$item->vc_bairro: old('vc_bairro') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_rua">Rua</label>
            <input type="text" name="vc_rua" class="form-control" value="{{isset($item) ?$item->vc_rua: old('vc_rua') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_complemento">Complemento</label>
            <textarea name="vc_complemento" class="form-control">{{isset($item) ?$item->vc_complemento: old('vc_complemento') }}</textarea>
        </div>
    </div>
</div> <!-- /.col -->