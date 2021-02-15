<template>
    <div class="container-xl mt-16">
        <div class="md:flex justify-center">
            <div class="card md:w-9/12 md:mr-5 mb-5">
                <div class="card-header flex justify-between h-14">
                    最近课程
                </div>
                <div class="card-body" v-loading="loading" style="min-height:200px;">
                    <div v-for="video in videos.data" :key="video.id" class="py-4 border-b border-gray-200 flex justify-between">
                        <router-link :to="{ name: 'front.video.show', params: { id: video.id } }" class="text-base font-bold text-gray-500 hover:text-gray-900">
                            {{ video['title'] | titleSubstr }}
                        </router-link>
                        <span class="text-sm text-gray-400">
                            {{ video.created_at | fromNow }}
                        </span>
                    </div>
                </div>
                <div class="card-footer text-muted flex justify-center">
                    <el-pagination :small="true" :page-size="15" @current-change="load" :total="videos.total" background layout="prev, pager, next">
                    </el-pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: true,
            videos: []
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.videos = await this.axios.get(`front/video?page=${page}`)
            this.loading = false
        }
    }
}
</script>

<style></style>
