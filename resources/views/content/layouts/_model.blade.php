<div class="card col-12 pt-0 mt-0 border-0">
    <div class="card-body">
        <div class="form-group">
            <label>模型中文描述</label>
            <input type="text" name="title" value="{{old('title',$model['title']??'')}}" class="form-control" placeholder="请输入模型中文描述">
        </div>
    </div>
</div>
<div class="card col-12">
    <div class="card-header">
        字段设置
    </div>
    <div class="card-body">
        <div class="card" v-for="(field,key) in fields">
            <div class="card-body">
                <div class="form-group">
                    <input type="text" v-model="field.title" class="form-control" placeholder="中文名称" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <input type="text" v-model="field.name" class="form-control" placeholder="英文标识" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <select v-model="field.type" class="form-control">
                        <option value="text" v-for="(title,value) in types" :value="value">@{{title}}</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-white btn-sm" type="button" @click="removeField(key)">删除</button>
            </div>
        </div>
        <button class="btn btn-white btn-sm" type="button" @click="addField">添加菜单</button>
    </div>
    <div class="card-footer">
        <textarea name="fields" hidden id="" cols="30" rows="10">@{{ fields }}</textarea>
        <button class="btn btn-primary btn-sm">保存提交</button>
    </div>
</div>
@push('js')
    <script>
        require(['hdjs', 'vue', 'jquery'], function (hdjs, vue, $) {
            new vue({
                el: "#app",
                data: {
                    fields:{!! isset($model)?json_encode($model['fields']):"[]" !!},
                    types: {input: '单行文本框', textarea: '多行文本域', image: '图片','ueditor':'百度编辑器'}
                },
                methods: {
                    addField() {
                        this.fields.push({title: '', name: '', type: 'input'})
                    },
                    removeField(key) {
                        this.fields.splice(key, 1);
                    }
                }
            })
        })
    </script>
@endpush

