<template>
    <div class="container-xl mt-16 md:flex">
        <div class="card md:w-9/12 md:mr-5 mb-5">
            <div class="card-header flex justify-between h-14">
                社区动态
            </div>
            <div class="card-body">
                <topic-recommend />
                <div v-for="activity in activities.data" :key="activity.id">
                    <component :is="`Activity${activity.type}`" :subject="activity.subject"></component>
                </div>
            </div>
            <div class="card-footer">
                <el-pagination
                    :small="true"
                    @current-change="load"
                    v-if="activities.meta"
                    :hide-on-single-page="true"
                    :page-size="12"
                    :total="activities.meta.total"
                    background
                    layout="prev, pager, next"
                >
                </el-pagination>
            </div>
        </div>

        <div class="md:w-3/12">
            <community-tip />
        </div>
    </div>
</template>

<script>
import CommunityTip from '../../components/CommunityTip.vue'
import TopicRecommend from '../../components/TopicRecommend.vue'
export default {
    components: { CommunityTip, TopicRecommend },
    route: { path: '//' },
    data() {
        return {
            activities: []
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.activities = await this.axios.get(`front/activity?page=${page}`)
        }
    }
}
</script>

<style></style>
