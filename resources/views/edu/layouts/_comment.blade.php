<div class="edu-comment">
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="mb-3">
                <button class="btn btn-white mr-3"><span class="fe fe-edit"></span> 发表评论</button>
                <div class="small float-right text-muted pt-3">共有30条评论</div>
            </div>
        </div>
    </div>
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="comment mb-5">
                <div class="row">
                    <div class="col-auto">
                        <a class="avatar" href="profile-posts.html">
                            {{--                            <img src="{{$lesson->user->icon}}" alt="..." class="avatar-img rounded-circle">--}}
                        </a>
                    </div>
                    <div class="col ml--2">
                        <div class="comment-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="comment-title">
                                        向军大叔
                                    </h5>
                                </div>
                                <div class="col-auto">
                                    <time class="comment-time">
                                        11:12
                                    </time>
                                </div>
                            </div>
                            <p class="comment-text">
                                传播互联网前沿技术，帮助更多的人实现梦想. 传播互联网前沿技术，帮助更多的人实现梦想
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="" class="badge text-muted"><span class="fe fe-thumbs-up"></span> 9个点赞</a> .
            <a href="" class="badge  text-muted"><span class="fe fe-message-square"></span> 8个回复</a>
        </div>
    </div>
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="comment mb-5">
                <div class="row">
                    <div class="col-auto">
                        <a class="avatar" href="profile-posts.html">
                            {{--                            <img src="{{$lesson->user->icon}}" alt="..." class="avatar-img rounded-circle">--}}
                        </a>
                    </div>
                    <div class="col ml--2">
                        <div class="comment-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="comment-title">
                                        向军大叔
                                    </h5>
                                </div>
                                <div class="col-auto">
                                    <time class="comment-time">
                                        11:12
                                    </time>
                                </div>
                            </div>
                            <p class="comment-text">
                                传播互联网前沿技术，帮助更多的人实现梦想. 传播互联网前沿技术，帮助更多的人实现梦想
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="" class="badge text-muted"><span class="fe fe-thumbs-up"></span> 9个点赞</a> .
            <a href="" class="badge  text-muted"><span class="fe fe-message-square"></span> 8个回复</a>
        </div>
    </div>
    @auth
        <div class="card col-sm-12">
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-auto">
                        <div class="avatar">
                            <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </div>
                    <div class="col ml--2">
                        <form method="post" action="">
                            @csrf
                            {{--<input type="hidden" name="module" value="{{$module}}">--}}
                            {{--<input type="hidden" name="relation_id" value="{{$relation_id}}">--}}
                            <label class="sr-only">请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。</label>
                            <textarea class="form-control" placeholder="请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。" rows="5"></textarea>
                            <div class="mt-1">
                                <button class="btn btn-white mb-2 btn-xs">发表评论</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body text-center">
                <a href="{{route('login')}}" class="text-muted">登录后参与讨论</a>
            </div>
        </div>
    @endauth


</div>
