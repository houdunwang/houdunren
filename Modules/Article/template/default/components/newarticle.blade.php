@inject('contentModel','Modules\Article\Entities\Content')
<div class="card">
    <div class="card-header">
        最新文章
    </div>
    <div class="card-body">
        <ul>
            @foreach($contentModel->limit(5)->get() as $content)
            <li class="flex justify-between py-2">
                <a href="{{ route('article.content',$content) }}">
                    {{ mb_substr( $content['title'],0,30,'utf-8')}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
