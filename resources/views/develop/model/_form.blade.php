<div id="develop">
    <div class="alert alert-light border shadow-sm" role="alert">
        <i class="fa fa-info-circle"></i>
        <span class="text-secondary">
            建立查看 <a href="https://www.houdunren.com/document/front/content/198?sid=1" target="_blank" class="text-primary">在线文档</a> 了解具体使用细节。
        </span>
{{-- <span class="text-secondary">后台只提供模型创建功能，如果编辑或删除请手动处理文件，目录说明如下：</span>--}}
{{--<hr>--}}
        {{--        <div class="card mt-2 border-0 bg-light">--}}
        {{--            <div class="card-header p-1 bg-light">--}}
        {{--                <h6>目录说明</h6>--}}
        {{--            </div>--}}
        {{--            <div class="card-body p-2">--}}
        {{--                <div class="row small p-0">--}}
        {{--                    <div class="col-3">--}}
        {{--                        Config/Fields 字段配置目录--}}
        {{--                    </div>--}}
        {{--                    <div class="col-3">--}}
        {{--                        Database 迁移文件目录--}}
        {{--                    </div>--}}
        {{--                    <div class="col-3">--}}
        {{--                        Entities 模型目录--}}
        {{--                    </div>--}}
        {{--                    <div class="col-3">--}}
        {{--                        Http/Controllers/Admin 后台控制器目录--}}
        {{--                    </div>--}}
        {{--                    <div class="col-3">--}}
        {{--                        Http/Controllers/Front 前台控制器目录--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
{{--        <ul class="pl-4 small">--}}
{{--            <li>Config/Fields 字段配置目录</li>--}}
{{--            <li>Database 迁移文件目录</li>--}}
{{--            <li>Entities 模型目录</li>--}}
{{--            <li>Http/Controllers/Admin 后台控制器目录</li>--}}
{{--            <li>Resources/views/admin/article 视图目录</li>--}}
{{--        </ul>--}}
    </div>
    <div class="card shadow-sm">
        <div class="card-body pb-1 pl-3">
            <div class="form-group">
                <label>
                    模型名
                    <small>输入英文字母的模型目录名请</small>
                </label>
                <input type="text"
                       class="form-control" name="model" placeholder="" required>
            </div>
            <div class="form-group">
                <label>
                    模型描述
                    <small>请输入中文模型描述</small>
                </label>
                <input type="text"
                       class="form-control" name="title" placeholder="" required>
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
                               placeholder="字段长度" v-model="field.length"
                               v-if="showLength(field.type)" required="required">
                    </td>
                    <td>
                        <input type="checkbox" name="field[is_null][]" value="1"
                               v-model="field.is_null">
                    </td>
                    <td>
                        <select name="field[form][]" class="form-control-sm" v-model="field.form">
                            <option value="input">单行文本</option>
                            <option value="textarea">多行文本</option>
                            <option value="radio">单选框</option>
                            <option value="checkbox">复选框</option>
                            <option value="图片">图片</option>
                            <option value="ueditor">百度编辑器</option>
                            <option value="markdown">Markdown编辑器</option>
                        </select>
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
                fields: []
            },
            computed: {},
            methods: {
                add() {
                    let field = {title: '', name: '', type: 'string', length: null, is_null: false, form: 'input'};
                    this.fields.push(field);
                },
                del(k) {
                    this.fields.splice(k, 1);
                },
                showLength(type) {
                    return _.indexOf(['char', 'string', 'tinyInteger', 'unsignedInteger'], type) >= 0;
                }
            }
        })
    })
</script>