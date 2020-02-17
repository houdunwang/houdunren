<template>
  <master>
    <div class="card">
      <div class="card-header">
        服务套餐管理
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="name">服务套餐名称</label>
          <input type="text" v-model="package.name"
                 class="form-control" id="name" placeholder="请输入套餐中文名称">
        </div>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header">
        套餐模块选择
      </div>
      <div class="card-body">
        <table class="table" v-if="moduleList.length>0">
          <thead>
          <tr class="text-secondary font-weight-normal">
            <th>操作</th>
            <th>模块名称</th>
            <th>模块标识</th>
            <th>版本号</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(module,index) in moduleList" :key="index">
            <td>
              <input type="checkbox" v-model="package.modules" :value="module.model.id">
            </td>
            <td>{{module.package.title}}</td>
            <td>{{module.name}}</td>
            <td>{{module.package.version}}</td>
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
        package: {
          name: '',
          modules: []
        },
        moduleList: []
      }
    },
    components: {Master},
    async created() {
      let response = await this.axios('/system/module/installed');
      this.$set(this, 'moduleList', response.data.data);
      if (this.action === 'edit') {
        let id = this.$route.params.id;
        let response = await this.axios.get(`/system/package/${id}`);
        this.$set(this.package, 'name', response.data.data.name);
        this.$set(this.package, 'modules', response.data.data.modules.map(m=>m.id))
      }
    },
    methods: {
      async submit() {
        switch (this.action) {
          case 'add':
            await this.axios.post('/system/package', this.package);
            this.$message.success('套餐添加成功');
            this.$router.push({name: 'system.package.index'});
            break;
          case 'edit':
            let id = this.$route.params.id;
            await this.axios.put(`/system/package/${id}`, this.package);
            this.$message.success('套餐编辑成功');
            this.$router.push({name: 'system.package.index'});
            break;
        }
      }
    }
  }
</script>

<style scoped>

</style>
