<div class="form-group">
    <label>{{$field['title']}}</label>
    <input type="text" name="fields[{{$field['name']}}]" class="form-control"
           value="{{old('fields.'.$field['name'],$article[$field['name']]??'')}}">
</div>