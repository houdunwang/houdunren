<template>
    <el-dialog title="创建二维码" :visible.sync="showDialog" width="50%">
        <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
            <el-alert type="info" class="mb-3">
                <ul>
                    <li>临时二维码，是有过期时间的，最长可以设置为在二维码生成后的30天（即2592000秒）后过期，数量不限</li>
                    <li>永久二维码，是无过期时间的，但数量较少（目前为最多10万个）</li>
                </ul>
            </el-alert>

            <el-card shadow="nerver" :body-style="{ padding: '20px' }">
                <div slot="header">
                    <span>基本设置</span>
                </div>
                <el-form-item label="描述">
                    <el-input v-model="form.title" placeholder="二维码用途描述"></el-input>
                    <hd-form-error name="title" />
                </el-form-item>
                <el-form-item label="类型">
                    <el-radio-group v-model="form.type">
                        <el-radio label="QR_SCENE">临时二维码 </el-radio>
                    </el-radio-group>
                    <el-radio-group v-model="form.type">
                        <el-radio label="QR_LIMIT_SCENE">永久二维码 </el-radio>
                    </el-radio-group>
                    <hd-form-error name="type" />
                </el-form-item>
            </el-card>

            <el-card shadow="nerver" :body-style="{ padding: '20px' }" class="mt-3">
                <div slot="header">
                    场景设置
                </div>
                <el-form-item label="场景类型">
                    <el-radio-group v-model="form.scene_type">
                        <el-radio label="scene_id">数值 </el-radio>
                    </el-radio-group>
                    <el-radio-group v-model="form.scene_type">
                        <el-radio label="scene_str">字符串 </el-radio>
                    </el-radio-group>
                    <hd-form-error name="scene_type" />
                </el-form-item>

                <el-form-item label="有效时间" v-if="form.scene_type == 'scene_id' && form.type == 'QR_SCENE'">
                    <el-input placeholder="请输入有效时间" v-model="form.expire_seconds">
                        <template slot="append">秒</template>
                    </el-input>
                    <hd-form-error name="expire_seconds" />
                </el-form-item>

                <el-form-item label="场景数值" v-if="form.scene_type == 'scene_id'">
                    <el-input type="number" v-model="form.scene_value"></el-input>
                    <hd-form-error name="scene_value" />
                    <hd-tip>临时二维码时为32位非0整型，永久二维码时最大值为100000</hd-tip>
                </el-form-item>

                <el-form-item label="场景字符串" v-if="form.scene_type == 'scene_str'">
                    <el-input v-model="form.scene_value"></el-input>
                    <hd-form-error name="scene_value" />
                    <hd-tip>字符串类型，长度限制为1到64</hd-tip>
                </el-form-item>
            </el-card>
        </el-form>
        <span slot="footer">
            <el-button type="primary" @click="onSubmit" :disabled="isSubmit" v-loading="isSubmit">保存提交</el-button>
        </span>
    </el-dialog>
</template>

<script>
const form = { title: '', type: 'QR_SCENE', scene_type: 'scene_id', scene_value: '', expire_seconds: 2592000 }
export default {
    props: ['show', 'wechat', 'module'],
    data() {
        return {
            showDialog: this.show,
            isSubmit: false,
            form: Object.assign({}, form)
        }
    },
    watch: {
        show(n) {
            this.showDialog = n
        },
        showDialog(n) {
            this.$emit('update:show', n)
        }
    },
    methods: {
        onSubmit() {
            this.isSubmit = true
            this.form.module_id = this.module ?? null
            axios
                .post(`site/${this.wechat.site_id}/wechat/${this.wechat.id}/qr`, this.form)
                .then(_ => {
                    this.form = Object.assign({}, form)
                    this.showDialog = false
                    this.$parent.load()
                })
                .finally(_ => {
                    this.isSubmit = false
                })
        }
    }
}
</script>

<style></style>
