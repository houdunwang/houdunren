<template>
    <div class="container-xl mt-10">
        <div class="card border-0">
            <div class="card-header h-14">
                实战课程
            </div>
            <hd-skeleton-card v-if="loading" :num="12" class="md:grid md:grid-cols-4 md:gap-3 p-6" />
            <div class="card-body grid md:grid-cols-4 gap-5" style="min-height:100px;" v-else>
                <div v-for="lesson in lessons.data" :key="lesson.id">
                    <lesson-card :lesson="lesson" />
                </div>
            </div>
            <div class="card-footer text-muted flex justify-center">
                <el-pagination
                    :small="true"
                    @current-change="load"
                    :current-page="lessons.meta.current_page"
                    :page-size="12"
                    :total="lessons.meta.total"
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
            lessons: { meta: {} }
        }
    },
    async created() {
        await this.load()
        this.loading = false
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.lessons = await this.axios.get(`lesson?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
