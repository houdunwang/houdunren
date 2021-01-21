<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input :placeholder="$attrs.placeholder" v-model.trim="form.account" class="mr-1"> </el-input>
            <el-button type="danger" size="default" @click="send" v-if="sendCodeDiff <= 0">发送验证码</el-button>
            <el-button type="info" size="default" v-if="sendCodeDiff > 0">{{ sendCodeDiff }}后操作</el-button>
        </div>
        <hd-error :message="errors('account')" />
        <hd-captcha v-model="form.captcha" class="flex-1" />
    </div>
</template>

<script>
import dayjs from 'dayjs'
import { mapGetters } from 'vuex'
export default {
    props: {
        //验证码发送地址
        action: { type: String, default: `/common/code/send` }
    },
    data() {
        return {
            form: this.$inertia.form({ account: '', captcha: '' }),
            //发送时间倒计时
            sendCodeDiff: 0
        }
    },
    computed: {
        ...mapGetters(['errors'])
    },
    mounted() {
        this.sendTimeHandle()
    },
    watch: {
        'form.account'(n) {
            this.$emit('input', n)
        }
    },
    methods: {
        async send() {
            if (this.sendCodeDiff < 0) {
                if (!this.form.account || !this.form.captcha) return this.$message('帐号和图形验证码不能为空')

                if (!/.+@.+|\d{11}/.test(this.form.account)) return this.$message('帐号格式错误')

                //发送验证码并开启计时器
                this.axios.post(this.action, this.form).then(r => {
                    window.localStorage.setItem('sendCodeTime', dayjs())
                    this.sendTimeHandle()
                })
            }
        },
        //发送时间计算
        sendTimeHandle() {
            let tid = setInterval(() => {
                //发送时间
                const sendTime = window.localStorage.getItem('sendCodeTime') || 0
                //时间差
                const timeDiff = dayjs(sendTime)
                    .add(1, 'second')
                    .diff(dayjs(), 'second')
                //修改按钮显示时间
                this.sendCodeDiff = Math.round(diff)
                if (this.sendCodeDiff < 0) clearInterval(tid)
            }, 100)
        }
    }
}
</script>

<style></style>
