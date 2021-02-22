<template>
    <div class="flex flex-col">
        <div class="flex">
            <el-input :placeholder="$attrs.placeholder" v-model.trim="form.account" class="mr-1"> </el-input>
            <el-button type="info" size="default" :disabled="true" v-if="times > 0">{{ times }}秒后操作</el-button>
            <el-button type="danger" size="default" @click="send" v-else>发送验证码</el-button>
        </div>
        <hd-error name="account" class="mb-2" />
        <hd-captcha v-model="form.captcha" class="flex-1" ref="captcha" />
    </div>
</template>

<script>
import Timer from '../utils/timer'
export default {
    props: {
        type: { type: String, default: 'all' },
        timeout: { type: Number, default: 60 },
        action: { type: String, default: 'code/send' },
        //记录发送时间的标识
        ckey: { type: String, default: 'code-send' }
    },
    data() {
        return {
            form: { account: this.$attrs.value, captcha: {} },
            //按钮显示的倒计时秒数
            times: 0,
            //定时器
            intervalId: 0
        }
    },
    mounted() {
        this.intervalId = setInterval(() => (this.times = Timer.diffNow(this.ckey, this.timeout)), 20)
    },
    beforeDestroy() {
        clearInterval(this.intervalId)
    },
    watch: {
        //手机号修改后通知父级组件
        'form.account'(n) {
            this.$emit('input', n)
        }
    },
    methods: {
        async send() {
            this.$store.commit('errors', {})
            const error = this.checkFiels()
            if (error) return this.$message(error)
            this.axios
                .post(this.action, this.form)
                .then(_ => Timer.record(this.ckey))
                .finally(_ => this.$refs['captcha'].get())
        },
        //表单验证
        checkFiels() {
            const isEmail = /^.+@.+$/.test(this.form.account)
            const isMobile = /^\d{11}$/.test(this.form.account)
            switch (this.type) {
                case 'email':
                    if (!isEmail) return '邮箱格式错误'
                    break
                case 'mobile':
                    if (!isMobile) return '手机号错误'
                    break
                default:
                    if (isEmail || isMobile) break
                    return '帐号格式错误'
            }
            if (!this.form.captcha) return '图形验证码不能为空'
        }
    }
}
</script>

<style></style>
