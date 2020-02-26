<template>
  <transition name="slide">
    <div>
      <router-link :to="{ name: 'site.add' }" class="btn btn-info mb-3">
        <i class="fa fa-plus"></i> 添加网站
      </router-link>
      <div class="card mb-3 shadow-sm" v-for="site in data" :key="site.id">
        <div class="card-header">
          <div class="row">
            <div class="col-6">套餐</div>
            <div class="col-6 text-right">
              <router-link :to="{ name: 'site.module', params: { sid: site.id } }" class="text-secondary">
                <i class="fa fa-cog"></i> 模块管理
              </router-link>
            </div>
          </div>
        </div>
        <div class="card-body text-dark d-flex align-items-center">
          <i class="fa fa-rss fa-3x mr-3"></i>
          <span class="h4">{{ site.name }}</span>
        </div>
        <div class="card-footer text-muted">
          <div class="d-flex flex-md-row flex-column justify-content-between">
            <div class="small">
              <span class="mr-2">创建时间: {{ site.created_at | dateFormat }}</span>
              <span class="mr-2">站长: {{ site.admin.name }}</span>
              <span class="mr-2">所属组: {{ site.admin.group.name }}</span>
            </div>

            <div class="small">
              <router-link class="text-muted mr-2" :to="{ name: 'site.config', params: { sid: site.id } }">
                <i class="fa fa-life-ring"></i> 网站配置
              </router-link>
              <!-- <router-link class="text-muted mr-2" :to="{ name: 'site.module', params: { sid: site.id } }">
                <i class="fa fa-sitemap"></i> 站点模块
              </router-link> -->
              <a href class="text-muted mr-2"> <i class="fa fa-comment-o"></i> 微信公众号 </a>
              <router-link class="text-muted mr-2" :to="{ name: 'site.user', params: { sid: site.id } }">
                <i class="fa fa-user-o"></i> 用户列表
              </router-link>
              <router-link :to="{ name: 'site.admin', params: { sid: site.id } }" class="text-muted mr-2">
                <i class="fa fa-user-circle-o"></i> 操作员设置
              </router-link>
              <router-link :to="{ name: 'site.edit', params: { sid: site.id } }" class="text-muted mr-2">
                <i class="fa fa-pencil-square-o"></i> 编辑
              </router-link>
              <a href @click.prevent="delSite(site)" class="text-muted"> <i class="fa fa-trash"></i> 删除 </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  data() {
    return {
      data: []
    }
  },
  async created() {
    let response = await this.axios.get('site/site')
    this.$set(this, 'data', response.data.data)
  },
  methods: {
    delSite(site) {
      this.$confirm(`确定删除[${site.name}]吗?`, '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(async () => {
        await this.axios.delete(`/site/site/${site.id}`)
        this.$message.success('删除成功')
        this.$router.go('/admin')
      })
    }
  }
}
</script>
