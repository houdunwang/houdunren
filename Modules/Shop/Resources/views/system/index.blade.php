@extends('shop::layouts.master')
@section('content')
    <div class="mb-2 pb-5"></div>
    <div class="home">
        <div class="container-fluid border-bottom pb-3 shadow plan">
            <div class="container pt-sm-5 pb-sm-5">
                <div class="row">
                    <div class="col-sm-4 col-12 pt-5 pb-sm-5 mb-5">
                        <h3 class="pt-5">
                            专业的企业多端解决方案
                        </h3>
                        <p class="text-secondary mb-5">
                            {{\module()['title']}}可以快速帮助企业构建PC/手机/微信/小程序应用，
                            并且100%开源免费可随便用在任何商业用途。

                        </p>
                        <a href="" class="btn btn-primary mr-2">下载产品</a>
                        <a href="" class="btn btn-outline-primary">在线手册</a>
                    </div>
                    <div class="col-8 banner">
                        <div class="b-5 h-100 d-flex flex-column">
                            <span hidden>头部底图</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-white pt-sm-5 pt-5 pb-sm-3 shadow-sm">
            <div class="container pt-sm-5 pb-sm-5">
                <h2 class="text-center col-12 mb-3">互联网应用集成解决方案</h2>
                <div class="align-items-center">
                    <blockquote class="text-center col-sm-8 col-12 m-auto text-secondary">
                        系统是以开放的生态运行，功能不仅仅局限于系统内部。采用模块化开发思想任意插拔应用模块，也可以将解决方案上传应用商店获得。
                        提供对中小企业友好的解决方案，为软件工程师二次获得的支持平台。
                    </blockquote>
                </div>
                <div class="row mt-sm-5 pt-sm-5 pb-sm-5">
                    <div class="col-12 col-sm-4 mt-2 border-right text-center">
                           <i class="fa fa-wifi fa-4x"></i>
                        <h5 class="pt-3 pb-3 text-center">功能丰富</h5>
                           <p>
                               系统内置丰富功能，从权限控制、应用套餐、站群管理等众多功能，应用商店也为站点提供众多可扩展功能。
                           </p>
                    </div>
                    <div class="col-12 col-sm-4 mt-2 border-right text-center">
                        <i class="fa fa-free-code-camp fa-4x"></i>
                        <h5 class="pt-3 pb-3 text-center">开源免费</h5>
                        <p>
                            不用担心版权问题，软件开源免费提供使用，可用于任何网站。系统内部使用的软件均为MIT协议，不用任何投入获取我们团队持久支持。
                        </p>
                    </div>
                    <div class="col-12 col-sm-4 mt-2 text-center">
                        <i class="fa fa-cubes fa-4x"></i>
                        <h5 class="pt-3 pb-3  text-center">持续升级</h5>
                        <p class=" text-center">
                            每周功能迭代升级，周周有惊喜，我们只在为了打造可靠、易用的产品。解决用户燃眉之急是我们不变的守则。
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="application">
            <div class="container pt-sm-3 pt-0 pb-sm-3 pb-0 border-top border-bottom">
                <div class="row pt-5 pb-5">
                    <div class="col-sm-4 col-12 pt-sm-5 pb-sm-5">
                        <h3 class="mb-5 pt-3 text-sm-left text-center">覆盖全面的企业应用场景</h3>
                        <p class="mb-5">
                            不论是开发企业网站、微站、商城、社区SNS应用，{{\module()['title']}}内置了丰富的功能。由原来几个月的开发周期缩短为几天。
                        </p>
                        <div class="row pb-3">
                            <div class="col-sm-4 col-4 mt-2">
                                <h5>
                                    <i class="fa fa-user-plus fa-1x d-inline-block border pt-2 pb-2 pl-sm-3 pl-2 pr-2 pr-sm-3 mr-2 rounded text-secondary"></i> 教育
                                </h5>
                            </div>
                            <div class="col-sm-4 col-4 mt-2">
                                <h5>
                                    <i class="fa fa-home fa-1x d-inline-block border pt-2 pb-2 pl-sm-3 pl-2 pr-2 pr-sm-3 mr-2 rounded text-secondary"></i> 房产
                                </h5>
                            </div>
                            <div class="col-sm-4 col-4 mt-2">
                                <h5>
                                    <i class="fa fa-shopping-bag fa-1x d-inline-block border pt-2 pb-2 pl-sm-3 pl-2 pr-2 pr-sm-3 mr-2 rounded text-secondary"></i> 商城
                                </h5>
                            </div>
                            <div class="col-sm-4 col-4 mt-2">
                                <h5>
                                    <i class="fa fa-sitemap fa-1x d-inline-block border pt-2 pb-2 pl-sm-3 pl-2 pr-2 pr-sm-3 mr-2 rounded text-secondary"></i> 站群
                                </h5>
                            </div>
                            <div class="col-sm-4 col-4 mt-2">
                                <h5>
                                    <i class="fa fa-shopping-basket fa-1x d-inline-block border pt-2 pb-2 pl-sm-3 pl-2 pr-2 pr-sm-3 mr-2 rounded text-secondary"></i> 餐饮
                                </h5>
                            </div>
                            <div class="col-sm-4 col-4 mt-2">
                                <h5>
                                    <i class="fa fa-wechat fa-1x d-inline-block border pt-2 pb-2 pl-sm-3 pl-2 pr-2 pr-sm-3 mr-2 rounded text-secondary"></i> 社区
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-12 scenario">

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-sm-5 pb-sm-5 border-top bg-white shadow-lg">
            <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col-sm-6 col-12 soft p-5 text-center">
                        <div class="p-sm-5 m-sm-6 p-5"></div>
                        <div class="p-sm-5 m-sm-6 p-3"></div>
                        <div class="p-sm-5 m-sm-6"></div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5 col-12 mt-3 mt-sm-0">
                        <h3 class="mb-3 text-success text-sm-left text-center">丰富的功能模块</h3>
                        <p class="text-secondary">
                            你的应用不需要开发，可以直接从应用商店下载已经存在模块，帮助企业快速拥有想要的功能。

                            开发者也可以发布模块到应用商店，获取可观的开发收入
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid border-top bg-light mb-5 pt-5 pb-sm-5">
            <div class="container pt-sm-5 pb-sm-5">
                <h3 class="text-center mb-3 text-dark">丰富的系统功能</h3>
                <p class="text-center mb-5">
                    统提供了上百种丰富的功能，开发桌面、微信或小程序都是无比简单
                </p>
                <div class="row">
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-cubes fa-3x border rounded badge-primary text-white p-2 pl-2 pr-2"></i>
                        <h6 class="mt-3">功能套餐化</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-android fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">阿里云整合</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-youtube fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">多站点管理</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-area-chart fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">支付宝/微信</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-user-md fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">多级会员组</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-sitemap fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">全站权限控制</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-tencent-weibo fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">企业微官网</h6>
                    </div>
                    <div class="col-3  col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-wechat fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">微信公众号</h6>
                    </div>
                    <div class="col-3  col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-cube fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">终端自动识别</h6>
                    </div>
                    <div class="col-3   col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-windows fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">系统自动升级</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-calendar fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">全站缓存控制</h6>
                    </div>
                    <div class="col-3 col-sm-2 text-center mb-sm-5">
                        <i class="fa fa-inbox fa-3x border rounded badge-primary text-white p-2 pl-3 pr-3"></i>
                        <h6 class="mt-3">模块化扩展</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5 bg-primary p-5 text-center mt-5">
<a  class="btn btn-light text-primary">视频教程</a>
            <p class="text-white mt-5">
                我们提供了全面细致的视频教程，帮助你轻松掌握{{\module()['title']}}的使用
            </p>
        </div>
        <div class="container-fluid bg-dark">
            <div class="container">
                <div class="text-center p-5 text-secondary">
                    我们的使命：帮助中小企业快速实现互联网价值,增长企业效益!11
                    <hr>
                    Copyright © 2010-2016 hdcms.com All Rights Reserved 京ICP备京ICP备12048441号-7
                </div>
            </div>
        </div>
    </div>
@endsection