<div class="form-group row">
    <label for="{{$field['name']}}" class="col-12 col-sm-3 col-form-label text-md-right">{{$field['title']}}</label>
    <div class="col-12 col-lg-9">
        <hd-image name="{{$field['name']}}" id="{{$field['name']}}"  image-url="{!! $field['value'] !!}"></hd-image>
    </div>
</div>
