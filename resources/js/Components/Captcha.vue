<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input placeholder="请输入图形验证码" :value="$attrs.value" @input="$emit('input', $event.trim())" class="mr-1"> </el-input>
            <img :src="captcha" class="cursor-pointer max-w-sm border rounded-md border-gray-300 shadow-sm w-32" @click="get" />
        </div>
        <hd-error :message="$page.props.errors.captcha" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            captcha: {}
        }
    },
    created() {
        this.get()
    },
    methods: {
        get() {
            this.captcha = `/captcha?` + Math.random()
        }
    }
}
</script>

<style></style>
