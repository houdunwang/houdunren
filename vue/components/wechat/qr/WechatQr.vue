<template>
    <div>
        <el-alert type="info" class="mb-3">
            <ul>
                <li>因为微信服务器不允许删除素材，所以删除素材只是从网站数据库中删除</li>
            </ul>
        </el-alert>
        <el-table :data="qrs.data" border stripe v-loading="loading">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column label="类型" #default="{row:qr}">
                <span v-if="qr.type == 'QR_SCENE'">临时二维码</span>
                <span v-else>永久二维码</span>
            </el-table-column>
            <el-table-column label="二维码" #default="{row:qr}">
                <el-popover placement="top" width="200" trigger="hover">
                    <el-image :src="`https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=${qr.response.ticket}`" fit="cover"></el-image>
                    <el-image
                        slot="reference"
                        :src="`https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=${qr.response.ticket}`"
                        fit="cover"
                        class="w-10 h-10 align-middle"
                    ></el-image>
                </el-popover>
            </el-table-column>
            <el-table-column prop="scene_type" label="场景类型" #default="{row:qr}">
                <span v-if="qr.scene_type == 'scene_id'">整数</span>
                <span v-else>字符串</span>
            </el-table-column>
            <el-table-column prop="scene_value" label="场景值"> </el-table-column>
            <el-table-column label="有效" #default="{row:qr}">
                {{ qr.state ? '有效' : '过期' }}
            </el-table-column>
            <el-table-column prop="scene_type" label="创建时间" #default="{row:qr}">
                {{ qr.created_at | format }}
            </el-table-column>
            <el-table-column width="80" align="center" #default="{row:qr}">
                <el-button-group>
                    <el-button type="danger" size="mini" @click="del(qr)">删除</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
        <hd-wechat-qr-form :wechat="wechat" :module="module" :show.sync="showFormDialog" v-if="wechat.id" />
        <el-button type="primary" size="small" class="mt-3" @click="showFormDialog = true">创建二维码</el-button>

        <div class="mt-3">
            <el-pagination
                v-if="qrs.meta"
                background
                @current-change="load"
                layout="prev, pager, next"
                :total="qrs.meta.total"
                :page-size="10"
                :hide-on-single-page="true"
            >
            </el-pagination>
        </div>
    </div>
</template>

<script>
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '描述', id: 'title' }
]
export default {
    props: {
        wechat: { required: true, type: Object },
        module: { type: Number, default: 0 }
    },
    data() {
        return {
            columns,
            loading: true,
            qrs: { data: [] },
            showFormDialog: false
        }
    },
    created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.qrs = await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/qr?module=${this.module}&page=${page}`)
            this.loading = false
        },
        del(qr) {
            this.$confirm('确定删除吗?', '温馨提示').then(async _ => {
                await axios.delete(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/qr/${qr.id}`)
                this.load()
            })
        }
    }
}
</script>

<style></style>
