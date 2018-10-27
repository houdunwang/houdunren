@extends('member.layouts.master')
@section('content')
    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">

                    <!-- Title -->
                    <h4 class="card-header-title">
                        我的文档
                    </h4>

                </div>

                <!-- Button -->
                <a href="{{route('edu.document.create')}}" class="btn btn-sm btn-primary">
                    新增文档
                </a>

            </div> <!-- / .row -->
        </div>
        <div class="card-body">
            <!-- List -->
            <ul class="list-group list-group-lg list-group-flush list my--4">
                @foreach($documents as $document)
                    <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col ml-2">
                                <h4 class="card-title mb-1 name">
                                    <a href="{{route('edu.document.edit',$document)}}">{{$document['title']}}</a>
                                </h4>
                                <p class="card-text small text-muted mb-1">

                                </p>
                                <p class="card-text small text-muted">
                                    {{$document->updated_at->format('Y-m-d')}}
                                    <time datetime="2018-01-03">Jan 3, 2018</time>
                                </p>

                            </div>
                            <div class="col-auto">
                                <a href="{{route('edu.document.edit',$document)}}"
                                   class="btn btn-sm btn-white d-none d-md-inline-block">
                                    编辑
                                </a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-white d-none d-md-inline-block">
                                    删除
                                </a>
                                <form action="{{route('edu.document.destroy',$document)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
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