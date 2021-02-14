<template>
    <div v-loading="loading" style="min-height:300px">
        <div class="bg-gray-900">
            <div class="container-xl">
                <div id="mse"></div>
            </div>
        </div>
        <div class="container-xl mt-3">
            <div class="card">
                <div class="card-body row">
                    <div class="col-12 col-md-7">
                        <h5 class="text-secondary">
                            {{ form.title }}
                        </h5>
                        <router-link :to="{ name: 'front.lesson.show', params: { id: lesson.id } }" class="text-sm pt-2 font-weight-light">
                            <i aria-hidden="true" class="fa fa-folder-o"></i>
                            {{ lesson.title }}
                        </router-link>
                    </div>
                    <div class="col-12 col-md-5 mt-2 mt-md-0 d-flex justify-content-md-end justify-content-start flex-wrap">
                        <div class="btn-group btn-group-sm align-items-center mr-1" v-if="prev">
                            <router-link :to="{ name: 'front.video.show', params: { id: prev.id } }" class="btn btn-outline-info">上集</router-link>
                        </div>
                        <div class="btn-group btn-group-sm align-items-center mr-1" v-if="next">
                            <router-link :to="{ name: 'front.video.show', params: { id: next.id } }" class="btn btn-outline-success">下集</router-link>
                        </div>
                        <!-- <div class="btn-group btn-group-sm align-items-center">
                            <a href="https://www.houdunren.com/common/favorite/Video/13021/Edu" class="btn btn-outline-secondary"
                                ><i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                            </a>
                            <button type="button" class="btn btn-outline-secondary">
                                8
                            </button>
                            <a href="https://www.houdunren.com/common/favour/Video/13021/Edu" class="btn btn-outline-secondary"
                                ><i aria-hidden="true" class="fa fa-thumbs-o-up"></i> 点赞
                            </a>
                            <button type="button" class="btn btn-outline-secondary">
                                12
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl mt-3 md:flex">
            <div class="card md:w-9/12 md:mr-5 mb-5">
                <div class="card-header flex justify-between h-14">
                    评论
                </div>
                <div class="card-body"></div>
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
            this.form = await this.axios.get(`video/${this.$route.params.id}`)
            this.lesson = await this.axios.get(`lesson/${this.form.lesson_id}`)
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
