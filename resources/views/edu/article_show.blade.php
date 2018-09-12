@extends('edu.layouts.master')
@section('content')
    <div class="row {{hd_route_class()}} mt-3">
        <div class="col-12 col-xl-9">
            <div class="card card-body p-5">
                @auth
                <div class="row">
                    <div class="col text-right">
                        @if($article->isFavorite(auth()->user()))
                            <a href="{{route('common.favorite.make',['article',$article])}}" class="btn btn-info btn-sm">
                                <span class="fe fe-heart mr-0"></span> 已经收藏</a>
                        @else
                            <a href="{{route('common.favorite.make',['article',$article])}}" class="btn btn-white btn-sm">
                                <span class="fe fe-bookmark mr-0"></span> 收藏</a>
                        @endif
                    </div>
                </div>
                @endauth
                <div class="row">
                    <div class="col text-center">
                        {{--<img src="{{$article->user->icon}}" alt="..." class="img-fluid mb-4" style="max-width: 2.5rem;">--}}
                        <h2 class="mb-4">
                            {{$article['title']}}
                        </h2>
                        <p class="text-muted mb-1 text-muted small">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{$article->updated_at->diffForHumans()}}
                            <i class="fa fa-comment-o ml-2" aria-hidden="true"></i> 30
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="my-5">
                        <p class="text-dark mb-0 content">
                            {{$article['content']}}
                        </p>
                        <div class="mt-5 text-center">
                            @auth
                                @if($article->zan->contains(auth()->user()))
                                    <a href="{{route('common.zan.make',['model'=>'article','id'=>$article])}}" class="btn btn-info mb-4">
                                        <span class="fe fe-thumbs-up"></span> 感谢点赞
                                    </a>
                                @else
                                    <a href="{{route('common.zan.make',['model'=>'article','id'=>$article])}}" class="btn btn-white mb-4">
                                        <span class="fe fe-thumbs-up"></span> 点个赞呗
                                    </a>
                                @endif
                            @endauth
                            <div>
                                @foreach($zans as $user)
                                    <div class="avatar">
                                        <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @include('common.comment',['model'=>$article])
        </div>
        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-header">
                    {{$article->user->name}}
                </div>
                <div class="card-block text-center p-5">
                    <div class="avatar avatar-xl">
                        <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </div>
                @can('follow',$article->user)
                    <div class="card-footer text-muted">
                        @if(auth()->user()->following($article->user))
                            <a class="btn btn-info btn-block btn-xs" href="{{route('member.follow',$article->user->id)}}">
                                已经关注
                            </a>
                        @else
                            <a class="btn btn-white btn-block btn-xs" href="{{route('member.follow',$article->user->id)}}">
                                <i class="fa fa-plus" aria-hidden="true"></i> 关注 TA
                            </a>
                        @endif
                    </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush
