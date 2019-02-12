@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <a href="">
                        <h3 class="text-muted">
                            <i class="fa fa-plus"></i>
                        </h3>
                        <h4 class="text-muted">
                            <a href="{{route('site.create')}}">
                                创建新网站
                            </a>
                        </h4>
                    </a>
                </div>
            </div>
        </div>
        @foreach($sites as $site)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body text-center ">
                        <h4 class="text-muted site-title">
                            <a href="{{route('site.show',$site)}}" class="text-muted">{{$site['name']}}</a>
                        </h4>
                    </div>
                    <div class="panel-footer text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('site.edit',$site)}}" class="btn btn-default">编辑</a>
                            <a href="javascript:void(0)" onclick="destroy(this)"
                               class="btn btn-default">删除</a>
                            <form action="{{route('site.destroy',$site)}}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除站点吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush