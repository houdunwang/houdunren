<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input placeholder="请输入验证码" v-model="content" class="mr-1"> </el-input>
            <img :src="captcha.img" class="cursor-pointer max-w-sm border rounded-md border-gray-300 shadow-sm w-32" @click="get" />
        </div>
        <hd-error :message="$page.props.errors.captcha" />
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
    created() {
        this.get()
    },
    watch: {
        content(value) {
            this.$emit('input', { key: this.captcha.key, value: value })
        }
    },
    methods: {
        async get() {
            this.captcha = await this.axios.get(`/captcha/api`)
        }
    }
}
</script>

<style></style>
