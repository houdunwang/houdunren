<template>
  <div class="container mt-5">
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
          <label for>内容</label>
          <editors height="500px" ref="editor" @contentChange="contentChange" />
        </div>
      </div>
      <div class="card-footer text-muted bg-white">
        <button class="btn btn-primary" @click.prevent="onSubmit">保存提交</button>
      </div>
    </div>
  </div>
</template>

<script>
import Editors from '../components/Editor'
import _ from 'lodash'
export default {
  components: { Editors },
  created() {},
  data() {
    return {
      form: { title: '', content: '' }
    }
  },
  methods: {
    async onSubmit() {
      if (_.trim(this.form.content) === '') {
        this.$message.error('内容不能为空')
        return
      }
      let response = await this.axios.post(`edu/front/topic`, this.form)
      this.$message.success('发表成功')
      this.$router.push({ name: 'topic' })
    },
    //编辑器内容更改
    contentChange(value) {
      this.form.content = value
    }
  }
}
</script>

<style>
</style>
