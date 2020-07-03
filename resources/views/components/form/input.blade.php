<div class="form-group {{ $attributes['class']??'' }}">

    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>

    <input type="{{ $attributes['type']??'text' }}" class="form-control @error($attributes['name'])is-invalid @enderror"
        name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}"
        placeholder="{{ $attributes['placeholder']??'' }}"
        value="{{ old( $attributes['name'],$attributes['value']??'' ) }}"
        {{ isset($attributes['required'])?'required':''}} onfocus="this.classList.remove('is-invalid')">

    @error( $attributes['name'] )
    <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
    @enderror

</div>
