<div class="form-group">
    <label for="">消息标题</label>
    <input type="text" name="title" value="{{$news['title']??''}}" class="form-control" placeholder="输入图文消息的名称">
</div>
{!! $ruleView !!}
<div class="card" id="app" v-cloak>
    <div class="card-header">图文消息管理</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4 {{hd_route_class()}}">
                <div class="news">
                    <div class="first" v-for="(v,i) in news" v-if="i==0">
                        <img :src="v.picurl" alt="">
                        <p>@{{ v.title }}</p>
                        <div class="edit">
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="edit(v)">编辑</button>
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="del(i)">删除</button>
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="prev(i)" v-if="i>0">上移</button>
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="next(i)" v-if="i<news.length-1">下移</button>
                        </div>
                    </div>
                    <div class="item" v-for="(v,i) in news" v-if="i>0">
                        <img :src="v.picurl" alt="">
                        <p class="text-secondary">@{{ v.title }}</p>
                        <div class="edit">
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="edit(v)">编辑</button>
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="del(i)">删除</button>
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="prev(i)" v-if="i>0">上移</button>
                            <button class="btn btn-light btn-sm rounded-0" type="button" @click="next(i)" v-if="i<news.length-1">下移</button>
                        </div>
                    </div>
                    <div class="pt-2">
                        <button class="btn btn-secondary btn-block rounded-0" type="button" @click="add">添加图文</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group row">
                    <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">标题</label>
                    <div class="col-12 col-sm-8">
                        <input id="inputSmall" type="text" required v-model="active.title" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">描述</label>
                    <div class="col-12 col-sm-8">
                        <textarea class="form-control-sm form-control" required v-model="active.discription" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">缩略图</label>
                    <div class="col-sm-8">
                        <div class="input-group mb-1">
                            <input class="form-control" required v-model="active.picurl">
                            <div class="input-group-append">
                                <button @click="upImagePc()" class="btn btn-secondary" type="button">单图上传</button>
                            </div>
                        </div>
                        <div style="display: inline-block;position: relative;">
                            <img :src="active.picurl" class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">链接</label>
                    <div class="col-12 col-sm-8">
                        <input id="inputSmall" type="text" v-model="active.url" required class="form-control form-control-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <textarea name="content" hidden>@{{ news }}</textarea>
</div>
<button class="btn btn-primary btn-sm">保存提交</button>
@push('js')
    <script>
        require(['hdjs', 'vue'], function (hdjs, Vue) {
            new Vue({
                el: "#app",
                mounted() {
                    this.active = this.news[0];
                },
                data: {
                    news: {!! isset($news)?json_encode($news['content']):"[{title: '图文标题', discription: '图文描述', picurl: '/images/nopic.jpg', url: 'http://'}]" !!},
                    active: {}
                },
                methods: {
                    add() {
                        if (this.news.length >= 5) {
                            hdjs.info('最多只能有五个图文消息');
                            return;
                        }
                        this.news.push({title: '图文标题', 'discription': '图文描述', 'picurl': '{!! asset('images/nopic.jpg') !!}', 'url': 'http://'});
                    },
                    del(pos) {
                        if (this.news.length == 1) {
                            hdjs.info('最少要有一个图文消息');
                            return;
                        }
                        this.news.splice(pos, 1);
                    },
                    prev(pos) {
                        let item = this.news[pos];
                        this.news.splice(pos, 1, this.news[pos - 1]);
                        this.news.splice(pos - 1, 1, item);
                    },
                    next(pos) {
                        let item = this.news[pos];
                        this.news.splice(pos, 1, this.news[pos + 1]);
                        this.news.splice(pos + 1, 1, item);
                    },
                    edit(item) {
                        this.active = item;
                    },
                    upImagePc() {
                        let This = this;
                        hdjs.image(function (images) {
                            This.active.picurl = images[0];
                        })
                    },
                    submit() {
                        alert(3);
                    }
                }
            })
        })
    </script>
@endpush
