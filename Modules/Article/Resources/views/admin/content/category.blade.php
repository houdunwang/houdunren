@extends('layouts.module.master')
@section('content')
@include('article::admin.content._nav')

<div class="card">
  <div class="card-header"> 选择栏目 </div>
  <div class="card-body">
    <div class="form-group">
      <select class="form-control" name="category_id" size="6" id="category"> @foreach ($categories as $category)
        <option value="{{ $category['id'] }}" class="article-category-tree"
                {{ $category['type']=='index' ?'disabled':'' }}>
          {!! $category['_title'] !!}
        </option>
        @endforeach
      </select>
    </div>
  </div>
</div>
<button class="btn btn-primary btn-sm mt-3" onclick="change()">保存提交</button>
@endsection

@push('scripts')
<script>
  function change(){
    location.href= `/Article/admin/content/create/${document.getElementById('category').value}`
  }
</script>
@endpush

@push('styles')
<style>
  option:disabled {
    background-color: #f3f3f3;
  }
</style>
@endpush
