<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-table :data="wechats" style="width: 100%" border>
            <el-table-column prop="id" label="编号" width="100"> </el-table-column>
            <el-table-column prop="title" label="公众号名称"> </el-table-column>
            <el-table-column prop="name" label="微信号"> </el-table-column>
            <el-table-column label="微信号" #default="{ row: wechat }">
                <el-popover placement="top-start" title="扫描二维码关注公众号" width="200" trigger="hover">
                    <template v-slot>
                        <el-image
                            slot="reference"
                            style="width: 150px; height: 150px"
                            :src="wechat.qr"
                            fit="cover"
                        ></el-image>
                    </template>
                    <el-image
                        slot="reference"
                        style="width: 50px; height: 50px"
                        :src="wechat.qr"
                        fit="cover"
                    ></el-image>
                </el-popover>
            </el-table-column>
            <el-table-column label="类型" #default="scope">
                {{ scope.row.type == 'subscribe' ? '订阅号' : '服务号' }}
            </el-table-column>
            <el-table-column align="center" width="400" #default="scope">
                <el-button-group size="small">
                    <el-button type="primary" size="small">同步粉丝</el-button>
                    <el-button type="info" size="small">微信菜单</el-button>
                    <el-button type="success" size="small">
                        <inertia-link :href="route('wechat.default.edit', scope.row)">默认消息</inertia-link>
                    </el-button>
                    <el-button type="primary" size="small">
                        <inertia-link :href="route('wechat.wechat.edit', scope.row)">编辑</inertia-link>
                    </el-button>
                    <el-button type="warning" size="small" @click="del(scope.row)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </hd-layout>
</template>

<script>
import tabs from '../tabs'
export default {
    props: ['site', 'wechats'],
    data() {
        return {
            tabs: tabs(this.site)
        }
    },
    methods: {
        del(wechat) {
            this.$confirm('确定删除吗？', '温馨提示')
                .then(() => {
                    this.$inertia.delete(route('wechat.wechat.destroy', wechat))
                })
                .catch(() => {})
        }
    }
}
</script>

<style>
</style>
