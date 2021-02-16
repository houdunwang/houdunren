<template>
    <div v-loading="loading" :class="{ 'h-screen': loading }" class="-mt-10">
        <div class="bg-gray-900">
            <div class="container-xl">
                <div id="mse"></div>
            </div>
        </div>
        <div class="container-xl mt-3">
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 col-md-7">
                        <h5 class="text-base pt-2 text-gray-500">
                            {{ form.title }}
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
            <div class="md:w-9/12 md:mr-5 mb-5">
                <comment-list :action-list="`front/video/${$route.params.id}/comments`" :action-post="`front/video/${$route.params.id}/comment`" />
            </div>

            <div class="md:w-3/12">
                <div class="card">
                    <div class="card-header h-14">
                        课程列表
                    </div>
                    <div class="card-body">
                        <video-list :videos="lesson.videos" :id="$route.params.id" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Player from 'xgplayer'
export default {
    route: { path: `video/:id/show`, meta: { auth: true } },
    data() {
        return {
            loading: true,
            player: {},
            form: {},
            lesson: { videos: [] }
        }
    },
    computed: {
        currentIndex() {
            return this.lesson.videos.findIndex(l => l.id == this.form.id)
        },
        next() {
            return this.lesson.videos[this.currentIndex + 1]
        },
        prev() {
            return this.lesson.videos[this.currentIndex - 1]
        }
    },
    watch: {
        $route(to) {
            this.init()
        }
    },
    // updated() {
    //     this.init()
    // },
    async created() {
        this.init()
    },
    methods: {
        async init() {
            this.form = await this.axios.get(`front/video/${this.$route.params.id}`)
            this.lesson = await this.axios.get(`front/lesson/${this.form.lesson_id}`)
            this.$nextTick(() => {
                this.player = new Player({
                    id: 'mse',
                    url: this.form.path,
                    fluid: true,
                    poster: '/images/poster.jpeg',
                    playbackRate: [0.5, 0.75, 1, 1.5, 2],
                    miniplayer: true,
                    autoplay: true,
                    miniplayerConfig: {
                        bottom: 200,
                        right: 0,
                        width: 320,
                        height: 180
                    }
                })
            })
            this.loading = false
        },
        play() {
            let player = new Player({
                id: 'mse',
                url: this.form.path
            })
        }
    }
}
</script>

<style></style>
