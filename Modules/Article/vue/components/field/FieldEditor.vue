<template>
    <wang-editor :name="field.name" v-model="form[field.name]" :uploadImgServer="`/api/upload/site/${site.id}/wangeditor`" />
</template>

<script>
export default {
    props: ['field', 'form']
}
</script>

<style></style>
