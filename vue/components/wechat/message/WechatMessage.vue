<template>
    <div>
        <!-- 消息类型选择按钮 -->
        <el-button-group>
            <el-button size="mini" v-for="(t, index) in types" :key="index" :type="type == t.value ? 'primary' : ''" @click="type = t.value">
                <router-link :to="`${$route.path}?type=${t.value}`" :class="{ 'text-white': type == t.value }">
                    {{ t.title }}
                </router-link>
            </el-button>
        </el-button-group>
        <!-- 消息类型选择按钮 END-->

        <el-table :data="message.data" border stripe class="mt-3">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column width="150" #default="{row:message}">
                <component :is="componentName" :wechat="wechat" :message="message" />
            </el-table-column>
        </el-table>
        <!-- 添加消息 -->
        <component :is="componentName" class="mt-3" :wechat="wechat" />
    </div>
</template>

<script>
//消息类型
const types = [
    { title: '文本消息', value: 'text' },
    { title: '图文消息', value: 'news' },
    { title: '图片消息', value: 'image' },
    { title: '音频消息', value: 'voice' },
    { title: '视频消息', value: 'video' }
]
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '规则描述', id: 'title' },
    { label: '匹配方式', id: 'keywordTypeTitle', width: 200 },
    { label: '关键词', id: 'keyword', width: 200 }
]
export default {
    props: {
        wechat: { required: true, type: Object }
    },
    data() {
        return {
            type: this.$route.query.type || 'text',
            message: [],
            types,
            columns
        }
    },
    watch: {
        type(n) {
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
            this.message = await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/message?type=${this.type}`)
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
