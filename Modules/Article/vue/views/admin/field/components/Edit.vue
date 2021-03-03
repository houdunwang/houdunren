<template>
    <div>
        <button type="button" class="btn btn-success" @click="dialogVisible = true">
            <slot />
        </button>
        <el-dialog title="模型字段" :visible.sync="dialogVisible" width="50%" top="0vh" :before-close="handleClose">
            <el-form ref="form" label-width="80px" :inline="false" size="normal">
                <el-card shadow="always" :body-style="{ padding: '20px' }">
                    <div slot="header">
                        基础参数
                    </div>
                    <el-form-item label="中文标题" size="normal">
                        <el-input v-model="form.title" required placeholder="字段中文标题" size="normal"></el-input>
                    </el-form-item>
                    <el-form-item label="字段名" size="normal">
                        <el-input v-model="form.name" required placeholder="" size="normal" :disabled="form.system"></el-input>
                    </el-form-item>
                    <el-form-item label="表单类型" size="normal">
                        <el-select v-model="form.type" placeholder="请选择">
                            <el-option v-for="(item, index) in typeOptions" :key="index" :label="item.label" :value="item.type"> </el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="提示信息" size="normal">
                        <el-input v-model="form.placeholder" placeholder="" size="normal"></el-input>
                    </el-form-item>
                    <el-form-item label="默认值" size="normal">
                        <el-input v-model="form.value" placeholder="" size="normal"></el-input>
                    </el-form-item>
                    <el-form-item label="显示" size="normal">
                        <el-radio-group v-model="form.show">
                            <el-radio :label="true">显示</el-radio>
                            <el-radio :label="false">隐藏</el-radio>
                        </el-radio-group>
                    </el-form-item>
                </el-card>
                <el-card shadow="hover" :body-style="{ padding: '20px' }" class="my-3">
                    <div slot="header">
                        表单验证
                    </div>
                    <el-form-item label="验证规则" size="normal">
                        <el-input v-model="form.validate_rule" placeholder="" size="normal"></el-input>
                        <hd-tip>可以使用Laravel框架中的所有规则</hd-tip>
                    </el-form-item>
                    <el-form-item label="错误消息" size="normal">
                        <el-input v-model="form.validate_error" placeholder="" size="normal"></el-input>
                        <hd-tip>验证失败时的错误消息</hd-tip>
                    </el-form-item>
                </el-card>
            </el-form>
            <el-button type="primary" size="default" @click="save">保存</el-button>
        </el-dialog>
    </div>
</template>

<script>
//字段可用类型
const typeOptions = [
    { label: '单行文本', type: 'input' },
    { label: '多行文本', type: 'textarea' },
    { label: '图片', type: 'image' },
    { label: '富文本编辑器', type: 'editor' },
    { label: '单选框', type: 'radio' },
    { label: '富选框', type: 'checkbox' },
    { label: '日期时间', type: 'datetime' },
    { label: '日期', type: 'date' }
]
//默认值用于添加字段
const field = {
    name: '',
    title: '标题',
    type: 'input',
    placeholder: '请输入标题',
    value: '',
    options: {},
    rank: 0,
    show: true,
    validate_rule: '',
    validate_error: ''
}
export default {
    props: {
        model: { type: Object },
        field: {
            type: Object,
            default() {
                return field
            }
        }
    },
    data() {
        return {
            form: Object.assign({}, this.field),
            dialogVisible: false,
            typeOptions
        }
    },
    methods: {
        handleClose(done) {
            done()
        },
        save() {
            //如果存在超过2个的相同name就表示有重复
            const total = this.model.fields.filter(f => f.name == this.form.name)
            if (total > 1) {
                return this.$message.error('字段的NAME值已经存在')
            }
            this.$emit('update', this.form)
            this.dialogVisible = false
        }
    }
}
</script>

<style></style>
