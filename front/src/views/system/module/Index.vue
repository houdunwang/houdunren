<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <a class="nav-link active" href="#">已安装模块</a>
    </nav>
    <div class="card shadow-sm">
      <div class="card-header"> 已安装模块列表</div>
      <div class="card-body" v-if="modules">
        <div class="row" :key="index" v-for="(module,index) in modules">
          <div class="col-4 col-md-1 pt-2">
            <img :src="preview(module)" class="align-middle">
          </div>
          <div class="col-4 col-md-6">
            <strong class="d-block">{{module.package.title}}</strong>
            <small class="text-secondary">标识:{{module.name}}</small>
          </div>
          <div class="col-4 col-md-5 text-right">
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-outline-success"
                      v-if="!module.installed" @click.prevent="install(module)">安装
              </button>
              <button type="button" class="btn btn-outline-primary"
                      v-if="module.installed" @click.prevent="uninstall(module)">卸载
              </button>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Installed",
    data() {
      return {
        modules: []
      }
    },
    async created() {
      let response = await this.axios('/system/module');
      this.modules = response.data.data;
    },
    methods: {
      preview(module) {
        return process.env.VUE_APP_HOST + `/modules/${module.name}/preview.jpg`
      },
      async install(module) {
        let response = await this.axios.post(`system/module`, {name: module.name});
        this.$message.success('安装成功');
        module.installed = true;
      },
      async uninstall(module) {
        let response = await this.axios.delete(`/system/module/${module.name}`);
        this.$message.success('卸载成功');
        module.installed = false;
      },
    }
  }
</script>

<style scoped>
  img {
    max-width: 100%;
    border: solid 1px #ddd;
  }
</style>
