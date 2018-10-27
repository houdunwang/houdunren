@extends('edu.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action rounded-0">
                        <span class="text-muted font-weight-bold btn">文档列表</span>
                        <a href="{{route('edu.document.create')}}"
                           class="btn u-btn-primary--air transition-3d-hover mb-1 float-right btn-xs">
                            <i class="fa fa-plus" aria-hidden="true"></i> 发表
                        </a>
                    </div>
                    @foreach($documents as $document)
                        <div class="list-group-item list-group-item-action u-info-v1 p-3 rounded-0 justify-content-sm-between align-items-sm-center">
                            <div class="row">
                                <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                                    <a href="{{route('member.user.show',$document->user)}}">
                                        <img class="u-avatar rounded-circle mr-3" src="{{$document->user->icon}}">
                                    </a>
                                    <a href="{{route('member.user.show',$document->user)}}" class="text-secondary">
                                        {{$document->user->name}}
                                    </a>
                                    <a href="{{route('edu.topic.show',$document)}}" class="text-dark">
                                        {{$document['title']}}
                                    </a>
                                </div>
                                <span class="col-sm-2 text-text text-sm-right small text-secondary">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{$document->created_at->diffForHumans()}}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    {{$documents->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            if (confirm('确认删除吗')) {
                $(obj).next('form').trigger('submit');
            }
        }
    </script>
@endpush