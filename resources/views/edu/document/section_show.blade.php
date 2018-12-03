@extends('layouts.web')
@section('menu')
    @include('edu.layouts._menu')
@endsection
@section('content')
    <div class="container mt-5 {{route_class()}}">
        <div class="" id="left-menu">
            <div class="card mb-0 ">
                <div class="card-body text-secondary left-menu">
                    @foreach($section->chapter->document->chapter as $chapter)
                        <li class="pt-2 pb-2 "><span class="text-secondary ">{{$chapter['title']}}</span></li>
                        @foreach($chapter->section as $leftSection)
                            <li class="pt-2 pb-2 "><a title="{{$leftSection['title']}}" class="text-secondary ml-3" href="{{route('edu.section.show',$leftSection)}}">{{$leftSection['title']}}</a></li>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="nav-item d-none d-md-block">
            <div class="nav-link nav-menu-main menu-toggle hidden-xs is-active" id="left-menu-btn">
                <i class="fa fa-bars"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-9 left_document" style="float: left">
                <div class="card p-2">
                    <div class="card-header">
                        <h4 class="mb-4 chapter">
                            <i class="fe fe-book-open"></i>
                            <span class="text-muted">{{$section->chapter->title}}</span>
                        </h4>
                        <span class="document">
                            <span><a class="text-muted" href="{{route('edu.document.show',$section->chapter->document)}}">{{$section->chapter->document->title}} </a></span>
                            <span class="text-muted ml-2 mr-2 ">/</span>
                            <span class=""><a href="" class="text-muted"> {{$section->title}}</a></span>
                        </span>
                    </div>
                    <div class="card-body">
                        <div id="markdown" class=" editormd-html">
                            <textarea hidden>{{$section['content']}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-3 " style="float: left;position: relative;">
                <div class="card tab_fix mb-0  " id="right-menu">
                    <div class="card-body right-menu"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs', 'marked', 'MarkdownIt', 'highlight'], function (hdjs, marked, MarkdownIt) {
            //解析markdown语法
            let md = new MarkdownIt();
            $('#markdown').html(md.render($('#markdown textarea').val()))
            // 代码高亮
            $(document).ready(function () {
                $('pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });
            //右侧提取h2-h4标题
            $("#markdown").find('h2,h3,h4').each(function (i, item) {
                var tag = $(item).get(0).localName;
                $(item).attr("id", "wow" + i);
                $(".right-menu").append('<li class="pt-2 pb-2 "><a id="#wow' + i + '" class="new' + tag + ' text-secondary wow'+i+'" href="javascript:;">' + $(this).text() + '</a></li>');
                $(".newh2").css("margin-left", 0);
                $(".newh3").css("margin-left", '0.9rem');
                $(".newh4").css("margin-left", '1.8rem');
            });

            //滚动条事件
            var right_default_leave_top_height = $('#right-menu').offset().top;
            var right_default_height = $('#right-menu').height();

                $(window).scroll(function () {
                    //获取浏览器高度
                    var browser_height = $(document).height();
                    // 获取当前窗口高度
                    var window_height = $(window).height();
                    // 定义滚动条高度
                    var scoll_height = $(window).scrollTop();
                    // 获取左侧文档区域内容高度
                    var left_document_height = $('.left_document').height();
                    //获取右侧菜单高度
                    var right_document_height = $('.right_document').height();
                    // 获取左侧文档区域底部距离当前窗口高度
                    var left_document_bottom_leave_top = $('.left_document').offset().top - scoll_height + left_document_height;
                    //右侧距离顶部的高度
                    var right_top_leave_top = $('#right-menu').offset().top;
                    // 如果左侧文档底部距离顶部高度等于当前窗口高度，将右侧定位的位置进行调整
                    if (left_document_height + $('.left_document').offset().top <= right_top_leave_top + right_default_height) {
                        $('#right-menu').css({'top': right_default_leave_top_height});
                        $('#right-menu').css({'bottom': +(window_height - left_document_bottom_leave_top) + 'px'});
                    }
                    //左侧内容区域滚动，右侧菜单跟着滚动
                    $("#markdown").find('h2,h3,h4').each(function (i, item) {
                            if($('#wow'+i).offset().top - scoll_height >0 && $('#wow'+i).offset().top - scoll_height<30){
                                // $('#right-menu li').find('a[id=#'+$(this).attr('id') + ']').parents('li').addClass('bg-light');
                                $('#right-menu li').find('.wow'+i).parents('li').addClass('bg-light');
                                $('#right-menu li').find('.wow'+i).parents('li').siblings('li').removeClass('bg-light');
                                // $('#right-menu').scrollTo()
                            }
                    });
                });
            //右侧按钮单击选中
            $('.right-menu li').click(function () {
                $(this).addClass('bg-light').siblings('li').removeClass('bg-light');
                hdjs.scrollTo('body', $(this).find('a').attr('id'), 1500, {queue: true, offset: -40});
            });
            //左侧菜单展开/收起
            var status = 1;
            $('#left-menu-btn').click(function () {
                if (status == 1) {
                    $('#left-menu').animate({
                        left: '0'
                    });
                    $('#left-menu-btn').animate({
                        left: '200px'
                    })
                    status = 2;
                } else {
                    $('#left-menu').animate({
                        left: '-200px'
                    });
                    $('#left-menu-btn').animate({
                        left: '0'
                    })
                    status = 1;
                }

            })
        })

    </script>
@endpush
@push('css')
    <style>
        html, body {
            height: 100%;
            width: 100%
        }

        #right-menu {
            max-height: 80%;
            overflow: auto;
        }

        .right-menu li, .left-menu li {
            list-style: none;
            font-size: 13px;
            overflow: auto;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .right-menu li:hover, .left-menu li:hover {
            background: #edf2f9 !important;
        }

        #left-menu-btn {
            position: fixed;
            left: 0;
            top: 150px;
            color: #283e59;
            border: 1px solid #e3ebf6;
            border-radius: 0em 0.28571429rem 0.28571429rem 0em;
            cursor: pointer;
            background-color: #fff;
            z-index: 9999;
        }

        #left-menu {
            width: 200px;
            position: fixed;
            left: -200px;
            max-height: 80% !important;
            overflow: auto;
            z-index: 9999;
        }

        #left-menu .card {
            height: 100%;
        }

        .tab_fix {
            position: fixed;
            width: 15rem;
        }

        .table_absolute {
            width: 15rem;
            position: absolute;
            right: 0;
            bottom: 0;
        }

        .chapter, .document {
            display: block;
            width: 100%;
            float: left;
            overflow: auto;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

    </style>

@endpush
