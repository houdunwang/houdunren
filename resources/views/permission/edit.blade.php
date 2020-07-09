@extends('layouts.admin')

@section('content')

@include('permission.nav')

<form action="{{ route('site.permission.update',[$site,$role]) }}" method="post">
    @csrf
    @method('PUT')

    @foreach($modules as $module)
    <div class="card mt-3">
        <div class="card-header">
            {{ $module['title'] }}
        </div>
        <div class="card-body">
            @foreach($module['menus'] as $menu)
            <div class="mb-2 shadow-sm border p-3 rounded">
                <h6>{{ $menu['title'] }}</h6>
                <div class="row">
                    @foreach ($menu['items'] as $item)
                    <label class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <input type="checkbox" name="permissions[]" value="{{$item['permission']}}"
                            {{ $role->hasPermissionTo($item['permission'] ) ?'checked':''}}>
                        {{ $item['title'] }}

                        <span class="small text-secondary">
                            {{ preg_replace('/^s\d+\-/is','',$item['permission'] ) }}
                        </span>
                    </label>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
    {{-- 系统权限 --}}
    <div class="card mt-3">
        <div class="card-header">
            站点管理
        </div>
        <div class="card-body">
            <div class="mb-2 shadow-sm border p-3 rounded">
                <div class="row">
                    @foreach ($systemMenus as $item)

                    <label class="col-6 col-sm-4 col-md-3 col-lg-2">

                        <input type="checkbox" name="permissions[]" value="{{$item['permission'] }}"
                            {{ $role->hasPermissionTo($item['permission']) ?'checked':''}}>

                        {{ $item['title'] }}
                        <span class="small text-secondary">
                            {{ preg_replace('/^s\d+\-/is','',$item['permission']) }}
                        </span>

                    </label>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-3">保存</button>
</form>

@endsection
