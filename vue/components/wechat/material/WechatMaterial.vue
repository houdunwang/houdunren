<template>
    <div>
        <!-- 素材类型选择按钮 -->
        <el-button-group v-if="showTypeButton">
            <el-button size="mini" v-for="(t, index) in types" :key="index" :type="type == t.type ? 'primary' : ''" @click="type = t.type">
                {{ t.title }}
            </el-button>
        </el-button-group>
        <div class="mt-3 border-t pt-2" v-if="type != 'news' || showDurationButton">
            <el-radio-group v-model="duration" size="mini" @click="load">
                <el-radio-button label="short">临时素材</el-radio-button>
                <el-radio-button label="long">永久素材</el-radio-button>
            </el-radio-group>
        </div>
        <el-table :data="material.data" border stripe class="mt-3" v-loading="loading">
            <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
            <el-table-column label="素材预览" width="200" #default="{ row: material }">
                <el-popover placement="top" width="200" trigger="hover" v-if="material.type == 'image' || material.type == 'thumb'">
                    <el-image :src="material.file" fit="cover"></el-image>
                    <el-image slot="reference" :src="material.file" fit="cover" class="w-10 h-10"></el-image>
                </el-popover>
                <audio controls preload="auto" class="relative outline-none w-full h-10" v-else-if="material.type == 'voice'">
                    <source :src="material.file" type="audio/mp3" />
                </audio>
                <el-popover placement="top" width="500" trigger="hover" v-else-if="material.type == 'video'">
                    <video muted controls width="100%" class="outline-none">
                        <source :src="material.file" type="video/mp4" />
                    </video>
                    <i slot="reference" class="fas fa-video w-10 h-10 text-xl"></i>
                </el-popover>
            </el-table-column>
            <el-table-column label="保存时间" width="150" prop="duration" #default="{ row: material }">
                {{ material.duration == 'short' ? '临时素材' : '永久素材' }}
            </el-table-column>
            <el-table-column label="创建时间" width="150" prop="created_at" #default="{ row: material }">
                {{ material.created_at | fromNow }}
            </el-table-column>
            <el-table-column width="190" #default="{ row: material }" align="center">
                <el-button-group>
                    <el-button type="success" size="mini" @click="edit(material)">编辑</el-button>
                    <el-button type="danger" size="mini" @click="del(material)">删除</el-button>
                    <slot :material="material"> </slot>
                </el-button-group>
            </el-table-column>
        </el-table>
        <div>
            <el-pagination
                v-if="material.meta"
                class="mt-3"
                :current-page="material.meta.current_page"
                @current-change="load"
                :page-size="10"
                :total="material.meta.total"
                :hide-on-single-page="true"
                background
            >
            </el-pagination>
        </div>
        <el-button type="danger" size="mini" @click="edit()" class="mt-3" v-if="showAddButton">添加素材</el-button>
        <!-- 动态加载组件 -->
        <component :is="component" class="mt-3" :wechat="wechat" :material="form" :show.sync="showDialog" :duration-type="duration" />
    </div>
</template>

<script>
//素材类型
const types = [
    { title: '图片素材', type: 'image' },
    { title: '语音素材', type: 'voice' },
    { title: '视频素材', type: 'video' },
    { title: '缩略图素材', type: 'thumb' },
    { title: '图文素材', type: 'news' }
]
const columns = [
    { label: '编号', id: 'id', width: 60 },
    { label: '素材说明', id: 'title' }
]
export default {
    props: {
        wechat: { required: true, type: Object },
        //素材类型
        materialType: { type: String, default: 'image' },
        //临时或永久
        durationType: { type: String, default: 'short' },
        //是否显示按钮
        showTypeButton: { type: Boolean, default: true },
        showDurationButton: { type: Boolean, default: true },
        //是否显示添加按钮
        showAddButton: { type: Boolean, default: true }
    },
    data() {
        return {
            //当前选择的类型
            type: this.materialType,
            duration: this.durationType,
            //素材类型
            types,
            loading: true,
            //表格列表
            columns,
            //素材列表
            material: {},
            //显示对话框
            showDialog: false,
            //编辑的数据
            form: null
        }
    },
    computed: {
        //素材编辑组件
        component() {
            return `hdWechatMaterial${_.upperFirst(this.type)}`
        }
    },
    watch: {
        //类型更改后
        type() {
            this.load()
        },
        //素材时间选择后
        duration() {
            this.load()
        }
    },
    created() {
        this.load()
    },
    methods: {
        //编辑素材
        edit(material) {
            this.form = material
            this.showDialog = true
        },
        async del(material) {
            this.$confirm(`确定删除【${material.title}】吗？`, '温馨提示').then(async _ => {
                await axios.delete(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/material/${material.id}`)
                this.load()
            })
        },
        async load(page = 1) {
            this.loading = true
            this.material = await axios.get(
                `site/${this.wechat.site_id}/wechat/${this.wechat.id}/material?type=${this.type}&duration=${this.duration}&page=${page}`
            )
            this.loading = false
        }
    }
}
</script>

<style></style>
