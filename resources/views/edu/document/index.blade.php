@extends('edu.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="card-header-title text-secondary">
                                    文档列表
                                </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('edu.document.create')}}" class="btn btn-sm btn-primary">
                                    发表
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-lg list-group-flush list my--4">
                            @foreach($documents as $document)
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="{{route('member.user.show',$document->user)}}">
                                            <img class="u-avatar u-sm-avatar--bordered rounded-circle" src="{{$document->user->icon}}" alt="">
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h6 class="card-title mb-1 name">
                                            <a href="{{route('edu.document.show',$document)}}">
                                                @if($document->flag==1)
                                                <span class="badge badge-success">置顶</span>
                                                @endif
                                                {{$document['title']}}
                                            </a>
                                        </h6>
                                        <p class="card-text small text-muted mb-1">
                                            <a href="{{route('member.user.show',$document->user)}}" class="text-secondary mr-2 small">
                                                <i class="fa fa-user-circle" aria-hidden="true"></i> {{$document->user->name}}
                                            </a>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{$document->updated_at->diffForHumans()}}
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        @can('delete',$document)
                                            <a href="javascript:void(0);" onclick="delDocument(this)" class="btn btn-xs btn-light u-btn-light transition-3d-hover">
                                               删除
                                            </a>
                                            <form action="{{route('edu.document.destroy',$document)}}" method="post" hidden>
                                                @csrf @method('DELETE')
                                            </form>
                                            <script>
                                               function delDocument(obj){
                                                   require(['hdjs'],function(hdjs){
                                                        hdjs.confirm('确定删除吗?',function(){
                                                            $(obj).next().submit();
                                                        })
                                                   })
                                               }
                                            </script>
                                        @endcan
                                        @can('flag',$document)
                                            <a href="{{route('edu.document.flag',$document)}}" class="btn btn-xs btn-light u-btn-light transition-3d-hover">
                                                @if($document['flag']==1)
                                                    取消置顶
                                                @else
                                                    置顶
                                                @endif
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="mt-5">
            {!! $documents->links() !!}

        </div>
    </div>
@endsection
