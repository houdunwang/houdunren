<template>
    <el-dialog title="语音消息设置" :visible.sync="dialogShow" width="40%" top="1rem" :append-to-body="true" :close-on-click-modal="false">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <hd-wechat-message-rule :form="form" />
            <el-card shadow="never" :body-style="{ padding: '20px' }">
                <div slot="header">
                    视频资料
                </div>
                <el-form-item label="视频标题">
                    <el-input v-model="form.content.title"></el-input>
                </el-form-item>
                <el-form-item label="视频摘要">
                    <el-input v-model="form.content.description"></el-input>
                </el-form-item>

                <el-form-item label="视频">
                    <video muted controls width="100%" class="outline-none w-80" v-if="form.file">
                        <source :src="form.file" type="video/mp4" />
                    </video>
                    <el-dialog title="选择素材" :visible.sync="materialDialogShow" width="60%" :append-to-body="true">
                        <hd-wechat-material :wechat="wechat" material-type="video" #default="{material}">
                            <el-button type="primary" size="mini" @click="selectMaterial(material)">选择</el-button>
                        </hd-wechat-material>
                    </el-dialog>
                    <el-button type="primary" size="mini" @click="materialDialogShow = true" class="mt-3 block">选择素材</el-button>
                </el-form-item>
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
const form = { title: '', type: 'video', keyword: '', content: { title: '', description: '', media_id: '', file: '' } }
export default {
    mixins: [Mixin(form)]
}
</script>

<style></style>
