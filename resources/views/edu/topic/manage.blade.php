@extends('layouts.member')
@section('content')
    <div class="card" data-toggle="lists">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="card-header-title text-secondary">
                        帖子列表
                    </h6>
                </div>
                <div class="col-auto">
                    <a href="{{route('edu.topic.create')}}" class="btn btn-xs btn-primary">
                        发表
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($topics as $topic)
                    <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col ml--2">
                                <h6 class="card-title mb-1 name">
                                    <a href="{{route('edu.topic.show',$topic)}}"> {{$topic['title']}}</a>
                                </h6>
                                <p class="card-text small mb-1">
                                    <i class="fa fa-clock-o"
                                       aria-hidden="true"></i> {{$topic['created_at']->format('Y-m-d H:i')}}
                                    <a href="http://hdcms.test/edu/topics_1.html" class="text-secondary ml-2">
                                        <i class="fa fa-folder-o" aria-hidden="true"></i>
                                        {{$topic->category->title}}
                                    </a>
                                </p>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group btn-group-toggle btn-group-xs">
                                    <a href="{{route('edu.topic.edit',$topic)}}" class="btn btn-xs btn-soft-secondary">编辑</a>
                                    <a href="javascript:;" class="btn btn-xs btn-soft-dark" onclick="del(this)">删除</a>
                                    <form action="{{route('edu.topic.destroy',$topic)}}" method="post" hidden>
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{$topics->links()}}
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗？', function () {
                    $(obj).next().submit();
                })
            })
        }
    </script>
@endpush