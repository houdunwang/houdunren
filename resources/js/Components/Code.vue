<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input :placeholder="$attrs.placeholder" v-model="account" class="mr-1"> </el-input>
            <el-button type="danger" class="" size="default" @click="send">发送验证码</el-button>
        </div>
        <hd-error :message="errors.account[0]" v-if="errors.account" />
        <hd-captcha v-model="captcha" class="flex-1" />
        <hd-error :message="errors['captcha.value'][0]" v-if="errors['captcha.value']" />
    </div>
</template>

<script>
export default {
    props: ['mobile'],
    data() {
        return {
            account: '18600276067',
            captcha: {},
            errors: {}
        }
    },
    watch: {
        content(n) {
            this.$emit('input', n)
        }
    },
    methods: {
        send() {
            const url = route('api.common.code.send')
            this.axios
                .post(url, {
                    account: this.account,
                    captcha: this.captcha
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors
                        console.log(this.errors)
                    }
                })
        }
    }
}
</script>

<style></style>
