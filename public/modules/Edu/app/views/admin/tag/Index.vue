<template>
  <div>
    <tab />
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        标签管理
        <button class="btn btn-outline-info btn-sm" @click="showDialog=true;form={}">添加标签</button>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-6 col-md-3" v-for="tag in tags" :key="tag.id">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                aria-label="Recipient's username"
                aria-describedby="basic-addon2"
                v-model="tag.title"
                @keyup.enter="update(tag)"
              />
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
    <el-dialog title="添加标签组" :visible.sync="showDialog" width="50%">
      <el-form :model="form" ref="form" label-width="80px">
        <el-form-item label="标签名称">
          <el-input v-model="form.title"></el-input>
        </el-form-item>
      </el-form>
      <span slot="footer">
        <el-button @click="showDialog= false">取 消</el-button>
        <el-button type="primary" @click="add">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import Tab from './Tab'
export default {
  components: { Tab },
  data() {
    return {
      showDialog: false,
      tags: [],
      form: {}
    }
  },
  created() {
    this.load()
  },
  methods: {
    async load() {
      let response = await this.axios.get(`edu/admin/tag`)
      this.$set(this, `tags`, response.data)
    },
    del(tag) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      })
        .then(async () => {
          await this.axios.delete(`edu/admin/tag/${tag.id}`)
          this.load()
        })
        .catch(() => {})
    },
    async update(tag) {
      await this.axios.put(`edu/admin/tag/${tag.id}`, tag)
      this.load()
      this.showDialog = false
      this.$message.success('修改成功')
    },
    async add() {
      await this.axios.post(`edu/admin/tag`, this.form)
      this.load()
      this.showDialog = false
    }
  }
}
</script>

<style>
</style>
