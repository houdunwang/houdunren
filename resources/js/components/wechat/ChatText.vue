<template>
  <div class="card">
    <div class="card-header">文本回复内容</div>
    <div class="card-body">
      <div class="card mb-3" v-for="(content,index) in text.contents" :key="index">
        <div class="card-body">
          <div class="form-group">
            <textarea class="form-control" rows="3" v-model="text.contents[index]" required></textarea>
          </div>
        </div>
        <div class="card-footer text-muted">
          <button class="btn btn-outline-secondary btn-sm" type="button" @click="del(index)">删除</button>
        </div>
      </div>

      <textarea name="text" v-html="text" hidden></textarea>
    </div>
    <div class="card-footer text-muted">
      <button class="btn btn-secondary btn-sm" type="button" @click="add">添加文本回复</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: { type: Number, default: 0 },
  },
  data() {
    return {
      text: {
        id: 0,
        contents: [],
      },
    }
  },
  async mounted() {
    if (this.id) {
      const response = await this.axios(`wechat/text/${this.id}`)
      this.text = response
    }
  },
  methods: {
    add() {
      this.text.contents.push('')
    },
    del(index) {
      this.$confirm('确定删除吗？').then(() => {
        this.contents.splice(index, 1)
      })
    },
  },
}
</script>

<style lang="scss" scoped>
</style>
