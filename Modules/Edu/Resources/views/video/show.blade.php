@extends('edu::layouts.front')
@section('title',$video['title'])
@section('content')

<div class="video mb-2">
    <div class="container p-0 pl-md-3 pr-md-3">
        <div class="video">
            <video controls>
                <source src="{{ $video->path }}" type="video/mp4">
            </video>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body row">
            <div class="col-12 col-md-7">
                <h5 class="text-secondary"> {{ $video->title }}</h5>
                <a href="{{ route('Edu.front.lesson.show',$video->lesson) }}"
                    class="text-secondary font-weight-light"><i aria-hidden="true" class="fa fa-folder-o"></i>
                    {{ $video->lesson->title }}
                </a>
            </div>
            <div class="col-12 col-md-5 mt-2 mt-md-0 d-flex justify-content-md-end justify-content-start flex-wrap">
                <div class="btn-group btn-group-sm align-items-center mr-1">
                    @if ($video->prev)
                    <a href="{{ route('Edu.front.video.show',$video->prev) }}" class="btn btn-outline-success">上集</a>
                    @endif
                    @if ($video->next)
                    <a href="{{ route('Edu.front.video.show',$video->next) }}" class="btn btn-outline-success">下集</a>
                    @endif
                </div>
                <div class="btn-group btn-group-sm align-items-center">
                    <a href="{{ route('common.favorite',['Video',$video,'Edu']) }}"
                        class="btn {{ $video->isFavorite?'btn-outline-info':'btn-outline-secondary' }}">
                        <i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                    </a>
                    <button type="button"
                        class="btn {{ $video->isFavorite?'btn-outline-info':'btn-outline-secondary' }}">
                        {{ $video->favorite_count }}
                    </button>
                    <a href="{{ route('common.favour',['Video',$video,'Edu']) }}"
                        class="btn {{ $video->isFavour?'btn-outline-success':'btn-outline-secondary' }}">
                        <i aria-hidden="true" class="fa fa-thumbs-o-up"></i> 点赞
                    </a>
                    <button type="button"
                        class="btn {{ $video->isFavour?'btn-outline-success':'btn-outline-secondary' }}">
                        {{ $video->favour_count }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 mt-3">
    <div class="row">
        <div class="col-md-9 mt-2 mt-md-0 order-md-0 mb-3">
            <div id="app">
                <comment model="Video" :id="{{ $video['id'] }}"></comment>
            </div>
        </div>
        <div class="col-md-3 pl-md-0 order-0 order-md-1">
            <div class="card text-secondary">
                <div class="card-header bg-white">课程列表</div>
                <div class="list-group list-group-flush">
                    @foreach ($video->lesson->videos()->oldest('rank')->get() as $video)
                    <a href="{{ route('Edu.front.video.show',$video) }}"
                        class="list-group-item text-secondary">{{ $video->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.bootcdn.net/ajax/libs/video.js/7.9.0/video.min.js"></script>
@endpush
