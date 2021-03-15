<template>
    <div>
        <el-dialog title="文本消息设置" :visible.sync="dialogShow" width="90%" top="1rem">
            <el-form :model="form" ref="form" label-width="100px" :inline="false" size="normal">
                <hd-wechat-message-rule :form="form" />
                <el-card shadow="nerver" :body-style="{ padding: '20px' }" class="mt-3">
                    <div slot="header">
                        回复内容
                    </div>
                    <div v-for="(content, index) in form.content" :key="index" class="mt-2 relative">
                        <el-input type="textarea" v-model="content.title"></el-input>
                        <i
                            class="fas fa-times-circle absolute -top-3 -right-2 text-lg text-gray-500 hover:text-gray-800 duration-300 cursor-pointer"
                            @click="del(index)"
                        ></i>
                    </div>
                    <hd-error name="content" />
                    <el-button size="mini" @click="add" class="mt-2">添加回复</el-button>
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
            <el-button type="danger" size="small" @click="dialogShow = true" v-else>添加文本消息</el-button>
            <!-- 扩展按钮 -->
            <slot />
        </el-button-group>
    </div>
</template>

<script>
const form = { title: '', type: 'text', keyword_type: 'all', keyword: '', content: [] }
export default {
    props: ['wechat', 'message'],
    data() {
        return {
            form: _.merge({}, this.message || form),
            dialogShow: false
        }
    },
    methods: {
        add() {
            this.form.content.push({ title: '' })
        },
        del(index) {
            this.$confirm(`确定删除`, '温馨提示').then(_ => {
                this.form.content.splice(index, 1)
            })
        },
        async onSubmit() {
            const url = `site/${this.wechat.site_id}}/wechat/${this.wechat.id}}/message` + (this.message ? `/${this.message.id}` : ``)
            await axios[this.message ? 'put' : 'post'](url, this.form)
            this.$router.go(0)
        }
    }
}
</script>

<style></style>
