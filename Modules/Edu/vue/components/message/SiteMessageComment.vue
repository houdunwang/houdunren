<template>
    <div class="flex justify-between items-center">
        <div class="flex items-top">
            <span class="badge bg-orange text-xs font-weight-lighter mr-2">评论</span>
            <div class="flex flex-col">
                <a href="#" target="_blank" @click.prevent="redirect" class="align-middle" v-if="message.model">
                    {{ message.model.title | titleSubstr(20) }}
                </a>
                <div v-else>评论已经删除无法查看</div>
                <div class="text-xs text-gray-600">
                    {{ message.created_at | fromNow }}
                </div>
            </div>
        </div>
        <div class="text-sm text-gray-600">
            <button type="button" class="btn btn-light text-gray-500" @click.prevent="del">删除</button>
        </div>
    </div>
</template>

<script>
export default {
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
            this.$confirm('确定删除吗？', '温馨提示').then(_ => {
                this.$message('消息已经删除')
                this.$store.dispatch('message')
            })
        }
    }
}
</script>

<style></style>
