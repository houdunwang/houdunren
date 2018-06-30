<div class="form-group row">
    <label for="{{$field['name']}}" class="col-12 col-sm-3 col-form-label text-md-right">{{$field['title']}}</label>
    <div class="col-12 col-md-9">
        <textarea id="{{$field['name']}}" name="{{$field['name']}}" rows="3" class="form-control">{{$field['value']}}</textarea>
    </div>
</div>
