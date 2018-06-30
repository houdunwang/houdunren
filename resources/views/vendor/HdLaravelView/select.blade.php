<div class="form-group row">
    <label for="{{$field['name']}}" class="col-12 col-sm-3 col-form-label text-md-right">{{$field['title']}}</label>
    <div class="col-12 col-md-9">
        <select id="{{$field['name']}}" name="{{$field['name']}}" class="form-control">
            @foreach($field['options'] as $option)
                <option value="{{$option['value']}}" {{$option['selected']?'selected':''}} {{$option['disabled']?'disabled':''}}>{{$option['title']}}</option>
            @endforeach
        </select>
    </div>
</div>
