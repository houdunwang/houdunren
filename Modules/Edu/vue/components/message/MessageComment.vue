<template>
    <a href="#" @click.prevent="redirect"> <span class="badge bg-orange">评论</span> {{ message.model.title | titleSubstr(20) }} </a>
</template>

<script>
export default {
    props: ['message'],
    methods: {
        async redirect() {
            await axios.delete(`front/message/${this.message.id}`)
            const type = this.message.model.comment_type
                .split('\\')
                .pop()
                .toLowerCase()
            this.$router.push({ name: `front.${type}.show`, params: { id: this.message.model.commentable.id, comment_id: this.message.model.id } })
        }
    }
}
</script>

<style></style>
