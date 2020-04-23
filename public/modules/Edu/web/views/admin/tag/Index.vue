<template>
  <div>
    <nav class="nav nav-tabs nav-stacked mb-2">
      <a class="nav-link active" href="#">标签管理</a>
    </nav>
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        标签列表
        <button class="btn btn-outline-info btn-sm" @click="showDialog=true;form={}">添加标签</button>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6 col-md-3" v-for="tag in tags" :key="tag.id">
            <div class="input-group mb-3">
              <input type="text" class="form-control" v-model="tag.title" @change="update(tag)" />
              <div class="input-group-append">
                <button
                  type="button"
                  class="input-group-text"
                  id="basic-addon2"
                  @click="del(tag)"
                >删除</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 添加标签组 -->
    <a-modal title="添加标签组" v-model="showDialog" @ok="add">
      <a-form-model>
        <a-form-model-item label="标签名称">
          <a-input v-model="form.title"></a-input>
        </a-form-model-item>
      </a-form-model>
    </a-modal>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  data() {
    return {
      showDialog: false,
      tags: [],
      form: {}
    }
  },
  computed: {
    ...mapState('site', ['site'])
  },
  created() {
    this.load()
  },
  methods: {
    async load() {
      let response = await this.axios.get(`edu/admin/tag?sid=${this.site.id}`)
      this.$set(this, `tags`, response.data)
    },
    del(tag) {
      this.$confirm({
        content: '确定删除吗？',
        onOk: async () => {
          await this.axios.delete(`edu/admin/tag/${tag.id}?sid=${this.site.id}`)
          this.load()
        }
      })
    },
    async update(tag) {
      await this.axios.put(`edu/admin/tag/${tag.id}?sid=${this.site.id}`, tag)
      this.load()
      this.showDialog = false
      this.$message.success('修改成功')
    },
    async add() {
      await this.axios.post(`edu/admin/tag?sid=${this.site.id}`, this.form)
      this.load()
      this.showDialog = false
    }
  }
}
</script>

<style>
</style>
