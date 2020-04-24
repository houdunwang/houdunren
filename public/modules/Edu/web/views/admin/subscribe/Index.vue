<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link
        class="nav-link"
        :to="{name:'admin.subscribe.index'}"
        :class="{active:$route.name===`admin.subscribe.index`}"
      >订阅列表</router-link>
      <a class="nav-link" @click="showDialog=true;form={}">添加订阅</a>
    </nav>
    <a-card title="订阅列表" size="small">
      <div
        class="col-12 col-md-4 col-lg-4 mt-3"
        v-for="(subscribe) in subscribes"
        :key="subscribe.id"
      >
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
    </a-card>
    <!-- 修改或编辑 -->
    <a-modal v-model="showDialog" title="会员订阅" @ok="onSubmit">
      <a-form-model :model="form" ref="form">
        <a-form-model-item label="标题">
          <a-input v-model="form.title"></a-input>
        </a-form-model-item>
        <a-form-model-item label="订阅月数">
          <a-input type="number" v-model="form.month"></a-input>
        </a-form-model-item>
        <a-form-model-item label="价格">
          <a-input type="number" v-model="form.price"></a-input>
        </a-form-model-item>
        <a-form-model-item label="图标">
          <a-input v-model="form.icon"></a-input>
          <div class="small text-secondary">
            请访问
            <a
              href="http://www.fontawesome.com.cn/faicons/#new"
              target="_blank"
            >fontawesome.com.cn</a> 网址获取图标
          </div>
        </a-form-model-item>
        <a-form-model-item label="广告语">
          <a-input type="textarea" rows="4" v-model="form.ad"></a-input>
        </a-form-model-item>
      </a-form-model>
    </a-modal>
  </div>
</template>

<script>
import Tab from './Tab'
export default {
  components: { Tab },
  inject: ['sid'],
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
      let response = await this.axios.get(`edu/admin/subscribe?sid=${this.sid}`)
      this.$set(this, 'subscribes', response.data)
    },
    async onSubmit() {
      if (this.form.id) {
        let response = await this.axios.put(`edu/admin/subscribe/${this.form.id}?sid=${this.sid}`, this.form)
      } else {
        let response = await this.axios.post(`edu/admin/subscribe?sid=${this.sid}`, this.form)
      }
      this.showDialog = false
      this.load()
    },
    async del(subscribe) {
      this.$confirm({
        content: '确定删除吗？',
        onOk: async () => {
          await this.axios.delete(`edu/admin/subscribe/${subscribe.id}?sid=${this.sid}`)
          this.load()
        }
      })
    }
  }
}
</script>

<style scoped>
</style>
