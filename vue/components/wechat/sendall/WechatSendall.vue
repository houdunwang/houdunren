<template>
    <div>
        <el-table :data="messages.data" border stripe v-loading="loading">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column prop="scene_type" label="群发内容" #default="{row:message}">
                <hd-wechat-material-preview :material="message.material" v-if="message.type != 'text'" />
                <div v-else class="text-sm text-gray-500">
                    {{ message.content.text.content | truncate(30) }}
                </div>
            </el-table-column>
            <el-table-column label="发送状态" #default="{row:message}" width="150">
                <i class="fas fa-check-square text-success" v-if="message.status"></i>
            </el-table-column>
            <el-table-column prop="scene_type" label="创建时间" #default="{row:message}" width="150">
                {{ message.created_at | format }}
            </el-table-column>
            <el-table-column width="250" align="center" #default="{row:message}">
                <el-button-group>
                    <el-button type="success" size="mini" @click="edit(message)">编辑</el-button>
                    <el-button type="danger" size="mini" @click="del(message)">删除</el-button>
                    <el-button type="primary" size="mini" @click="del(message)">预览</el-button>
                    <el-button type="warning" size="mini" @click="del(message)">发送</el-button>
                </el-button-group>
            </el-table-column>
        </el-table>
        <hd-wechat-send-all-form :wechat="wechat" :message="message" :module="module" :show.sync="showFormDialog" v-if="wechat.id" />
        <el-button type="primary" size="small" class="mt-3" @click="edit({})">添加群发消息</el-button>
        <div class="mt-3">
            <el-pagination
                v-if="messages.meta"
                background
                @current-change="load"
                layout="prev, pager, next"
                :total="messages.meta.total"
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
    { label: '群发消息描述', id: 'title' }
]
export default {
    props: {
        wechat: { required: true, type: Object },
        module: { type: Number, default: null }
    },
    data() {
        return {
            columns,
            loading: true,
            messages: { data: [] },
            showFormDialog: false,
            //消息数据
            message: {}
        }
    },
    created() {
        this.load()
    },
    methods: {
        async load(page = 1) {
            this.loading = true
            this.messages = await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/sendall/message`)
            this.loading = false
        },
        del(message) {
            this.$confirm('确定删除吗?', '温馨提示').then(async _ => {
                await axios.delete(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/sendall/message/${message.id}`)
                this.load()
            })
        },
        edit(message) {
            this.message = message
            this.showFormDialog = true
        }
    }
}
</script>

<style></style>
