@inject('category','Modules\Article\Entities\Category')

@extends('layouts.master')
@section('content')
<div class="mt-8 shadow-md">
    {{-- @if(\Browser::isMobile())
    @else
    @swiper(id="1")
    @endif --}}
    @include('components.swiper',['id'=>1,'delay'=>5000])
</div>
<div class="md:grid md:grid-cols-2 md:gap-5 mt-5">
    @foreach($category::get() as $category)
    <div class="card mt-5 md:mt-0">
        <div class="card-header flex justify-between items-center">
            {{ $category['title'] }}
            <a href="{{ route('article.category',$category) }}">
                more
            </a>
        </div>
        <div class="card-body">
            <ul>
                @foreach($category->contents()->limit(5)->get() as $content)
                <li class="flex justify-between py-2">
                    <a href="{{ route('article.content',$content) }}">
                        {{ mb_substr($content['title'],0,\Browser::isMobile()?30:50,'utf-8') }}
                    </a>
                    <span class="text-xs text-gray-500">
                        {{ $content->updated_at->diffForHumans() }}
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
