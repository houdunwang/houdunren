@extends('edu::layouts.front')
@section('title','最近更新视频')
@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-header bg-white">最近更新</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($videos as $video)
                        <li class="list-group-item pl-0 d-flex justify-content-between">
                            <a href="{{ route('Edu.front.video.show',$video) }}">{{ $video['title'] }}</a>
                            <span data-v-c6b61c04=""
                                class="small text-secondary">{{ $video->created_at->diffForHumans() }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-2">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 pl-md-0">
            <div class="card rounded shadow-sm mb-2">
                <div class="card-header bg-white text-muted"><i aria-hidden="true"
                        class="fa fa-check-circle-o mr-1"></i>
                    社区小贴
                </div>
                <div class="card-body font-weight-light">后盾人是一个主张友好、分享、自由的技术交流社区。</div>
                <div class="card-footer text-muted bg-white text-center">
                    <div class="d-flex justify-content-between"><a href="/topic/create"
                            class="btn btn-outline-success btn-sm flex-fill"><i class="fa fa-pencil-square-o"></i> 发贴交流
                        </a> <a href="/sign" class="btn btn-outline-danger btn-sm flex-fill ml-2"><i aria-hidden="true"
                                class="fa fa-flag"></i>
                            签到打卡
                        </a></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
