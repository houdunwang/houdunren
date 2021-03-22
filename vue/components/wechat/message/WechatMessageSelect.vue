<template>
    <el-dialog title="关键字选择" :visible.sync="dialogShow" width="60%">
        <hd-wechat-message :wechat="wechat" v-if="wechat.id" :message-type="$route.query.type" #default="{message}">
            <el-button type="primary" size="mini" @click="select(message)">选择</el-button>
        </hd-wechat-message>
    </el-dialog>
</template>

<script>
export default {
    props: ['show', 'wechat'],
    data() {
        return {
            dialogShow: this.show
        }
    },
    watch: {
        show(n) {
            this.dialogShow = n
        },
        dialogShow(n) {
            this.$emit('update:show', n)
        }
    },
    methods: {
        select(message) {
            this.$emit('select', message)
            this.dialogShow = false
        }
    }
}
</script>

<style></style>
