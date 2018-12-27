<div class="comment" id="comment" v-cloak="">
    <div class="card col-sm-12 rounded-0">
        <div class="card-body">
            @auth
                <div class="">
                    <button class="btn btn-light mb-1 btn-xs" type="button" @click="toSendEditor">
                        <span class="fe fe-edit"></span> 发表评论
                    </button>
                    <div class="small float-right text-muted pt-0">共有{{$comments->total()}}条评论</div>
                </div>
            @else
                <div class="">
                    <a href="{{route('login')}}" class="btn btn-white mr-3"><span class="fe fe-user"></span> 登录后参与评论</a>
                    <div class="small float-right text-muted pt-0">共有{{$comments->total()}}条评论</div>
                </div>
            @endauth
        </div>
    </div>
    @foreach($comments as $key=>$comment)
        <div class="card col-sm-12 mb-3 rounded-0" id="comment-{{$comment['id']}}">
            <div class="card-body pb-0 pl-0">
                <div class="comment mb-0">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a class="avatar" href="{{route('member.user.show',$comment['user'])}}">
                                <img src="{{$comment['user']->avatar}}"
                                     class="u-avatar avatar-img rounded-pseudo">
                            </a>
                        </div>
                        <div class="col ml-0 pl-0">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="comment-title text-muted mb-0">
                                            {{$comment['user']->name}}
                                        </h6>
                                        <time class="comment-time small text-secondary">
                                            <span class="fe fe-clock"></span> {{$comment->updated_at}}
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pl-3 pr-3 pt-0">
                <div class="row" style="border-top:1px solid #edf2f9;">
                    <div class="col-12">
                        <div class="comment-text pb-3 pt-3 markdown">{{ $comment->content }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer pl-3 pr-3">
                <span class="small text-muted">#{{$key+1}}</span>
                <a href="" @click.prevent="zan({{$comment['id']}})" class="badge text-muted">
                    <span class="fe fe-thumbs-up"></span>
                    <span class="zan-count">{{$comment['zan_num'] }}</span> 个点赞
                </a>
                {{--删除评论--}}
                @if ($comment['user']['id'] == auth()->id() || (auth()->check() && auth()->user()->can('Admin-comment-destroy')))
                    <a href="javascript:void(0)" onclick="confirm('确定删除吗')?$(this).next().submit():null;"
                       class="badge badge-primary">删除</a>
                    <form action="{{route('common.comment.destroy',$comment)}}" method="post">
                        @csrf @method('DELETE')
                    </form>
                @endif
            </div>
        </div>
    @endforeach
    {{--新发表评论--}}
    @auth
        <div class="card col-sm-12 mb-3 rounded-0" v-for="comment in comments">
            <div class="card-body pb-0 pl-0">
                <div class="comment mb-0">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <a class="avatar" href="{{route('member.user.show',auth()->user())}}">
                                <img src="{{auth()->user()->avatar}}"
                                     class="u-avatar avatar-img rounded-pseudo">
                            </a>
                        </div>
                        <div class="col ml-0 pl-0">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="comment-title text-muted mb-0">
                                            {{auth()->user()->name}}
                                        </h6>
                                        <time class="comment-time small text-secondary">
                                            <span class="fe fe-clock"></span> @{{comment.updated_at}}
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pl-3 pr-3 pt-0">
                <div class="row" style="border-top:1px solid #edf2f9;">
                    <div class="col-12">
                        <div class="comment-text pb-3 pt-3 markdown" v-html="comment.content"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer pl-3 pr-3">
                {{--<span class="small text-muted">#{{$key+1}}</span>--}}
                {{--<a href="#" class="badge text-muted">--}}
                {{--<span class="fe fe-thumbs-up"></span>--}}
                {{--<span class="zan-count">0</span> 个点赞--}}
                {{--</a>--}}
                {{--删除评论--}}
                <a href="javascript:void(0)" onclick="confirm('确定删除吗')?$(this).next().submit():null;"
                   class="badge badge-primary">删除</a>
                <form :action="'/common/comment/'+comment.id" method="post">
                    @csrf @method('DELETE')
                </form>
            </div>
        </div>
    @endauth
    {{--新发表评论结束--}}
    @auth
        <div class="card col-sm-12 p-0 mt-5 rounded-0">
            <div class="card-body p-2">
                <div class="alert alert-light small rounded-0" role="alert">
                    <i class="fa fa-warning" aria-hidden="true"></i> 请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。<br>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> 支持拖放与粘贴图片
                </div>
                <form @submit.prevent="send">
                    <div class="form-group">
                        <div id="commentEditor">
                            <textarea style="display:none;"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary mb-2 btn-xs">发表评论</button>
                </form>
            </div>
        </div>
    @endauth
</div>
<script>
    require(['hdjs', 'jquery', 'vue', 'axios', 'moment', 'MarkdownIt','marked'], function (hdjs, $, Vue, axios, moment, MarkdownIt,marked) {
        vm = new Vue({
            el: "#comment",
            data: {
                markdownEditor: null,
                model: '',
                field: {content: '', url: "{{$_SERVER['REQUEST_URI']}}"},
                comments: []
            },
            mounted() {
                this.model = "{{str_replace('\\','-',get_class($model))}}";
                //创建编辑器
                hdjs.simplemdeMarkdownEditor('commentEditor', {}, function (simplemde) {
                    simplemde.codemirror.on("change", function () {
                        vm.markdownEditor = simplemde;
                        vm.$set(vm.field, 'content', simplemde.value());
                    });
                });
                $(".comment-text").each(function (k, comment) {
                    $(comment).html(marked($(comment).html()));
                })
            },
            updated() {
                hdjs.scrollTo('body', location.hash, 0, {queue: true});
                // this.parseMarkdown();
            },
            methods: {
                //跳转到评论表单
                toSendEditor() {
                    hdjs.scrollTo('body', '#commentEditor', 1500, {queue: true});
                },
                //点赞评论
                zan(comment_id) {
                    let url = "/common/zan/make?model=App-Models-Comment&id=" + comment_id;
                    axios.get(url).then((response) => {
                        $("#comment-" + comment_id).find('.zan-count').html(response.data.count);
                    }, (response) => {
                        // hdjs.message('参数错误');
                    });
                },
                //发表评论
                send() {
                    if (this.check()) {
                        if (this.field.content == '') {
                            hdjs.swal({
                                text: '评论内容不能为空',
                                buttons: false, timer: 3000, icon: 'info'
                            });
                            return false;
                        }
                        url = "/common/comment" + "?model=" + this.model + "&id={{$model['id']}}";
                        axios.post(url, this.field).then((response) => {
                            let comment = response.data.comment;
                            //解析markdown
                            let md = new MarkdownIt();
                            this.comments.push({
                                id: comment.id,
                                content: marked(comment.content),
                                zan_count: comment.zan_count ? comment.zan_count : 0,
                                updated_at: comment.updated_at
                            });
                            //设置评论内容与评论框为空
                            this.field.content = '';
                            vm.markdownEditor.value('');
                            hdjs.swal({
                                text: '评论发表成功',
                                buttons: false, timer: 3000, icon: 'success',
                            });
                        })
                    }
                },
                //解析Markdown文档
                parseMarkdown() {
                    require(['hdjs', 'marked', 'highlight'], function (hdjs, marked) {
                        $(document).ready(function () {
                            alert(3)
                            $(".comment-text").each(function (k, comment) {

                                // let md = new MarkdownIt();
                                $(comment).html(marked('#这是markdown内容'));
                                $('pre code').each(function (i, block) {
                                    hljs.highlightBlock(block);
                                });
                            })
                        });
                    })
                },
                //发表时间检测
                check() {
                    //原时间
                    let old = parseInt(localStorage.getItem('comment_send_time'));
                    if (old && old + 20 > moment().unix()) {
                        hdjs.swal({
                            text: '请' + (old + 20 - moment().unix()) + '秒后操作',
                            buttons: false, timer: 3000, icon: 'warning'
                        });
                        return false;
                    }
                    localStorage.setItem('comment_send_time', moment().unix());
                    return true;
                }
            }
        })
    })
</script>
