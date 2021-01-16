<template>
    <hd-layout :tabs="tabs" home="site.site.index">
        <el-card shadow="always" :body-style="{ padding: '20px' }">
            <div slot="header">
                <span>站点 [{{ site.title }}] 模块列表</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-3 lg:grid-cols-6">
                <div class="shadow-sm border-gray-200 border rounded-sm flex flex-col justify-between items-center" v-for="module in modules" :key="module.id">
                    <div class="flex-1 flex flex-col py-3 items-center">
                        <el-image
                            :src="module.preview"
                            fit="corver"
                            :style="{ width: '50px', height: '50px' }"
                            class="rounded-full mb-2"
                            :lazy="true"
                        ></el-image>
                        <strong class="text-sm text-gray-800 mb-1">{{ module.title }}</strong>
                        <p class="text-xs text-gray-500 text-center p-2">
                            {{ module.description }}
                        </p>
                    </div>
                    <div class="border-t border-gray-200 w-full flex justify-center bg-gray-100 py-3">
                        <el-button type="primary" size="mini">
                            <inertia-link :href="route('site.module.admin', [site, module.name])">
                                管理模块
                            </inertia-link>
                        </el-button>
                    </div>
                </div>
            </div>
        </el-card>
    </hd-layout>
</template>

<script>
import tabs from './tabs'
export default {
    props: { modules: Array, site: Object },
    data() {
        return {
            tabs
        }
    }
}
</script>

<style></style>
