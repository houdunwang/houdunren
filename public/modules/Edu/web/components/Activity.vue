<template>
  <div>
    <div class="d-flex dynamic pt-3 pb-3 border-bottom mb-2">
      <a-avatar :size="45" shape="square" :src="field.user.avatar" class="mr-3"></a-avatar>
      <div class="flex-fill d-flex flex-column">
        <router-link :to="link(field)" class="mb-2 text-muted h5">{{ field.properties.title }}</router-link>
        <span class="small font-weight-light text-muted">
          <small
            class="badge font-weight-light"
            :class="category[field.log_name].class"
          >{{category[field.log_name].title}}</small>
          发表于{{ field.updated_at | dateFormat }}
          <span
            v-if="field.subject.comment_count"
          >. 评论 {{ field.subject.comment_count }}</span>
          <span v-if="field.subject.favour_count">. 点赞 {{ field.subject.favour_count }}</span>
          <span v-if="field.subject.favorite_count">. 收藏 {{ field.subject.favorite_count }}</span>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
const category = {
  topic: { title: '贴子', class: 'badge-success' },
  comment: { title: '评论', class: 'badge-success' },
  sign: { title: '签到', class: 'badge-info' }
}
export default {
  props: { field: { type: Object } },
  data() {
    return { category }
  },
  computed: {
    tag() {
      return type[this.field.log_name[0]]
    }
  },
  methods: {
    link(field) {
      switch (field.log_name) {
        case 'topic':
          return { name: 'topic.show', params: { id: field.subject_id } }
        case 'comment':
          const index = field.subject.comment_type.lastIndexOf('\\')
          const type = field.subject.comment_type.substr(index + 1).toLowerCase()
          return {
            name: `${type}.show`,
            params: { id: field.subject.comment_id },
            query: { comment: field.subject_id }
          }
        case 'sign':
          return { name: 'sign.index' }
        case 'lesson':
          return { name: 'lesson.index', params: { id: field.subject_id } }
      }
    }
  }
}
</script>

<style></style>
