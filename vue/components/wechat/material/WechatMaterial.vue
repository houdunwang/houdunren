<template>
    <div>
        <!-- 素材类型选择按钮 -->
        <el-button-group>
            <el-button size="mini" v-for="(t, index) in types" :key="index" :type="type == t.value ? 'primary' : ''" @click="type = t.value">
                {{ t.title }}
            </el-button>
        </el-button-group>
        <!-- 素材类型选择按钮 END-->
        <!-- 素材列表 -->
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
        <!-- 添加素材 -->
        <component :is="componentName" class="mt-3" :wechat="wechat" />
    </div>
</template>

<script>
//素材类型
const types = [
    { title: '文本素材', value: 'text' },
    { title: '图文素材', value: 'news' },
    { title: '图片素材', value: 'image' },
    { title: '音频素材', value: 'voice' },
    { title: '视频素材', value: 'video' }
]
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '素材描述', id: 'title' },
    { label: '素材类型', id: 'type' },
    { label: '保存时间', id: 'duration' }
]
export default {
    props: {
        wechat: { required: true, type: Object }
    },
    data() {
        return {
            type: 'image',
            loading: true,
            material: [],
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
            return `hdWechatMaterial${_.upperFirst(this.type)}`
        }
    },
    async created() {
        this.load()
    },
    methods: {
        async load() {
            this.loading = true
            this.material = await axios.get(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/message?type=${this.type}`)
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
