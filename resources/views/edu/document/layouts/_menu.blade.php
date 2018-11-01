<div class="card">
    @foreach($document->chapter as $chapter)
        <div>
            <div class="card-header pl-3" style="font-size: 14px">
                <a href="{{route('edu.chapter.edit',$chapter)}}" id="chapter_{{$chapter['id']}}">
                    <span class="chapter">{{$chapter['title']}}</span>
                    @can('delete', $chapter)
                        <span class="fe fe-x-circle pull-right delButton pl-4 pr-1"></span>
                        <form action="{{route('edu.chapter.destroy',[$chapter,'document_id' => $document])}}" method="post">@csrf @method('DELETE')</form>
                    @endcan
                </a>
            </div>
            <div class="card-block" style="font-size: 14px">
                <div class="list-group border-0">
                    @foreach($chapter->section as $section)
                        <a id="section_{{$section['id']}}" href="{{route('edu.section.edit',[$section,'chapter_id' => $chapter])}}" class="list-group-item list-group-item-action border-0 ">
                            <span class="section">{{$section['title']}}</span>
                            @can('delete',$section)
                                <span class="fe fe-x-circle pull-right delButton pl-4 pr-2"></span>
                                <form action="{{route('edu.section.destroy',[$section,'chapter_id' => $chapter])}}" method="post">@csrf @method('DELETE')</form>
                            @endcan
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{route('edu.section.create',['chapter_id' => $chapter])}}"
                   class="btn btn-light btn-sm btn-block">添加节</a>
            </div>
        </div>
    @endforeach
    <div class="card-footer text-muted">
        <a class="btn btn-primary btn-sm btn-block" href="{{route('edu.chapter.create',['document_id'=>$document])}}">添加大章</a>
    </div>
</div>
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            $('.delButton').click(function (event) {
                event.preventDefault();
                hdjs.confirm('确定删除吗', () => {
                    $(this).next('form').trigger('submit');
                })
            })
        })
    </script>
@endpush
@push('css')
    <style>
        .chapter, .section {
            display: block;
            width: 75%;
            float: left;
            overflow: auto;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
@endpush