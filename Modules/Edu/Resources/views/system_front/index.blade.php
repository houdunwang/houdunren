@extends('edu::layouts.front')
@section('title','系统课程')
@section('content')
<div class="container mt-5 bg-white border shadow-sm pb-5 pt-4 mb-5">
    <div class="card bg-white border-0">
        <div class="card-header bg-white d-block h-100">
            <h5 class="text-secondary mt-2">系统学习</h5>
            <p class="text-secondary">通过系统课程全面掌握一门语言或软件的使用，尤其适合刚入门的新手系统牢固的掌握知识。</p>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($systems as $system)
                <div class="col-12 col-md-4 mb-2">
                    <a href="{{ route('Edu.front.system.show',$system) }}">
                        <div class="card">
                            <img src="{{ $system->preview }}">
                            <div class="card-footer bg-white text-center p-4 text-muted d-flex justify-content-center">
                                {{ $system->title }}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
