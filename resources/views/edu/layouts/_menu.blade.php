@can('Edu-live')
    <li class="nav-item">
        <a class="nav-link u-header__nav-link" href="{{route('edu.live')}}">
            直播
        </a>
    </li>
@endcan
<li class="nav-item">
    <a class="nav-link u-header__nav-link" href="{{route('edu.dynamic.index')}}">
        动态
    </a>
</li>
<li class="nav-item hs-has-sub-menu u-header__nav-item"
    data-event="hover"
    data-animation-in="slideInUp"
    data-animation-out="fadeOut">
    <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
       aria-haspopup="true"
       aria-expanded="false"
       aria-labelledby="blogSubMenu">
        系统
        <span class="fa fa-angle-down u-header__nav-link-icon"></span>
    </a>
    <ul
        class="list-group hs-sub-menu u-header__sub-menu mb-0 small rounded-0"
        style="min-width: 220px;"
        aria-labelledby="blogMegaMenu">
        @inject('EduLessonRepository',\App\Repositories\EduSystemLessonRepository)
        @foreach($EduLessonRepository->all() as $systemlesson)
            <a class="list-group-item list-group-item-action"
               href="{{route('edu.system.show',$systemlesson)}}">
                {{$systemlesson['title']}}
            </a>
        @endforeach
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link u-header__nav-link" href="{{route('edu.lesson.lists')}}">
        碎片
    </a>
</li>
<li class="nav-item">
    <a class="nav-link u-header__nav-link" href="{{route('edu.shop.index')}}">
        订阅
    </a>
</li>
<li class="nav-item">
    <a class="nav-link u-header__nav-link" href="{{route('edu.topic.index')}}">
        话题
    </a>
</li>
<!-- Blog -->
<li class="nav-item hs-has-sub-menu u-header__nav-item"
    data-event="hover"
    data-animation-in="slideInUp"
    data-animation-out="fadeOut">
    <a id="blogMegaMenu" class="nav-link u-header__nav-link" href="javascript:;"
       aria-haspopup="true"
       aria-expanded="false"
       aria-labelledby="blogSubMenu">
        文档
        <span class="fa fa-angle-down u-header__nav-link-icon"></span>
    </a>
    <ul id="blogSubMenu"
        class="list-group list-inline hs-sub-menu u-header__sub-menu mb-0 small rounded-0"
        style="min-width: 220px;"
        aria-labelledby="blogMegaMenu">
        @foreach(\App\Models\EduDocument::orderBy( 'flag' , 'desc' )->orderBy( 'updated_at' , 'desc' )->limit(5)->get() as $document)
            <a
                    class="list-group-item list-group-item-action rounded-0"
                    href="{{route('edu.document.show',$document)}}">
                {{$document->title}}
            </a>
        @endforeach
        <a class="list-group-item list-group-item-action rounded-0"
           href="{{route('edu.document.index')}}">
            更多手册
        </a>
    </ul>
</li>
<li class="nav-item hs-has-sub-menu u-header__nav-item"
    data-event="hover"
    data-animation-in="slideInUp"
    data-animation-out="fadeOut">
    <a class="nav-link u-header__nav-link" href="{{route('edu.topic.create')}}">
        <i class="fa fa-pencil-square" aria-hidden="true"></i>
    </a>
</li>
<li class="nav-item">
    <a class="mr-2" href="javascript:;"
       role="button"
       aria-haspopup="true"
       aria-expanded="false"
       aria-controls="searchPushTop"
       data-unfold-type="jquery-slide"
       data-unfold-target="#searchPushTop">
        <span class="fa fa-search text-secondary"></span>
    </a>
</li>