<template>
    <img :src="$attrs.user.icon" class="rounded-lg object-cover cursor-pointer" @click="space($attrs.user)" :class="classname" />
</template>

<script>
export default {
    props: {
        classname: { default: 'w-12 h-12 ' }
    }
}
</script>

<style></style>
