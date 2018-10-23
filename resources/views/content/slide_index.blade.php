@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('content.slide.index')}}" class="nav-link mr-3 active">
                            幻灯片列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('content.slide.create')}}" class="nav-link mr-3">
                            添加幻灯片
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap table-sm">
                        <thead>
                        <tr>
                            <th scope="col" width="80">编号</th>
                            <th scope="col">幻灯片描述</th>
                            <th scope="col">图片</th>
                            <th scope="col">开启</th>
                            <th scope="col">创建时间</th>
                            <th scope="col" width="80"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slides as $slide)
                            <tr>
                                <td>{{$slide['id']}}</td>
                                <td><a href="">{{$slide['title']}}</a></td>
                                <td>
                                    <div class="avatar avatar-lg avatar-4by3">
                                        <a href="{{$slide['image']}}" target="_blank">
                                            <img src="{{$slide['image']}}" class="avatar-img rounded">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    @if($slide['status'])
                                        <span class="fe fe-check-circle text-info"></span>
                                    @else
                                        <span class="fe fe-x-circle text-secondary"></span>
                                    @endif
                                </td>
                                <td>{{$slide['created_at']->format('Y-m-d')}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a class="btn btn-light" href="{{route('content.slide.edit',$slide)}}">编辑幻灯片</a>
                                        <button type="button" class="btn btn-danger" onclick="del(this)">删除幻灯片</button>
                                        <form action="{{route('content.slide.destroy',$slide)}}" method="post">
                                            @method('DELETE') @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(button) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('你确定删除幻灯片吗?', function () {
                    $(button).next('form').submit();
                })
            })
        }
    </script>
@endpush
