<template>
    <el-dialog title="语音消息设置" :visible.sync="dialogShow" width="40%" top="1rem" :append-to-body="true" :close-on-click-modal="false">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <hd-wechat-message-rule :form="form" />
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <div slot="header">
                    回复内容
                </div>
                <div>
                    <audio controls preload="auto" class="relative outline-none w-60 h-10" v-if="form.file" style="background-color: #f3f3f3;">
                        <source :src="form.file" type="audio/mp3" />
                    </audio>
                    <el-dialog title="选择素材" :visible.sync="materialDialogShow" width="60%" :append-to-body="true">
                        <hd-wechat-material :wechat="wechat" material-type="voice" #default="{material}">
                            <el-button type="primary" size="mini" @click="selectMaterial(material)">选择</el-button>
                        </hd-wechat-material>
                    </el-dialog>
                    <el-button type="primary" size="mini" @click="materialDialogShow = true" class="mt-3 block">选择素材</el-button>
                </div>
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
const form = { title: '', type: 'voice', keyword: '', content: { media_id: '', file: '' } }
export default {
    mixins: [Mixin(form)]
}
</script>

<style></style>
