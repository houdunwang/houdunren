<template>
    <div v-loading="loading" :class="{ 'h-screen': loading }" class="-mt-10">
        <div class="bg-gray-900">
            <div class="container-xl">
                <div id="mse" class="" style="z-index:1000"></div>
            </div>
        </div>
        <div class="container-xl mt-3">
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 col-md-7">
                        <h5 class="text-base pt-2 text-gray-500">
                            {{ video.title }}
                        </h5>
                        <router-link :to="{ name: 'front.lesson.show', params: { id: lesson.id } }" class="text-sm font-weight-light pt-2 text-gray-500">
                            <i aria-hidden="true" class="fa fa-folder-o"></i>
                            <i class="far fa-folder-open"></i> {{ lesson.title }}
                        </router-link>
                    </div>
                    <div class="col-12 col-md-5 mt-2 mt-md-0 d-flex justify-content-md-end justify-content-start flex-wrap">
                        <div class="btn-group align-items-center mr-1">
                            <router-link :to="{ name: 'front.video.show', params: { id: prev.id } }" class="btn btn-outline-info" v-if="prev">上集</router-link>
                            <router-link :to="{ name: 'front.video.show', params: { id: next.id } }" class="btn btn-outline-success" v-if="next">
                                下集
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl mt-3 md:flex">
            <div class="md:w-9/12 md:mr-5 mb-5 order-2 md:order-1">
                <comment-list
                    :key="$route.params.id"
                    :action-list="`front/comment/video/${$route.params.id}`"
                    :action-post="`front/comment/video/${$route.params.id}`"
                />
            </div>
            <div class="md:w-3/12 order-1 md:order-2">
                <div class="card">
                    <div class="card-header h-14">
                        课程列表
                    </div>
                    <div class="card-body">
                        <div v-for="v in lesson.videos" :key="v.id" class="py-4 border-b border-gray-200 flex justify-between">
                            <router-link
                                :to="{ name: 'front.video.show', params: { id: v.id } }"
                                :class="{ 'text-blue-800 font-bold': video.id == v.id }"
                                class="text-base text-gray-500 font-normal hover:text-gray-900"
                            >
                                {{ v['title'] | titleSubstr }}
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Player from 'xgplayer'
export default {
    route: { path: `video/:id/show/:comment_id?`, meta: { auth: true } },
    data() {
        return {
            loading: true,
            player: {},
            video: {},
            lesson: { videos: [] }
        }
    },
    computed: {
        currentIndex() {
            return this.lesson.videos.findIndex(l => l.id == this.video.id)
        },
        next() {
            return this.lesson.videos[this.currentIndex + 1]
        },
        prev() {
            return this.lesson.videos[this.currentIndex - 1]
        }
    },
    watch: {
        async $route(to) {
            this.player.destroy(true)
            await this.init(to.params.id, true)
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    },
    async created() {
        await this.init(this.$route.params.id)
    },
    methods: {
        async init(id, autoplay = false) {
            this.video = await this.axios.get(`front/video/${id}`)
            this.lesson = await this.axios.get(`front/lesson/${this.video.lesson_id}`)
            this.player = new Player({
                id: 'mse',
                url: this.video.path,
                autoplay,
                fluid: true,
                poster: '/images/poster.jpeg',
                playbackRate: [0.5, 0.75, 1, 1.5, 2]
            })
            this.loading = false
        }
    }
}
</script>

<style></style>
