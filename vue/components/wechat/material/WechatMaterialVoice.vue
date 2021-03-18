<template>
    <div>
        <!-- 表单 -->
        <el-dialog title="语音素材设置" :visible.sync="dialogShow" width="40%" :append-to-body="true" :close-on-click-modal="false">
            <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
                <el-card shadow="nerver" :body-style="{ padding: '20px' }">
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
                    <el-form-item label="语音文件">
                        <hd-upload-voice v-model="form.file" :sid="wechat.site_id" />
                        <hd-error name="form.file" />
                    </el-form-item>
                </el-card>
            </el-form>
            <span slot="footer">
                <el-button @click="dialogShow = false">关闭</el-button>
                <el-button type="primary" @click="onSubmit" :disabled="isSubmit" v-loading="isSubmit">保存提交</el-button>
            </span>
        </el-dialog>
    </div>
</template>

<script>
const form = {
    title: '',
    duration: 'short',
    type: 'voice',
    file: ''
}

import Component from './mixins/Component'
export default {
    mixins: [Component(form)]
}
</script>

<style></style>
