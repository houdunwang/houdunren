<template>
    <div class="py-4 border-b border-gray-200" v-if="subject.commentable">
        <div class="row">
            <div class="col-auto">
                <img :src="subject.user.avatar" class="w-12 h-12 rounded-lg object-cover" />
            </div>
            <div class="col">
                <a href="#" @click.prevent="to(subject)" class="text-base text-gray-600 hover:text-gray-900 ">
                    {{ subject.content.replace(/<\/?.+?>/g, '') | titleSubstr(45) }}
                </a>
                <div class="text-xs text-gray-500 mt-2">
                    <span class="badge bg-orange">评论</span> {{ subject.user.name }} • 评论于{{ subject['created_at'] | fromNow }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['subject'],
    methods: {
        to(comment) {
            console.log(comment)

            const type = comment.comment_type
                .split('\\')
                .pop()
                .toLowerCase()
            if (type == 'topic') {
                this.$router.push({ name: `front.${type}.show`, params: { id: comment.comment_id, comment_id: comment.id } })
            } else {
                this.$router.push({ name: `front.video.show`, params: { id: comment.comment_id, comment_id: comment.id } })
            }
        }
    }
}
</script>

<style></style>
