<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="15" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">TA的贴子</h3>
            </div>
            <div class="list-group list-group-flush" v-if="topics.data.length > 0">
                <div class="list-group-item" v-for="topic in topics.data" :key="topic.id">
                    <div class="row align-topics-center">
                        <div class="col text-truncate flex justify-between topics-center">
                            <router-link :to="{ name: 'front.topic.show', params: { id: topic.id } }" target="_blank" class="text-body d-block">
                                {{ topic['title'] | titleSubstr }}
                            </router-link>
                            <div class="text-gray-600 text-sm">
                                {{ topic.updated_at | fromNow }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-group list-group-flush flex  justify-center items-center text-gray-700 py-6" v-else>
                还没有发表贴子...
            </div>
            <div class="card-footer text-muted flex justify-center">
                <el-pagination
                    :small="true"
                    :page-size="15"
                    v-if="topics.meta"
                    @current-change="load"
                    :current-page="topics.meta.current_page"
                    :total="topics.meta.total"
                    :hide-on-single-page="true"
                    background
                    layout="prev, pager, next"
                >
                </el-pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    route: { path: `:id/topic` },
    data() {
        return {
            loading: true,
            topics: []
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.topics = await this.axios.get(`user/topic/user/${this.$route.params.id}?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
