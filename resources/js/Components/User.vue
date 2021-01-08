<template>
    <div>
        <el-button class="mt-3" type="primary" @click="dialogVisible = true">{{ title }}</el-button>
        <el-dialog :visible.sync="dialogVisible" v-bind="$attrs" :lock-scroll="true" :destroy-on-close="true" :center="true" top="5vh" width="80%">
            <el-card shadow="never" :body-style="{ padding: '20px' }">
                <template v-slot:header>
                    <div class="flex justify-between">
                        <el-input v-model="keyword" class="mr-2" placeholder="搜索关键词" />
                        <el-button type="info" @click="search">搜索</el-button>
                    </div>
                </template>
                <el-table :data="users" style="width: 100%">
                    <el-table-column prop="id" label="编号" width="100"> </el-table-column>
                    <el-table-column prop="nickname" label="昵称"> </el-table-column>
                    <el-table-column prop="email" label="邮箱"> </el-table-column>
                    <el-table-column prop="mobile" label="手机号"> </el-table-column>
                    <el-table-column width="120" #default="{row:user}" align="center">
                        <el-button type="success" @click="change(user)" size="mini">选择用户</el-button>
                    </el-table-column>
                </el-table>
            </el-card>
        </el-dialog>
    </div>
</template>

<script>
export default {
    props: {
        action: { type: String },
        title: { type: String, default: '选择用户' }
    },
    data() {
        return {
            dialogVisible: false,
            keyword: '',
            users: []
        }
    },
    methods: {
        //搜索用户
        async search() {
            let { data: users } = await this.axios.post(this.action.valueOf(), { keyword: this.keyword })
            this.users = users
        },
        //选择用户
        change(user) {
            this.dialogVisible = false
            this.$emit('change', user)
        }
    }
}
</script>

<style></style>
