<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="vc_descricao">Descrição da revogação</label>
            <textarea name="vc_descricao" class="form-control" cols="30" rows="10" required>{{isset($item) ?$item->vc_descricao: old('vc_descricao') }}</textarea>
        </div>
    </div>
</div> <!-- /.col -->

