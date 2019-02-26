@include('module.text._tab')
@component('components.keyword',['tag'=>'text','system'=>1,'model'=>$text??null]) @endcomponent
<div id="app" v-cloak="">
    <div class="card">
        <div class="card-header">
            设置回复内容
        </div>
        <div class="card-body">
            <div class="form-group" style="position: relative" v-for="(v,k) in contents">
                <textarea class="form-control" rows="3" required v-model="v.content"></textarea>
                <i class="fa fa-times-circle fa-1x text-secondary"
                   style="cursor:pointer;position: absolute;right:-5px;top:-6px;" @click="del(k)"></i>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <button type="button" class="btn btn-info" @click="add">添加回复内容</button>
        <button class="btn btn-success">保存提交</button>
    </div>
    <textarea hidden name="content">@{{ contents }}</textarea>
</div>
@push('js')
    <script>
        require(['hdjs', 'vue'], function (hdjs, vue) {
            new vue({
                el: "#app",
                data: {
                    contents: {!! old('content',$text['content']??'[{content:""}]') !!}
                },
                methods: {
                    add() {
                        this.contents.push({content:''});
                    },
                    del(k) {
                        this.contents.splice(k, 1);
                    }
                }
            })
        })
    </script>
@endpush
