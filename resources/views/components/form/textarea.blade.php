<div class="form-group {{ $attributes['class']??'' }}">

  <label for="{{ $name }}">{{ $title }}</label>

  <textarea class="form-control @error($name)is-invalid @enderror" name="{{ $name }}"
            rows="{{ $attributes['rows']??3 }}" id="{{ $name }}"
            placeholder="{{ $attributes['placeholder']??'' }}" {{ isset($attributes['required'])?'required':''}}
            onfocus="this.classList.remove('is-invalid')">{{ old($name,$slot) }}</textarea>

  @error( $name )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
