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
    <a-card
      size="small"
      class="mt-2 shadow-sm"
      :title="m.model.title"
      v-for="m in modules"
      :key="m.model.id"
    >
      <div v-for="(m,name) in m.menu.admin" :key="name" class="p-3 mb-3 border-bottom">
        <h6 class="text-secondary">
          <a-checkbox>{{ m.group.title }}</a-checkbox>
        </h6>
        <a-checkbox
          @change="onChangePermission($event,p.permission)"
          v-for="(p,pi) in m.items"
          :key="pi"
          :checked="permissions.includes(p.permission)"
        >
          {{p.title}}
          <small class="text-secondary">{{deSitePre(p.permission)}}</small>
        </a-checkbox>
      </div>
    </a-card>
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
      this.axios.get(`site/${params.sid}/module/site`),
      this.axios.get(`site/${params.sid}/access/${params.uid}`)
    ])
    this.$set(this, 'modules', response[0].data)
    this.$set(this, 'permissions', response[1].data)
  },
  methods: {
    async submit() {
      let params = this.$route.params
      await this.axios.put(`site/${params.sid}/access/${params.uid}`, {
        permissions: this.permissions
      })
      this.$message.success('权限更新成功')
    },
    onChangePermission(e, permission) {
      if (e.target.checked) {
        this.permissions.push(permission)
      } else {
        this.permissions.splice(this.permissions.indexOf(permission), 1)
      }
    },
    deSitePre(permission) {
      return permission.replace(/^S\d+\-/, '')
    }
  }
}
</script>

<style lang="scss" scoped>
.el-checkbox-group {
  font-size: inherit;
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
}
</style>
