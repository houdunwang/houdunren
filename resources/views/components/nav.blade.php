<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-bold" role="tablist">
    @foreach ($navs as $nav)
        <li class="nav-item">
            <a href="{{$nav['url']}}" class="nav-link mr-3 {{isset($nav['active']) && $nav['active']?'active':''}}">
               {{$nav['title']}}
            </a>
        </li>
    @endforeach
</ul>