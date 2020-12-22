<template>
    <div>
        <el-tabs v-model="activeName" type="card" @tab-click="change">
            <el-tab-pane
                :route="tab.route"
                :label="tab.label"
                :name="tab.name"
                v-for="(tab, index) in tabsData"
                :key="index"
            ></el-tab-pane>
        </el-tabs>
    </div>
</template>

<script>
export default {
    props: {
        tabs: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            activeName: this.tabs.find(tab => tab.route == route().current()).name,
            tabsData: this.formatTabs()
        }
    },
    methods: {
        formatTabs() {
            return this.tabs.filter(tab => {
                return !(tab.current && tab.route != route().current())
            })
        },
        change(tab) {
            if (tab.current) return
            if (tab.$attrs.route) this.$inertia.get(route(tab.$attrs.route))
        }
    }
}
</script>

<style>
</style>
