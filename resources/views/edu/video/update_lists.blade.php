@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-3">
        <div class="row  justify-content-center">
            <div class="col-10">
                <div class="card mb-2">
                    <div class="card-header bg-secondary text-white">
                        更新列表
                    </div>
                </div>
                <ul class="list-unstyled mb-0" style="border-bottom: 1px solid #e7eaf3;">
                    @foreach($videos as $video)
                        <li class="mt-0 edu-dynamic-list">
                            <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
                                <div class="row justify-content-sm-between align-items-sm-center">
                                    <div class="col-sm-9 mb-2 mb-sm-0 item">
                                        <a href="{{route('edu.video.show',$video)}}" class="text-secondary">
                                            {{$video->title}}
                                        </a>
                                    </div>
                                    <span class="col-sm-3 text-text text-sm-right small text-secondary">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{$video->created_at->format('Y-m-d')}}
                                </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    @if($videos->total()>1)
                        <li class="mt-0">
                            <div class="u-info-v1 p-3 border-bottom-0 rounded-0">
                                <div class="row justify-content-sm-between align-items-sm-center">
                                    <div class="col-sm-10 mb-2 mb-sm-0" style="font-size: 14px;">
                                        {!! $videos->links() !!}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
