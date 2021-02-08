<template>
    <div>
        <div v-for="video in videos" :key="video.id" class="py-4 border-b border-gray-200 flex justify-between">
            <router-link :to="{ name: 'front.video.show', params: { id: video.id } }" class="text-sm font-weight-lighter text-gray-500 hover:text-gray-900">
                {{ video['title'] | titleSubstr }}
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: ['videos']
}
</script>

<style></style>
