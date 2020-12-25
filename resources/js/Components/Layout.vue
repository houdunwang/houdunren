<template>
    <div>
        <hd-tab :home="home" :tabs="tabs" />
        <slot />
    </div>
</template>

<script>
export default {
    props: ['home', 'tabs']
}
</script>

<style>
</style>

