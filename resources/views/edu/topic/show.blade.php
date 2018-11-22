@extends('edu.layouts.master')
@section('content')
    <div class="container">
        <div class="row {{route_class()}} mt-3">
            <div class="col-12 col-xl-9">
                <div class="card card-body p-5">
                    @auth
                        <div class="row">
                            <div class="col text-right">
                                @if($topic->isFavorite(auth()->user()))
                                    <a href="{{route('common.favorite.make',['model'=>'EduTopic','id'=>$topic])}}"
                                       class="btn-xs text-danger">
                                        <i class="fa fa-heart" aria-hidden="true"></i> 已收藏</a>
                                @else
                                    <a href="{{route('common.favorite.make',['model'=>'EduTopic','id'=>$topic])}}"
                                       class="btn btn-xs">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏</a>
                                @endif
                                    @can('update',$topic)
                                        <a href="{{route('edu.topic.edit',$topic)}}" class="badge badge-primary">编辑</a>
                                    @endcan
                                @can('delete',$topic)
                                    <a href="javascript:;" onclick="confirm('确定删除吗')?$(this).next().submit():null;"
                                       class="badge badge-secondary">删除</a>
                                    <form action="{{route('edu.topic.destroy',$topic)}}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @endauth
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="mb-4">
                                {{$topic['title']}}
                            </h2>
                            <p class="text-muted mb-1 text-muted small">
                                <a href="{{route('member.user.show',$topic->user)}}" class="text-secondary">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    <a href="{{route('member.user.show',$topic->user)}}" class="text-secondary">{{$topic->user->name}}</a>
                                </a>
                                <i class="fa fa-clock-o ml-2" aria-hidden="true"></i>
                                {{$topic->created_at->diffForHumans()}}

                                <a href="{{route('edu.topic_list',['id'=>$topic->category->id])}}" class="text-secondary">
                                    <i class="fa fa-folder-o ml-2" aria-hidden="true"></i>
                                    {{$topic->category->title}}
                                </a>

                                <i class="fa fa-comment-o ml-2" aria-hidden="true"></i> {{$topic->comment->count()}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="markdown editormd-html" id="content">
                                <textarea hidden>{!! $topic['content'] !!}</textarea>
                            </div>
                            <hr class="my-5">
                            <div class="mt-5 text-center">
                                @auth
                                    @if($topic->zan->contains('user_id',auth()->id()))
                                        <a href="{{route('common.zan.make',['model'=>'EduTopic','id'=>$topic])}}"
                                           class="btn u-btn-primary--air transition-3d-hover mb-1 mb-4">
                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                            感谢点赞
                                        </a>
                                    @else
                                        <a href="{{route('common.zan.make',['model'=>'EduTopic','id'=>$topic])}}"
                                           class="btn u-btn-twitter--air transition-3d-hover mb-1 mb-4">
                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 点个赞呗
                                        </a>
                                    @endif
                                @endauth
                                <div>
                                    <div class="avatar">
                                    @foreach($topic->zan as $zan)
                                            <a href="{{route('member.user.show',$zan->user)}}">
                                            <img src="{{$zan->user->avatar}}" class="u-avatar rounded-circle">
                                            </a>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--评论--}}
                <div class="mt-5">
                    @include('common.comment',['model'=>$topic])
                </div>
            </div>
            <div class="col-12 col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <a href="{{route('member.user.show',$topic->user)}}" class="text-secondary">
                                {{$topic->user->name}}
                            </a>
                        </div>
                    </div>
                    <div class="card-block text-center p-5">
                        <div class="avatar avatar-xl">
                            <a href="{{route('member.user.show',$topic->user)}}">
                                <img src="{{$topic->user->avatar}}" class="u-xl-avatar rounded-circle">
                            </a>
                        </div>
                    </div>
                    @can('follow',$topic->user)
                        <div class="card-footer text-muted">
                            @if(auth()->user()->following($topic->user))
                                <a class="btn u-btn-facebook--air transition-3d-hover mb-1 btn-xs btn-block"
                                   href="{{route('member.follow',$topic->user->id)}}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> 已经关注
                                </a>
                            @else
                                <a class="btn btn-white btn-block btn-xs"
                                   href="{{route('member.follow',$topic->user->id)}}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> 关注 TA
                                </a>
                            @endif
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs', 'marked', 'MarkdownIt', 'highlight'], function (hdjs, marked, MarkdownIt) {
            let md = new MarkdownIt();
            $("#content").html(md.render($("#content textarea").val()));
            $('pre code').each(function (i, block) {
                hljs.highlightBlock(block);
            });
        })
    </script>
@endpush