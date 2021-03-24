<template>
    <el-dialog title="模块自行处理消息设置" :visible.sync="dialogShow" width="40%" top="1rem" :append-to-body="true" :close-on-click-modal="false">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <hd-wechat-message-rule :form="form" />
            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <div slot="header">
                    处理模块
                </div>
                <div>
                    <el-radio-group v-model="form.module_id" size="mini">
                        <el-radio-button :label="module.id" v-for="module in modules" :key="module.id">
                            {{ module.title }}
                        </el-radio-button>
                    </el-radio-group>
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
const form = { title: '', type: 'module', module_id: '', keyword: '' }
export default {
    mixins: [Mixin(form)],
    data() {
        return {
            materialDialogShow: false,
            modules: []
        }
    },
    async created() {
        this.modules = await axios.get(`/api/module/site/${this.wechat.site_id}`)
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
