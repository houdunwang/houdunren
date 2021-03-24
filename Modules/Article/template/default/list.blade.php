@extends('layouts.master')

@section('content')
{{-- 图片文章 --}}
<div class="mb-5">
    @include('components.imagearticle',['limit'=>10])
</div>

@php
$contents = $category->contents()->paginate(15)
@endphp
<div class="md:flex ">
    <div class="md:w-9/12 md:pr-5">
        <div class="card">
            <div class="card-header">
                {{ $category->title }}
            </div>
            <div class="card-body">
                @foreach($contents as $content)
                <li class="flex justify-between py-2 border-b border-gray-200">
                    <a href="{{ route('article.content',$content) }}">
                        <div class="text-gray-700 font-bold py-2"> {{ $content->title }}</div>
                        <div class="flex">
                            @if($content->preview)
                            <img src="{{ $content->preview }}" class="w-20 h-20 object-cover mr-2">
                            @endif
                            {{ $content['description'] }}
                        </div>
                    </a>
                    <span class="text-xs text-gray-500">
                        {{ $content->updated_at->diffForHumans() }}
                    </span>
                </li>
                @endforeach
            </div>
            <div class="card-footer text-muted">
                {{ $contents->links() }}
            </div>
        </div>
    </div>
    <div class="md:w-3/12 mt-5 md:mt-0">
        @include('components.newarticle')
    </div>
</div>

@endsection
