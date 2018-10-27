@extends('member.layouts.master',['hide_menu'=>true])
@section('content')
    <form action="" method="post" id="app">
        @csrf
        <div class="card col-12">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a href="{{route('edu.document.index')}}" class="nav-link mr-3">
                            返回列表
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('edu.document.create')}}" class="nav-link mr-3 active">
                            编辑文档
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body row">
                {{--左侧菜单部分 start--}}
                <div class="col-3">
                    <div class="card rounded-0">
                        <div class="card-body text-secondary">
                            <draggable v-model="document.menus">
                                <div v-for="(v,k) in document.menus">
                                    <ul class="list-group ">
                                        {{--一级菜单 start--}}
                                        <li class="list-group-item topMenu bg-light rounded-0" @click="editTopMenu(v)">
                                            @{{ v.name }}
                                            <span class="pull-right addSubMenuFont" @click.stop.prevent="addSubMenu(v)">
                                           <i class="fa fa-plus " aria-hidden="true"></i>
                                       </span>
                                            <span class="pull-right delTopMenuFont  mr-2"
                                                  @click.stop.prevent="delTopMenu(k)">
                                           <i class="fa fa-close " aria-hidden="true"></i>
                                       </span>
                                        </li>
                                        {{--一级菜单 end--}}
                                        {{--二级菜单 start--}}
                                        <draggable v-model="v.subMenu">
                                            <li class="list-group-item subMenu pl-5" v-for="(vv,kk) in v.subMenu"
                                                @click="editSubMenu(vv)">
                                                @{{ vv.name }}
                                                <span class="pull-right delSubMenuFont"
                                                      @click.stop.prevent="delSubMenu(v,kk)">
                                            <i class="fa fa-close " aria-hidden="true"></i>
                                        </span>
                                            </li>
                                        </draggable>
                                        {{--二级菜单 end--}}
                                    </ul>
                                    <hr>
                                </div>
                            </draggable>
                            <button class="btn btn-white btn-sm text-muted btn-block" @click.prevent="addTopMenu()">添加
                            </button>
                        </div>
                    </div>
                </div>
                {{--左侧菜单部分 end--}}
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="text-muted">文档标题</label>
                                <input type="text" name="title" value="{{$document['title']}}" id=""
                                       class="form-control text-muted" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="text-muted">菜单名称</label>
                                <input type="text" v-model="current_menu.name" id="" class="form-control text-muted"
                                       placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>

                    <div class="card" v-show="current_content.hasOwnProperty('editormd_markdown_doc')">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="text-muted">文章内容</label>
                                <div id="editormd">
                                    <textarea class="text-muted" style="display:none;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <textarea name="menus" hidden cols="30" rows="10">@{{document.menus}}</textarea>
        <input type="hidden" name="id" value="{{$document['id']}}">
        <input type="hidden" name="docConntent_id" :value="current_menu.docConntent_id">
    </form>
    <script>
        require(['vue', 'hdjs', 'axios'], function (vue, hdjs, axios) {
            var vm = new vue({
                el: "#app",
                data: {
                    //全部菜单数据
                    document:{!! json_encode($document->toArray()) !!},
                    //当前编辑菜单名称
                    current_menu: {},
                    //当前编辑文章数据
                    current_content: {editormd_markdown_doc: ""},
                },
                methods: {
                    //添加一级菜单
                    addTopMenu() {
                        var menu = {name: '', subMenu: []};
                        this.document.menus.push(menu);
                        this.current_menu = menu;
                    },
                    //添加二级菜单
                    addSubMenu(topMenu) {
                        //异步请求给文章表创建一个新数据
                        axios.post("{{route('edu.chapter.store')}}",{document_id:this.document.id}).then((response) => {
                            topMenu.subMenu.push(response.data);
                            this.current_menu = response.data;
                            // var editormd_markdown_doc = {editormd_markdown_doc: response.data.markdown_content};
                            // _this.current_content = editormd_markdown_doc;
                        });
                    },
                    //编辑一级菜单
                    editTopMenu(topMenu) {
                        this.current_menu = topMenu;
                        this.current_content = {};
                    },
                    // 编辑二级菜单
                    editSubMenu(subMenu) {
                        this.current_menu = subMenu;
                        //根据subMenu中的文章id异步请求对应的数据
                        var url = "/admin/docContent/" + subMenu.chapter_id;
                        axios.get(url).then((response) => {
                            this.current_content = {editormd_markdown_doc: response.data.markdown_content};
                            //设置编辑器markdown内容
                            editormd.setMarkdown(response.data.markdown_content);
                        })
                    },
                    //删除一级菜单
                    delTopMenu(item) {
                        if (confirm('确定删除该一级菜单吗')) {
                            this.menus.splice(item, 1);
                        }
                    },
                    //删除二级菜单
                    delSubMenu(topMenu, item) {
                        this.current_menu = {};
                        topMenu.subMenu.splice(item, 1);
                    }
                }
            });

        })
        {{--//设置定时器，每隔10s保存一次数据--}}
        {{--setInterval(() => {--}}
        {{--var url = "{{route('edu.document.update',$document)}}";--}}
        {{--axios.put(url, $('form').serialize()).then(() => {--}}

        {{--})--}}
        {{--}, 10000);--}}
    </script>
@endsection
@push('css')
    <style>
        span.delTopMenuFont, span.delSubMenuFont, span.addSubMenuFont {
            display: none;
        }

        .topMenu:hover span.delTopMenuFont, .topMenu:hover span.addSubMenuFont, .subMenu:hover span.delSubMenuFont {
            display: block;
            cursor: pointer;
        }
    </style>
@endpush
@push('js')
    <script>
        require(['hdjs', 'vue'], function (hdjs) {
            //编辑器
            hdjs.editormd("editormd", {
                width: '100%',
                height: 300,
                toolbarIcons: function () {
                    return [
                        "bold", "del", "italic", "quote", "|",
                        "list-ul", "list-ol", "hr", "|",
                        "link", "hdimage", "code-block", "|",
                        "watch", "preview", "fullscreen"
                    ]
                },
                //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                server: '',
                //editor.md库位置
                path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                onchange() {
                    //每次值发生变化，自动同步vue数据
                    //当编辑器值发生改变时候
                    //获取到编辑器的值设置给vm中field中content
                    vm.$set(vm.current_content, 'editormd_markdown_doc', this.getValue());
                },
            });
        });
    </script>
@endpush