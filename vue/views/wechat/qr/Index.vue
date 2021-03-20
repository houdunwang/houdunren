<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-table :data="qrs.data" border stripe>
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column label="类型" #default="{row:qr}">
                <span v-if="qr.type == 'QR_SCENE'">临时二维码</span>
                <span v-else>永久二维码</span>
            </el-table-column>
            <el-table-column label="二维码" #default="{row:qr}">
                <el-popover placement="top" width="200" trigger="hover">
                    <el-image :src="`https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=${qr.content.ticket}`" fit="cover"></el-image>
                    <el-image
                        slot="reference"
                        :src="`https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=${qr.content.ticket}`"
                        fit="cover"
                        class="w-10 h-10"
                    ></el-image>
                </el-popover>
            </el-table-column>
            <el-table-column prop="scene_type" label="场景类型" #default="{row:qr}">
                <span v-if="qr.scene_type == 'id'">整数</span>
                <span v-else>字符串</span>
            </el-table-column>
            <el-table-column prop="scene_value" label="场景值"> </el-table-column>
            <el-table-column label="有效" #default="{row:qr}">
                {{ qr.state ? '有效' : '过期' }}
            </el-table-column>
            <el-table-column prop="scene_type" label="创建时间" #default="{row:qr}">
                {{ qr.created_at | format }}
            </el-table-column>
            <el-table-column width="80" align="center">
                <el-button-group>
                    <el-button type="danger" size="mini">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
import tabs from './tabs'
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '描述', id: 'title' }
]
export default {
    data() {
        return {
            tabs,
            sid: this.$route.query.sid,
            wechat: {},
            columns,
            qrs: { data: [] }
        }
    },
    async created() {
        this.wechat = await axios.get(`site/${this.sid}/wechat/${this.$route.query.wid}`)
        this.qrs = await axios.get(`site/${this.sid}/wechat/${this.$route.query.wid}/qr`)
    },
    methods: {
        qrImg(url) {}
    }
}
</script>

<style></style>
