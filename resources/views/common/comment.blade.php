<div class="edu-comment" id="comment" v-cloak="">
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="mb-3">
                <button class="btn btn-white mr-3"><span class="fe fe-edit"></span> 发表评论</button>
                <div class="small float-right text-muted pt-3">共有@{{comments.length}}条评论</div>
            </div>
        </div>
    </div>
    <div class="card col-sm-12" v-for="(comment,key) in comments ">
        <div class="card-body pb-0">
            <div class="comment mb-5">
                <div class="row">
                    <div class="col-auto">
                        <a class="avatar" href="profile-posts.html">
                            <img :src="comment.user.icon" alt="..." class="avatar-img rounded-circle">
                        </a>
                    </div>
                    <div class="col ml--2">
                        <div class="comment-body col-12">
                            <div class="row">
                                <div class="col">
                                    <h5 class="comment-title" v-html="comment.user.name"></h5>
                                </div>
                                <div class="col-auto">
                                    <time class="comment-time">
                                        @{{ comment.updated_at }}
                                    </time>
                                </div>
                            </div>
                            <p class="comment-text" v-html="comment.content"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <span class="small text-muted">#@{{ key+1 }}</span>
            <a href="" @click.prevent="zan(comment)" class="badge text-muted">
                <span class="fe fe-thumbs-up"></span> <span class="zan-count">@{{ comment.zan_count }}</span> 个点赞
            </a>
            {{--<a href="" class="badge text-muted"><span class="fe fe-message-square"></span> 8个回复</a>--}}
        </div>
    </div>
    @auth
        <div class="card col-sm-12">
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-12">
                        <form @submit.prevent="send">
                            <label class="sr-only">请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。</label>
                            <div id="commentEditor">
                                <textarea style="display:none;"></textarea>
                            </div>
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
<script>
    require(['hdjs', 'jquery', 'vue', 'axios', 'moment'], function (hdjs, $, Vue, axios, moment) {
        vm = new Vue({
            el: "#comment",
            data: {model: '', comments: [], field: {content: '', url: "{{$_SERVER['REQUEST_URI']}}"}},
            mounted() {
                this.model = "{{str_replace('\\','-',get_class($model))}}";
                axios.get("/common/comment?model=" + this.model + "&id={{$model['id']}}").then((response) => {
                    this.comments = response.data.comments;
                })
                hdjs.editormd("commentEditor", {
                    width: '100%',
                    height: 300,
                    toolbarIcons: function () {
                        return [
                            "bold", "del", "italic", "quote", "|",
                            "list-ul", "list-ol", "hr", "|",
                            "link", "hdimage", "code-block", "|",
                            "watch", "preview", "fullscreen"
                        ]
                    },
                    //editor.md库位置
                    path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                    onchange: function () {
                        vm.$set(vm.field, 'content', this.getValue())
                    }
                });
            },
            methods: {
                //点赞评论
                zan(comment) {
                    url = "/common/zan/count?model=comment&id=" + comment.id;
                    axios.get(url).then((response) => {
                        comment.zan_count = response.data.count;
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
                            comment.zan_count = comment.zan_count ? comment.zan_count : 0;
                            this.comments.push(comment);
                            //替换评论内容
                            this.field.content = '';
                            commentEditor.setSelection({line: 0, ch: 0}, {line: 9999, ch: 9999});
                            commentEditor.replaceSelection("");
                        })
                    }
                },
                //发表时间检测
                check() {
                    //原时间
                    let old = parseInt(localStorage.getItem('comment_send_time'));
                    if (old && old + 10 > moment().unix()) {
                        hdjs.swal({
                            text: '请' + (old + 10 - moment().unix()) + '秒后发表评论',
                            buttons: false, timer: 3000, icon: 'info'
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
