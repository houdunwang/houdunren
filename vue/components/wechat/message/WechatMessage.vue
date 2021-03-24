<template>
    <div>
        <!-- 消息类型选择按钮 -->
        <el-button-group>
            <el-button size="mini" v-for="(t, index) in types" :key="index" :type="type == t.type ? 'primary' : ''" @click="type = t.type">
                {{ t.title }}
            </el-button>
        </el-button-group>
        <!-- 消息类型选择按钮 END-->
        <!-- 消息列表 -->
        <el-table :data="messageData.data" border stripe class="mt-3" v-loading="loading">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column label="回复内容" #default="{row:message}">
                <!-- 预览素材 -->
                <hd-wechat-message-preview :message="message" class-name="w-10 h-10" />
            </el-table-column>
            <el-table-column width="200" #default="{ row: message }" align="center">
                <el-button-group>
                    <el-button type="success" size="mini" @click="edit(message)">编辑</el-button>
                    <el-button type="danger" size="mini" @click="del(message)">删除</el-button>
                    <slot :message="message"> </slot>
                </el-button-group>
            </el-table-column>
        </el-table>
        <!-- 添加消息 -->
        <component :is="componentName" class="mt-3" :wechat="wechat" :message="message" :show.sync="showDialog" />
        <el-button type="danger" size="mini" @click="edit()" class="mt-3">添加消息</el-button>
    </div>
</template>

<script>
//消息类型
const types = [
    { title: '文本消息', type: 'text' },
    { title: '图文消息', type: 'news' },
    { title: '图片消息', type: 'image' },
    { title: '音频消息', type: 'voice' },
    { title: '视频消息', type: 'video' },
    { title: '模块处理', type: 'module' }
]
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '规则描述', id: 'title' },
    { label: '关键词', id: 'keyword' }
]
export default {
    props: {
        wechat: { required: true, type: Object },
        messageType: { type: String, default: 'text' },
        module: {
            type: Object,
            default: () => null
        }
    },
    data() {
        return {
            type: this.messageType,
            loading: true,
            messageData: [],
            message: null,
            //显示对话框
            showDialog: false,
            types,
            columns
        }
    },
    watch: {
        type() {
            this.load()
        }
    },
    computed: {
        componentName() {
            return `hdWechatMessage${_.upperFirst(this.type)}`
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load() {
            this.loading = true
            this.messageData = await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/message?type=${this.type}`)
            this.loading = false
        },
        //编辑数据
        edit(message) {
            this.message = message
            this.showDialog = true
        },
        //删除
        del(message) {
            this.$confirm('确定删除吗？', '温馨提示').then(async _ => {
                await axios.delete(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/message/${message.id}`)
                this.messageData.data.splice(this.messageData.data.indexOf(message), 1)
            })
        }
    }
}
</script>

<style></style>
