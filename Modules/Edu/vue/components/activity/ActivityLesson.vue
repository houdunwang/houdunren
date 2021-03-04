<template>
    <div class="py-4 border-b border-gray-200">
        <div class="row flex items-center">
            <div class="col-auto">
                <user-avatar :user="activity.causer" />
            </div>
            <div class="col">
                <span class="badge bg-purple">课程</span>
                <router-link :to="{ name: 'front.lesson.show', params: { id: activity.subject.id } }" class="text-base text-gray-600 hover:text-gray-900">
                    {{ activity.subject.title | truncate }}
                </router-link>
                <div class="text-xs text-gray-500 mt-2">
                    <a href="#" @click.prevent="space(activity.causer)">{{ activity.causer.name }}</a>
                    • 发布于{{ activity.updated_at | fromNow }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['activity']
}
</script>

<style></style>
