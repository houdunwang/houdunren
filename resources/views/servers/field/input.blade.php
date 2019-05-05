<div class="form-group">
    <label>{{$field['title']}}</label>
    <input type="text" name="{{$field['name']}}" class="form-control" value="{{old($field['name'],$field['value'])}}" placeholder="{{ $field['placeholder']??'' }}" {{ active_class($field['required']??false,'required') }}>
</div>
