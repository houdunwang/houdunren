<template>
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <user-avatar :user="message.model.user" classname="w-10 h-10 mr-2" />
            <div class="flex flex-col">
                <a href="#" target="_blank" @click.prevent="redirect" class="align-middle" v-if="message.model">
                    {{ message.model.title | titleSubstr(20) }}
                </a>
                <div v-else>评论已经删除无法查看</div>
                <div class="text-xs text-gray-600">
                    <span class="badge bg-orange text-xs font-weight-lighter mr-1">评论</span>
                    <a href="#" @click.prevent="space(message.model.user)" class="cursor-pointer text-blue-700">{{ message.model.user.name }}</a>
                    / {{ message.created_at | fromNow }}
                </div>
            </div>
        </div>
        <div class="text-sm text-gray-600">
            <button type="button" class="btn btn-light text-gray-500" @click.prevent="del">删除</button>
        </div>
    </div>
</template>

<script>
import UserAvatar from '../UserAvatar.vue'
export default {
    components: { UserAvatar },
    props: ['message'],
    methods: {
        async redirect() {
            await axios.delete(`message/${this.message.id}`)
            const type = this.message.model.comment_type
                .split('\\')
                .pop()
                .toLowerCase()
            this.$router.push({ name: `front.${type}.show`, params: { id: this.message.model.commentable.id, comment_id: this.message.model.id } })
        },
        async del() {
            await axios.delete(`message/${this.message.id}`)
            this.$store.dispatch('siteMessage')
            this.$message('消息已经删除')
        }
    }
}
</script>

<style></style>
