<div class="form-group {{ $attributes['class']??'' }}">
  <label for="{{ $name }}">{{ $title }}</label>

  <image-upload name="{{ $name }}" value="{{ old( $name,$value??'' ) }}"
                class="@error($name)is-invalid @enderror"></image-upload>

  @error( $name )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
