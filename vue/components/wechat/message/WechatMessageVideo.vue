<template>
    <el-dialog title="语音消息设置" :visible.sync="dialogShow" width="40%" top="1rem" :append-to-body="true" :close-on-click-modal="false">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <hd-wechat-message-rule :form="form" />
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <div slot="header">
                    回复内容
                </div>
                <div>
                    <video muted controls width="100%" class="outline-none w-80" v-if="form.file">
                        <source :src="form.file" type="video/mp4" />
                    </video>
                    <hd-wechat-material-select
                        :wechat="wechat"
                        material-type="video"
                        @select="selectMaterial"
                        :show.sync="materialDialogShow"
                        :show-type-button="false"
                    />
                    <el-button type="primary" size="mini" @click="materialDialogShow = true" class="mt-3">选择素材</el-button>
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
const form = { title: '', type: 'video', keyword: '', content: { title: '', description: '', media_id: '', file: '' } }
export default {
    mixins: [Mixin(form)],
    data() {
        return {
            materialDialogShow: false
        }
    },
    methods: {
        selectMaterial(material) {
            this.form.file = material.file
            this.form.content.media_id = material.media.media_id
        }
    }
}
</script>

<style></style>
