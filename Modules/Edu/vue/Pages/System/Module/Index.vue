<template>
    <hd-layout :tabs="tabs" home="system.home">
        <el-card shadow="never" :body-style="{ padding: '0px' }">
            <div slot="header">
                <span>模块列表</span>
            </div>
            <div v-for="(module, index) in modules" :key="index" class="grid-cols-12 grid border-b border-gray-200 py-3">
                <el-image style="width: 50px; height: 50px" :src="module.preview" fit="cover" class="ml-5 border rounded-sm border-gray-200"></el-image>
                <div class="text-sm col-span-8 grid content-center">
                    <div class="mb-1">
                        <strong class="text-sm text-gray-800">{{ module.title }}</strong>
                        <span class="text-gray-600 text-xs">
                            {{ module.description }}
                        </span>
                    </div>
                    <div class="text-xs text-gray-600">标识: {{ module.name }} 版本：{{ module.version }}</div>
                </div>
                <div class="grid justify-end col-span-3 items-center mr-5">
                    <el-button-group>
                        <el-button type="primary" size="mini" v-if="!module.isInstall">
                            <inertia-link :href="route('system.module.install', module.name)">
                                安装模块
                            </inertia-link>
                        </el-button>
                        <el-button type="warning" size="mini" v-if="module.isInstall" @click="uninstall(module)">
                            删除
                        </el-button>
                        <el-button type="danger" size="mini" v-if="!module.isInstall" @click="del(module)">
                            删除模块和所有文件
                        </el-button>
                    </el-button-group>
                </div>
            </div>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from './tabs'

export default {
    props: ['modules'],
    data() {
        return {
            tabs
        }
    },
    methods: {
        uninstall(module) {
            this.$confirm('确定删除吗？', '温馨提示')
                .then(() => {
                    this.$inertia.delete(route('system.module.uninstall', module.name))
                })
                .catch(() => {})
        },
        del(module) {
            this.$confirm('确定删除模块所有文件吗？模块将从服务完全删除!', '温馨提示')
                .then(() => {
                    this.$inertia.delete(route('system.module.del', module.name))
                })
                .catch(() => {})
        }
    }
}
</script>

<style></style>
