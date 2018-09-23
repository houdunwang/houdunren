<div class="card col-sm-12">
    <div class="card-header">课程属性</div>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-sm-2">特殊属性</div>
            <div class="col-sm-10">
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" v-model="field.lesson.is_commend" id="is_commend" value="1">
                    <label class="custom-control-label" for="is_commend">推荐</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" class="custom-control-input" v-model="field.lesson.is_hot" id="is_hot" value="1">
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
<div class="card col-sm-12">
    <div class="card-header mb-2">课程视频</div>
    <div class="card-body">
        <div class="row">
            <div class="card col-sm-12" v-for="(v,k) in field.videos">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" v-model="v.title" class="form-control" placeholder="课程标题" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" v-model="v.duration" placeholder="播放时长" required>
                            <div class="input-group-append">
                                <span class="input-group-text">秒</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" v-model="v.path" class="form-control" placeholder="视频链接" aria-describedby="helpId" required>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-white btn-sm" type="button" @click="delVideo(k)">删除</button>
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer">
        <textarea name="field" hidden cols="30" rows="10">@{{field}}</textarea>
        <button class="btn btn-white" type="button" @click="addVideo()">添加视频</button>
    </div>
</div>

@push('js')
    <script>
        require(['vue', 'hdjs', 'jquery'], function (Vue, hdjs, $) {
            let vm = new Vue({
                el: "#app",
                data: {
                    field:{!! old('field',json_encode($field)) !!},
                },
                methods: {
                    addVideo() {
                        this.field.videos.push({title: '', path: '', duration: 0})
                    },
                    delVideo(index) {
                        this.field.videos.splice(index, 1)
                    },
                    uploadLessonThumb() {
                        hdjs.image((images) => {
                            this.field.lesson.thumb = images[0];
                        }, {})
                    }
                }
            })
        })
    </script>
@endpush
