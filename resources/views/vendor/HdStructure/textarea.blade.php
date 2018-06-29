<div class="form-group row">
    <label for="{{$field['name']}}" class="col-3 col-lg-2 col-form-label text-right">{{$field['title']}}</label>
    <div class="col-9 col-lg-10">
        <textarea id="{{$field['name']}}" name="{{$field['name']}}" rows="3" class="form-control">{{$field['value']}}</textarea>
    </div>
</div>
