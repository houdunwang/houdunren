<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="15" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">TA的粉丝</h3>
            </div>
            <div class="grid grid-cols-2 gap-1 md:grid-cols-5 md:gap-3 p-5" v-if="users.data && users.data.length > 0">
                <user-card :member="user" v-for="user in users.data" :key="user.id" />
            </div>
            <div class="list-group list-group-flush flex  justify-center items-center text-gray-700 py-6" v-else>
                关注TA吧，可能就是未来的大牛...
            </div>
            <div class="card-footer text-muted flex justify-center">
                <el-pagination
                    :small="true"
                    :page-size="18"
                    v-if="users.meta"
                    @current-change="load"
                    :current-page="users.meta.current_page"
                    :total="users.meta.total"
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
    route: { path: `:id/fans` },
    data() {
        return {
            loading: true,
            users: []
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.users = await this.axios.get(`/api/site/${this.site.id}/fans/user/${this.$route.params.id}?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
