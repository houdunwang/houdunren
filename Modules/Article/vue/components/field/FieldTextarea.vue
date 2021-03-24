<template>
    <el-input type="textarea" row="5" v-model="form[field.name]"></el-input>
</template>

<script>
export default {
    props: ['field', 'form']
}
</script>

<style></style>
