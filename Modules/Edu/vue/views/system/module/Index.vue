<template>
    <div>
        <hd-tab :tabs="tabs" />
        <hd-module-list :modules="modules" #default="{ module }">
            <el-button-group>
                <el-button type="primary" size="mini" v-if="!module.isInstall" @click="install(module)">
                    安装模块
                </el-button>
                <el-button type="danger" size="mini" v-if="module.isInstall" @click="uninstall(module)">
                    卸载模块
                </el-button>
            </el-button-group>
        </hd-module-list>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    data() {
        return {
            modules: [],
            tabs
        }
    },
    async created() {
        this.modules = await this.axios.get(`module`)
    },
    methods: {
        install(module) {
            this.$confirm(`确定安装【${module.title}】吗？`, '温馨提示')
                .then(async () => {
                    await this.axios.post(`module/${module.name}`)
                    module.isInstall = true
                })
                .catch(() => {})
        },
        uninstall(module) {
            this.$confirm(`确定卸载【${module.title}】吗？`, '温馨提示')
                .then(async () => {
                    await this.axios.delete(`module/${module.name}`)
                    module.isInstall = false
                })
                .catch(() => {})
        }
    }
}
</script>

<style></style>
