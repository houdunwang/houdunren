<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-alert effect="light" closable> 正在管理【{{ site.title }}】站点的公众号 </el-alert>

        <el-table :data="wechats" style="width: 100%" border v-loading="loading">
            <el-table-column prop="id" label="编号" width="100"> </el-table-column>
            <el-table-column prop="title" label="公众号名称"> </el-table-column>
            <el-table-column prop="name" label="微信号"> </el-table-column>
            <el-table-column label="微信号" #default="{ row: wechat }">
                <el-popover placement="top-start" title="扫描二维码关注公众号" width="200" trigger="hover">
                    <template v-slot>
                        <el-image slot="reference" style="width: 150px; height: 150px" :src="wechat.qr" fit="cover"></el-image>
                    </template>
                    <el-image slot="reference" style="width: 50px; height: 50px" :src="wechat.qr" fit="cover"></el-image>
                </el-popover>
            </el-table-column>

            <el-table-column label="类型" #default="scope">
                {{ scope.row.type == 'subscribe' ? '订阅号' : '服务号' }}
            </el-table-column>

            <el-table-column header-align="center" align="center" prop="prop" label="API" #default="{ row: wechat }">
                {{ `${site.domain}/wechat/api/${site.id}/${wechat.id}` }}
            </el-table-column>

            <el-table-column align="center" width="400" #default="{ row: wechat }">
                <el-button-group size="small">
                    <el-button type="primary" size="small" @click="sync(wechat)" :disabled="isSync">同步粉丝</el-button>
                    <el-button type="info" size="small" @click="route('wechat.menu.edit', { sid: site.id, id: wechat.id })">
                        微信菜单
                    </el-button>
                    <el-button type="success" size="small" @click="route('wechat.default.edit', { sid: site.id, id: wechat.id })">
                        默认消息
                    </el-button>
                    <el-button type="primary" size="small" @click="$router.push({ name: 'wechat.wechat.edit', params: { sid: site.id, id: wechat.id } })">
                        编辑
                    </el-button>
                    <el-button type="warning" size="small" @click="del(wechat)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    route: { path: `:sid/wechat` },
    data() {
        return {
            tabs: tabs({ sid: this.$route.params.sid }),
            site: {},
            wechats: [],
            isSync: false,
            loading: true
        }
    },
    async created() {
        const sid = this.$route.params.sid
        ;[this.site, this.wechats] = await Promise.all([axios.get(`site/${sid}`), axios.get(`site/${sid}/wechat`)])
        this.loading = false
    },
    methods: {
        del(wechat) {
            this.$confirm('确定删除吗？', '温馨提示')
                .then(async () => {
                    await axios.delete(`site/${this.site.id}/wechat/${wechat.id}`)
                    this.wechats.splice(this.wechats.indexOf(wechat), 1)
                })
                .catch(() => {})
        },
        //同步粉丝
        async sync(wechat, nextOpenid = '') {
            this.isSync = true
            this.$message('粉丝同步中...')
            const response = await axios.get(`site/${this.site.id}/wechat/${wechat.id}/user/sync?next_openid=${nextOpenid}`)
            if (response.data.next_openid) {
                this.sync(wechat, response.data.next_openid)
            }
            this.isSync = false
        }
    }
}
</script>

<style></style>
