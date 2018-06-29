<div class="form-group row">
    <label for="{{$field['name']}}" class="col-3 col-lg-2 col-form-label text-right">{{$field['title']}}</label>
    <div class="col-9 col-lg-10">
        <input id="{{$field['name']}}" name="{{$field['name']}}" type="text"
               value="{{ $field['value']??old('email') }}" class="form-control{{ $errors->has($field['name']) ? ' is-invalid' : '' }}">
        @if ($errors->has($field['name']))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($field['name']) }}</strong>
            </span>
        @endif
    </div>
</div>
