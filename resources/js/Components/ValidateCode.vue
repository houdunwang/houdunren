<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input :placeholder="$attrs.placeholder" v-model.trim="form.account" class="mr-1"> </el-input>
            <el-button type="danger" size="default" :disabled="!form.account" @click="send" v-if="timer <= 0">发送验证码</el-button>
            <el-button type="info" size="default" :disabled="true" v-else>{{ timer }}秒后操作</el-button>
        </div>
        <hd-error :message="errors('account')" />
        <hd-captcha v-model="form.captcha" class="flex-1" ref="captcha" />
        <hd-error :message="errors('captcha')" />
    </div>
</template>

<script>
import dayjs from 'dayjs'
import { mapGetters } from 'vuex'
export default {
    props: {
        type: { type: String, default: 'all' },
        timeout: { type: Number, default: 60 },
        action: { type: String, default: '/api/common/code/send' }
    },
    data() {
        return {
            form: { account: this.$attrs.value, captcha: '' },
            //按钮显示的倒计时
            timer: 0
        }
    },
    computed: {
        ...mapGetters(['errors'])
    },
    mounted() {
        //组件挂载后检查定时器
        this.setInterval()
    },
    watch: {
        //手机号修改后通知父级组件
        'form.account'(n) {
            this.$emit('input', n)
        }
    },
    methods: {
        async send() {
            const isEmail = /^.+@.+$/.test(this.form.account)
            const isMobile = /^\d{11}$/.test(this.form.account)

            switch (this.type) {
                case 'email':
                    if (!isEmail) return this.$message('邮箱格式错误')
                    break
                case 'mobile':
                    if (!isMobile) return this.$message('手机号错误')
                    break
                default:
                    if (isEmail || isMobile) break
                    return this.$message('帐号格式错误')
            }

            if (this.times < 0) {
                if (!this.form.captcha) return this.$message('图形验证码不能为空')
                //发送验证码并开启计时器
                this.axios
                    .post(this.action, this.form)
                    .then(r => {
                        window.localStorage.setItem('sendCodeTime', dayjs())
                        this.setInterval()
                    })
                    .finally(() => {
                        //更新验证码
                        this.$refs['captcha'].get()
                    })
            }
        },
        //发送时间计算
        setInterval() {
            //如果没有发送时间，不处理
            const sendTime = window.localStorage.getItem('sendCodeTime')
            if (!sendTime) return

            let tid = setInterval(() => {
                //时间差
                const timeout = dayjs(sendTime)
                    .add(this.timeout, 'second')
                    .diff(dayjs(), 'second')
                //修改按钮显示时间
                this.times = Math.round(timeout)
                if (this.times < 0) clearInterval(tid)
            })
        }
    }
}
</script>

<style></style>
