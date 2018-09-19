<div class="dropdown mr-4 d-none d-lg-flex">
    <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="fe fe-edit"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a href="{{route('edu.article.create')}}" class="dropdown-item">
            <i class="fa fa-edit mr-2 w-15" aria-hidden="true"></i> 发表文章
        </a>
        @foreach(\App\Models\Category::get() as $category)
            <a href="{{route('edu.topic.create',['id'=>$category['id']])}}" class="dropdown-item">
                <i class="{{$category['icon']}} mr-2 w-15" aria-hidden="true"></i> {{$category['title']}}
            </a>
        @endforeach
    </div>
</div>
