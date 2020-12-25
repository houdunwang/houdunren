<template>
    <div>
        <el-tabs v-model="activeName" type="card" @tab-click="change">
            <el-tab-pane v-if="home" :route="home">
                <span slot="label">
                    <i class="fa fa-home text-gray-500" aria-hidden="true"></i>
                </span>
            </el-tab-pane>

            <el-tab-pane
                :route="tab.route"
                :label="tab.label"
                :name="tab.name"
                v-for="(tab, index) in tabsData"
                :key="index"
            />
        </el-tabs>
    </div>
</template>

<script>
export default {
    props: {
        home: { type: String, default: '' },
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
        //含有current属性只在当前链接时显示，所以不是当前链接时要移除该tab
        formatTabs() {
            return this.tabs.filter(tab => {
                return !(tab.current && tab.route != route().current())
            })
        },
        change(tab) {
            console.log(tab)

            if (tab.current) return
            if (tab.$attrs.route) this.$inertia.get(route(tab.$attrs.route))
        }
    }
}
</script>

<style>
</style>
