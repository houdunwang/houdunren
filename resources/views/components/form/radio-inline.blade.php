<div class="d-flex align-items-center mb-3 {{ $attributes['class']??'' }}">

    <label for="{{ $attributes['name'] }}" class="mr-2 mb-0">{{ $attributes['title'] }}</label>

    <div class="d-flex align-items-center @error($attributes['name'])is-invalid @enderror">
        @foreach ($attributes['options'] as $value=>$title)
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="{{ $attributes['name'].$value}}" class="custom-control-input"
                name="{{ $attributes['name'] }}" value="{{ $value }}"
                {{ isset($attributes['value']) && $value==$attributes['value']?"checked":'' }}>

            <label class="custom-control-label" for="{{ $attributes['name'].$value}}">
                {{ $title }}
            </label>
        </div>
        @endforeach
    </div>

    @error( $attributes['name'] )
    <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
    @enderror

</div>
