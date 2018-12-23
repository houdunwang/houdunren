@foreach($topics as $topic)
    <li class="list-group-item pb-2 mb-2 border-top-0 border-bottom">
        <div class="row align-items-center">
            <div class="col-auto">
                <a href="{{route('member.user.show',$topic->user)}}">
                    <img class="u-avatar u-sm-avatar--bordered rounded-circle"
                         src="{{$topic->user->avatar}}"
                         alt="{{$topic->title}}">
                </a>
            </div>
            <div class="col ml--2">
                <h6 class="card-title mb-1 name">
                    @if ($topic['recommend'])
                        <i class="fa fa-thumbs-up text-success" aria-hidden="true"></i>
                    @endif
                    <a href="{{route('edu.topic.show',$topic)}}">
                        {{$topic->title}}
                    </a>
                </h6>
                <p class="card-text small mb-1">
                    <a href="{{route('member.user.show',$topic->user)}}"
                       class="text-secondary mr-2">
                        <i class="fa fa-user-circle"
                           aria-hidden="true"></i> {{$topic->user->name}}
                    </a>
                    <i class="fa fa-clock-o"
                       aria-hidden="true"></i> {{$topic->updated_at->diffForHumans()}}

                    <a href="{{route('edu.topic_list',['id'=>$topic['category_id']])}}"
                       class="text-secondary ml-2">
                        <i class="fa fa-folder-o"
                           aria-hidden="true"></i> {{$topic->category->title}}</a>
                </p>
            </div>
            <div class="col-auto">
                <div class="btn-group btn-group-toggle">
                    @can('Edu-topic-recommend',$topic)
                        @if($topic['recommend'])
                            <a href="{{route('edu.topic.recommend',$topic)}}" class="btn btn-xs btn-light">取消推荐</a>
                        @else
                            <a href="{{route('edu.topic.recommend',$topic)}}" class="btn btn-xs btn-light">推荐</a>
                        @endif
                    @endcan
                    @can('update',$topic)
                        <a href="{{route('edu.topic.edit',$topic)}}"
                           class="btn btn-xs btn-light">编辑</a>
                    @endcan
                    @can('delete',$topic)
                        <a href="javascript:;" class="btn btn-xs btn-secondary"
                           onclick="confirm('确定删除吗？')?$(this).next().submit():null">删除</a>
                        <form action="{{route('edu.topic.destroy',$topic)}}" method="post">
                            @csrf @method('DELETE')
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </li>
@endforeach