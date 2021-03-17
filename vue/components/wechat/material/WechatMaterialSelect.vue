<template>
    <div>
        <el-dialog title="素材选择" :visible.sync="dialogShow" :append-to-body="true" width="80%">
            <el-button-group>
                <el-button size="mini" v-for="(t, index) in types" :key="index" :type="type == t.type ? 'primary' : ''" @click="type = t.type">
                    {{ t.title }}
                </el-button>
            </el-button-group>
            <div class="mt-3 border-t pt-2">
                <el-radio-group v-model="duration" size="mini">
                    <el-radio-button label="short">临时素材</el-radio-button>
                    <el-radio-button label="long">永久素材</el-radio-button>
                </el-radio-group>
            </div>
            <!-- 列表 -->
            <el-table :data="material.data" border stripe class="mt-3" v-loading="loading">
                <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label" :width="col.width"> </el-table-column>
                <el-table-column label="图片预览" width="200" #default="{ row: material }">
                    <el-popover placement="top" width="200" trigger="hover">
                        <el-image :src="material.file" fit="cover"></el-image>
                        <el-image slot="reference" :src="material.file" fit="cover" class="w-10 h-10"></el-image>
                    </el-popover>
                </el-table-column>
                <el-table-column label="保存时间" width="150" prop="duration" #default="{ row: material }">
                    {{ material.duration == 'short' ? '临时素材' : '永久素材' }}
                </el-table-column>
                <el-table-column label="素材类型" width="150"> 图片素材 </el-table-column>
                <el-table-column label="创建时间" width="150" prop="created_at" #default="{ row: material }">
                    {{ material.created_at | fromNow }}
                </el-table-column>
                <el-table-column width="80" #default="{ row: material }">
                    <el-button-group>
                        <el-button type="success" size="mini" @click="edit(material)">选择</el-button>
                    </el-button-group>
                </el-table-column>
            </el-table>
        </el-dialog>
        <el-button type="primary" size="mini" @click="dialogShow = true">选择素材</el-button>
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
        wechat: { required: true, type: Object }
    },
    data() {
        return {
            types,
            loading: true,
            dialogShow: false,
            type: 'image',
            duration: 'short',
            columns,
            material: {}
        }
    },
    watch: {
        type() {
            this.load()
        },
        duration() {
            this.load()
        }
    },
    created() {
        this.load()
    },
    methods: {
        async load() {
            this.loading = true
            this.material = await axios.get(`wechat/${this.wechat.id}/material?type=${this.type}&duration=${this.duration}`)
            this.loading = false
        }
    }
}
</script>

<style></style>
