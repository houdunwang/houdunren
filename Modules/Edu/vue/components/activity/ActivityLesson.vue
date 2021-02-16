<template>
    <div class="py-4 border-b border-gray-200">
        <div class="row">
            <div class="col-auto">
                <img :src="subject.user.avatar" class="w-12 h-12 rounded-lg object-cover" />
            </div>
            <div class="col">
                <span class="badge bg-purple">课程</span>
                <router-link :to="{ name: 'front.lesson.show', params: { id: subject.id } }" class="text-base text-gray-600 hover:text-gray-900">
                    {{ subject.title | titleSubstr }}
                </router-link>
                <div class="text-xs text-gray-500 mt-2">{{ subject.user.name }} • 发布于{{ subject['created_at'] | fromNow }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['subject']
}
</script>

<style></style>
