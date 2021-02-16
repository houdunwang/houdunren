<template>
    <div class="container-xl">
        <div class="flex justify-center">
            <div class="card mb-5 w-full">
                <div class="card-header h-14">
                    系统课程
                </div>
                <hd-skeleton-card v-if="loading" :num="9" class=" md:grid md:grid-cols-3 md:gap-5 p-6" />
                <div class="card-body md:grid md:grid-cols-3 md:gap-5" style="min-height:100px;" v-else>
                    <div v-for="lesson in lessons.data" :key="lesson.id" class="py-4">
                        <router-link :to="{ name: 'front.system.show', params: { id: lesson.id } }" class="card card-link">
                            <div class="text-center">
                                <img :src="lesson.preview" />
                            </div>
                            <div class="card-body text-center pb-3 pt-0">
                                <div class="card-title">
                                    {{ lesson.title | titleSubstr(20) }}
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>

                <div class="card-footer text-muted flex justify-center">
                    <el-pagination
                        :small="true"
                        @current-change="load"
                        :hide-on-single-page="true"
                        :page-size="12"
                        :total="lessons.meta.total"
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
            this.lessons = await this.axios.get(`front/system?page=${page}`)
            this.loading = false
        }
    }
}
</script>

<style></style>
