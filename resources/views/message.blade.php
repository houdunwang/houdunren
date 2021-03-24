@if (session("message"))
<div class="alert alert-important alert-dismissible rounded-none bg-hd mb-0" role="alert">
    <div class="flex items-center justify-center">
        <i class="fas fa-info-circle mr-2"></i>
        {{ session('message') }}
    </div>
    <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
</div>
@endif
