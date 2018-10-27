<div class="card">
    @foreach($document->chapter as $chapter)
        <div>
            <div class="card-header">
                <a href="{{route('edu.chapter.edit',$chapter)}}">{{$chapter['title']}}</a>
            </div>
            <div class="card-block">
                <div class="list-group border-0">
                    @foreach($chapter->section as $section)
                        <a href="{{route('edu.section.edit',[$section,'chapter_id' => $chapter])}}" class="list-group-item list-group-item-action border-0">{{$section['title']}}</a>
                    @endforeach
                </div>

            </div>
            <div class="card-footer text-muted">
                <a href="{{route('edu.section.create',['chapter_id' => $chapter])}}"
                   class="btn btn-light btn-sm">添加节</a>
            </div>
        </div>
    @endforeach
    <div class="card-footer text-muted">
        <a class="btn btn-primary btn-sm" href="{{route('edu.chapter.create',['document_id'=>$document])}}">添加大章</a>
    </div>
</div>