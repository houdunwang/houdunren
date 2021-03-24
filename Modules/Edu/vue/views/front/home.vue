<template>
    <div class="container-xl mt-10">
        <div class="md:flex">
            <div class="md:w-9/12 md:mr-5 mb-5">
                <div class="card ">
                    <div class="card-header flex justify-between h-14">
                        社区动态
                    </div>
                    <div class="card-body">
                        <topic-recommend />
                        <div v-if="activity.data">
                            <activity-list :activities="activity.data" />
                            <div class="flex justify-center mt-3">
                                <el-pagination
                                    :small="true"
                                    :page-size="15"
                                    v-if="activity.meta"
                                    @current-change="load"
                                    :current-page="activity.meta.current_page"
                                    :total="activity.meta.total"
                                    :hide-on-single-page="true"
                                    background
                                    layout="prev, pager, next"
                                >
                                </el-pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:w-3/12">
                <community-tip />
                <user-video-play-list class="mt-3" />
            </div>
        </div>
    </div>
</template>

<script>
import CommunityTip from '../../components/CommunityTip.vue'
import TopicRecommend from '../../components/TopicRecommend.vue'
export default {
    components: { CommunityTip, TopicRecommend },
    route: { path: '//', meta: { keepAlive: true } },
    data() {
        return {
            activity: {},
            page: 1
        }
    },
    watch: {
        $route(route) {
            if (route.name == `front.home`) {
                this.load()
            }
        }
    },
    created() {
        this.load(1)
    },
    methods: {
        async load(page) {
            this.page = page || this.page
            this.activity = await this.axios.get(`activity?page=${page}`)
            document.documentElement.scroll({ top: 0, behavior: 'smooth' })
        }
    }
}
</script>

<style></style>
