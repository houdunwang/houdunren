<nav class="nav nav-tabs">
    <a class="nav-link {{ active_class(if_route('Edu.space.lesson'))}}" href="{{ route('Edu.space.lesson',$user) }}">
        课程收藏
    </a>

    <a class="nav-link {{ active_class(if_route('Edu.space.video'))}}" href="{{ route('Edu.space.video',$user) }}">
        视频收藏
    </a>

    <a class="nav-link {{ active_class(if_route('Edu.space.favorite.topic'))}}"
        href="{{ route('Edu.space.favorite.topic',$user) }}">
        贴子收藏
    </a>
</nav>
