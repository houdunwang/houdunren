<template>
    <router-link :to="{ name: 'space.follower', params: { id: $attrs.user.id } }" :class="classname" class="d-block">
        <img :src="$attrs.user.icon" class="rounded-lg object-cover cursor-pointer" :class="classname" />
    </router-link>
</template>

<script>
export default {
    props: {
        classname: { default: 'w-12 h-12 ' }
    }
}
</script>

<style></style>
