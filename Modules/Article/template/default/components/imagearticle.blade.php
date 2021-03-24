@inject('contentModel','Modules\Article\Entities\Content')

<ul class="grid grid-cols-{{ $limit }} gap-5">
    @foreach($contentModel->limit($limit)->whereNotNULL('preview')->get() as $content)
    <li class="flex justify-between py-2">
        <a href="{{ route('article.content',$content) }}">
            <img src="{{ $content->preview }}" class="" />
        </a>
    </li>
    @endforeach
</ul>
