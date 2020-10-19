@extends('edu::layouts.front')
@section('title',$topic['title'])
@section('content')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-12 col-md-9 mb-3">
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
              更新于{{ $topic->updated_at->diffForHumans() }}
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
                <a href="{{ route('Edu.front.topic.edit',$topic) }}" class="btn btn-outline-success">编辑</a>
                @endcan
              </div>
              @auth
              <div class="btn-group btn-group-sm align-items-center">
                <a href="{{ route('common.favorite',['topic',$topic,'Edu']) }}" type="button"
                  class="btn {{ $topic->isFavorite?'btn-info':'btn-outline-secondary'}}">
                  <i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                </a>

                <button type="button" class="btn btn-outline-secondary">
                  {{ $topic->favorite_count }}
                </button>
                @can('delete', $topic)
                <form action="{{ route('Edu.front.topic.destroy',$topic) }}" method="post" class="d-inline-block ml-1">
                  @csrf @method('delete')
                  <button class="btn btn-sm btn-outline-secondary" onclick="return confirm('确定删除吗')">
                    删除
                  </button>
                </form>
                @endcan
              </div>
              @endauth
            </div>
          </div>
        </div>
        <div class="topic-content markdown bg-white text-monospace">
          {!! clean($topic->html) !!}
        </div>

        <livewire:favour :model="$topic">
      </div>

      <div class="mt-3" id="app">
        <comment model="Topic" :id="{{ $topic['id'] }}"></comment>
      </div>
    </div>
    <div class="col-12 col-md-3">
      @include('edu::components.user',['user'=>$topic->user])
      @include('edu::components.tip')
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  hljs.initHighlightingOnLoad();
</script>
@endpush
