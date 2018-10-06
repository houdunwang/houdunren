<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>回复规则描述</label>
            <input type="text" name="title" class="form-control" value="{{$base['title']??''}}" placeholder="请输入规则的简短描述" aria-describedby="helpId">
        </div>
    </div>
</div>
{{--@include('chat.layouts._keywords')--}}
{!! $ruleView !!}
<div class="card" id="base">
    <div class="card-header">
        回复内容
    </div>
    <div class="card-body small text-muted">
        <div class="card" v-for="(v,i) in contents">
            <div class="card-body">
                <div class="form-group">
                    <textarea class="form-control" rows="3" v-model="v.content" required></textarea>
                    <p class="text-dark pt-2">
                        您还可以使用表情和链接。
                        <a href="javascript:;" class="text-dark emotionLink" :index="i"><i class="fa fa-github-alt"></i> 表情</a>
                    </p>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-white btn-sm" @click.prevent="del(i)">删除</button>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <button type="button" class="btn btn-secondary btn-sm" @click.prevent="add()">添加回复内容</button>
    </div>
    <textarea name="contents" cols="30" rows="10" hidden>@{{ contents }}</textarea>
</div>
<button class="btn btn-primary btn-sm">保存数据</button>
@push('js')
    <script>
        require(['vue', 'hdjs'], function (Vue, hdjs) {
            new Vue({
                el: "#base",
                data: {
                    contents:{!! isset($base)?json_encode($base['content']):"[{content: ''}]" !!}
                },
                mounted: function () {
                    this.emotion();
                },
                updated:function(){
                    this.emotion();
                },
                methods: {
                    emotion: function () {
                        let This = this;
                        //表情选择动作设置
                        $('.emotionLink').each(function () {
                            hdjs.emotion({
                                btn: this,
                                input: $(this).parents('div').eq(0).find('textarea')[0],
                                callback: function (con, btn, input) {
                                    let index = $(btn).attr('index');
                                    This.contents[index].content = $(input).val();
                                }
                            });
                        });
                    },
                    add() {
                        this.contents.push({content: ''})
                    },
                    del(i) {
                        this.contents.splice(i, 1)
                    }
                }
            })
        })
    </script>
@endpush
