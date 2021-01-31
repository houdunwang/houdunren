<template>
    <hd-tab :tabs="tabs">
        <slot />
    </hd-tab>
</template>

<script>
const tabs = [
    { label: '站点列表', name: 'index', route: 'site.site.index' },
    { label: '添加站点', name: 'create', route: 'site.site.create' },
    { label: '修改站点', name: 'edit', route: 'site.site.edit', current: true }
]
export default {
    data() {
        return { tabs }
    }
}
</script>

<style>
</style>

