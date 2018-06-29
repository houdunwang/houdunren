<div class="form-group row">
    <label for="{{$field['name']}}" class="col-3 col-lg-2 col-form-label text-right">{{$field['title']}}</label>
    <div class="col-9 col-lg-10">
        <select id="{{$field['name']}}" name="{{$field['name']}}" class="form-control">
            @foreach($field['options'] as $option)
                <option value="{{$option['value']}}" {{$option['selected']?'selected':''}} {{$option['disabled']?'disabled':''}}>{{$option['title']}}</option>
            @endforeach
        </select>
    </div>
</div>
