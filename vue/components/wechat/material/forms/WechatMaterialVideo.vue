<template>
    <div>
        <!-- 表单 -->
        <el-dialog title="视频素材设置" :visible.sync="dialogShow" width="40%" :append-to-body="true" :close-on-click-modal="false">
            <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
                <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                    <el-form-item label="素材描述">
                        <el-input v-model="form.title"></el-input>
                        <hd-form-error name="title" />
                    </el-form-item>
                    <el-form-item label="素材类型">
                        <el-radio-group v-model="form.duration" :disabled="!!form.id">
                            <el-radio label="short">临时素材</el-radio>
                            <el-radio label="long">永久素材</el-radio>
                        </el-radio-group>
                        <hd-form-error name="duration" />
                    </el-form-item>
                    <el-form-item label="视频标题">
                        <el-input v-model="form.description.title"></el-input>
                        <hd-form-error name="content.title" />
                    </el-form-item>
                    <el-form-item label="视频描述">
                        <el-input v-model="form.description.introduction"></el-input>
                        <hd-form-error name="title" />
                    </el-form-item>
                    <el-form-item label="视频文件">
                        <hd-upload-video v-model="form.file" :sid="wechat.site_id" />
                        <hd-form-error name="file" />
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
    type: 'video',
    file: '',
    description: {
        title: '',
        introduction: ''
    }
}
import Mixin from './Mixin'
export default {
    mixins: [Mixin(form)]
}
</script>

<style></style>
