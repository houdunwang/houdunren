@extends('layouts.admin')
@section('content')
    <form action="{{route('edu.category.update',$category)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-header">
                修改分类
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>分类名称</label>
                    <input type="text" name="title" class="form-control" value="{{old('title',$category['title'])}}" placeholder="输入帖子分类名称" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label>分类描述</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="请输入栏目描述说明">{{old('description',$category['description'])}}</textarea>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="{{old('icon',$category['icon'])}}" aria-hidden="true" id="fa"></i> </span>
                    </div>
                    <input type="text" class="form-control" name="icon" value="{{old('icon',$category['icon'])}}" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="selectIcon()">选择图标</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">保存添加</button>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        function selectIcon() {
            require(['hdjs'], function (hdjs) {
                hdjs.font(function (icon) {
                    $("[name=icon]").val(icon);
                    $("#fa").attr('class',icon);
                })
            })
        }
    </script>
@endpush

