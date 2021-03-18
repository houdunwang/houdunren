<template>
    <div>
        <el-dialog
            :title="`${typeTitle}选择`"
            :visible.sync="dialogShow"
            :append-to-body="true"
            width="80%"
            :close-on-click-modal="false"
            @close="$emit('update:show', false)"
        >
            <hd-wechat-material :wechat="wechat" #default="{material}" :material-type="type" :show-button="$attrs['show-button']">
                <el-button type="primary" size="mini" @click="select(material)">选择素材</el-button>
            </hd-wechat-material>
        </el-dialog>
    </div>
</template>

<script>
const types = [
    { title: '图片素材', type: 'image' },
    { title: '语音素材', type: 'voice' },
    { title: '视频素材', type: 'video' },
    { title: '缩略图素材', type: 'thumb' },
    { title: '图文素材', type: 'news' }
]
export default {
    props: {
        wechat: { required: true, type: Object },
        show: { type: Boolean, default: false },
        type: { type: String, default: 'image' },
        durationType: { type: String, default: 'long' }
    },
    data() {
        return {
            dialogShow: false,
            types
        }
    },
    computed: {
        typeTitle() {
            return this.types.find(t => t.type == this.type)['title']
        }
    },
    watch: {
        show(n) {
            this.dialogShow = n
        }
    },
    methods: {
        //选择素材
        select(material) {
            this.$emit('select', material)
            this.$emit('update:show', false)
            this.dialogShow = false
        }
    }
}
</script>

<style></style>
