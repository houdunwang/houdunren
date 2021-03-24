<template>
    <div>
        <button type="button" class="btn btn-success btn-sm" @click="dialogVisible = true">
            <slot />
        </button>
        <el-form ref="form" label-width="80px" :inline="false" size="normal">
            <el-dialog title="模型字段" :visible.sync="dialogVisible" width="50%">
                <el-tabs value="first">
                    <el-tab-pane label="基本信息" name="first">
                        <el-card shadow="always" :body-style="{ padding: '20px' }">
                            <el-form-item label="中文标题" size="normal">
                                <el-input v-model="field.title" required placeholder="字段中文标题" size="normal" />
                            </el-form-item>
                            <el-form-item label="字段名" size="normal">
                                <el-input v-model="field.name" placeholder="英文字母表示的字段名" size="normal" />
                            </el-form-item>
                            <el-form-item label="提示信息" size="normal">
                                <el-input v-model="field.placeholder" placeholder="" size="normal" />
                            </el-form-item>
                            <el-form-item label="显示" size="normal">
                                <el-radio-group v-model="field.show">
                                    <el-radio :label="true">显示</el-radio>
                                    <el-radio :label="false">隐藏</el-radio>
                                </el-radio-group>
                            </el-form-item>
                        </el-card>
                    </el-tab-pane>
                    <el-tab-pane label="字段类型" name="second">
                        <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-2">
                            <el-form-item label="表单类型" size="normal">
                                <el-select v-model="field.type" placeholder="请选择">
                                    <el-option v-for="(item, index) in types" :key="index" :label="item.label" :value="item.type" />
                                </el-select>
                            </el-form-item>
                            <el-form-item label="默认值" size="normal">
                                <el-input v-model="field.value" placeholder="" size="normal" />
                            </el-form-item>
                            <el-form-item label="选项" size="normal" v-show="field.type == 'radio' || field.type == 'checkbox'">
                                <el-input type="textarea" v-model="field.options" placeholder="" size="normal" />
                            </el-form-item>
                        </el-card>
                    </el-tab-pane>
                    <el-tab-pane label="表单验证" name="third">
                        <el-card shadow="hover" :body-style="{ padding: '20px' }" class="my-2">
                            <el-form-item label="验证规则" size="normal">
                                <el-input v-model="field.validate_rule" placeholder="" size="normal" />
                                <hd-tip>可以使用Laravel框架中的所有规则</hd-tip>
                            </el-form-item>
                            <!-- <el-form-item label="错误消息" size="normal">
                                <el-input v-model="field.validate_error" placeholder="" size="normal" />
                                <hd-tip>验证失败时的错误消息</hd-tip>
                            </el-form-item> -->
                        </el-card>
                    </el-tab-pane>
                </el-tabs>
                <el-button size="default" class="mt-3" @click="dialogVisible = false">关闭</el-button>
            </el-dialog>
        </el-form>
    </div>
</template>

<script>
//字段可用类型
import types from './types'
export default {
    props: ['field'],
    data() {
        return { dialogVisible: false, types }
    }
}
</script>

<style></style>
