<div class="form-group {{ $attributes['class']??'' }}">

    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>

    <div class="input-group @error($attributes['name'])is-invalid @enderror">
        <input type="text" class="form-control" name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}"
            placeholder="{{ $attributes['placeholder']??'' }}"
            value="{{ old( $attributes['name'],$attributes['value']??'' ) }}"
            onfocus="this.parentElement.classList.remove('is-invalid')">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">{{ $attributes['text'] }}</span>
        </div>
    </div>

    @error( $attributes['name'] )
    <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
    @enderror

</div>
