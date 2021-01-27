<template>
    <admin-layout>
        <tab />
        <XForm :form="form" />
    </admin-layout>
</template>

<script>
import XForm from './Form'
import Tab from './Tab'
const form = { title: '', domain: '', module_id: null }
export default {
    route: { path: `/site/site/:id` },
    components: { XForm, Tab },
    data() {
        return { form }
    }
}
</script>

<style></style>
