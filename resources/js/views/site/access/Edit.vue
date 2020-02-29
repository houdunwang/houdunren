<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link
        class="nav-link"
        :to="{ name: 'site.admin',params:{sid:$route.params.sid} }"
      >操作员管理</router-link>
      <a class="nav-link active" href="#">权限设置</a>
    </nav>

    <el-checkbox-group v-model="permissions">
      <div class="card mb-2 shadow-sm" v-for="module in modules" :key="module.model.id">
        <div class="card-header bg-light">{{ module.config.title }}</div>
        <div class="card-body bg-light">
          <div v-for="category in module.menu.admin" :key="category.category.title">
            <div
              class="mb-2 p-2 border bg-light shadow-sm"
              v-for="menu in category.menus"
              :key="menu.group.title"
            >
              <h6 class="text-secondary pt-1" @click="batchPermission(menu.items)">
                <i class="fa fa-th-list mr-1" aria-hidden="true"></i>
                {{menu.group.title}}
              </h6>
              <div class="row">
                <div class="col-6 col-md-2" v-for="item in menu.items" :key="item.title">
                  <el-checkbox :label="item.permission">{{ item.title }}</el-checkbox>
                </div>
              </div>
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
.el-checkbox-group {
  font-size: inherit;
}
h6 {
  cursor: pointer;
}
</style>
