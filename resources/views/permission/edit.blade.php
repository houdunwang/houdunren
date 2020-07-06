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
            @foreach($module['premission'] as $permission)

            <div class="mb-2 shadow-sm border p-3 rounded">
                <h6>{{ $permission['title'] }}</h6>

                <div class="row">
                    @foreach ($permission['permissions'] as $name=>$title)

                    <label class="col-6 col-sm-4 col-md-3 col-lg-2">

                        <input type="checkbox" name="permissions[]" value="{{ $name }}"
                            {{ $role->hasPermissionTo($name) ?'checked':''}}>

                        <span class="small text-secondary">{{ preg_replace('/^s\d+\-/is','',$name) }}</span>

                    </label>

                    @endforeach

                </div>
            </div>
            @endforeach
        </div>
    </div>

    <button class="btn btn-primary mt-3">保存</button>
</form>
@endforeach
@endsection
