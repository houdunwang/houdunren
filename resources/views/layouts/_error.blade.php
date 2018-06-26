@if(count($errors)>0)
    <div role="alert" class="alert alert-contrast alert-danger alert-dismissible">
    <button type="button" data-dismiss="alert" aria-label="Close" class="close">
        <span aria-hidden="true" class="mdi mdi-close"></span>
    </button>
    <div class="icon"><span class="mdi mdi-alert-triangle"></span></div>
        <div class="message">
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
        </div>
</div>
@endif