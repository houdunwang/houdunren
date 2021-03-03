<template>
    <div>
        <!-- <hd-tab :tabs="tabs" /> -->
        Edit...
    </div>
</template>

<script>
import tabs from './tabs'
const form = { logo: '' }
export default {
    data() {
        return { tabs, form, loading: true, submit: false }
    }
}
</script>

<style></style>
