<div class="form-group {{ $attributes['class']??'' }}">

    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>

    {{-- <input type="{{ $attributes['type']??'text' }}" class="form-control @error($attributes['name'])is-invalid
    @enderror"
    name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}"
    placeholder="{{ $attributes['placeholder']??'' }}"
    value="{{ old( $attributes['name'],$attributes['value']??'' ) }}"
    {{ isset($attributes['required'])?'required':''}} onfocus="this.classList.remove('is-invalid')"> --}}
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="deee">
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>

    <div class="custom-file  @error($attributes['name'])is-invalid @enderror">
        <input type="file" class="custom-file-input" id="{{ $attributes['name'] }}" name="{{ $attributes['name'] }}"
            value="{{ old( $attributes['name'],$attributes['value']??'' ) }}">
        <label class="custom-file-label" for="{{ $attributes['name'] }}"
            data-browse="选择">{{ $attributes['placeholder']??'' }}</label>
    </div>

    @error( $attributes['name'] )
    <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
    @enderror

</div>
