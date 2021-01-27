<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-alert type="info">
            <i class="fa fa-info-circle" aria-hidden="true"></i> 站长拥有对 <span class="text-green-800">{{ site.title }}</span> 站点管理的全部权限
        </el-alert>
        <el-table :data="users" style="width: 100%" border class="mt-3" :stripe="true" :highlight-current-row="true">
            <el-table-column prop="id" label="编号" width="100"> </el-table-column>
            <el-table-column prop="name" label="昵称"> </el-table-column>
            <el-table-column prop="email" label="邮箱"> </el-table-column>
            <el-table-column prop="mobile" label="手机号" width="200"> </el-table-column>
            <el-table-column prop="mobile" label="角色" width="200"> </el-table-column>
            <el-table-column width="200" align="center" #default="{row:user}">
                <el-button-group>
                    <el-button type="danger" :user="user" size="small">设置角色</el-button>
                    <el-button type="info" size="small" @click="remove(user)">移除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
        <div class="mt-3">
            <hd-user title="选择管理员" :action="route('site.admin.search', site)" @change="setAdmin" />
        </div>
    </hd-layout>
</template>
<script>
import tabs from './tabs'
export default {
    props: ['site', 'users'],
    data() {
        return { tabs }
    },
    methods: {
        //设置管理员
        async setAdmin(user) {
            this.$inertia.post(route('site.admin.store', this.site), { user })
        },
        //移除管理员
        async remove(user) {
            this.$confirm('确定删除吗？', '温馨提示').then(() => {
                this.$inertia.delete(route('site.admin.destroy', [this.site, user]))
            })
        }
    }
}
</script>

<style></style>
