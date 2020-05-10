<template>
  <div class="container mt-5 mb-5">
    <div class="card">
      <div class="card-header bg-white">发表贴子</div>
      <div class="card-body">
        <div class="form-group">
          <label for>标题</label>
          <input
            type="text"
            v-model="form.title"
            class="form-control"
            aria-describedby="helpId"
            placeholder
          />
        </div>
        <div class="form-group">
          <a-checkbox-group :options="tags" v-model="form.tags"></a-checkbox-group>
        </div>
        <div class="form-group">
          <label for>内容</label>
          <editor
            height="500px"
            ref="editor"
            :field.sync="form.content"
            :initialValue="form.content"
          />
        </div>
      </div>
      <div class="card-footer text-muted bg-white">
        <button class="btn btn-primary" @click.prevent="onSubmit">保存提交</button>
      </div>
    </div>
  </div>
</template>

<script>
import Editor from '@/components/Editor'
export default {
  props: {
    action: { type: String },
    method: { type: String, default: 'post' },
    title: { type: String },
    form: {
      type: Object,
      default() {
        return { title: '', content: '', tags: [] }
      }
    }
  },
  components: { Editor },
  data() {
    return {
      tags: []
    }
  },
  created() {
    this.loadTags()
  },
  methods: {
    async onSubmit() {
      if (this.form.content.trim() === '') {
        this.$message.error('内容不能为空')
        return
      }
      let response = await this.axios[this.method](this.action, this.form)
      this.$message.success('发表成功')
      this.$router.push({ name: 'topic.index' })
    },
    //编辑器内容更改
    contentChange(value) {
      this.form.content = value
    },
    async loadTags() {
      let response = await this.axios.get(`edu/front/tag`)
      this.$set(
        this,
        'tags',
        response.data.map(tag => {
          return { label: tag.title, value: tag.id }
        })
      )
    }
  }
}
</script>

<style>
</style>
