@extends('layouts.module')

@section('content')
<nav class="nav nav-tabs">
    <a class="nav-link active" href="#">
        标签管理
    </a>
</nav>

<form action="{{ route('Edu.admin.tag.update') }}" method="post">
    @csrf
    @method('PUT')
    <div class="card mt-3">
        <div class="card-header">
            标签列表
        </div>
        <div class="card-body">
            <tag-lists></tag-lists>
        </div>
    </div>

    <button class="btn btn-primary mt-3">保存</button>
</form>
@endsection

@push('vue')
<script>
    window.tags  = @json($tags);
</script>
@endpush
