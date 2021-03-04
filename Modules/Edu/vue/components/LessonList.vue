<template>
    <div>
        <div v-for="lesson in lessons" :key="lesson.id" class="py-4 border-b border-gray-200 flex justify-between">
            <router-link :to="{ name: 'front.lesson.show', params: { id: lesson.id } }" class="text-base text-gray-500 hover:text-gray-900">
                {{ lesson['title'] | truncate }}
            </router-link>
            <div class="text-sm font-weight-light text-gray-500 mt-2 hidden md:block">共有 {{ lesson.video_num }}个视频</div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['lessons']
}
</script>

<style></style>
