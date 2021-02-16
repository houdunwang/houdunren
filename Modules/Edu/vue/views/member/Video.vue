<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="15" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">学习历史</h3>
            </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item" v-for="item in lists.data" :key="item.id">
                    <div class="row align-items-center">
                        <div class="col text-truncate flex justify-between items-center">
                            <router-link
                                :to="{ name: 'front.video.show', params: { id: item.video.id } }"
                                target="_blank"
                                class="text-body d-block text-gray-700"
                            >
                                {{ item.video['title'] | titleSubstr }}
                            </router-link>
                            <small class="d-block text-muted text-truncate mt-n1 text-sm"> {{ item.created_at | fromNow }} </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted flex justify-center">
                <el-pagination
                    :small="true"
                    :page-size="15"
                    :current-page="lists.meta.current_page"
                    v-if="lists.meta"
                    @current-change="load"
                    :total="lists.meta.total"
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
    route: { path: `/Edu/member` },
    data() {
        return {
            loading: true,
            lists: []
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.lists = await this.axios.get(`member/video?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
