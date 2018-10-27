@extends('edu.document.layouts.master')
@section('content')
    <div class="row" id="app" v-cloak="">
        <div class="col-3">
            <div class="card">
                <div v-for="topMenu in document.menus">
                    <div class="card-header">
                        @{{topMenu.title}}
                    </div>
                    <div class="card-block">
                        <div class="list-group border-0">
                            <a href="#" class="list-group-item list-group-item-action border-0"
                               v-for="menu in topMenu.sub_menu">@{{ menu.title }}</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-light btn-sm" @click="addMenu(topMenu)">添加节</button>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-primary btn-sm" @click="addTopMenu">添加大章</button>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label>标题</label>
                            <input type="text" v-model="chapter.title" class="form-control" placeholder=""
                                   aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <div id="editormd">
                                <textarea style="display:none;"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['vue', 'hdjs', 'axios'], function (vue, hdjs, axios) {
            let vm = new vue({
                el: "#app",
                data: {
                    document: {!! json_encode($document->toArray()) !!},
                    chapter: {}
                },
                mounted() {
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
                        path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                        onchange() {
                            vm.$set(vm.chapter, 'content', this.getValue());
                        }
                    });

                    //自动保存章节
                    setInterval(() => {
                        this.saveChapter()
                    }, 1000);
                },
                methods: {
                    //添加大章
                    addTopMenu() {
                        let chapter = {
                            sub_menu: [],
                            content: '',
                            title: '章',
                            'level': 1,
                            document_id: this.document.id
                        };
                        this.document.menus.push(chapter);
                        this.chapter = chapter;
                    },
                    addMenu(menu) {
                        let chapter = {title: '小节', content: 'dfd', 'level': 2, id: 0, document_id: this.document.id};
                        menu.sub_menu.push(chapter);
                        this.chapter = chapter;
                        editormd.setMarkdown(chapter.content);
                    },
                    saveChapter() {
                        if (this.chapter.title && this.chapter.content) {
                            axios.post("{{route('edu.chapter.store')}}", this.chapter).then((respoonse) => {
                                console.log(respoonse);
                            });
                        }
                    }

                }
            })
        })
    </script>
@endpush