@extends('layouts.module')
@section('content')
    @component('components.breadcrumb',['menus'=>['域名设置'=>'#']]) @endcomponent
    <div class="alert alert-info" role="alert">
        当模块设置域名后，使用域名访问时将访问到 "{{module()['name']}}/Http/Controllers/SystemController@domain"
    </div>
    <form action="{{module_link('module.domain.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                设置 {{module()['title']}} 模块的访问域名
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>域名设置</label>
                    <input type="text" name="name" class="form-control" required
                           value="{{old('name',$domain['name'])}}">
                    <small class="text-muted">
                        可以通过域名直接访问到模块，但模块必须存在 "模块标识.home" 的路由
                    </small>
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-3">保存提交</button>
    </form>
@endsection