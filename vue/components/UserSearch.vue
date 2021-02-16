<template>
    <div>
        <el-button class="mt-3" type="primary" @click="dialogVisible = true">{{ title }}</el-button>
        <el-dialog :visible.sync="dialogVisible" v-bind="$attrs" :lock-scroll="true" :destroy-on-close="true" :center="true" top="5vh" width="80%">
            <el-card shadow="never" :body-style="{ padding: '20px' }">
                <template v-slot:header>
                    <div class="flex justify-between">
                        <el-input v-model="keyword" class="mr-2" placeholder="请输入用户编号" />
                        <el-button type="info" @click.prevent="search(1)">搜索</el-button>
                    </div>
                </template>
                <el-table :data="users.data" style="width: 100%">
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
                <el-pagination background v-if="users.meta" :total="users.meta.total" @current-change="search" class="mt-2" :hide-on-single-page="true">
                </el-pagination>
            </el-card>
        </el-dialog>
    </div>
</template>

<script>
export default {
    props: {
        action: { type: String, default: `site/user` },
        title: { type: String, default: '选择用户' }
    },
    data() {
        return {
            dialogVisible: false,
            keyword: '',
            users: { data: [], meta: {} }
        }
    },
    created() {
        this.search()
    },
    methods: {
        //搜索用户
        async search(page = 1) {
            this.users = await this.axios.get(this.action + `?page=${page}&keyword=${this.keyword}`)
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
