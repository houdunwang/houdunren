<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <a class="nav-link active" href="#">已安装模块</a>
    </nav>
    <div class="card shadow-sm">
      <div class="card-header"> 已安装模块列表</div>
      <div class="card-body pt-1" v-if="modules">
        <div class="row border-bottom pb-3 pt-3" :key="index" v-for="(module,index) in modules">
          <div class="col-3 col-md-1">
            <img :src="preview(module)" class="shadow-sm">
          </div>
          <div class="col-4 col-md-6 pt-1">
            <strong class="d-block">{{module.package.title}}</strong>
            <small class="text-secondary">标识:{{module.name}}</small>
          </div>
          <div class="col-4 col-md-5 text-right pt-2">
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-outline-success"
                      v-if="!module.model" @click.prevent="install(module)">安装
              </button>
              <button type="button" class="btn btn-outline-primary"
                      v-if="module.model" @click.prevent="uninstall(module)">卸载
              </button>
            </div>
          </div>
          <hr>
        </div>
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
        await this.axios.post(`system/module`, {name: module.name});
        this.$message.success('安装成功');
        module.model = true;
      },
      async uninstall(module) {
        await this.axios.delete(`/system/module/${module.name}`);
        this.$message.success('卸载成功');
        module.model = false;
      },
    }
  }
</script>

<style scoped>
  img {
    border-radius: 50%;
    height: 50px;
    width: 50px;
    border: solid 1px #ddd;
  }
</style>
