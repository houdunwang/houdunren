<div class="form-group {{ $class }}">
  <label for="{{ $name }}">{{ $title }}</label>
  <textarea class="form-control @error($validateName($name)) is-invalid @enderror"
            name="{{ $name }}"
            rows="{{ $attributes['rows']??3 }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            onfocus="this.classList.remove('is-invalid')"
            {{$disabled}}
            {{$required}}
            {{$readonly}}
            {{$hidden}} />{{ old($name,$value) }}</textarea>
  @error( $validateName($name))
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
