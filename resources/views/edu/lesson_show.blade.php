@extends('edu.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="justify-content-between">
                    {{$lesson['title']}}

                    @if($lesson->isFavorite(auth()->user()))
                        <a href="{{route('common.favorite.make',['model'=>'EduLesson','id'=>$lesson['id']])}}"
                           class="btn u-btn-primary--air transition-3d-hover btn-xs float-right">
                            <i class="fa fa-heart-o" aria-hidden="true"></i> 已收藏
                        </a>
                    @else
                        <a href="{{route('common.favorite.make',['model'=>'EduLesson','id'=>$lesson['id']])}}"
                           class="btn u-btn-secondary--air transition-3d-hover btn-xs float-right">
                            <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏课程
                        </a>
                    @endif
                    <a href="javascript:;" onclick="hideLesson()"
                       class="btn btn-xs btn-light u-btn-light transition-3d-hover btn-xs float-right mr-2">
                        隐藏学习过的课程
                    </a>
                    @push('js')
                        <script>
                            function hideLesson() {
                                $(".isLive").toggle();
                            }
                        </script>
                    @endpush
                </div>
            </div>
            <div class="card-body">
                <div class="pr-md-4">
                    @foreach($lesson->video as $index=>$video)
                        @if(!$video->isLive(auth()->id()))
                            <div class="media mb-3 {{active_class($index+1!= $lesson->video->count(),'u-indicator-ver-dashed')}}">
                                <div class="d-flex mt-1 mr-3">
                                    <span class="u-icon u-icon-brd-secondary u-icon--xs rounded-circle"
                                          style="background: #fff;">

                                    </span>
                                </div>
                                <div class="media-body">
                                    <h3 class="h5 text-light" style="font-weight: normal">
                                        <a href="{{route('edu.video.show',$video)}}"
                                           class="text-secondary">{{$video->title}}</a>
                                    </h3>
                                </div>
                            </div>
                        @else
                            <div class="isLive media mb-3 {{active_class($index+1!= $lesson->video->count(),'u-indicator-ver-dashed')}}"
                                 >
                                <div class="d-flex mt-1 mr-3">
                                    <span class="u-icon u-icon-primary u-icon--xs rounded-circle">
                                      <span class="fa fa-check u-icon__inner"></span>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h3 class="h5 text-primary" style="font-weight: normal">
                                        <a href="{{route('edu.video.show',$video)}}"
                                           class="text-primary">{{$video->title}}</a>
                                    </h3>
                                </div>
                            </div>
                    @endif
                @endforeach
                <!-- End Info -->
                    <!-- Info -->

                    <!-- End Info -->

                </div>
            </div>
        </div>
    </div>
@endsection
