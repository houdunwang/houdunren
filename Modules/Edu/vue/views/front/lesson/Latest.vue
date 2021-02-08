<template>
    <div class="container-xl mt-16">
        <div class="md:flex justify-center">
            <div class="card md:w-8/12 md:mr-5 mb-5">
                <div class="card-header flex justify-between h-14">
                    更新课程
                </div>
                <div class="card-body" v-loading="loading" style="min-height:200px;">
                    <video-list :videos="videos.data" />
                </div>
                <div class="card-footer text-muted flex justify-center">
                    <el-pagination :small="true" @current-change="load" :total="videos.total" background layout="prev, pager, next"> </el-pagination>
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
            this.videos = await this.axios.get(`video?page=${page}`)
            this.loading = false
        }
    }
}
</script>

<style></style>
