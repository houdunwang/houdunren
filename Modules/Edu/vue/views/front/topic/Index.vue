<template>
    <div class="container-xl">
        <div class="md:flex">
            <div class="md:w-9/12 md:mr-5 mb-5">
                <hd-skeleton-list v-if="loading" :num="15" />
                <div class="card" v-else>
                    <div class="card-header h-14">
                        话题讨论
                    </div>

                    <div class="card-body" v-loading="loading" style="min-height:100px;">
                        <div v-for="topic in topics.data" :key="topic.id" class="py-4 border-b border-gray-200">
                            <div class="row">
                                <div class="col-auto">
                                    <img :src="topic.user.avatar" class="w-12 h-12 rounded-lg" />
                                </div>
                                <div class="col">
                                    <router-link
                                        :to="{ name: 'front.topic.show', params: { id: topic.id } }"
                                        class="text-base font-bold text-gray-500 hover:text-gray-900"
                                    >
                                        {{ topic['title'] | titleSubstr }}
                                    </router-link>
                                    <div class="text-xs text-gray-500 mt-2">{{ user.name }} 更新于 {{ topic['created_at'] | fromNow }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        <el-pagination
                            :small="true"
                            :current-page="topics.meta.current_page"
                            @current-change="load"
                            :total="topics.meta.total"
                            background
                            layout="prev, pager, next"
                        >
                        </el-pagination>
                    </div>
                </div>
            </div>
            <div class="md:w-3/12">
                <community-tip />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: true,
            topics: { meta: {} }
        }
    },
    async created() {
        await this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.topics = await this.axios.get(`front/topic?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
