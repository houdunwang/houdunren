<div class="form-group {{ $class}}" {{ $hidden }}>
  <label for="{{ $name }}">{{ $title }}</label>

  <input type="{{ $type??'text' }}"
         class="form-control @error($validateName($name))is-invalid @enderror"
         name="{{ $name }}"
         id="{{ $name }}"
         value="{{ old( $name,$value ) }}"
         placeholder="{{ $placeholder }}"
         onfocus="this.classList.remove('is-invalid')"
         {{$disabled}}
         {{$required}}
         {{$readonly}}
         {{$hidden}} />
  @error( $validateName($name) )
  <strong class="form-text text-danger invalid-feedback">{{ $message }}</strong>
  @enderror
</div>
