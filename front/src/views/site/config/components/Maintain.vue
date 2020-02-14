<template>

    <el-form ref="form" label-width="120px">

        <el-form-item :label="field.maintain.close.title">
            <el-radio-group v-model="field.maintain.close.value">
                <el-radio :label="1">是</el-radio>
                <el-radio :label="0">否</el-radio>
            </el-radio-group>
        </el-form-item>

        <el-form-item :label="field.maintain.message.title">
            <el-input
                type="textarea"
                rows="3"
                v-model="field.maintain.message.value"
                :placeholder="field.maintain.message.desc"
            ></el-input>
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
