<template>
    <div>
        <el-button class="mt-3" type="primary" @click="dialogVisible = true">{{ title }}</el-button>
        <el-dialog :visible.sync="dialogVisible" v-bind="$attrs" :lock-scroll="true" :destroy-on-close="true" :center="true" top="5vh" width="80%">
            <div class="flex justify-between mt-3">
                <el-input v-model="keyword" class="mr-2" placeholder="请输入用户编号、昵称、手机号、邮箱" />
                <el-button type="primary" @click.prevent="load(1)">搜索用户</el-button>
            </div>
            <el-table :data="users.data" style="width: 100%" border stripe class="mt-3">
                <el-table-column prop="id" label="编号" width="100"> </el-table-column>
                <el-table-column label="头像" #default="{row:user}" width="80">
                    <img :src="user.avatar" class="w-8 h-8 rounded-lg object-cover" />
                </el-table-column>
                <el-table-column prop="name" label="昵称"> </el-table-column>
                <el-table-column prop="qq" label="qq"> </el-table-column>
                <el-table-column prop="weibo" label="微博"> </el-table-column>
                <el-table-column label="会员组" #default="{row:user}">
                    {{ user.group.name }}
                </el-table-column>
                <el-table-column width="120" #default="{row:user}" align="center">
                    <el-button type="success" @click="change(user)" size="mini">选择用户</el-button>
                </el-table-column>
            </el-table>
            <el-pagination background v-if="users.meta" :total="users.meta.total" @current-change="load" class="mt-2" :hide-on-single-page="true">
            </el-pagination>
        </el-dialog>
    </div>
</template>

<script>
export default {
    props: {
        sid: { type: Number },
        title: { type: String, default: '选择用户' }
    },
    data() {
        return {
            dialogVisible: false,
            keyword: '',
            users: { data: [], meta: {} },
            action: `user/search`
        }
    },
    created() {
        this.load()
    },
    methods: {
        //搜索用户
        async load(page = 1) {
            this.users = await axios.get(this.action + `?page=${page}&keyword=${this.keyword}`)
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
