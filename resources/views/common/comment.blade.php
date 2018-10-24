<div class="text-center mt-5 mb-5">
    <span class="u-divider u-divider--xs u-divider--text">评论列表</span>
</div>
<div class="comment" id="comment" v-cloak>
    <div class="card col-sm-12">
        <div class="card-body">
            @auth
                <div class="">
                    <button class="btn btn-light mb-1 btn-xs" type="button" @click="toSendEditor">
                        <span class="fe fe-edit"></span> 发表评论
                    </button>
                    <div class="small float-right text-muted pt-0">共有@{{comments.length}}条评论</div>
                </div>
            @else
                <div class="">
                    <a href="{{route('login')}}" class="btn btn-white mr-3"><span class="fe fe-user"></span> 登录后参与评论</a>
                    <div class="small float-right text-muted pt-0">共有@{{comments.length}}条评论</div>
                </div>
            @endauth
        </div>
    </div>
    <div class="card col-sm-12 mt-5" v-for="(comment,key) in comments" :id="'comment-'+comment.id">
        <div class="card-body pb-0 pl-0">
            <div class="comment mb-0">
                <div class="row mb-2">
                    <div class="col-auto">
                        <a class="avatar" :href="'/member/user/'+comment.user.id">
                            <img :src="comment.user.icon" class="u-avatar avatar-img rounded-pseudo">
                        </a>
                    </div>
                    <div class="col ml-0 pl-0">
                        <div class="col-12">
                            <div class="row">
                                <div class="col">
                                    <h6 class="comment-title text-muted mb-0" v-html="comment.user.name"></h6>
                                    <time class="comment-time small text-secondary">
                                        <span class="fe fe-clock"></span> @{{ comment.updated_at }}
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
                    <div class="comment-text pb-3 pt-3" v-html="comment.content"></div>
                </div>
            </div>
        </div>
        <div class="card-footer pl-3 pr-3">
            <span class="small text-muted">#@{{ key+1 }}</span>
            <a href="#" @click.prevent="zan(comment)" class="badge text-muted">
                <span class="fe fe-thumbs-up"></span> <span class="zan-count">@{{ comment.zan_num }}</span> 个点赞
            </a>
            {{--删除评论--}}
            <a v-if="comment.user_id=='{{auth()->id()}}' || {{auth()->check() && auth()->user()->can('Admin-comment-destroy')?1:0}}"
               href="javascript:;" onclick="confirm('确定删除吗')?$(this).next().submit():null;" class="badge badge-primary">删除</a>
            <form :action="'/common/comment/'+comment.id" method="post">
                @csrf @method('DELETE')
            </form>
            {{--<a href="" class="badge text-muted"><span class="fe fe-message-square"></span> 8个回复</a>--}}
        </div>
    </div>
    @auth
        <div class="card col-sm-12 p-0 mt-5 rounded-0">
            <div class="card-body p-2">
                <div class="alert alert-light small rounded-0" role="alert">
                    <i class="fa fa-warning" aria-hidden="true"></i> 请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。
                </div>
                <form @submit.prevent="send">
                    <div class="form-group">
                        <div id="commentEditor">
                            <textarea style="display:none;"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary mb-2 btn-sm">发表评论</button>
                </form>
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
<script>
    require(['hdjs', 'jquery', 'vue', 'axios', 'moment', 'MarkdownIt'], function (hdjs, $, Vue, axios, moment, MarkdownIt) {
        vm = new Vue({
            el: "#comment",
            data: {model: '', comments: [], field: {content: '', url: "{{$_SERVER['REQUEST_URI']}}"}},
            mounted() {
                this.model = "{{str_replace('\\','-',get_class($model))}}";
                axios.get("/common/comment?model=" + this.model + "&id={{$model['id']}}").then((response) => {
                    this.comments = response.data.comments;
                    //解析markdown语法
                    this.comments.forEach(function (item) {
                        let md = new MarkdownIt();
                        item.content = md.render(item.content);
                    })
                });

                //创建编辑器
                hdjs.editormd("commentEditor", {
                    width: '100%',
                    height: 300,
                    toolbarIcons: function () {
                        return [
                            "link", "hdimage", "watch", "fullscreen"
                        ]
                    },
                    watch: true,
                    //editor.md库位置
                    path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                    onchange: function () {
                        vm.$set(vm.field, 'content', this.getValue());
                    }
                });
            },
            updated() {
                hdjs.scrollTo('body', location.hash, 0, {queue: true});
                this.parseMarkdown();
            },
            methods: {
                //点赞评论
                zan(comment) {
                    url = "/common/zan/make?model=App-Models-Comment&id=" + comment.id;
                    axios.get(url).then((response) => {
                        comment.zan_num = response.data.count;
                    });
                },
                //跳转到评论表单
                toSendEditor() {
                    hdjs.scrollTo('body', '#commentEditor', 1500, {queue: true});
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
                            comment.zan_count = comment.zan_count ? comment.zan_count : 0;
                            //解析markdown
                            let md = new MarkdownIt();
                            comment.content = md.render(comment.content);
                            this.comments.push(comment);
                            //设置评论内容与评论框为空
                            this.field.content = '';
                            commentEditor.setSelection({line: 0, ch: 0}, {line: 9999, ch: 9999});
                            commentEditor.replaceSelection("");
                            hdjs.swal({
                                text: '评论发表成功',
                                buttons: false, timer: 3000, icon: 'success',
                            });
                        })
                    }
                },
                parseMarkdown() {
                    require(['hdjs', 'marked', 'highlight'], function (hdjs, marked) {
                        $(document).ready(function () {
                            $('pre code').each(function (i, block) {
                                hljs.highlightBlock(block);
                            });
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
