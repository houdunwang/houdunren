<div class="form-group">
    <label>{{$field['title']}}</label>
    <textarea name="fields[{{$field['name']}}]" rows="3" class="form-control"
    >{{old('fields.'.$field['name'],$article[$field['name']]??'')}}</textarea>
</div>