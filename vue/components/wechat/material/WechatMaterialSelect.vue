<template>
    <div>
        <el-dialog
            title="素材选择"
            :visible.sync="dialogShow"
            :append-to-body="true"
            width="80%"
            :close-on-click-modal="false"
            @close="$emit('update:show', false)"
        >
            <hd-wechat-material :wechat="wechat" #default="{material}" v-bind="$attrs">
                <el-button type="primary" size="mini" @click="select(material)">选择素材</el-button>
            </hd-wechat-material>
        </el-dialog>
    </div>
</template>

<script>
export default {
    props: {
        wechat: { required: true, type: Object },
        show: { type: Boolean, default: false }
    },
    data() {
        return {
            dialogShow: false
        }
    },
    watch: {
        show(n) {
            this.dialogShow = n
        }
    },
    methods: {
        select(material) {
            this.$emit('select', material)
            this.$emit('update:show', false)
            this.dialogShow = false
        }
    }
}
</script>

<style></style>
