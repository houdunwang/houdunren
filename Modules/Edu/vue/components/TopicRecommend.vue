<template>
    <div>
        <div class="py-4 border-b border-gray-200" v-for="topic in topics" :key="topic.id">
            <div class="row">
                <div class="col-auto">
                    <img :src="topic.user.avatar" class="w-12 h-12 rounded-lg object-cover" />
                </div>
                <div class="col">
                    <router-link :to="{ name: 'front.topic.show', params: { id: topic.id } }" class="text-base text-gray-600 hover:text-gray-900">
                        {{ topic['title'] | titleSubstr }}
                    </router-link>
                    <div class="text-xs text-gray-500 mt-2">
                        <span class="badge bg-red">推荐</span> {{ topic.user.name }} • 更新于{{ topic['updated_at'] | fromNow }}
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
            topics: []
        }
    },
    async created() {
        this.topics = await axios.get(`topic/recommend`)
    }
}
</script>

<style></style>
