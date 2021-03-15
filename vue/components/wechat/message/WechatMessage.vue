<template>
    <div>
        <!-- 消息类型选择按钮 -->
        <el-button-group>
            <el-button size="mini" v-for="(t, index) in types" :key="index" :type="messageType == t.type ? 'primary' : ''" @click="messageType = t.type">
                {{ t.title }}
            </el-button>
        </el-button-group>
        <!-- 消息类型选择按钮 END-->
        <!-- 消息列表 -->
        <el-table :data="message.data" border stripe class="mt-3" v-loading="loading">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column width="150" #default="{row:message}">
                <el-button-group>
                    <component :is="componentName" :wechat="wechat" :message="message" :key="message.id" class="inline-block">
                        <el-button type="primary" size="mini" @click="del(message)">删除</el-button>
                    </component>
                </el-button-group>
            </el-table-column>
        </el-table>
        <!-- 添加消息 -->
        <component :is="componentName" class="mt-3" :wechat="wechat" />
    </div>
</template>

<script>
//消息类型
const types = [
    { title: '文本消息', type: 'text' },
    { title: '图文消息', type: 'news' },
    { title: '图片消息', type: 'image' },
    { title: '音频消息', type: 'voice' },
    { title: '视频消息', type: 'video' }
]
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '规则描述', id: 'title' },
    { label: '匹配方式', id: 'keywordTypeTitle' },
    { label: '关键词', id: 'keyword' }
]
export default {
    props: {
        wechat: { required: true, type: Object },
        type: { type: String, default: 'text' }
    },
    data() {
        return {
            messageType: this.type,
            loading: true,
            message: [],
            types,
            columns
        }
    },
    watch: {
        messageType() {
            this.load()
        }
    },
    computed: {
        componentName() {
            return `hdWechatMessage${_.upperFirst(this.messageType)}`
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load() {
            this.loading = true
            this.message = await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/message?type=${this.messageType}`)
            this.loading = false
        },
        //删除
        del(message) {
            this.$confirm('确定删除吗？', '温馨提示').then(async _ => {
                await axios.delete(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/message/${message.id}`)
                this.message.data.splice(this.message.data.indexOf(message), 1)
            })
        }
    }
}
</script>

<style></style>
