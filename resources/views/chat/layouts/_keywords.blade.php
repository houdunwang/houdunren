<div class="card" id="chatKeyword">
    <div class="card-header">
        设置关键词
    </div>
    <div class="card-body">
        <div class="input-group mb-3" v-for="(v,i) in keywords">
            <input type="text" class="form-control" v-model="v.content" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" @click="del(i)">删除</button>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-white btn-sm" @click.prevent="add()">添加关键词</button>
    </div>
    <textarea name="keywords" cols="30" rows="10" hidden>@{{ keywords }}</textarea>
</div>
<script>
    require(['vue', 'hdjs', 'jquery'], function (Vue, hdjs, $) {
        new Vue({
            el: "#chatKeyword",
            data: {
                keywords: []
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
