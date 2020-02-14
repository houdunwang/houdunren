<template>

    <el-form ref="form" label-width="120px">

        <el-form-item :label="field.user.drive.title">
            <el-checkbox-group v-model="field.user.drive.value">
                <el-checkbox label="email">邮箱注册</el-checkbox>
                <el-checkbox label="mobile">手机号注册</el-checkbox>
            </el-checkbox-group>
        </el-form-item>

        <el-form-item :label="field.user.captcha.title">
            <el-radio-group v-model="field.user.captcha.value">
                <el-radio label="1">开启</el-radio>
                <el-radio label="0">关闭</el-radio>
            </el-radio-group>
        </el-form-item>

        <el-form-item :label="field.user.avatar.title">
            <el-radio-group v-model="field.user.avatar.value">
                <el-radio label="1">开启</el-radio>
                <el-radio label="0">关闭</el-radio>
            </el-radio-group>
        </el-form-item>

    </el-form>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: "Base",
        computed: {
            ...mapState('site', {field: 'config'})
        }
    }
</script>

<style scoped>

</style>
