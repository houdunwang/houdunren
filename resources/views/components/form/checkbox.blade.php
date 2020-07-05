<div class="form-group {{ $attributes['class']??'' }}">

    <label for="{{ $attributes['name'] }}" class="">{{ $attributes['title'] }}</label>

    <div class="input-group @error($attributes['name'])is-invalid @enderror">
        @foreach ($attributes['options'] as $value=>$title)
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" value="{{ $value }}" id="{{ $attributes['name'].$value }}"
                name="{{ $attributes['name'] }}" class="custom-control-input"
                {{ isset($attributes['value']) && in_array($value,$attributes['value'])?"checked":'' }}>
            <label class="custom-control-label" for="{{ $attributes['name'].$value }}">{{ $title }}</label>
        </div>
        @endforeach
    </div>

    @error( $attributes['name'] )
    <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
    @enderror

</div>
