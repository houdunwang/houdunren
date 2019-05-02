<div class="form-group">
    <label>{{$field['title']}}</label>
    <textarea class="form-control" name="{{$field['name']}}" rows="3">{{old($field['name'],$field['value'])}}</textarea>
</div>
