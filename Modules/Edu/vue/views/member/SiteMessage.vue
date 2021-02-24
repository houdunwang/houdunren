<template>
    <div>
        <hd-skeleton-list v-if="loading" :num="10" />
        <div class="card" v-else>
            <div class="card-header">
                <h3 class="card-title">站内消息</h3>
            </div>
            <div class="card-body pt-0" v-loading="loading">
                <div v-if="siteMessage.data && siteMessage.data.length > 0">
                    <div v-for="message in siteMessage.data" :key="message.id" class="border-b border-gray-200 py-3">
                        <component :is="`SiteMessage${message.data.model}`" :message="message"></component>
                    </div>
                </div>
                <div v-else>
                    <div class="flex justify-center items-center py-5 text-gray-600 text-sm">
                        暂无消息
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <el-pagination
                    v-if="siteMessage.meta"
                    :current-page="siteMessage.meta.current_page"
                    :hide-on-single-page="true"
                    :page-size="15"
                    :total="siteMessage.meta.total"
                    @current-change="load"
                    background
                >
                </el-pagination>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    route: { meta: { keepAlive: true } },
    data() {
        return {
            loading: false,
            page: 1
        }
    },
    computed: {
        ...mapState(['siteMessage'])
    },
    methods: {
        load() {
            this.loading = true
            this.$store.dispatch('siteMessage')
            this.loading = false
        }
    }
}
</script>

<style></style>
