<template>
    <el-dialog title="群发消息设置" :visible.sync="showDialog" width="50%">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <!-- <div slot="header">
                    <span>基本设置</span>
                </div> -->
                <el-form-item label="群发消息描述">
                    <el-input v-model="form.title" placeholder="二维码用途描述"></el-input>
                    <hd-form-error name="title" />
                </el-form-item>
                <el-form-item label="群发类型" size="normal">
                    <el-radio-group v-model="form.type">
                        <el-radio v-for="type in types" :key="type.id" :label="type.id">
                            {{ type.label }}
                        </el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item label="转载处理" size="normal">
                    <el-radio-group v-model="form.content.send_ignore_reprint">
                        <el-radio :label="1">继续转发</el-radio>
                        <el-radio :label="0">禁止转发</el-radio>
                    </el-radio-group>
                    <hd-tip>图文消息被判定为转载时，是否继续群发</hd-tip>
                </el-form-item>
            </el-card>
            <el-card shadow="nerver" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    <span>群发内容</span>
                </div>
                <div v-if="form.type != 'text'">
                    <hd-wechat-material-preview :material="material" v-if="material.id" />
                    <el-dialog title="选择素材" :visible.sync="materialDialogShow" width="60%" :append-to-body="true">
                        <hd-wechat-material :wechat="wechat" #default="{material}" :material-type="form.type" :show-type-button="false">
                            <el-button type="primary" size="mini" @click="selectMaterial(material)">选择</el-button>
                        </hd-wechat-material>
                    </el-dialog>
                    <el-button type="primary" size="mini" @click="materialDialogShow = true" class="mt-3 block">选择素材</el-button>
                </div>
                <div v-else>
                    <el-input type="textarea" v-model="form.content.text.content" placeholder="" size="normal" clearable></el-input>
                </div>
            </el-card>
        </el-form>
        <span slot="footer">
            <el-button type="primary" @click="onSubmit" :disabled="isSubmit" v-loading="isSubmit">保存提交</el-button>
        </span>
    </el-dialog>
</template>

<script>
import field from './field'
const types = [
    { label: '图文消息', id: 'news', type: 'mpnews' },
    { label: '图片消息', id: 'image', type: 'images' },
    { label: '语音群发', id: 'voice', type: 'voice' },
    { label: '文本消息', id: 'text', type: 'text' },
    { label: '视频消息', id: 'video', type: 'mpvideo' }
]
export default {
    props: ['show', 'wechat', 'module', 'message'],
    data() {
        return {
            showDialog: this.show,
            isSubmit: false,
            form: {},
            materialDialogShow: false,
            types,
            //选择的素材
            material: {}
        }
    },
    watch: {
        message: {
            handler(message) {
                this.form = _.cloneDeep({ title: '', type: 'news', material_id: null, content: field })
                this.material = {}
                if (message?.id) {
                    this.form = message
                    this.material = message.material
                }
            },
            immediate: true
        },
        show(n) {
            this.showDialog = n
        },
        showDialog(n) {
            this.$emit('update:show', n)
        }
    },
    methods: {
        //保存提交
        async onSubmit() {
            this.isSubmit = true
            this.form.module_id = this.module ?? null
            const url = `site/${this.wechat.site_id}/wechat/${this.wechat.id}/sendall/message/` + (this.form.id ? this.form.id : '')
            try {
                await axios[this.form.id ? 'put' : 'post'](url, this.form)
                this.showDialog = false
                this.$parent.load()
            } finally {
                this.isSubmit = false
            }
        },
        //选择素材
        selectMaterial(material) {
            this.form.material_id = material.id
            this.material = material
            this.materialDialogShow = false
            //设置群发消息media_id
            const type = types.find(t => t.id == material.type).type
            if (type == 'images') {
                this.form.content[type].media_ids = [material.id]
            } else {
                this.form.content[type].media_id = material.id
            }
        }
    }
}
</script>

<style></style>
