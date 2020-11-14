<template>
  <div>
    <div class="alert alert-primary" role="alert">链接格式错误的菜单将会被忽略</div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>标题</th>
          <th>链接</th>
          <th width="80"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(menu, index) in menus" :key="index">
          <td>
            <input type="text" class="form-control" placeholder="" v-model="menu.title" @keyup.enter.prevent="submit" />
          </td>
          <td>
            <input type="text" class="form-control" placeholder="" v-model="menu.url" @keyup.enter.prevent="submit" />
          </td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-outline-secondary" @click.prevent="del(index)">删除</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="mt-3">
      <button class="btn btn-primary" @click="submit">保存提交</button>
      <button class="btn btn-info" @click="add">添加菜单</button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    //站点编号
    id: { type: Number, required: true },
  },
  data() {
    return {
      menus: [],
    }
  },
  async mounted() {
    this.menus = await this.axios.get(`/site/${this.id}/menu/get`)
  },
  methods: {
    add() {
      this.menus.push({ title: '', url: '' })
    },
    del(i) {
      this.$confirm('确定删除吗？', '提示', { type: 'warning' }).then(() => {
        this.menus.splice(i, 1)
      })
    },
    async submit() {
      const response = await this.axios.post(`/site/${this.id}/menu`, { menus: this.menus })
    },
  },
}
</script>

<style>
</style>
