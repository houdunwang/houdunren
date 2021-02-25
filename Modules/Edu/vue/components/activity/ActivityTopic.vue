<template>
    <div class="py-4 border-b border-gray-200">
        <div class="row flex items-center">
            <div class="col-auto">
                <user-avatar :user="subject.user" />
            </div>
            <div class="col">
                <router-link :to="{ name: 'front.topic.show', params: { id: subject.id } }" class="text-base text-gray-600 hover:text-gray-900">
                    {{ subject['title'] | titleSubstr(50) }}
                </router-link>
                <div class="text-xs text-gray-500 mt-2">
                    <span class="badge bg-purple">贴子</span>
                    <a href="#" @click.prevent="space(subject.user)">{{ subject.user.name }}</a>
                    • 发表于{{ subject['created_at'] | fromNow }}
                </div>
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
