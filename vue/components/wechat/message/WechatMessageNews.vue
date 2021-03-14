<template>
    <div>
        <el-dialog title="图文消息设置" :visible.sync="dialogShow" width="90%" top="1rem">
            <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
                <hd-wechat-message-rule :form="form" />
                <el-card shadow="nerver" :body-style="{ padding: '20px' }" class="mt-3">
                    <div slot="header">
                        图文消息
                    </div>
                    <el-form-item label="文章标题">
                        <el-input v-model="form.content.title"></el-input>
                        <hd-error name="content.title" />
                    </el-form-item>
                    <el-form-item label="消息简介">
                        <el-input type="textarea" v-model="form.content.description"></el-input>
                        <hd-error name="content.description" />
                    </el-form-item>
                    <el-form-item label="消息图片">
                        <hd-image v-model="form.content.pic" :sid="wechat.site_id" />
                        <hd-error name="content.pic" />
                    </el-form-item>
                    <el-form-item label="跳转链接">
                        <el-input v-model="form.content.url"></el-input>
                        <hd-error name="content.url" />
                    </el-form-item>
                </el-card>
            </el-form>
            <span slot="footer">
                <el-button @click="dialogShow = false">关闭</el-button>
                <el-button type="primary" @click="onSubmit">保存提交</el-button>
            </span>
        </el-dialog>
         <el-button-group>
            <!-- 编辑按钮 -->
            <el-button type="success" size="mini" @click="dialogShow = true" v-if="message">编辑</el-button>
            <!-- 添加按钮 -->
            <el-button type="danger" size="small" @click="dialogShow = true" v-else>添加消息</el-button>
            <!-- 扩展按钮 -->
            <slot />
        </el-button-group>
    </div>
</template>

<script>
const form = {
    title: '',
    type: 'news',
    keyword_type: 'all',
    keyword: '',
    content: {
        title: '',
        pic:'',
        url: '',
        description: '',
    }
}
export default {
    props: ['wechat', 'message'],
    data() {
        return {
            form: _.merge({}, this.message || form),
            dialogShow: false
        }
    },
    methods: {
        async onSubmit() {
           const url = `site/${this.wechat.site_id}}/wechat/${this.wechat.id}}/message` + (this.message ? `/${this.message.id}` : ``)
            await axios[this.message ? 'put' : 'post'](url, this.form)
           this.$router.go(0)
        }
    }
}
</script>
</script>

<style></style>
