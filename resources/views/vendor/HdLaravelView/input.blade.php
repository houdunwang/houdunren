
<div class="form-group row">
    <label for="{{$field['name']}}" class="col-12 col-sm-3 col-form-label text-md-right">{{$field['title']}}</label>
    <div class="col-12 col-md-9">
        <input id="{{$field['name']}}" name="{{$field['name']}}" type="text"
               value="{{ $field['value']??old($field['name']) }}" class="form-control form-control-sm form-control{{ $errors->has($field['name']) ? ' is-invalid' : '' }}">
        @if ($errors->has($field['name']))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($field['name']) }}</strong>
            </span>
        @endif
    </div>
</div>
