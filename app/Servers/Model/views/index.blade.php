@extends('layouts.module')
@section('content')
@include('{LOWER_MODULE}::admin.{LOWER_NAME}._tab')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        @foreach($fieldServer->titles() as $title)
                        <th>{{$title}}</th>
                        @endforeach
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $field)
                    <tr>
                        @foreach ($fieldServer->value($field) as $value)
                        <td>{!!$value!!}</td>
                        @endforeach
                        <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-outline-success"
                                    href="{{module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.edit',$field)}}">
                                    编辑
                                </a>
                                <form action="{{module_link('{LOWER_MODULE}.admin.{LOWER_NAME}.destroy',$field)}}"
                                    method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a class="btn btn-outline-danger" href="javascript:;" onclick="destroy(this)">
                                    删除
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
