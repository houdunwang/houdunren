<template>
    <hd-image :action="`/api/upload/site/${site.id}`" v-model="form[field.name]" />
</template>

<script>
export default {
    props: ['field', 'form']
}
</script>

<style></style>
