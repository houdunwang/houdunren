<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="15" class="md:full mt-2 border-0" />
        <div v-else>
            <div v-for="activity in activities.data" :key="activity.id">
                <component :is="`Activity${activity.type}`" :activity="activity"></component>
            </div>
            <div class="flex justify-center mt-3">
                <el-pagination
                    :small="true"
                    :page-size="15"
                    v-if="activities.meta"
                    @current-change="load"
                    :current-page="activities.meta.current_page"
                    :total="activities.meta.total"
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
    props: ['action'],
    data() {
        return {
            loading: true,
            activities: [],
            page: 1,
            intervalId: null
        }
    },
    created() {
        this.load(1)
        const intervalId = setInterval(_ => this.load(), 10000)
        this.$once('hook:beforeDestroy', () => {
            clearInterval(intervalId)
        })
    },
    methods: {
        async load(page) {
            this.loading = true
            this.page = page || this.page
            this.activities = await this.axios.get(`${this.action}?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
