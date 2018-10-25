@extends('member.layouts.master')
@section('content')
    <div class="card" data-toggle="lists">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="card-header-title">话题列表</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($topics as $topic)
                    <li class="list-group-item px-0">
                        <div class="row">
                            <div class="col col-10">
                                <h4 class="card-title mb-3 name">
                                    <a href="{{route('edu.topic.show',$topic)}}">
                                        {{$topic['title']}}
                                    </a>
                                </h4>
                                <p class="card-text small text-muted">
                                    {{$topic->category->title}}
                                    <span class="fe fe-clock"></span> {{$topic['created_at']->format('Y-m-d H:i')}}
                                </p>
                            </div>
                            <div class="col text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{route('edu.topic.edit',$topic)}}" class="btn btn-white">
                                        编辑
                                    </a>
                                    <button type="button" class="btn btn-light" onclick="del(this)">删除</button>
                                    <form action="{{route('edu.topic.destroy',$topic)}}" method="post">
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