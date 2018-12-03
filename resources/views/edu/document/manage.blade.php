@extends('layouts.member')
@section('content')
    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="card-header-title text-secondary">
                        我的文档
                    </h6>
                </div>
                <div class="col-auto">
                    <a href="{{route('edu.document.create')}}" class="btn btn-xs btn-primary">
                        新增文档
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
        @if(count($documents))
            <!-- List -->
                <ul class="list-group list-group-lg list-group-flush list my--4">
                    @foreach($documents as $document)
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col ml--2">
                                    <h6 class="card-title mb-1 name">
                                        <a href="{{route('edu.document.edit',$document)}}">{{$document['title']}}</a>
                                    </h6>
                                    <p class="card-text small mb-1">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{$document->updated_at->format('Y-m-d')}}
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <div class="btn-group btn-group-toggle btn-group-xs">
                                        <a href="{{route('edu.document.edit',$document)}}" class="btn btn-xs btn-soft-secondary">编辑</a>
                                        <a href="javascript:;" class="btn btn-xs btn-soft-dark" onclick="del(this)">删除</a>
                                        <form action="{{route('edu.document.destroy',$document)}}" method="post">
                                            @csrf @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>


            @else
                <div class="text-center pt-5 pb-5 text-muted">文档列表为空</div>
            @endif
        </div>
    </div>
    {!! $documents->links() !!}
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除吗？', function () {
                    $(obj).next('form').trigger('submit');
                })
            })
        }
    </script>
@endpush