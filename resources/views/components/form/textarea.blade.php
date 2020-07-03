<div class="form-group {{ $attributes['class']??'' }}">

    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>

    <textarea class="form-control @error($attributes['name'])is-invalid @enderror" name="{{ $attributes['name'] }}"
        rows="{{ $attributes['rows']??3 }}" id="{{ $attributes['name'] }}"
        placeholder="{{ $attributes['placeholder']??'' }}" {{ isset($attributes['required'])?'required':''}}
        onfocus="this.classList.remove('is-invalid')">
{{ $slot }}
    </textarea>

    @error( $attributes['name'] )
    <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
    @enderror
</div>
