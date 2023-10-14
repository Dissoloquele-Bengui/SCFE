<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="vc_numero">Telefone</label>
            <input type="number" name="vc_numero" class="form-control" value="{{isset($item) ?$item->vc_numero: old('vc_numero') }}" required>
        </div>
    </div> <!-- /.col -->
</div>
