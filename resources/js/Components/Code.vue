<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input placeholder="请输入收到的验证码" v-model="code" class="mr-1"> </el-input>
            <el-button type="danger" class="" size="default" @click="send">发送验证码</el-button>
        </div>
        <hd-error :message="$page.props.errors.code" />
    </div>
</template>

<script>
export default {
    props: ['mobile'],
    data() {
        return {
            code: ''
        }
    },
    watch: {
        content(n) {
            this.$emit('input', n)
        }
    },
    methods: {
        send() {}
    }
}
</script>

<style></style>
