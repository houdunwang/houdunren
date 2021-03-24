<template>
    <div class="py-4 border-b border-gray-200">
        <div class="row flex items-center">
            <div class="col-auto">
                <user-avatar :user="activity.causer" />
            </div>
            <div class="col">
                <router-link :to="{ name: 'front.sign.index' }" class="text-base text-gray-700 hover:text-gray-900 ">
                    {{ activity.subject.content | truncate }}
                </router-link>

                <div class="text-xs text-gray-500 mt-2">
                    <span class="badge bg-teal">每日签到</span>
                    <a href="#" @click.prevent="space(activity.causer)">{{ activity.causer.name }}</a>
                    • 签到于{{ activity.updated_at | fromNow }}
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
