<template>
    <div class="flex flex-col">
        <div class="flex">
            <el-input placeholder="请输入图形验证码" v-model="content" class="mr-1"> </el-input>
            <img :src="captcha.img" class="cursor-pointer max-w-sm border rounded-md border-gray-300 shadow-sm w-32" @click="get" />
        </div>
        <hd-error name="captcha.content" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            captcha: {},
            content: ''
        }
    },
    watch: {
        content(n) {
            this.$emit('input', { content: this.content, key: this.captcha.key })
        },
        'captcha.key'(n) {
            this.$emit('input', { content: this.content, key: this.captcha.key })
        }
    },
    created() {
        this.get()
    },
    methods: {
        async get() {
            this.captcha = await this.axios.get(`common/captcha?_` + Math.random())
        }
    }
}
</script>

<style></style>
