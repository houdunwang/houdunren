<template>
    <div>
        <hd-tab :tabs="tabs" />
        <el-card shadow="always" :body-style="{ padding: '20px' }" v-loading="loading">
            <div slot="header">
                <span>站点 [{{ site.title }}] 模块列表</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-3 lg:grid-cols-6" v-if="modules.length">
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
                            <a href="#" class="text-white" @click.prevent="admin(module)">
                                管理模块
                            </a>
                        </el-button>
                    </div>
                </div>
            </div>
            <div v-if="!loading && modules.length == 0" class="text-center text-gray-600"><i class="fas fa-info-circle"></i> 暂无模块</div>
        </el-card>
    </div>
</template>

<script>
import tabs from './tabs'
export default {
    route: { path: `:sid/module/index` },
    data() {
        return {
            loading: true,
            modules: [],
            site: {},
            tabs: tabs({ sid: this.$route.params.sid })
        }
    },
    async created() {
        this.site = await this.axios.get(`site/${this.$route.params.sid}`)
        this.modules = await this.axios.get(`module/site/${this.site.id}/user`)
        this.loading = false
    },
    methods: {
        admin(module) {
            window.localStorage.setItem('sid', this.site.id)
            window.localStorage.setItem('mid', module.id)
            location.href = `/admin/${this.site.id}/${module.id}`
        }
    }
}
</script>

<style></style>
