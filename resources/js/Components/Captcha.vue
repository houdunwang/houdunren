<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input placeholder="请输入验证码" v-model="content" class="mr-1"> </el-input>
            <img
                :src="captcha"
                class="cursor-pointer max-w-sm border rounded-md border-gray-300 shadow-sm w-36"
                @click="$event.target.src = `/captcha?` + Math.random()"
            />
        </div>
        <hd-error :message="$page.props.errors.captcha" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            captcha: `/captcha`,
            content: ''
        }
    },
    watch: {
        content(n) {
            this.$emit('input', n)
        }
    },
    methods: {
        update() {
            this.captcha = `/captcha?` + Math.random()
        }
    }
}
</script>

<style></style>
