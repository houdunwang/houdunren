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
                        <activity-list :action="`activity`" />
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
            loading: true
        }
    }
}
</script>

<style></style>
