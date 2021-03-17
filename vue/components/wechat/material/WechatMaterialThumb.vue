<template>
    <el-dialog title="缩略图素材设置" :visible.sync="dialogShow" width="40%" :close-on-click-modal="false" @close="$emit('update:show', false)">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <!-- <div slot="header">缩略图素材</div> -->
                <el-form-item label="素材描述">
                    <el-input v-model="form.title"></el-input>
                    <hd-error name="form.title" />
                </el-form-item>
                <el-form-item label="素材类型">
                    <el-radio-group v-model="form.duration" :disabled="!!form.id">
                        <el-radio label="short">临时素材</el-radio>
                        <el-radio label="long">永久素材</el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item label="素材缩略图">
                    <hd-image v-model="form.file" :sid="wechat.site_id" :size="1024 * 64" />
                    <hd-error name="form.file" />
                </el-form-item>
            </el-card>
        </el-form>
        <span slot="footer">
            <el-button @click="dialogShow = false">关闭</el-button>
            <el-button type="primary" @click="onSubmit" :disabled="isSubmit">保存提交</el-button>
        </span>
    </el-dialog>
</template>

<script>
const form = {
    title: '',
    duration: 'short',
    type: 'thumb',
    file: ''
}
export default {
    props: ['wechat', 'material', 'show'],
    data() {
        return {
            isSubmit: false,
            form: _.merge({}, this.material || form),
            dialogShow: false
        }
    },
    watch: {
        //显示对话框
        show(n) {
            this.dialogShow = n
        },
        //编辑数据
        material(material) {
            this.form = _.merge({}, material || form)
        }
    },
    methods: {
        onSubmit() {
            this.isSubmit = true
            const url = `wechat/${this.wechat.id}/material` + (this.form.id ? `/${this.form.id}` : ``)
            axios[this.form.id ? 'put' : 'post'](url, this.form)
                .then(_ => this.$parent.load(1, this.form.type))
                .finally(_ => {
                    this.isSubmit = false
                    this.dialogShow = false
                })
        }
    }
}
</script>

<style></style>
