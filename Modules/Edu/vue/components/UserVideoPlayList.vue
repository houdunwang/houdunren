<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="10" />
        <div class="card rounded shadow-sm mb-2" v-else>
            <div class="card-header bg-white text-muted">
                <i aria-hidden="true" class="fa fa-check-circle-o mr-1"></i>
                学习动态
            </div>

            <div class="list-group list-group-flush">
                <div class="list-group-item" v-for="video in videos" :key="video.id">
                    <div class="d-flex align-items-start justify-content-start">
                        <div class="pt-1 mr-2">
                            <user-avatar :user="video.user" classname="w-10 h-10" />
                        </div>
                        <div class="flex-1">
                            <router-link
                                :to="{ name: 'front.video.show', params: { id: video.video.id } }"
                                class="block mb-1 text-gray-700 text-base hover:text-gray-800"
                            >
                                {{ video.video.title }}
                            </router-link>
                            <div class="text-xs text-gray-500">
                                <a href="#" @click.prevent="space(video.user)" class="text-gray-500">{{ video.user.name }}</a>
                                <i class="fa fa-clock-o"></i>
                                {{ video.updated_at | fromNow }}
                            </div>
                        </div>
                    </div>
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
        const intervalId = setInterval(_ => this.load(), 10000)
        this.$once('hook:beforeDestroy', () => {
            clearInterval(intervalId)
        })
        this.loading = false
    },
    methods: {
        async load() {
            this.videos = await axios.get(`video/play/list`)
        }
    }
}
</script>

<style></style>
