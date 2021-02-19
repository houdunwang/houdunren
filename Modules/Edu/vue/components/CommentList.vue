<template>
    <div v-loading="loading" id="comment-list">
        <div :id="`comment-${comment.id}`" class="card shadow mb-5" v-for="comment in comments.data" :key="comment.id">
            <!-- 评论 -->
            <div class="card-header bg-white d-flex justify-content-start">
                <img :src="comment.user.avatar" class="w-8 h-8 rounded object-cover mr-2" />
                <div class="flex flex-col ">
                    <a href="/edu/space/18832/topic" class="flex-fill text-secondary">
                        {{ comment.user.name }}
                    </a>
                    <div class="text-xs text-gray-600 flex flex-row">
                        <div class="mr-3"><i class="far fa-clock"></i> {{ comment.created_at | fromNow }}</div>
                        <a href="" @click.prevent="comment.show_reply = !comment.show_reply" v-if="comment.replys && comment.replys.length > 0">
                            <i class="far fa-comment-dots"></i> 回复列表
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-secondary pb-5 comment-content pl-5 mt-5 reply-container">
                <div class="markdown" v-html="comment.content" v-markdown></div>
            </div>
            <!-- 评论END -->
            <!-- 回复 -->
            <div v-if="comment.replys && comment.replys.length > 0 && comment.form.show" class="text-secondary pb-5 pl-8 reply-container">
                <div class="border-t border-dashed border-gray-200 py-3 flex" v-for="reply in comment.replys" :key="reply.id" :id="`comment-${reply.id}`">
                    <img :src="reply.user.avatar" class="w-6 h-6 object-cover mr-2 rounded" />
                    <div class="flex flex-col">
                        <div class="bg-white d-flex justify-content-start">
                            <div class="flex-fill flex items-center">
                                <div class="text-secondary mr-2">
                                    <a href="/edu/space/18832/topic" class="text-sm">
                                        {{ reply.user.name }}
                                    </a>
                                </div>
                                <span class="text-xs text-gray-600 mr-2">
                                    <i class="far fa-clock"></i>
                                    {{ reply.created_at | fromNow }}
                                </span>
                                <a
                                    href=""
                                    @click.prevent="
                                        comment.form.reply_id = reply.id
                                        comment.form.content = `@${reply.user.name} `
                                    "
                                    class="d-inline-block text-gray-500 text-xs mr-2"
                                >
                                    <i aria-hidden="true" class="fa fa-reply"></i> 回复
                                </a>
                                <a
                                    href="#"
                                    class="d-inline-block text-gray-500 text-xs"
                                    v-if="reply.permissions.delete"
                                    @click.prevent="del(comment.replys, reply)"
                                >
                                    <i class="fas fa-times-circle"></i>
                                    删除
                                </a>
                            </div>
                        </div>
                        <div class="pt-3 text-secondary text-sm mr-5">
                            <a href="#" v-if="reply.parent" class="underline"> @ {{ reply.parent.user.name }} </a>
                            <div class="markdown inline-block" v-html="reply.content" v-markdown></div>
                        </div>
                    </div>
                </div>
                <div class="pr-5 ml-8">
                    <el-input
                        class="flex-1 rounded-none mr-1 mb-2"
                        type="textarea"
                        v-model="comment.form.content"
                        :placeholder="`支持markdown语法`"
                        size="normal"
                        clearable
                    ></el-input>
                    <el-button type="primary" size="mini" @click.prevent="quickReply(comment)" class="flex-grow-0">发送</el-button>
                </div>
            </div>
            <!-- 回复END -->
            <div class="card-footer text-muted bg-white text-sm">
                # {{ comment.id }}
                <a
                    href="#"
                    class="d-inline-block mr-2 ml-2 text-gray-500"
                    @click.prevent="
                        form = { reply_id: comment.id, content: '', comment: comment }
                        scrollTo('#comment-form')
                    "
                >
                    <i aria-hidden="true" class="fa fa-reply"></i> 回复
                </a>
                <a href="#" class="d-inline-block text-gray-500" v-if="comment.permissions.delete" @click.prevent="del(comments.data, comment)">
                    <i class="fas fa-times-circle"></i>
                    删除
                </a>
            </div>
        </div>
        <div class="bg-white p-3 border border-gray-200 rounded-sm shadow-sm" v-if="comments.meta && comments.meta.total > 10">
            <el-pagination
                v-if="comments.meta"
                :small="true"
                :hide-on-single-page="true"
                :current-page="comments.meta.current_page"
                :total="comments.meta.total"
                :page-size="15"
                @current-change="load"
                background
                layout="prev, pager, next"
            >
            </el-pagination>
        </div>
        <div class="card mt-5" id="comment-form">
            <div class="card-header h-14">
                <div v-if="form.comment" class="text-sm">
                    回复：<span class="text-blue-700 font-bold">{{ form.comment.user.name }}</span>
                    <i class="fas fa-window-close cursor-pointer" @click="form = {}"></i>
                </div>
                <div v-else class="font-bold text-gray-600">发表评论</div>
            </div>
            <div class="card-body">
                <hd-tui-editor v-model="form.content" initialEditType="markdown" class="border" :action="`/upload/site/${site.id}`" ref="editor" />
                <hd-error name="content" />
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-azure" @click="onSubmit">保存提交</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['actionList', 'actionPost'],
    data() {
        return {
            loading: true,
            comments: {},
            page: 1,
            //回复的评论
            form: {}
        }
    },
    watch: {
        $route() {
            this.load()
        }
    },
    async created() {
        this.loadByComment(this.$route.params.comment_id)
    },
    methods: {
        format(comments) {
            comments.data.forEach(m => (m.form = { reply_id: m.id, content: `@${m.user.name} `, show: true, user: m.user }))
            this.comments = comments
        },
        async loadByComment(commentId) {
            this.loading = true
            const comments = await axios.get(`${this.actionList}?comment_id=${commentId}`)
            this.format(comments)
            this.scrollTo(`#comment-${commentId}`)
            this.loading = false
        },
        //加载评论
        async load(page = 1) {
            this.page = page
            this.loading = true
            const comments = await axios.get(`${this.actionList}?page=${page}`)
            this.format(comments)
            this.loading = false
            this.scrollTo('#comment-list')
        },
        //发表评论
        async onSubmit() {
            const { data: comment } = await axios.post(`${this.actionPost}`, this.form)
            this.$refs.editor.setHtml()
            this.loadByComment(comment.id)
        },
        //快捷回复
        async quickReply(comment) {
            const { data } = await axios.post(this.actionPost, comment.form)
            comment.form = { content: '', reply_id: comment.id, show: true }
            comment.replys.push(data)
        },

        async del(comments, comment) {
            this.$confirm('确定删除评论吗?', '温馨提示').then(async _ => {
                await axios.delete(`front/comment/${comment.id}`)
                comments.splice(comments.indexOf(comment), 1)
            })
        }
    }
}
</script>

<style>
.comment-content pre {
    padding: 0 !important;
    margin: 0 -1rem !important;
}
.reply-container pre {
    padding: 0 !important;
}
</style>
