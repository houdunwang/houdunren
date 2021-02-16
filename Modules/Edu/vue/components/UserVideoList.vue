<template>
    <div class="card rounded shadow-sm mb-2">
        <div class="card-header bg-white text-muted">
            <i aria-hidden="true" class="fa fa-check-circle-o mr-1"></i>
            学习动态
        </div>
        <hd-skeleton-list v-if="loading" :num="10" />
        <div class="list-group list-group-flush" v-if="!loading">
            <div class="list-group-item" v-for="video in videos" :key="video.id">
                <div class="d-flex align-items-start justify-content-start">
                    <div class="pt-1 mr-2">
                        <a href="https://www.houdunren.com/edu/space/25837/topic">
                            <img :src="video.user.avatar" class="w-10 h-10 object-cover rounded-md" />
                        </a>
                    </div>
                    <div class="">
                        <router-link
                            :to="{ name: 'front.video.show', params: { id: video.video.id } }"
                            class="block mb-1 text-gray-700 text-base hover:text-gray-800"
                        >
                            {{ video.video.title }}
                        </router-link>
                        <div class="text-xs text-gray-500">
                            <a href="https://www.houdunren.com/edu/space/25837/topic" class="text-gray-500">
                                {{ video.user.name }}
                            </a>
                            <i class="fa fa-clock-o"></i>
                            {{ video.created_at | fromNow }}
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
        this.videos = await axios.get(`front/user/video`)
        this.loading = false
    }
}
</script>

<style></style>
