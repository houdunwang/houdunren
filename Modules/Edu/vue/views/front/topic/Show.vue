<template>
    <div class="container-xl mt-16">
        <div class="md:flex">
            <div class="md:w-9/12 md:mr-5 mb-5">
                <div class="card hd-code" v-loading="loading">
                    <div class="card-header flex flex-col items-start px-10 pt-10 leading-9 text-xl font-weight-lighter ">
                        {{ form.title }}
                        <div class="w-full flex justify-between items-center mt-2">
                            <div class="text-sm text-gray-500">{{ form.user.name }} 更新于{{ form.updated_at | fromNow }}</div>
                            <div v-if="isLogin && form.permissions">
                                <div class="btn-group btn-group-sm" role="group" aria-label="">
                                    <button type="button" class="btn btn-outline-info" v-if="form.permissions.delete" @click.prevent="del">删除</button>
                                    <button type="button" class="btn btn-outline-info" v-if="form.permissions.update">编辑</button>
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
                    <div
                        class="card-body leading-8 px-10 py-10 text-gray-700"
                        v-if="form.content"
                        style="min-height:100px;"
                        v-html="form.content"
                        v-markdown
                    ></div>
                </div>
                <comment-list class="mt-5" :action-list="`front/topic/${$route.params.id}/comments`" :action-post="`front/topic/${$route.params.id}/comment`" />
            </div>
            <div class="md:w-3/12">
                <community-tip />
            </div>
        </div>
    </div>
</template>

<script>
import CommentList from '../../../components/CommentList.vue'
export default {
    components: { CommentList },
    route: { path: `topic/:id/show` },
    data() {
        return {
            loading: true,
            form: { user: {} }
        }
    },
    async created() {
        this.form = await this.axios.get(`front/topic/${this.$route.params.id}`)
        this.loading = false
    },
    methods: {
        async del() {
            this.$confirm('确定删除吗？', '温馨提示').then(async _ => {
                await axios.delete(`front/topic/${this.form.id}`)
                this.router('front.topic.index')
            })
        },
        async recommend() {
            const { data: topic } = await axios.get(`front/topic/${this.form.id}/recommend`)
            this.form = topic
        }
    }
}
</script>

<style></style>
