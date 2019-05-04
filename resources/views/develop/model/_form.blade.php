<div id="develop">
    <div class="card shadow-sm">
        <div class="card-body pb-1 pl-3">
            <div class="form-group">
                <label>模型描述 <small>请输入中文模型描述</small></label>
                <input type="text" class="form-control" name="title" placeholder="" required value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label>模型名 <small>输入英文字母的模型目录名请</small></label>
                <input type="text" class="form-control" name="model" placeholder="" required value="{{old('model')}}">
            </div>
        </div>
    </div>
    <div class="card mt-2 border-0">
        <div class="card-body p-0 bg-light">
            <table class="table table-bordered bg-white shadow-sm">
                <thead class="bg-light">
                    <tr>
                        <th>中文标题</th>
                        <th>字段名</th>
                        <th>数据类型</th>
                        <th>允许长度</th>
                        <th>允许NULL</th>
                        <th>表单类型</th>
                        <th>选项</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(field,k) in fields">
                        <td>
                            <input type="text" name="field[title][]" class="form-control form-control-sm" placeholder=""
                                required v-model="field.title">
                        </td>
                        <td>
                            <input type="text" name="field[name][]" class="form-control form-control-sm" placeholder=""
                                required v-model="field.name">
                        </td>
                        <td>
                            <select name="field[type][]" class="form-control-sm" v-model="field.type">
                                <option value="string">varchar</option>
                                <option value="char">char</option>
                                <option value="text">text</option>
                                <option value="mediumText">mediumText</option>
                                <option value="longText">longText</option>
                                <option value="tinyInteger">tinyInteger</option>
                                <option value="unsignedInteger">unsignedInteger</option>
                                <option value="dateTime">dateTime</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="field[length][]" class="form-control form-control-sm"
                                placeholder="字段长度" v-model="field.length" v-if="showLength(field.type)"
                                required="required">
                        </td>
                        <td>
                            <input type="checkbox" name="field[is_null][]" value="1" v-model="field.is_null">
                        </td>
                        <td>
                            <select name="field[form][]" class="form-control-sm" v-model="field.form">
                                <option value="input">单行文本</option>
                                <option value="textarea">多行文本</option>
                                <option value="radio">单选框</option>
                                <option value="checkbox">复选框</option>
                                <option value="image">图片</option>
                                <option value="ueditor">百度编辑器</option>
                                <option value="markdown">Markdown编辑器</option>
                            </select>
                        </td>
                        <td>
                            <textarea class="form-control" v-model="field.params" rows="2" v-if="showParams(field.form)"
                                required placeholder="如 1:开启,0:关闭，也可以是PHP的闭包函数（请查看手册获取帮助）"></textarea>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                                <a href="#" class="btn btn-outline-danger btn-sm" @click="del(k)">删除</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <textarea name="fields" class="form-control" rows="10" hidden>@{{ fields }}</textarea>
    <div class="btn-group mt-2" role="group" aria-label="Basic example">
        <a href="" class="btn btn-outline-success" @click.prevent="add()">添加字段</a>
        <button type="submit" class="btn btn-outline-info">保存提交</button>
    </div>
</div>
<script>
    require(['vue', 'lodash'], function (vue, _) {
        new vue({
            el: "#develop",
            data: {
                fields: < ? php echo old('fields', '[]'); ? >
            },
            computed: {

            },
            methods: {
                add() {
                    let field = {
                        title: '',
                        name: '',
                        type: 'string',
                        length: null,
                        is_null: false,
                        form: 'input',
                        params: '',
                        placeholder: '',
                        required: ''
                    };
                    this.fields.push(field);
                },
                del(k) {
                    this.fields.splice(k, 1);
                },
                showLength(type) {
                    return _.indexOf(['char', 'string', 'tinyInteger', 'unsignedInteger'], type) >= 0;
                },
                showParams(form) {
                    return _.indexOf(['radio', 'checkbox'], form) >= 0;
                }
            }
        })
    })

</script>
