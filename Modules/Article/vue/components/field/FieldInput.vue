<template>
    <el-input :placeholder="field.placeholder" size="normal" clearable v-model="form[field.name]"></el-input>
</template>

<script>
export default {
    props: ['field', 'form']
}
</script>

<style></style>
