<div class="form-group {{ $attributes['class']??'' }}">
    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>

    <image-upload name="{{ $attributes['name'] }}" value="{{ old( $attributes['name'],$attributes['value']??'' ) }}"
        class="@error($attributes['name'])is-invalid @enderror"></image-upload>

    @error( $attributes['name'] )
    <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
    @enderror
</div>
