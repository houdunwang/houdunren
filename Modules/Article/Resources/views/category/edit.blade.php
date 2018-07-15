@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'栏目管理'])
        @slot('nav')
            <li class="nav-item"><a href="/article/category" class="nav-link ">栏目管理</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">修改栏目</a></li>
        @endslot
        @slot('body')
            <form action="/article/category/{{$category['id']}}" method="post">
                @csrf @method('PUT')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">栏目名称</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" class="form-control form-control-sm" name="name"
                                   value="{{$category['name']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">父级栏目</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control form-control-xs" name="pid">
                                <option value="0">顶级栏目</option>
                                @foreach($catetories as $category)
                                    <option value="{{$category['id']}}"
                                            {{$category['_selected']?'selected':''}}
                                            {{$category['_disabled']?'disabled':''}}>
                                        {!! $category['_name'] !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"></label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <button class="btn btn-primary">保存提交</button>
                        </div>
                    </div>
                </div>
            </form>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function delCategory(id, bt) {
            if (confirm('确定删除栏目吗?')) {
                $(bt).next('form').trigger('submit');
            }
        }
    </script>
@endsection