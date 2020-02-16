<template>
  <master>
    <div class="card shadow-sm">
      <div class="card-header">套餐列表</div>
      <div class="card-body">
        <table class="table">
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
              <span class="badge badge-success" v-for="module in p.modules">
                {{module.name}}
              </span>
            </td>
            <td>
              <span class="badge badge-info">会员组</span>
            </td>
            <td class="text-right">
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-success">编辑</button>
                <button type="button" class="btn btn-outline-danger">删除</button>
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
        packages: []
      }
    },
    async created() {
      let response = await this.axios.get('/system/package');
      this.$set(this, 'packages', response.data.data);
      // console.log(response.data.data);
    },
    methods: {}
  }
</script>

<style scoped>
  img {
    max-width: 100%;
    border: solid 1px #ddd;
  }
</style>
