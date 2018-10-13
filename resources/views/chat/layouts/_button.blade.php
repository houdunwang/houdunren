<div class="card-body" id="app" v-cloak>
    <div class="row">
        <div class="col-sm-4">
            <div class="{{route_class()}}">
                <div class="menu-container">
                    <div class="menu" v-for="(v,i) in menus">
                        <h5>
                            <i @click="delMenu(i)" class="fa fa-minus-square" aria-hidden="true"></i>
                            <span @click="setActiveMenu(v)">@{{ v.name }}</span>
                        </h5>
                        <dl>
                            <dd v-if="v.sub_button.length<5">
                                <i @click="addSubMenu(v)" class="fa fa-plus-square" aria-hidden="true"></i> 添加菜单
                            </dd>
                            <dd v-for="(m,n) in v.sub_button">
                                <i @click="delSubMenu(v,n)" class="fa fa-minus-square" aria-hidden="true"></i>
                                <span @click="setActiveMenu(m)">@{{ m.name }}</span>
                            </dd>
                        </dl>
                    </div>
                    <div class="menu" v-if="menus.length<3">
                        <h5 @click="add()"><i class="fa fa-plus-square" aria-hidden="true"></i> 添加菜单</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 ">
            <div class="card">
                <div class="card-header">
                    基本设置
                </div>
                <div class="card-body small pb-1">
                    <div class="form-group row">
                        <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-right">菜单名称</label>
                        <div class="col-12 col-sm-8 col-lg-6 mt-1">
                            <input type="text" class="form-control form-control-sm" name="title" value="{{$button['title']??''}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" v-if="active.type">
                <div class="card-header">
                    菜单设置
                </div>
                <div class="card-body small pb-1">
                    <div class="form-group row">
                        <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">菜单</label>
                        <div class="col-12 col-sm-8 col-lg-6 mt-1">
                            <input type="text" class="form-control form-control-sm" v-model="active.name">
                        </div>
                    </div>
                    <div class="form-group row pt-1 pb-1" v-if="active.sub_button.length==0">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">动作</label>
                        <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="radio-inline" v-model="active.type" value="view" class="custom-control-input">
                                <span class="custom-control-label">链接</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="radio-inline" v-model="active.type" value="click" class="custom-control-input">
                                <span class="custom-control-label">关键词</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row" v-if="active.type=='view' && active.sub_button.length==0">
                        <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">链接</label>
                        <div class="col-12 col-sm-8 col-lg-6 mt-1">
                            <input type="text" class="form-control form-control-sm" v-model="active.url">
                        </div>
                    </div>
                    <div class="form-group row" v-if="active.type=='click' && active.sub_button.length==0">
                        <label for="inputSmall" class="col-12 col-sm-3 col-form-label text-sm-right">关键词</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" class="form-control form-control-sm" v-model="active.key">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <textarea name="content" hidden>@{{ menus }}</textarea>
                    <button class="btn-primary btn btn-sm">保存菜单</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        require(['vue', 'hdjs'], function (vue, hdjs) {
            new vue({
                el: '#app',
                data: {
                    menus: {!! isset($button)? json_encode($button['content']):'[]'!!},
                    active: {},
                },
                mounted() {
                    if (this.menus.length >= 1) {
                        this.active = this.menus[0];
                    }
                },
                methods: {
                    setActiveMenu(item) {
                        this.active = item;
                    },
                    add() {
                        if (this.menus.length < 3) {
                            let menu = {type: 'view', name: '后盾人', url: 'http://houdunren.com', sub_button: []};
                            this.menus.push(menu)
                            this.setActiveMenu(menu);
                        }
                    },
                    //删除顶级菜单
                    delMenu(pos) {
                        this.menus.splice(pos, 1);
                    },
                    addSubMenu(item) {
                        if (item.sub_button.length < 5) {
                            let menu = {type: 'view', name: '后盾人', url: 'houdunren.com',sub_button:[]};
                            item.sub_button.push(menu)
                            this.setActiveMenu(menu);
                        }
                    },
                    delSubMenu(item, pos) {
                        item.sub_button.splice(pos, 1);
                    }
                }
            })
        })
    </script>
@endpush
