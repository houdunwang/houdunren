@extends('edu.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                {{$lesson['title']}}
            </div>
            <div class="card-body">
                <div class="pr-md-4">
                    @foreach($lesson->video as $index=>$video)
                        @if(!$video->isLive(auth()->id()))
                            <div class="media mb-3 {{active_class($index+1!= $lesson->video->count(),'u-indicator-ver-dashed')}}">
                                <div class="d-flex mt-1 mr-3">
                                    <span class="u-icon u-icon-brd-secondary u-icon--xs rounded-circle" style="background: #fff;">

                                    </span>
                                </div>
                                <div class="media-body">
                                    <h3 class="h5 text-light" style="font-weight: normal">
                                        <a href="{{route('edu.video.show',$video)}}" class="text-secondary">{{$video->title}}</a>
                                    </h3>
                                </div>
                            </div>
                            @else
                            <div class="media mb-3 {{active_class($index+1!= $lesson->video->count(),'u-indicator-ver-dashed')}}">
                                <div class="d-flex mt-1 mr-3">
                                    <span class="u-icon u-icon-primary u-icon--xs rounded-circle">
                                      <span class="fa fa-check u-icon__inner"></span>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h3 class="h5 text-primary" style="font-weight: normal">
                                        <a href="{{route('edu.video.show',$video)}}" class="text-primary">{{$video->title}}</a>
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
