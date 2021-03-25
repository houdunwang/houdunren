<template>
    <el-dialog title="设置备注名称" :visible.sync="dialogShow" width="40%">
        <el-form :model="form" ref="form" label-width="80px" :inline="false" size="normal">
            <el-form-item label="昵称">
                <el-input v-model="form.nickname" :disabled="true"></el-input>
            </el-form-item>
            <el-form-item label="头像">
                <el-image :src="form.headimgurl" fit="cover" class="w-20"></el-image>
            </el-form-item>
            <el-form-item label="备注名称">
                <el-input v-model="form.remark" placeholder="请输入备注名称"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">保存提交</el-button>
            </el-form-item>
        </el-form>
    </el-dialog>
</template>

<script>
export default {
    props: ['fans', 'show'],
    data() {
        return {
            form: {},
            dialogShow: false
        }
    },
    watch: {
        fans(user) {
            this.form = Object.assign({ remark: '' }, this.fans)
        },
        show(n) {
            this.dialogShow = n
        },
        dialogShow(n) {
            this.$emit('update:show', n)
        }
    },
    methods: {
        async onSubmit() {
            const url = `site/${this.query('sid')}/wechat/${this.query('wid')}/user/${this.form.id}/remark`
            await axios.post(url, this.form)
            this.dialogShow = false
            this.fans.remark = this.form.remark
        }
    }
}
</script>

<style></style>
