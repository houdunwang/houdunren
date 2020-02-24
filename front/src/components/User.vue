<template>
  <div>
    <div class="mb-3">
      <el-input
        placeholder="请输入用户名、手机号或用户编号进行搜索"
        v-model="searchWord"
      >
        <template slot="append">
          <el-button type="primary" @click="get">搜索</el-button>
        </template>
      </el-input>
    </div>
    <div class="card">
      <el-table
        size="small"
        :data="users"
        ref="multipleTable"
        @selection-change="handleSelectionChange"
        tooltip-effect="dark"
      >
        <el-table-column type="selection" width="60"></el-table-column>
        <el-table-column prop="id" label="编号" width="60"></el-table-column>
        <el-table-column prop="name" label="昵称"></el-table-column>
        <el-table-column prop="email" label="邮箱"></el-table-column>
        <el-table-column prop="mobile" label="手机号"></el-table-column>
        <el-table-column prop="group.name" label="会员组"></el-table-column>
      </el-table>
      <div class="card-footer text-muted">
        <el-button size="small" type="primary" @click="$emit('confirm', users)">
          确定
        </el-button>
        <el-button size="small" @click="$emit('cancel')">取消</el-button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    confirm: Function,
    cancel: Function
  },
  data() {
    return {
      searchWord: "",
      users: []
    };
  },
  methods: {
    async get() {
      let response = await this.axios.post(
        `site/${this.$route.params.sid}/user/search`,
        {
          content: this.searchWord
        }
      );
      this.$set(this, "users", response.data.data);
    },
    handleSelectionChange(val) {
      this.multipleSelection = val;
    }
  }
};
</script>

<style></style>
