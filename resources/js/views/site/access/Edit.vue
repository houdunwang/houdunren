<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link
        class="nav-link"
        :to="{ name: 'site.admin', params: { sid: $route.params.sid } }"
      >操作员管理</router-link>
      <a class="nav-link active" href="#">权限设置</a>
    </nav>

    <el-checkbox-group v-model="permissions">
      <div class="card mb-2 shadow-sm" v-for="module in modules" :key="module.model.id">
        <div class="card-header">{{ module.config.title }}</div>
        <div class="card-body">
          <div
            class="pl-0 mb-3 bg-white p-3 border shadow-sm rounded"
            v-for="menu in module.menu.admin"
            :key="menu.group.title"
          >
            <h6 class="text-secondary mb-2">{{menu.group.title}}</h6>
            <div class="row">
              <el-checkbox
                class="col-6 col-md-3 col-lg-2"
                :label="item.permission"
                v-for="item in menu.items"
                :key="item.title"
              >{{item.title}}</el-checkbox>
            </div>
          </div>
        </div>
      </div>
    </el-checkbox-group>
    <button class="btn btn-primary mt-3" @click="submit">保存权限</button>
  </div>
</template>

<script>
import _ from 'lodash'
export default {
  data() {
    return {
      modules: [],
      //用户拥有的权限
      permissions: []
    }
  },
  async created() {
    const params = this.$route.params
    let response = await Promise.all([
      this.axios.get(`site/${params.sid}/module/site`).then(r => r.data.data),
      this.axios.get(`site/${params.sid}/access/${params.uid}`).then(r => r.data.data)
    ])
    this.$set(this, 'modules', response[0])
    this.$set(this, 'permissions', response[1])
  },
  methods: {
    async submit() {
      let params = this.$route.params
      await this.axios.put(`site/${params.sid}/access/${params.uid}`, {
        permissions: this.permissions
      })
      this.$message.success('权限更新成功')
    },
    batchPermission(items) {
      items.map(item => {
        this.permissions.push(item.permission)
      })
      //去重
      this.permissions = _.union(this.permissions)
    }
  }
}
</script>

<style lang="scss" scoped>
h6 {
  cursor: pointer;
  &::before {
    content: '';
    display: inline-block;
    width: 4px;
    height: 12px;
    background: #666;
    margin-right: 5px;
  }
}
</style>
