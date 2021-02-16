<template>
    <div v-loading="loading">
        <div id="comment-419" class="card shadow-sm mb-2" v-for="(comment, index) in comments.data" :key="comment.id">
            <div class="card-header bg-white d-flex justify-content-start">
                <img :src="comment.user.avatar" class="w-10 h-10 rounded-lg object-cover mr-2" />
                <div class="flex-fill">
                    <div class="text-secondary">
                        <a href="/edu/space/18832/topic">
                            {{ comment.user.name }}
                        </a>
                    </div>
                    <span class="small text-black-50">
                        <i aria-hidden="true" class="fa fa-clock-o"></i>
                        {{ comment.created_at | fromNow }}
                    </span>
                </div>
            </div>
            <div class="card-body text-secondary pb-5 comment-content">
                <!---->
                <div class="markdown" v-html="comment.content" v-markdown></div>
            </div>
            <div class="card-footer text-muted bg-white text-sm">
                # {{ index + 1 }}
                <a href="#" class="d-inline-block mr-2 ml-2 text-gray-500" @click.prevent="reply(comment.user)">
                    <i aria-hidden="true" class="fa fa-reply"></i> 回复
                </a>
                <a href="#" class="d-inline-block text-gray-500" v-if="comment.permissions.delete" @click.prevent="del(comment)">
                    <i class="fas fa-times-circle"></i>
                    删除
                </a>
            </div>
        </div>
        <div class="bg-white p-3 border border-gray-200 rounded-sm shadow-sm" v-if="comments.meta.total > 10">
            <el-pagination
                :small="true"
                :hide-on-single-page="true"
                @current-change="load"
                v-if="comments.meta"
                :total="comments.meta.total"
                background
                layout="prev, pager, next"
            >
            </el-pagination>
        </div>
        <div class="card mt-5" id="commentForm">
            <div class="card-header h-14">
                <div v-if="reply_user.id" class="text-sm">
                    回复：<span class="text-blue-700 font-bold">{{ reply_user.name }}</span>
                    <i class="fas fa-window-close cursor-pointer" @click="reply_user = {}"></i>
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
const form = { content: '', reply_user: null }
export default {
    props: ['actionList', 'actionPost'],
    data() {
        return {
            loading: true,
            comments: { data: [], meta: {} },
            reply_user: {},
            form
        }
    },
    async created() {
        this.load()
    },
    methods: {
        //加载评论
        async load(page = 1) {
            this.loading = true
            this.comments = await axios.get(`${this.actionList}?page=${page}`)
            this.loading = false
        },
        //发表评论
        async onSubmit() {
            const { data: comment } = await axios.post(`${this.actionPost}`, this.form)
            this.form = form
            this.reply_user = {}
            this.$refs.editor.setHtml()
            this.$store.commit('setErrors')
            this.comments.data.push(comment)
        },
        async del(comment) {
            this.$confirm('确定删除评论吗?', '温馨提示').then(async _ => {
                await axios.delete(`front/comment/${comment.id}`)
                this.comments.data.splice(this.comments.data.indexOf(comment), 1)
            })
        },
        //回复
        reply(user) {
            this.reply_user = user
            this.scrollForm()
        },
        //滚动到回复框
        scrollForm() {
            const el = document.querySelector('#commentForm')
            const pos = el.getBoundingClientRect()
            document.documentElement.scroll({ top: pos.y + document.documentElement.scrollTop, behavior: 'smooth' })
        }
    }
}
</script>

<style>
.comment-content pre {
    padding: 0 !important;
    margin: 0 -1rem !important;
}
.comment-content pre code {
    font-size: 0.85rem !important;
    padding: 2rem;
    line-height: 1.5rem;
}
</style>
