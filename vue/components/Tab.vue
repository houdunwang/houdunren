<template>
    <div>
        <el-tabs v-model="activeName" type="card" @tab-click="change">
            <el-tab-pane v-if="home" :route="home" name="home">
                <span slot="label"> <i class="fa fa-home text-gray-500" aria-hidden="true"></i> </span>
            </el-tab-pane>
            <el-tab-pane :route="tab.route" :params="tab.params" :label="tab.label" :name="tab.name" v-for="(tab, index) in tabsData" :key="index" />
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
            tabsData: this.formatTabs()
        }
    },
    created() {
        console.log(this.$route)
    },
    computed: {
        activeName() {
            const current = this.tabs.find(tab => tab.route == this.$route.path)
            return current ? current.name : ''
        }
    }
    // methods: {
    //     //含有current属性只在当前链接时显示，所以不是当前链接时要移除该tab
    //     formatTabs() {
    //         return this.tabs.filter(tab => {
    //             return !(tab.current && tab.route != this.$toute.path)
    //         })
    //     },
    //     change(tab) {
    //         if (tab.current) return
    //         if (tab.$attrs.route) this.$router.push(tab.$attrs.route)
    //     }
    // }
}
</script>

<style></style>
