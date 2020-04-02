<template>
  <div>
    <tab />
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        订阅列表
        <button class="btn btn-info btn-sm" @click="showDialog=true;form={}">添加订阅</button>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-4 mb-3" v-for="(subscribe) in subscribes" :key="subscribe.id">
            <div class="card">
              <div class="card-header text-center p-2">{{subscribe.ad}}</div>
              <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <i class="fa fa-4x mt-5 text-primary" :class="subscribe.icon" aria-hidden="true"></i>
                <div class="price h2 mt-4 mb-3">
                  {{subscribe.price}}
                  <span class="font-weight-light h6">元</span>
                </div>
                <span class="month h3 text-secondary font-weight-light">{{subscribe.title}}</span>
              </div>
              <div class="card-footer text-center">
                <div class="btn-group btn-group-sm">
                  <button
                    class="btn btn-outline-success"
                    type="button"
                    aria-label
                    @click="form=subscribe;showDialog=true"
                  >编辑</button>
                  <button
                    class="btn btn-outline-danger"
                    type="button"
                    aria-label
                    @click="del(subscribe)"
                  >删除</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 修改或编辑 -->
    <el-dialog title :visible.sync="showDialog" width="60%">
      <el-form :model="form" ref="form" label-width="80px">
        <el-form-item label="标题">
          <el-input v-model="form.title"></el-input>
        </el-form-item>
        <el-form-item label="订阅月数">
          <el-input type="number" v-model="form.month"></el-input>
        </el-form-item>
        <el-form-item label="价格">
          <el-input type="number" v-model="form.price"></el-input>
        </el-form-item>
        <el-form-item label="图标">
          <el-input v-model="form.icon"></el-input>
          <div class="small text-secondary">
            请访问
            <a
              href="http://www.fontawesome.com.cn/faicons/#new"
              target="_blank"
            >fontawesome.com.cn</a> 网址获取图标
          </div>
        </el-form-item>
        <el-form-item label="广告语">
          <el-input type="textarea" v-model="form.ad"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="onSubmit">立即创建</el-button>
          <el-button @click="showDialog=false">取消</el-button>
        </el-form-item>
      </el-form>
    </el-dialog>
  </div>
</template>

<script>
import Tab from './Tab'
export default {
  components: { Tab },
  data() {
    return {
      subscribes: [],
      showDialog: false,
      form: {}
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load() {
      let response = await this.axios.get(`edu/admin/subscribe`)
      this.$set(this, 'subscribes', response.data)
    },
    async onSubmit() {
      if (this.form.id) {
        let response = await this.axios.put(`edu/admin/subscribe/${this.form.id}`, this.form)
      } else {
        let response = await this.axios.post(`edu/admin/subscribe`, this.form)
      }
      this.showDialog = false
      this.load()
    },
    async del(subscribe) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      })
        .then(async () => {
          await this.axios.delete(`edu/admin/subscribe/${subscribe.id}`)
          this.load()
        })
        .catch(() => {})
    }
  }
}
</script>

<style scoped>
</style>
