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
                <div v-if="message.type == 'text' && message.content.length">
                    {{ message.content.join() | truncate(50) }}
                </div>
                <div v-if="message.type == 'image'">
                    <el-popover placement="top" width="300" trigger="hover">
                        <el-image :src="message.content.pic" fit="cover"></el-image>
                        <el-image slot="reference" :src="message.content.pic" fit="cover" class="w-10 h-10"></el-image>
                    </el-popover>
                </div>
                <div v-if="message.type == 'voice'">
                    <audio controls preload="auto" class="relative outline-none w-60 h-10" tyle="background-color: #f3f3f3;">
                        <source :src="message.content.file" type="audio/mp3" />
                    </audio>
                </div>
                <div v-if="message.type == 'video'">
                    <el-popover placement="top" width="500" trigger="hover">
                        <video muted controls width="100%" class="outline-none">
                            <source :src="message.content.file" type="video/mp4" />
                        </video>
                        <i slot="reference" class="fas fa-video w-10 h-10 text-xl"></i>
                    </el-popover>
                </div>
            </el-table-column>
            <el-table-column width="160" #default="{ row: message }">
                <el-button-group>
                    <el-button type="success" size="mini" @click="edit(message)">编辑</el-button>
                    <el-button type="primary" size="mini" @click="del(message)">删除</el-button>
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
    { title: '视频消息', type: 'video' }
]
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '规则描述', id: 'title' },
    { label: '关键词', id: 'keyword' }
]
export default {
    props: {
        wechat: { required: true, type: Object },
        messageType: { type: String, default: 'text' }
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
            this.messageData = await axios.get(`wechat/${this.wechat.id}/message?type=${this.type}`)
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
                await axios.delete(`wechat/${this.wechat.id}/message/${message.id}`)
                this.messageData.data.splice(this.messageData.data.indexOf(message), 1)
            })
        }
    }
}
</script>

<style></style>
