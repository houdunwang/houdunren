<template>
    <hd-tab :tabs="tabs">
        <slot />
    </hd-tab>
</template>

<script>
const tabs = [
    { label: "用户组列表", name: "index", route: "system.group.index" },
    { label: "添加用户组", name: "create", route: "system.group.create" },
    { label: "修改用户组", name: "edit", route: "system.group.edit", current: true },
];
export default {
    data() {
        return { tabs };
    },
};
</script>

<style>
</style>

