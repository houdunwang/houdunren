@inject('model', 'Modules\Article\Entities\ArticleModel')
@inject('category', 'Modules\Article\Entities\ArticleCategory')
@inject('content', 'Modules\Article\Entities\ArticleContent')
@extends('layouts.module.admin')
@section('content')
<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              文章
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('article.admin.category.index') }}" class="small text-secondary">
                共有<strong class="h5 font-weight-bold">{{ $content->site()->count() }}</strong>篇文章
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              栏目
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('article.admin.category.index') }}" class="small text-secondary">
                共有<strong class="h5 font-weight-bold">{{ $category->site()->count() }}</strong>个栏目
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              模型
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('article.admin.category.index') }}" class="small text-secondary">
                共有<strong class="h5 font-weight-bold">{{ $model->site()->count() }}</strong>个模型
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              模板
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
              <a href="{{ route('article.admin.category.index') }}" class="small text-secondary">
                站点可以使用<strong class="h5 font-weight-bold">{{ site()->templates->count() }}</strong>套模板
              </a>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-sm-6">
    <div class="card mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">最新文章列表</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered" width="100%" style="width: 100%;">
          <thead>
            <tr>
              <th width="60">编号</th>
              <th>标题</th>
              <th width="100">栏目</th>
              <th width="100">模型</th>
              <th width="100">创建</th>
              <th width="100">更新</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($content->limit(10)->with('category.model')->latest()->get() as $content)
            <tr role="row" class="odd">
              <td>{{ $content->id }}</td>
              <td>{{ $content->title }}</td>
              <td>{{ $content->category->title }}</td>
              <td>{{ $content->category->model->title }}</td>
              <td>{{ $content['created_at']->diffForHumans()}}</td>
              <td>{{ $content['updated_at']->diffForHumans()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6">
    <div class="card mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">阅读最多</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="60">编号</th>
              <th>标题</th>
              <th width="100">栏目</th>
              <th width="100">模型</th>
              <th width="100">创建</th>
              <th width="100">更新</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($content->limit(10)->with('category.model')->orderBy('click')->get() as $content)
            <tr>
              <td>{{ $content->id }}</td>
              <td>{{ $content->title }}</td>
              <td>{{ $content->category->title }}</td>
              <td>{{ $content->category->model->title }}</td>
              <td>{{ $content['created_at']->diffForHumans()}}</td>
              <td>{{ $content['updated_at']->diffForHumans()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection

@push('styles')
<style>
  #app {
    background-color: transparent !important;
    box-shadow: none !important;
  }

  table {
    table-layout: fixed;
  }

  table tbody tr td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
@endpush
