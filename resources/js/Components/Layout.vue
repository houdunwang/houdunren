<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header" v-if="$slots['header']">
                <slot name="header" />
            </div>
            <!-- card body -->
            <slot />
        </el-card>
    </div>
</template>

<script>
export default {
    props: ['tabs']
}
</script>

<style>
</style>

