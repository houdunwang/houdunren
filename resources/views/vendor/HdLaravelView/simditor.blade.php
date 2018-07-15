<div class="form-group row">
    <label for="{{$field['name']}}" class="col-12 col-sm-3 col-form-label text-md-right"  style="padding-top:initial;">{{$field['title']}}</label>
    <div class="col-12 col-md-9">
        <hd-simditor name="{{$field['name']}}" url="/upload-simditor">{{ $field['value']??old($field['name'])  }}</hd-simditor>
    </div>
</div>
