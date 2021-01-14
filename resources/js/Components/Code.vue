<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input :placeholder="$attrs.placeholder" v-model="form.account" class="mr-1"> </el-input>
            <el-button native-type="button" type="danger" class="" size="default" @click="send" v-if="sendCodeDiff <= 0">发送验证码</el-button>
            <el-button native-type="button" type="info" class="" size="default" v-if="sendCodeDiff > 0">{{ sendCodeDiff }}后操作</el-button>
        </div>
        <hd-error :message="$page.props.errors.account" />
        <hd-captcha v-model="form.captcha" class="flex-1" />
    </div>
</template>

<script>
import dayjs from 'dayjs'

export default {
    data() {
        return {
            form: this.$inertia.form({
                account: '',
                captcha: ''
            }),
            //发送时间倒计时
            sendCodeDiff: 0
        }
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
            const url = route('common.code.send')
            if (this.sendCodeDiff < 0) {
                this.form.post(url, {
                    onSuccess: () => {
                        window.localStorage.setItem('sendCodeTime', dayjs())
                        this.sendTimeHandle()
                    }
                })
            }
        },
        //发送时间计算
        sendTimeHandle() {
            let tid = setInterval(() => {
                let diff = dayjs(window.localStorage.getItem('sendCodeTime') || 0)
                    .add(60, 'second')
                    .diff(dayjs(), 'second')

                if ((this.sendCodeDiff = Math.round(diff)) < 0) {
                    clearInterval(tid)
                }
            }, 100)
        }
    }
}
</script>

<style></style>
