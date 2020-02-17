<template>
  <master>
    <div class="card shadow-sm">
      <div class="card-header">套餐列表</div>
      <div class="card-body">
        <div v-if="message">
          <h6 class="text-center p-3 text-secondary">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            {{message}}
          </h6>
        </div>
        <table class="table" v-if="packages.length>0">
          <thead>
          <tr>
            <th>名称</th>
            <th>可用模块</th>
            <th>用户组</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="p in packages">
            <td>{{p.name}}</td>
            <td>
              <span class="badge badge-success mr-1" v-for="module in p.modules">
                {{module.name}}
              </span>
            </td>
            <td>
              <span class="badge badge-info mr-1" v-for="g in p.group">
                <router-link :to="{name:'system.group.edit',params:{id:g.id}}" class="text-white">
                  {{g.name}}
                </router-link>
              </span>
            </td>
            <td class="text-right">
              <div class="btn-group btn-group-sm" role="group">
                <router-link class="btn btn-outline-success" :to="{name:'system.package.edit',params:{id:p.id}}">
                  编辑
                </router-link>
                <button type="button" class="btn btn-outline-danger" @click="del(p)">
                  删除
                </button>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </master>
</template>

<script>
  import Master from './components/Master'

  export default {
    components: {Master},
    data() {
      return {
        packages: [],
        message: ''
      }
    },
    async created() {
      let response = await this.axios.get('/system/package');
      this.$set(this, 'packages', response.data.data);
      if(response.data.data.length===0) this.$set(this,'message','你还没有添加任何套餐')
    },
    methods: {
      async del(p) {
        this.$confirm('确定删除吗？', '温馨提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          center: true
        }).then(async () => {
          await this.axios.delete(`/system/package/${p.id}`);
          this.$message.success('删除成功');
          this.$router.go(0)
        });
      }
    }
  }
</script>

<style scoped>
  img {
    max-width: 100%;
    border: solid 1px #ddd;
  }
</style>
