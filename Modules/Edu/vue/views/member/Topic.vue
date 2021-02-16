<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="15" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">学习历史</h3>
            </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item" v-for="topic in topics.data" :key="topic.id">
                    <div class="row align-topics-center">
                        <div class="col text-truncate flex justify-between topics-center">
                            <router-link :to="{ name: 'front.topic.show', params: { id: topic.id } }" target="_blank" class="text-body d-block">
                                {{ topic['title'] | titleSubstr }}
                            </router-link>
                            <div class="d-block text-muted text-truncate mt-n1">
                                <div class="btn-group" role="group" aria-label="">
                                    <router-link
                                        :to="{ name: 'front.topic.edit', params: { id: topic.id } }"
                                        target="_blank"
                                        class="btn btn-light text-gray-500"
                                        >编辑</router-link
                                    >
                                    <button type="button" class="btn btn-light text-gray-500" @click.prevent="del(topic)">删除</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    route: { meta: { keepAlive: true } },
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
            this.topics = await this.axios.get(`member/topic?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        },
        async del(topic) {
            this.$confirm('确定删除吗?', '温馨提示').then(async _ => {
                await axios.delete(`front/topic/${topic.id}`)
                this.topics.data.splice(this.topics.data.indexOf(topic), 1)
            })
        }
    }
}
</script>

<style></style>
