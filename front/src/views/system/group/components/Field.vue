<template>
  <master>
    <div class="card">
      <div class="card-header">
        用户组设置
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="name">会员组</label>
          <input type="text" v-model="group.name"
                 class="form-control" id="name" placeholder="请输入会员组名称">
        </div>
        <div class="form-group">
          <label for="num">站点数量</label>
          <input type="number" v-model="group.site_num"
                 class="form-control" id="num" placeholder="可创建的站点数量">
        </div>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header">
        可使用的服务套餐
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
          <tr class="text-secondary font-weight-normal">
            <th>操作</th>
            <th>名称</th>
            <th>可用模块</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(p,index) in packages" :key="index">
            <td>
              <input type="checkbox" v-model="group.package_id" :value="p.id">
            </td>
            <td>{{p.name}}</td>
            <td>
              <span class="badge badge-success mr-1" :key="i" v-for="(module,i) in p.modules">
                {{module.name}}
              </span>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    <button type="button" class="btn btn-success mt-3" @click="submit">保存提交</button>
  </master>
</template>

<script>
  import Master from './Master'

  export default {
    props: ['action'],
    data() {
      return {
        group: {
          name: '',
          site_num: 3,
          package_id: []
        },
        packages: []
      }
    },
    components: {Master},
    async created() {
      let response = await this.axios('/system/package');
      this.$set(this, 'packages', response.data.data);
      if (this.action === 'edit') {
        let id = this.$route.params.id;
        let data = await this.axios.get(`/system/group/${id}`).then(r=>r.data.data);
        this.$set(this, 'group', data);
        this.$set(this.group, 'package_id', data.packages.map(p => p.id));
      }
    },
    methods: {
      async submit() {
        switch (this.action) {
          case 'add':
            await this.axios.post('/system/group', this.group);
            this.$message.success('用户组添加成功');
            this.$router.push({name: 'system.group.index'})
            break;
          case 'edit':
            let id = this.$route.params.id;
            await this.axios.put(`/system/group/${id}`, this.group);
            this.$message.success('用户组编辑成功');
            this.$router.push({name: 'system.group.index'});
            break;
        }
      }
    }
  }
</script>

<style scoped>

</style>
