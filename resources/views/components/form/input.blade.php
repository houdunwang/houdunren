<div class="form-group {{ $attributes['class']??'' }}">
  <label for="{{ $name }}">{{ $title }}</label>

  <input type="{{ $type??'text' }}" class="form-control @error($name)is-invalid @enderror"
         name="{{ $name }}" id="{{ $name }}"
         placeholder="{{ $attributes['placeholder']??'' }}"
         value="{{ old( $name,$value??'' ) }}"
         {{ isset($attributes['required'])?'required':''}} onfocus="this.classList.remove('is-invalid')"
         {{ isset($attributes['disabled'])?'disabled':'' }} {{ isset($attributes['readonly'])?'readonly':'' }} />

  @error( $name )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
