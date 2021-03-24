<template>
    <div>
        <div v-for="video in videos" :key="video.id" class="py-4 border-b border-gray-200 flex justify-between">
            <router-link
                :to="{ name: 'front.video.show', params: { id: video.id } }"
                class="text-base text-gray-500 font-normal hover:text-gray-900"
                :class="{ 'text-blue-800': id == video.id }"
            >
                {{ video['title'] | truncate }}
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: ['videos', 'id'],
    updated() {}
}
</script>

<style></style>
