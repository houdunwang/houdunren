<template>
    <div class="container-xl">
        <div class="m-auto md:w-9/12 mb-5">
            <hd-skeleton-list v-if="loading" :num="15" />
            <div class="card" v-else>
                <div class="card-header flex justify-between h-14">
                    最近课程
                </div>
                <div class="card-body" v-loading="loading" style="min-height:200px;">
                    <div v-for="video in videos.data" :key="video.id" class="py-4 border-b border-gray-200 flex justify-between">
                        <router-link :to="{ name: 'front.video.show', params: { id: video.id } }" class="text-base text-gray-700 hover:text-gray-900">
                            {{ video['title'] | titleSubstr }}
                        </router-link>
                        <span class="text-sm text-gray-400">
                            {{ video.created_at | fromNow }}
                        </span>
                    </div>
                </div>
                <div class="card-footer text-muted flex justify-center">
                    <el-pagination
                        :small="true"
                        :page-size="15"
                        :current-page="videos.meta.current_page"
                        @current-change="load"
                        :total="videos.meta.total"
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
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
