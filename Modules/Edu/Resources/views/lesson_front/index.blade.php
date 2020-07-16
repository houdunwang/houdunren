@extends('edu::layouts.front')

@section('content')
<div class="container search bg-white mt-5 mb-3 shadow-sm p-4 border">
    <form action="{{ route('Edu.front.lesson.index') }}">
        <div class="input-group">
            <input type="text" name="w" placeholder="请输入搜索关键词" class="form-control">
            <div class="input-group-append">
                <button type="submit" class="input-group-text bg-white">搜索</button>
            </div>
        </div>
    </form>
    <div class="d-flex justify-content-start flex-wrap mt-3 tags">
        <a href="{{ route('Edu.front.lesson.index') }}" class="btn btn-outline-secondary btn-sm mr-3 mb-2">全部</a>
        @foreach ($tags as $tag)
        <a href="{{ route('Edu.front.lesson.index',['tag'=>$tag['title']]) }}"
            class="btn btn-sm mr-3 mb-2 {{ request()->query('tag')===$tag['title']?'btn-secondary':'btn-outline-secondary' }}">
            {{ $tag['title'] }}
        </a>
        @endforeach
    </div>

</div>

<div class="container bg-white p-3 shadow-sm border mb-5">
    <div class="row">
        @foreach ($lessons as $lesson)
        <div class="col-12 col-md-4 lesson mb-4 d-flex flex-column justify-content-between">
            <a href="{{ route('Edu.front.lesson.show',$lesson) }}" class="d-block shadow-sm lesson">
                <div class="card">
                    <div class="card-body p-0"><img src="{{ $lesson['thumb'] }}"></div>
                    <div class="card-body lesson-title">{{ $lesson['title'] }}</div>
                    <div class="card-footer d-flex justify-content-between text-secondary small bg-light">
                        <span>开始学习</span>
                        <span>
                            <i aria-hidden="true" class="fa fa-film ml-3"></i>
                            {{ $lesson['video_num'] }}节课
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="mt-1">
        {{ $lessons->withQueryString()->links() }}
    </div>
</div>

@endsection
