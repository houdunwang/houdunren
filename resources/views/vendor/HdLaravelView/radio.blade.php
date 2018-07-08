<div class="form-group row">
    <label for="{{$field['name']}}" class="col-12 col-sm-3 col-form-label text-md-right"  style="padding-top:initial;">{{$field['title']}}</label>
    <div class="col-12 col-md-9">
        @if(isset($field['options']))
            @foreach($field['options'] as $option)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" {{$field['value']==$option['value']?'checked=""':''}} name="{{$field['name']}}" value="{{$option['value']}}">
                    <label class="form-check-label">{{$option['title']}}</label>
                </div>
            @endforeach
        @endif
    </div>
</div>
