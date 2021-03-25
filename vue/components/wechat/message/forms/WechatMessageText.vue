<template>
    <el-dialog title="文本消息设置" :visible.sync="dialogShow" width="50%" top="1rem" :append-to-body="true" :close-on-click-modal="false">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <hd-wechat-message-rule :form="form" />
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <div slot="header">
                    回复内容
                </div>
                <div v-for="(content, index) in form.content" :key="index" class="mt-2 relative">
                    <el-input type="textarea" v-model="form.content[index]"></el-input>
                    <i
                        class="fas fa-times-circle absolute -top-3 -right-2 text-lg text-gray-500 hover:text-gray-800 duration-300 cursor-pointer"
                        @click="del(index)"
                    ></i>
                </div>
                <hd-form-error name="content" />
                <el-button size="mini" @click="add" class="mt-2">添加回复</el-button>
            </el-card>
        </el-form>
        <span slot="footer">
            <el-button @click="dialogShow = false">关闭</el-button>
            <el-button type="primary" @click="onSubmit" :disabled="isSubmit" :loading="isSubmit">保存提交</el-button>
        </span>
    </el-dialog>
</template>

<script>
import Mixin from './Mixin'
const form = { title: '', type: 'text', keyword: '', content: [] }
export default {
    mixins: [Mixin(form)],
    methods: {
        add() {
            this.form.content.push('')
        }
    }
}
</script>

<style></style>
