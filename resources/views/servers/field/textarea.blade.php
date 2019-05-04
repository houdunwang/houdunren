<div class="form-group">
    <label>{{$field['title']}}</label>
    <textarea class="form-control" name="{{$field['name']}}" rows="3"
        placeholder="{{ $field['placeholder']??'' }}">{{old($field['name'],$field['value'])}}</textarea>
</div>
