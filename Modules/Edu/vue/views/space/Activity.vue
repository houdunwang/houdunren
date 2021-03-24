<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">TA的贴子</h3>
        </div>
        <div class="card-body">
            <div v-if="activity.data">
                <activity-list :activities="activity.data" />
                <div class="flex justify-center mt-3">
                    <el-pagination
                        :small="true"
                        :page-size="15"
                        v-if="activity.meta"
                        @current-change="load"
                        :current-page="activity.meta.current_page"
                        :total="activity.meta.total"
                        :hide-on-single-page="true"
                        background
                        layout="prev, pager, next"
                    >
                    </el-pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    route: { path: `:id/activity` },
    data() {
        return {
            loading: true,
            page: 1,
            activity: {}
        }
    },
    watch: {
        $route(route) {
            if (route.name == `space.activity`) {
                this.load()
            }
        }
    },
    created() {
        this.load()
    },
    methods: {
        async load(page) {
            this.loading = true
            this.page = page || this.page
            this.activity = await this.axios.get(`activity/user/${this.$route.params.id}?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
