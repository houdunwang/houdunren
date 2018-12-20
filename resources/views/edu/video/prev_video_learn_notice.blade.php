@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-3">
        <div id="SVGdevicesV2" class="gradient-half-primary-v1 u-devices-v2" style="">
            <div class="container space-2 space-md-3 position-relative z-index-2">
                <!-- Title -->
                <div class="w-md-80 w-lg-50 text-center mx-md-auto">
          <span class="btn btn-lg btn-icon btn-white rounded-circle mb-4">
            <span class="fas fa-paper-plane text-primary btn-icon__inner"></span>
          </span>
                    <h2 class="h1 text-white">现在还不能 <span class="font-weight-semi-bold">学习</span>  这个课程</h2>
                    <p class="lead text-white-70 mb-0">
                        为了保障您的学习结果，当前课程需要按顺序学习，<br> 这样做可以让你系统掌握技术，成就目标。
                    </p>
                </div>
                <!-- End Title -->
            </div>

            <!-- Devices v2 -->
            <div class="d-none d-lg-block">
                <!-- SVG Tablet Mockup -->
                <div class="u-devices-v2__tablet">
                    <div class="w-75 u-devices-v2__tablet-svg">

                    </div>
                </div>
                <!-- End SVG Tablet Mockup -->

                <!-- SVG Phone Mockup -->
                <div class="u-devices-v2__phone">
                    <div class="w-75 u-devices-v2__phone-svg">

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="position-relative">
                    <!-- Title -->
                    <div class="w-md-80 w-lg-80 text-center mx-md-auto">
                        <div class="mb-4">
                            <h2 class="h1 text-primary">怎么办 <span class="font-weight-semi-bold">？</span></h2>
                            <p>
                                你需要先学习
                                <a href="{{route('edu.video.show',$prevVideo)}}">{{$prevVideo['title']}}</a>
                                @if ($prevVideo['question'])
                                    并进行课程的 <a href="{{route('edu.video.question.video.show',$prevVideo)}}">考试</a>
                                @endif
                                ，才可以学习本课程。
                            </p>
                        </div>
                        <a class="btn btn-primary transition-3d-hover" href="{{route('edu.video.show',$prevVideo)}}" style="display: inline-block;">
                            马上学习
                        </a>
                    </div>
                    <!-- End Title -->

                </div>
            </div>

        </div>
    </div>
@endsection
