<div class="form-group {{ $class }}">
  <label for="{{ $name }}">{{ $title }}</label>
  <image-upload name="{{ $name }}"
                value="{{ old( $name,$value ) }}"
                class="@error($name)is-invalid @enderror" />
  @error( $validateName($name) )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
