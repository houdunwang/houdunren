<div class="card" id="chatKeyword">
    <div class="card-header">
        设置关键词
    </div>
    <div class="card-body">
        <div class="alert alert-light text-muted small" role="alert">
            <i class="fa fa-bell-o" aria-hidden="true"></i> 添加已经存在的关键词，该关键词将会被忽略
        </div>
        <div class="input-group mb-3" v-for="(v,i) in keywords">
            <input type="text" class="form-control" v-model="v.content" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" @click="del(i)">删除</button>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <button type="button" class="btn btn-secondary btn-sm" @click.prevent="add()">添加关键词</button>
    </div>
    <textarea name="keywords" cols="30" rows="10" hidden>@{{ keywords }}</textarea>
</div>
<script>
    require(['vue', 'hdjs', 'jquery'], function (Vue, hdjs, $) {
        new Vue({
            el: "#chatKeyword",
            data: {
                keywords: {!! isset($chatRule)?json_encode($chatRule->chatKeyword):"[{content: ''}]" !!}
            },
            methods: {
                add() {
                    this.keywords.push({content: ''})
                },
                del(i) {
                    this.keywords.splice(i, 1);
                }
            }
        })
    })
</script>
