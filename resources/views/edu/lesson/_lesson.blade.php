{{--后台发表课程--}}
@inject('TagRepository','App\Repositories\EduTagRepository')
<div class="row small" id="app">
    <div class="card col-sm-12">
        <div class="card-body border-bottom-0">
            <ul class="nav nav-tabs nav-overflow nav-tabs-sm">
                <li class="nav-item">
                    <a href="{{route('edu.lesson.index')}}" class="nav-link">
                        课程列表
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edu.lesson.create')}}" class="nav-link active">
                        课程管理
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">课程标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="field.lesson.title" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">所属标签</label>
                <div class="col-sm-10">
                    @foreach($TagRepository->all() as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="tags[]"
                                   {{active_class($lesson->hasTag($tag),'checked')}}
                                   value="{{$tag['id']}}" type="checkbox" id="tag{{$tag['id']}}">
                            <label class="form-check-label" for="tag{{$tag['id']}}">{{$tag['name']}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">课程类型</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type1" v-model="field.lesson.type" class="custom-control-input"
                               value="system">
                        <label class="custom-control-label" for="type1">系统课程</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="type2" v-model="field.lesson.type" class="custom-control-input" checked
                               value="video">
                        <label class="custom-control-label" for="type2">视频播客</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">课程介绍</label>
                <div class="col-sm-10">
                    <textarea v-model="field.lesson.description" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">课程图片</label>
                <div class="col-sm-10">
                    <div class="input-group mb-1">
                        <input class="form-control form-control" readonly="" v-model="field.lesson.thumb">
                        <div class="input-group-append">
                            <button @click="uploadLessonThumb(this)" class="btn btn-secondary" type="button">单图上传
                            </button>
                        </div>
                    </div>
                    <div style="display: inline-block;position: relative;">
                        <img :src="field.lesson.thumb" class="img-responsive img-thumbnail" width="150">
                        <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                            onclick="removeImg(this)">×</em>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">下载地址</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="field.lesson.download_address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">查看次数</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" v-model="field.lesson.click" value="{{old('click',0)}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">状态</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="status1" v-model="field.lesson.status" class="custom-control-input"
                               value="1" checked>
                        <label class="custom-control-label" for="status1">上架</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="status2" v-model="field.lesson.status" class="custom-control-input"
                               value="0">
                        <label class="custom-control-label" for="status2">下架</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">收费方式</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="free1" v-model="field.lesson.free" class="custom-control-input"
                               value="1">
                        <label class="custom-control-label" for="free1">免费</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="free2" v-model="field.lesson.free" class="custom-control-input"
                               value="0" checked>
                        <label class="custom-control-label" for="free2">收费</label>
                    </div>
                </div>
            </div>
            <div class="card" v-if="field.lesson.free==0">
                <div class="card-header">
                    收费课程设置
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">课程售价</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" v-model="field.lesson.price"
                                       value="{{old('price',0)}}" aria-label="Recipient's username"
                                       aria-describedby="price" value="100">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="price">元</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">订阅用户免费</div>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subscribe_free_play1" v-model="field.lesson.subscribe_free_play"
                                       class="custom-control-input" value="1">
                                <label class="custom-control-label" for="subscribe_free_play1">是</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subscribe_free_play2" v-model="field.lesson.subscribe_free_play"
                                       class="custom-control-input" value="0" checked>
                                <label class="custom-control-label" for="subscribe_free_play2">否</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">免费观看数量</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="field.lesson.free_num"
                                   value="{{old('free_num',3)}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-sm-12">
        <div class="card-header">课程属性</div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2">特殊属性</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" v-model="field.lesson.is_commend"
                               id="is_commend" value="1">
                        <label class="custom-control-label" for="is_commend">推荐</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" v-model="field.lesson.is_hot" id="is_hot"
                               value="1">
                        <label class="custom-control-label" for="is_hot">热门</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">课程标签</div>
                <div class="col-sm-10">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="is_commend11">
                        <label class="custom-control-label" for="is_commend11">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="is_hot22">
                        <label class="custom-control-label" for="is_hot22">LINUX</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-sm-12" v-show="editLessonVideo">
        <div class="card-header mb-2">课程视频</div>
        <div class="card-body">
            <div class="row">
                <draggable v-model="field.videos" element="ul"  @start="drag=true" @end="drag=false" class="col-12">
                <li class="card col-sm-12" v-for="(video,k) in field.videos" :key="k">
                        <div class="card-body pb-0">
                            <div class="form-group">
                                <input type="text" v-model="video.title" class="form-control" placeholder="课程标题"
                                       aria-describedby="helpId" required>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="video.path" class="form-control" placeholder="视频链接"
                                       aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="video.external_address" class="form-control"
                                       placeholder="外部播放地址，比如B站播放地址" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button class="btn btn-white btn-sm" type="button" @click="delVideo(k)">删除</button>
                            <button class="btn btn-white btn-sm" type="button" @click="question_show(video)"
                                    data-toggle="modal" :data-target="'#question'+k">
                                考题 <span class="badge badge-light">@{{video.question?video.question.length:0}}</span>
                            </button>
                            <button class="btn btn-white btn-sm" type="button" @click="addNextVideo(k)">插入视频</button>
                            {{--考题--}}
                            <div class="modal fade bd-example-modal-lg" :id="'question'+k" tabindex="-1" role="dialog"
                                 aria-labelledby="video.question"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">考题</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card" v-for="(question,k) in video.question">
                                                <div class="card-header">
                                                    <div class="form-group mb-0">
                                                        <input type="text" v-model="question.title"
                                                               class="form-control form-control-sm"
                                                               placeholder="请输入问题">
                                                    </div>
                                                </div>
                                                <div class="card-body pt-3 pb-0">
                                                    <div class="input-group mb-3 input-group-sm"
                                                         v-for="(topic,n) in question.topics">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" v-model="topic.right">
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control"
                                                               aria-label="Text input with checkbox"
                                                               v-model="topic.topic">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                    @click="topic_del(question.topics,n)">删除
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    <button type="button" class="btn btn-light btn-sm"
                                                            @click="topic_add(question.topics)">添加答案
                                                    </button>
                                                    <button type="button" class="btn btn-light btn-sm"
                                                            @click="question_del(video,k)">删除考题
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                    @click="question_add(video)">
                                                添加考题
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--考题结束--}}
                        </div>
                    </li>
                </draggable>
            </div>
        </div>
        <div class="card-footer">
            <textarea name="field" hidden cols="30" rows="10">@{{field}}</textarea>
            <button class="btn btn-white btn-sm" type="button" @click="addVideo()">添加视频</button>
        </div>
    </div>
    <div class="card col-sm-12">
        <div class="card-footer">
            <button class="btn btn-primary btn-sm">保存发布</button>
            <button class="btn btn-white btn-sm" @click="editLessonVideo= !editLessonVideo" type="button">编辑视频</button>
        </div>
    </div>
</div>
@push('js')
    <script>
        require(['vue', 'hdjs', 'sortablejs', 'vuedraggable',], function (Vue, hdjs,sortablejs,draggable) {
            new Vue({
                el: "#app",
                components:{
                    draggable:draggable
                },
                data: {
                    field:{!! old('field',json_encode($field)) !!},
                    //当前编辑的视频
                    currentEditVideo: {},
                    //编辑视频状态
                    editLessonVideo:false,
                },
                methods: {
                    addVideo() {
                        this.field.videos.push({title: '', path: '', duration: 0, question: []})
                    },
                    addNextVideo(k){
                      this.field.videos.splice(k,0,{title: '', path: '', duration: 0, question: []})
                    },
                    delVideo(index) {
                        this.field.videos.splice(index, 1)
                    },
                    uploadLessonThumb() {
                        hdjs.image((images) => {
                            this.field.lesson.thumb = images[0];
                        }, {})
                    },
                    //问题
                    question_show(video) {
                        video.question = video.question ? video.question : [];
                    },
                    question_add(video) {
                        video.question.push({title: '', topics: [{topic: '', right: false}]});
                    },
                    question_del(video, k) {
                        hdjs.confirm('确定删除这个问题吗', function () {
                            video.question.splice(k, 1);
                        })
                    },
                    //答案
                    topic_add(topics) {
                        topics.push({topic: '', right: false})
                    },
                    topic_del(topics, k) {
                        topics.splice(k, 1);
                    }
                }
            })
        })
    </script>
@endpush
