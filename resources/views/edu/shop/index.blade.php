@extends('edu.layouts.master')
@section('content')
    <main id="content" role="main" class="{{route_class()}}">
        <div class="position-relative u-gradient-half-primary-v1">
            <div class="container u-space-4 pt-5">
                <div class="w-md-80 w-lg-60 text-center mx-auto  pt-5">
                    <div class="mb-6 pt-5">
                        <h1 class="text-white">
                             <span class="font-weight-bold">
                                 {{--投资学习会得到加倍的回报--}}
                                 一件衣服的投入获得一个赚钱的技能
                             </span>
                        </h1>
                        <h3 class="text-white">
                            订阅会员免费观看所有视频
                        </h3>
                        <h5 class="text-white" style="font-size: 14px;">
                            半年付499元 / 全站{{$videoCount = \App\Models\EduVideo::count()}}个视频 = {{round(499/$videoCount,2)}} 元 （超合算）
                        </h5>
                    </div>
                </div>
            </div>

            <figure class="w-75 w-sm-50 w-lg-30 position-absolute-top-left-0 z-index-minus-1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 603.8 550.5" style="enable-background:new 0 0 603.8 550.5;" xml:space="preserve">
                  <path class="u-fill-white" opacity=".025"
                        d="M0,276.4l278,257.4c25.3,23.5,65.3,21.9,88.8-3.4l220.4-238c23.5-25.3,21.9-65.3-3.4-88.8L363.8,0H0V276.4z"></path>
                </svg>
            </figure>
            <figure class="w-50 w-sm-35 w-lg-25 position-absolute-bottom-right-0 z-index-minus-1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 440.8 727.4" style="enable-background:new 0 0 440.8 727.4;" xml:space="preserve">
          <path class="u-fill-white" opacity=".1"
                d="M440.8,123.1l-115-106.5c-25.3-23.5-65.3-21.9-88.8,3.4L16.7,258c-23.5,25.3-21.9,65.3,3.4,88.8l395.7,366.5c7.4,6.8,16,11.5,25,14.1V123.1z"></path>
        </svg>
            </figure>
            <!-- End SVG Background Shapes - Bottom Right -->

            <!-- SVG Background -->
            <figure class="position-absolute-bottom-0">
                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="140px" viewBox="20 -20 300 100">
                    <path class="u-fill-white" opacity="0.4" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
      c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z"></path>
                    <path class="u-fill-white" opacity="0.4" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
      c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z"></path>
                    <path class="u-fill-white" opacity="0" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
      H42.401L43.415,98.342z"></path>
                    <path class="u-fill-white" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
      c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z"></path>
                </svg>
            </figure>
        </div>
        <div class="position-relative u-pricing-v2-wrapper z-index-2">
            <div class="container">
                <div class="u-space-3-bottom">
                    <!-- Pricing Carousel -->
                    <div id="pricingMonthly" data-target-group="idPricing">
                        <div class="js-slick-carousel u-slick u-slick--gutters-2 z-index-2 slick-initialized slick-slider slick-dotted"
                             data-slides-show="4" data-slides-scroll="1"
                             data-pagi-classes="d-lg-none text-center u-slick__pagination mt-7 mb-0" data-responsive="[{
                   &quot;breakpoint&quot;: 1200,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 3
                   }
                 }, {
                   &quot;breakpoint&quot;: 992,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 2
                   }
                 }, {
                   &quot;breakpoint&quot;: 768,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 1
                   }
                 }, {
                   &quot;breakpoint&quot;: 554,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 1
                   }
                 }]">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1128px; transform: translate3d(0px, 0px, 0px);">
                                    @foreach(\App\Models\EduShop::orderBy('price','ASC')->where('status',1)->get() as $shop)
                                        <div class="shop js-slide slick-slide slick-current slick-active" data-slick-index="0"
                                             aria-hidden="false" style="width: 266px; height: auto;" tabindex="0"
                                             role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00">
                                            <div class="u-pricing-v2 transition-3d-hover">
                                                <header class="u-pricing-v2__header">
                                                    <h2 class="h6 text-primary" style="font-size: 80px;">
                                                        <i class="{{$shop['icon']}}" aria-hidden="true"></i>
                                                    </h2>
                                                    <span class="d-block">
                                                      <span class="price display-4 text-dark font-weight-normal">
                                                          {{substr($shop['price'],0,-3)}}
                                                      </span>
                                                      <span class="small">元</span>
                                                      <span class="d-block text-secondary font-size-14 month">{{$shop['title']}}</span>
                                                    </span>
                                                </header>
                                                <div class="u-pricing-v2__content">
                                                    <ul class="list-unstyled mb-4">
                                                        <li class="u-pricing-v2__list-item py-2 text-center" style="font-size:20px;">{{$shop['description']}}</li>
                                                    </ul>
                                                    <a href="{{route('edu.shop.pay',$shop)}}"
                                                            class="btn btn-sm btn-block u-btn-primary--air u-btn-primary transition-3d-hover"
                                                            tabindex="0">
                                                        去支付宝付款
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                            <ul class="js-pagination d-lg-none text-center u-slick__pagination mt-7 mb-0"
                                role="tablist">
                                <li class="slick-active slick-current" role="presentation"><span></span></li>
                            </ul>
                        </div>
                    </div>
                    <div id="pricingYearly" style="display: none; opacity: 0;" data-target-group="idPricing">
                        <div class="js-slick-carousel u-slick u-slick--gutters-2 z-index-2 slick-initialized slick-slider slick-dotted"
                             data-slides-show="4" data-slides-scroll="1"
                             data-pagi-classes="d-lg-none text-center u-slick__pagination mt-7 mb-0" data-responsive="[{
                   &quot;breakpoint&quot;: 1200,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 3
                   }
                 }, {
                   &quot;breakpoint&quot;: 992,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 2
                   }
                 }, {
                   &quot;breakpoint&quot;: 768,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 1
                   }
                 }, {
                   &quot;breakpoint&quot;: 554,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 1
                   }
                 }]">
                            <div class="slick-list draggable">
                                <div class="slick-track"
                                     style="opacity: 1; width: 0px; transform: translate3d(0px, 0px, 0px);">
                                    <div class="js-slide slick-slide slick-current slick-active" data-slick-index="0"
                                         aria-hidden="false" style="width: 0px; height: auto;" tabindex="0"
                                         role="tabpanel" id="slick-slide10" aria-describedby="slick-slide-control10">
                                        <!-- Pricing v2 -->
                                        <div class="u-pricing-v2 transition-3d-hover">
                                            <!-- Header -->
                                            <header class="u-pricing-v2__header">
                                                <h4 class="h6 text-primary mb-3">Starter</h4>
                                                <span class="d-block">
                      <span class="display-4 text-dark font-weight-normal">
                        <span class="align-top font-size-26">$</span>242
                      </span>
                      <span class="d-block text-secondary font-size-14">per month</span>
                    </span>
                                            </header>
                                            <!-- End Header -->

                                            <!-- Content -->
                                            <div class="u-pricing-v2__content">
                                                <ul class="list-unstyled mb-4">
                                                    <li class="u-pricing-v2__list-item py-2">Community support</li>
                                                    <li class="u-pricing-v2__list-item py-2">400+ pages</li>
                                                </ul>

                                                <button type="button"
                                                        class="btn btn-sm btn-block u-btn-primary--air u-btn-primary transition-3d-hover"
                                                        tabindex="0">Start Starter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-slide slick-slide slick-active" data-slick-index="1"
                                         aria-hidden="false" style="width: 0px; height: auto;" tabindex="0"
                                         role="tabpanel" id="slick-slide11" aria-describedby="slick-slide-control11">
                                        <div class="u-pricing-v2 transition-3d-hover">
                                            <header class="u-pricing-v2__header">
                                                <h4 class="h6 text-warning mb-3">Basic</h4>
                                                <span class="d-block">
                                                  <span class="display-4 text-dark font-weight-normal">
                                                    <span class="align-top font-size-26">$</span>442
                                                  </span>
                                                  <span class="d-block text-secondary font-size-14">per month</span>
                                                </span>
                                            </header>
                                            <div class="u-pricing-v2__content">
                                                <ul class="list-unstyled mb-4">
                                                    <li class="u-pricing-v2__list-item py-2">Community support</li>
                                                    <li class="u-pricing-v2__list-item py-2">400+ pages</li>
                                                    <li class="u-pricing-v2__list-item py-2">100+ header variations</li>
                                                </ul>
                                                <button type="button"
                                                        class="btn btn-sm btn-block u-btn-primary--air u-btn-primary transition-3d-hover"
                                                        tabindex="0">Start Basic
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-slide slick-slide slick-active" data-slick-index="2"
                                         aria-hidden="false" style="width: 0px; height: auto;" tabindex="0"
                                         role="tabpanel" id="slick-slide12" aria-describedby="slick-slide-control12">
                                        <div class="u-pricing-v2 transition-3d-hover">
                                            <header class="u-pricing-v2__header">
                                                <h4 class="h6 text-success mb-3">Company</h4>
                                                <span class="d-block">
                                                  <span class="display-4 text-dark font-weight-normal">
                                                    <span class="align-top font-size-26">$</span>1089
                                                  </span>
                                                  <span class="d-block text-secondary font-size-14">per month</span>
                                                </span>
                                            </header>
                                            <div class="u-pricing-v2__content">
                                                <ul class="list-unstyled mb-4">
                                                    <li class="u-pricing-v2__list-item py-2">Community support</li>
                                                    <li class="u-pricing-v2__list-item py-2">400+ pages</li>
                                                    <li class="u-pricing-v2__list-item py-2">100+ header variations</li>
                                                    <li class="u-pricing-v2__list-item py-2">20+ home page options</li>
                                                </ul>
                                                <button type="button"
                                                        class="btn btn-sm btn-block u-btn-primary--air u-btn-primary transition-3d-hover"
                                                        tabindex="0">Start Free Trial
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-slide slick-slide slick-active" data-slick-index="3"
                                         aria-hidden="false" style="width: 0px; height: auto;" tabindex="0"
                                         role="tabpanel" id="slick-slide13" aria-describedby="slick-slide-control13">
                                        <div class="u-pricing-v2 transition-3d-hover">
                                            <header class="u-pricing-v2__header">
                                                <h4 class="h6 text-danger mb-3">Enterprise</h4>
                                                <span class="d-block">
                      <span class="h2 text-dark font-weight-normal">
                        Contact Us
                      </span>
                      <span class="d-block text-secondary font-size-14">no user limit</span>
                    </span>
                                            </header>
                                            <div class="u-pricing-v2__content">
                                                <ul class="list-unstyled mb-4">
                                                    <li class="u-pricing-v2__list-item py-2">Community support</li>
                                                    <li class="u-pricing-v2__list-item py-2">400+ pages</li>
                                                    <li class="u-pricing-v2__list-item py-2">100+ header variations</li>
                                                    <li class="u-pricing-v2__list-item py-2">20+ home page options</li>
                                                    <li class="u-pricing-v2__list-item py-2">Priority Support</li>
                                                </ul>

                                                <button type="button"
                                                        class="btn btn-sm btn-block btn-warning u-btn-warning transition-3d-hover"
                                                        tabindex="0">Contact Us
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="js-pagination d-lg-none text-center u-slick__pagination mt-7 mb-0"
                                role="tablist">
                                <li class="slick-active slick-current" role="presentation"><span></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-80 mx-auto">
                    <hr class="my-0">
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.scrollTo('body', '#content', 1000, {queue: true});
        });
    </script>
@endpush