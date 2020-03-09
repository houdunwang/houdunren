<template>
  <div>
    <nav class="nav nav-tabs">
      <router-link :to="{name:'tag'}" class="nav-link active">标签列表</router-link>
      <a href="#" class="nav-link" @click.prevent="add">添加标签</a>
    </nav>

    <div class="card mt-2">
      <div class="card-header">标签列表</div>
      <div class="card-body">
        <el-table :data="tags" border stripe>
          <el-table-column
            v-for="col in columns"
            :prop="col.id"
            :key="col.id"
            :label="col.label"
            :width="col.width"
          ></el-table-column>
          <el-table-column label="标签组" width="160">
            <template slot-scope="scope">{{ groupName(scope.row.group) }}</template>
          </el-table-column>
          <el-table-column label="操作" width="120">
            <template slot-scope="scope">
              <div class="btn-group btn-group-sm">
                <button class="btn btn-outline-success" type="button" @click="edit(scope.row)">编辑</button>
                <button
                  class="btn btn-outline-secondary"
                  type="button"
                  @click="del(scope.row.id)"
                >删除</button>
              </div>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>

    <!-- 添加标签 -->
    <el-dialog title="添加标签" :visible.sync="dialogFormVisible">
      <el-form :model="form" label-width="100px" ref="add">
        <el-form-item label="标签名称" prop="name" :rules="[{required:true,message:'标签名称不能为空'}]">
          <el-input v-model="form.name" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="标签组">
          <el-select v-model="form.group" placeholder="请选择标签组" :style="{width:'80%'}">
            <el-option v-for="v in groups" :key="v.name" :label="v.title" :value="v.name"></el-option>
          </el-select>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="save">确 定</el-button>
      </div>
    </el-dialog>
    <!-- 添加标签END -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      tags: [],
      form: {},
      dialogFormVisible: false,
      groups: [
        { title: '视频课程', name: 'lesson' },
        { title: '视频日记', name: 'vlog' }
      ],
      columns: [
        { id: 'id', prop: 'id', label: '编号', width: 60 },
        { id: 'name', prop: 'name', label: '标签名称' }
      ]
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load() {
      let response = await this.axios.get(`edu/admin/tag`)
      this.$set(this, 'tags', response.data.data)
    },
    //编辑更新
    save() {
      this.$refs['add'].validate(async valid => {
        if (valid) {
          let id = this.form.id
          if (id) {
            await this.axios.put(`edu/admin/tag/${id}`, this.form)
          } else {
            await this.axios.post(`edu/admin/tag`, this.form)
          }
          this.dialogFormVisible = false
          this.load()
        }
      })
    },
    add() {
      this.dialogFormVisible = true
      this.form = {}
    },
    edit(tag) {
      this.dialogFormVisible = true
      this.form = { ...tag }
    },
    //删除标签
    async del(id) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '删除',
        type: 'warning'
      })
        .then(async () => {
          await this.axios.delete(`edu/admin/tag/${id}`)
          this.load()
        })
        .catch(() => {})
    },
    //会员组中文标题
    groupName(group) {
      return this.groups.find(v => v.name == group)['title']
    }
  }
}
</script>

<style lang="scss" scoped></style>
