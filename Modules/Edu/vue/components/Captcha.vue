<template>
    <div class="flex flex-col mt-4">
        <div class="flex">
            <el-input placeholder="请输入图形验证码" v-model="content" class="mr-1"> </el-input>
            <img :src="captcha.img" class="cursor-pointer max-w-sm border rounded-md border-gray-300 shadow-sm w-32" @click="get" />
        </div>
        <hd-error :message="errors('captha')" />
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    data() {
        return {
            captcha: {},
            content: ''
        }
    },
    watch: {
        content(n) {
            this.$emit('input', n)
        },
        'captcha.key'(n) {
            this.$emit('update:key', n)
        }
    },
    computed: {
        ...mapGetters(['errors'])
    },
    created() {
        this.get()
    },
    methods: {
        async get() {
            this.captcha = await this.axios.get(`captcha?_` + Math.random())
        }
    }
}
</script>

<style></style>
