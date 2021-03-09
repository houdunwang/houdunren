@extends('layouts.master')

@section('content')
<div class="md:flex">
    <div class="md:w-9/12 md:pr-5">
        <div class="card">
            <div class="card-header flex-col items-start">
                {{ $content->title }}
                <div class="text-xs text-gray-500 mt-3 pt-3 w-full">
                    阅读：{{ $content->click }} 次 / 发表时间:{{ $content->created_at }} /
                    <a href="{{ route('article.category',$content->category) }}" class="text-blue-600">
                        {{ $content->category->title }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                {!! $content->content !!}
            </div>
        </div>
        <div class="mt-5">
            @include('components.imagearticle',['limit'=>5])
        </div>
    </div>
    <div class="md:w-3/12 mt-5 md:mt-0">
        @include('components.newarticle')
    </div>
</div>
@endsection
