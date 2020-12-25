<template>
    <hd-layout :tabs="tabs" home="/system">
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                <span>基本资料</span>
            </div>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from './tabs'

export default {
    data() {
        return { tabs }
    }
}
</script>

<style>
</style>
