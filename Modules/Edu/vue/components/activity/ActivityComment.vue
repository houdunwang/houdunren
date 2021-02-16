<template>
    <div class="py-4 border-b border-gray-200">
        <div class="row">
            <div class="col-auto">
                <img :src="subject.user.avatar" class="w-12 h-12 rounded-lg object-cover" />
            </div>
            <div class="col">
                <router-link :to="{ name: 'front.sign.index' }" class="text-base text-gray-600 hover:text-gray-900 ">
                    {{ subject.content.replace(/<\/?.+?>/g, '') | titleSubstr(45) }}
                </router-link>
                <div class="text-xs text-gray-500 mt-2">
                    <span class="badge bg-orange">评论</span> {{ subject.user.name }} • 评论于{{ subject['created_at'] | fromNow }}
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
