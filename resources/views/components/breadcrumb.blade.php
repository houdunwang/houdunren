<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="fa fa-cogs"></i> <a href="{{route('site.site.show',site())}}">站点管理</a>
    </li>
    @foreach((array)$menus as $title=>$url)
        <li class="breadcrumb-item">
            <a href="{{$url}}">{{$title}}</a>
        </li>
    @endforeach
</ol>