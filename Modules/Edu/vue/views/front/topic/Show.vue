<template>
    <div class="container-xl topic-show mt-10">
        <div class="md:flex">
            <div class="md:w-9/12 md:mr-5 mb-5">
                <!-- 贴子内容 -->
                <div class="card topic" v-loading="loading">
                    <div class="card-header flex flex-col items-start p-2 md:p-8 leading-9 text-xl font-weight-lighter ">
                        {{ form.title }}
                        <div class="w-full flex justify-between items-center mt-2">
                            <div class="text-sm text-gray-500">{{ form.user.name }} 更新于{{ form.updated_at | fromNow }}</div>
                            <div v-if="isLogin && form.permissions">
                                <div class="btn-group btn-group-sm" role="group" aria-label="">
                                    <button type="button" class="btn btn-outline-danger" v-if="form.permissions.delete" @click.prevent="del(form)">删除</button>
                                    <router-link
                                        :to="{ name: 'front.topic.edit', params: { id: form.id } }"
                                        class="btn btn-outline-cyan"
                                        v-if="form.permissions.update"
                                    >
                                        编辑
                                    </router-link>
                                    <button
                                        type="button"
                                        class="btn "
                                        v-if="form.permissions.recommend"
                                        @click.prevent="recommend"
                                        :class="{ 'btn-teal': form.recommend, 'btn-outline-secondary': !form.recommend }"
                                    >
                                        推荐
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 正文内容 -->
                    <div
                        class="card-body leading-8 p-3 md:p-8 text-gray-700 markdown"
                        v-if="form.content"
                        style="min-height:100px;"
                        v-html="form.content"
                        v-markdown
                    ></div>
                    <!-- 正文内容END -->
                </div>
                <!-- 贴子内容END -->
                <comment-list
                    class="mt-5"
                    :key="$route.params.id"
                    :action-list="`comment/topic/${$route.params.id}`"
                    :action-post="`comment/topic/${$route.params.id}`"
                />
            </div>
            <div class="md:w-3/12">
                <community-tip />
            </div>
            <image-preview />
        </div>
    </div>
</template>

<script>
import CommentList from '../../../components/CommentList.vue'
export default {
    components: { CommentList },
    route: { path: `topic/:id/show/:comment_id?` },
    data() {
        return {
            loading: true,
            form: { user: {} }
        }
    },
    async created() {
        this.load()
    },

    watch: {
        $route(to) {
            this.load()
        }
    },
    methods: {
        async load() {
            this.loading = true
            this.form = await this.axios.get(`topic/${this.$route.params.id}`)
            this.loading = false
        },
        async del() {
            this.$confirm('确定删除吗？', '温馨提示').then(async _ => {
                await axios.delete(`front/topic/${this.form.id}`)
                this.router('front.topic.index')
            })
        },
        //推荐设置
        async recommend() {
            const { data: topic } = await axios.get(`topic/${this.form.id}/recommend`)
            this.form = topic
        },
        async del(topic) {
            this.$confirm('确定删除吗?', '温馨提示').then(async _ => {
                await axios.delete(`topic/${topic.id}`)
                this.router('front.topic.index')
            })
        }
    }
}
</script>

<style>
.topic pre {
    padding: 0 !important;
    margin: 2rem -2rem !important;
    border-left: none !important;
    border-right: none !important;
    border-radius: 0 !important;
}
@media screen and (max-width: 768px) {
    .topic pre {
        margin: 2rem -0.75rem !important;
    }
}
</style>
