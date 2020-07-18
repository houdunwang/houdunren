@extends('edu::layouts.front')
@section('title',$topic['title'])
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="bg-white rounded shadow-sm border border-gary shadow-sm p-md-5 p-3">
                <div class="border-bottom mb-5 pb-3">
                    <h5 class="pb-1 pt-3 mb-3 text-monospace text-black-50">
                        {{ $topic['title'] }}
                    </h5>
                    <div class="small text-secondary clearfix">
                        <div class="float-left pt-2">
                            <a href="/edu/center/topic/18907" class="text-success">{{ $topic->user->name }}</a>
                            创建于{{ $topic->created_at->diffForHumans() }}
                            <span class="pr-2 pl-2">/</span>
                            评论数{{ $topic['comment_count'] }}
                            <span class="pr-2 pl-2">/</span>
                            更新于{{ $topic->created_at->diffForHumans() }}
                            <span class="pr-2 pl-2">/</span>
                            收藏数{{ $topic['favorite_count'] }}
                            <span class="pr-2 pl-2">/</span>
                            点赞数{{ $topic['favour_count'] }}
                        </div>
                        <div class="float-right">
                            <div class="btn-group btn-group-sm">
                                @can('recommend', $topic)
                                <a href="{{ route('Edu.front.topic.recommend',$topic) }}" class="btn
                                    {{ $topic->recommend?'btn-info' :'btn-outline-info'}}">
                                    推荐
                                </a>
                                @endcan

                                @can('update', $topic)
                                <a href="{{ route('Edu.front.topic.edit',$topic) }}"
                                    class="btn btn-outline-success">编辑</a>
                                <btn-del action="{{ route('Edu.front.topic.destroy',$topic) }}"
                                    class-name="btn btn-outline-danger" redirect="{{ route('Edu.front.topic.index') }}">
                                </btn-del>
                                @endcan
                            </div>
                            @auth
                            <div class="btn-group btn-group-sm align-items-center mt-1 mt-md-0">
                                <a href="{{ route('common.favorite',['topic',$topic,'Edu']) }}" type="button"
                                    class="btn {{ $topic->isFavorite?'btn-info':'btn-outline-secondary'}}">
                                    <i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                                </a>
                                <button type="button" class="btn btn-outline-secondary">
                                    {{ $topic->favorite_count }}
                                </button>
                            </div>
                            @can('delete', $topic)
                            <form action="{{ route('Edu.front.topic.destroy',$topic) }}" method="post"
                                class="d-inline-block">
                                @csrf @method('delete')
                                <button class="btn btn-sm btn-outline-secondary" onclick="return confirm('确定删除吗')">
                                    删除
                                </button>
                            </form>
                            @endcan
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="topic-content markdown bg-white text-monospace markdown">
                    {!! $topic->html !!}
                </div>
                <div class="mt-5 text-center border-top border-gary pt-5">
                    <div role="group" aria-label="First group" class="favour btn-group mr-2">
                        <a href="{{ route('common.favour',['topic',$topic,'Edu']) }}"
                            class="btn {{ $topic->isFavour?'btn-success':'btn-outline-success' }}">
                            <i class="fa fa-thumbs-o-up"></i> 点个赞呗
                        </a>
                        <button type="button" class="btn btn-outline-success">
                            {{ $topic->favour_count }}
                        </button>
                    </div>
                </div>
                <div class="favour-list text-center pt-3 w-75 m-auto">
                    @foreach ($topic->favours as $user)
                    <a href="#" class="m-1">
                        <img src="{{ $user->avatar }}" class="rounded-circle w35">
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="mt-3" id="app">
                <comment model="Topic" :id="{{ $topic['id'] }}"></comment>
            </div>

        </div>
        <div class="col-12 col-md-3 p-0">
            @include('edu::components.user',['user'=>$topic->user])
            @include('edu::components.tip')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link href="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/styles/zenburn.min.css" rel="stylesheet">
<script src="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>
<script>
    hljs.initHighlightingOnLoad();
</script>
@endpush
