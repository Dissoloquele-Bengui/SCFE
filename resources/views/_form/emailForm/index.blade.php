<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="vc_email">Email</label>
            <input type="text" name="vc_email" class="form-control" value="{{isset($item) ?$item->vc_email: old('vc_email') }}" required>
        </div>
    </div>
</div> <!-- /.col -->

