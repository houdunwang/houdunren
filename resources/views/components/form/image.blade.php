<div class="form-group {{ $attributes['class']??'' }}">

    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>

    <image-single-upload name="{{ $attributes['name'] }}" action="{{ $attributes['action'] }}"
        value="{{ old( $attributes['name'],$attributes['value']??'' ) }}"></image-single-upload>

    @error( $attributes['name'] )
    <strong class="form-text text-danger">{{ $message }}</strong>
    @enderror
</div>
