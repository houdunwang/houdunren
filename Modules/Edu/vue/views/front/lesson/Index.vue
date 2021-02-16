<template>
    <div class="container-xl">
        <div class="card mb-5">
            <div class="card-header h-14">
                实战课程
            </div>
            <hd-skeleton-card v-if="loading" :num="12" class="md:grid md:grid-cols-4 md:gap-3 p-6" />
            <div class="card-body md:grid md:grid-cols-4 md:gap-3" style="min-height:100px;" v-else>
                <div v-for="lesson in lessons.data" :key="lesson.id" class="py-4 border-b border-gray-200">
                    <router-link :to="{ name: 'front.lesson.show', params: { id: lesson.id } }" class="card card-link">
                        <div class="text-center">
                            <img :src="lesson.thumb" class="h-36 w-full object-cover" />
                        </div>
                        <div class="card-body text-center">
                            <div class="card-title mb-1 text-gray-600">
                                {{ lesson.title | titleSubstr(15) }}
                            </div>
                            <div class="text-muted text-sm">共有{{ lesson.video_num }}个视频</div>
                        </div>
                    </router-link>
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
            this.lessons = await this.axios.get(`front/lesson?page=${page}`)
            this.loading = false
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
