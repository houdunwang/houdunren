<template>
  <master>
    <div class="card shadow-sm">
      <div class="card-header">套餐列表</div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>名称</th>
              <th>可创建站点数量</th>
              <th>套餐</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="g in groups" :key="g.id">
              <td>{{ g.name }}</td>
              <td>
                <span class="badge badge-info">{{ g.site_num }}</span>
              </td>
              <td>
                <span
                  class="badge badge-success mr-2"
                  v-for="p in g.packages"
                  :key="p.id"
                >
                  <router-link
                    :to="{ name: 'system.package.edit', params: { id: p.id } }"
                    class="text-white"
                  >
                    {{ p.name }}
                  </router-link>
                </span>
              </td>
              <td class="text-right">
                <div class="btn-group btn-group-sm" role="group">
                  <router-link
                    class="btn btn-outline-success"
                    :to="{ name: 'system.group.edit', params: { id: g.id } }"
                  >
                    编辑
                  </router-link>
                  <button
                    type="button"
                    class="btn btn-outline-danger"
                    @click="del(g)"
                  >
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
import Master from "./components/Master";

export default {
  components: { Master },
  data() {
    return {
      groups: []
    };
  },
  async created() {
    let response = await this.axios.get("/system/group");
    this.$set(this, "groups", response.data.data);
  },
  methods: {
    async del(g) {
      this.$confirm("确定删除吗？", "温馨提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        center: true
      }).then(async () => {
        await this.axios.delete(`/system/group/${g.id}`);
        this.$message.success("删除成功");
        this.$router.go(0);
      });
    }
  }
};
</script>

<style scoped>
img {
  max-width: 100%;
  border: solid 1px #ddd;
}
</style>
